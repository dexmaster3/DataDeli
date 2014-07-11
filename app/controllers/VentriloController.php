<?php

/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 7/4/14
 * Time: 6:50 PM
 */
class VentriloController extends BaseController
{
    private function channelDisplay(&$stat, $name, $cid, &$send_string)
    {
        $chan = $stat->ChannelFind($cid);
        $protflag = "";
        if ($name == $stat->m_name) {
            $protflag = "<img src=\"/img/staticpages/venticon_server.png\" />";
        } else if (isset($chan->m_prot) && $chan->m_prot) {
            $protflag = "<img src=\"/img/staticpages/venticon_chanpassopen.png\" />";
        } else {
            $protflag = "<img src=\"/img/staticpages/venticon_chanopen.png\" />";
        }
        $send_string .= "<tr><td><div class=\"channelName\">$protflag $name</div><table class=\"ventTable\" width=\"95%\" border=\"0\" align=\"right\">";

        // Display Client for this channel.

        foreach ($stat->m_clientlist as $client) {
            //client's channel equals displayed channel, skip loop
            if ($client->m_cid != $cid)
                continue;

            $send_string .= "<tr><td><img src=\"/img/staticpages/venticon_voiceoff.png\"/> ";

            $flags = "";

            if ($client->m_admin)
                $flags .= "A";

            if ($client->m_phan)
                $flags .= "P";

            if (strlen($flags))
                $send_string .= "\"$flags\" ";

            $send_string .= $client->m_name;
            if ($client->m_comm)
                $send_string .= " ($client->m_comm)";

            $send_string .= "</td></tr>";
        }

        // Display sub-channels for this channel.

        foreach ($stat->m_channellist as $subchannel) {
            if ($subchannel->m_pid == $cid) {
                $cn = $subchannel->m_name;
                if (strlen($subchannel->m_comm)) {
                    $cn .= " ($subchannel->m_comm)";
                }

                self::channelDisplay($stat, $cn, $subchannel->m_cid, $send_string);
            }
        }

        $send_string .= "</table></td></tr>";
    }

    public function ventrilo()
    {

        $stat = new CVentriloStatus;
        $stat->m_cmdprog = 'C:/ventrilo_status.exe'; // Adjust to ventrilo_status.exe file.
        $stat->m_cmdcode = "2"; // Detail mode.
        $stat->m_cmdhost = "localhost"; // Assume ventrilo server on same machine.
        $stat->m_cmdport = "3784"; // Port to be statused.
        $stat->m_cmdpass = ""; // Status password if necessary.

        $rc = $stat->Request();
        if ($rc) {
            Session::flash('message', "CVentriloStatus->Request() failed vent server may be offline. <strong>$stat->m_error</strong><br><br>\n");
        }

        //Server Information
        $basic_info = array(
            "Name" => $stat->m_name,
            "Phonetic" => $stat->m_phonetic,
            "Comment" => $stat->m_comment,
            "Auth" => $stat->m_auth,
            "Max Clients" => $stat->m_maxclients,
            "Voice Codec" => $stat->m_voicecodec_desc,
            "Voice Format" => $stat->m_voiceformat_desc,
            "Uptime" => $stat->m_uptime,
            "Platform" => $stat->m_platform,
            "Version" => $stat->m_version,
            "Channel Count" => $stat->m_channelcount,
            "Client Count" => $stat->m_clientcount
        );

        //User Information
        $user_info = array();
        foreach ($stat->m_clientlist as $client) {
            $client_stats = array(
                "Name" => $client->m_name,
                "Channel ID" => $client->m_cid,
                "Seconds Connected" => $client->m_sec,
                "Ping" => $client->m_ping,
                "Comment" => $client->m_comm
            );
            array_push($user_info, $client_stats);
        }

        //Channel Information
        $channel_info_string = "";
        $this->channelDisplay($stat, $stat->m_name, 0, $channel_info_string);

        //Comments Information
        $vent_comments = VentComment::orderBy('created_at', 'DESC')->get();

        return View::make('static.ventrilostatus')
            ->with('basic', $basic_info)
            ->with('user', $user_info)
            ->with('channel', $channel_info_string)
            ->with('vent_comments', $vent_comments);
    }

    public function grabComments($key)
    {
        if ($key == "test") {
            $stat = new CVentriloStatus;
            $stat->m_cmdprog = 'C:/ventrilo_status.exe'; // Adjust to ventrilo_status.exe file.
            $stat->m_cmdcode = "2"; // Detail mode.
            $stat->m_cmdhost = "localhost"; // Assume ventrilo server on same machine.
            $stat->m_cmdport = "3784"; // Port to be statused.
            $stat->m_cmdpass = ""; // Status password if necessary.

            //Populates Stat Object
            $stat->Request();

            //User Information
            foreach ($stat->m_clientlist as $client) {
                $found_entry = VentComment::where('comment', '=', $client->m_comm)->get();
                if ($client->m_comm != "" && $found_entry->isEmpty()) {
                    $comment = new VentComment;
                    $comment->name = $client->m_name;
                    $comment->comment = $client->m_comm;
                    $comment->save();
                }
            }
        }
    }
}
