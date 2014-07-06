<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 7/4/14
 * Time: 6:50 PM
 */

class VentriloController extends BaseController
{
    private function channelDisplay(&$stat, &$return_string, $cid, $name)
    {
        $chan = $stat->ChannelFind($cid);
        echo "<tr><td><strong>$name</strong><table class=\"ventTable\" width=\"95%\" border=\"0\" align=\"right\">";

        // Display Client for this channel.

        foreach ($stat->m_clientlist as $client) {

            echo "<tr><td>";

            $flags = "";

            if ($client->m_admin)
                $flags .= "A";

            if ($client->m_phan)
                $flags .= "P";

            if (strlen($flags))
                echo "\"$flags\" ";

            echo $client->m_name;
            if ($client->m_comm)
                echo " ($client->m_comm)";

            echo "</td></tr>";
        }

        // Display sub-channels for this channel.

        foreach ($stat->m_channellist as $subchannel)
        {
            if ($subchannel->m_pid == $cid)
            {
                $cn = $subchannel->m_name;
                if (strlen($subchannel->m_comm))
                {
                    $cn .= " (";
                    $cn .= $subchannel->m_comm;
                    $cn .= ")";
                }

                self::channelDisplay($stat, $cn, $subchannel->m_cid, $name);
            }
        }

        echo "      </table>\n";
        echo "    </td>\n";
        echo "  </tr>\n";
    }

    public function ventrilo()
    {

    $stat = new CVentriloStatus;
    $stat->m_cmdprog	= 'C:/ventrilo_status.exe';	// Adjust accordingly.
    $stat->m_cmdcode	= "2";					// Detail mode.
    $stat->m_cmdhost	= "localhost";			// Assume ventrilo server on same machine.
    $stat->m_cmdport	= "3784";				// Port to be statused.
    $stat->m_cmdpass	= "";					// Status password if necessary.

    $rc = $stat->Request();
    if ( $rc )
    {
        echo "CVentriloStatus->Request() failed vent server may be offline. <strong>$stat->m_error</strong><br><br>\n";
    }

    $weblink = "ventrilo://$stat->m_cmdhost:$stat->m_cmdport/servername=$stat->m_name";

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

        $user_info = array();
        foreach ($stat->m_clientlist as $client)
        {
            $client_stats = array(
                "UID" => $client->m_uid,
                "CID" => $client->m_cid,
                "Sec" => $client->m_sec,
                "Ping" => $client->m_ping,
                "Name" => $client->m_name,
                "Comment" => $client->m_comm
            );
            array_push($user_info, $client_stats);
        }

        $send_string = "";
        $channel_info = $this->channelDisplay($stat, $send_string, 0, "Lobby");
        return View::make('static.ventrilostatus')
            ->with('basic', $basic_info)
            ->with('user', $user_info);
    }
}