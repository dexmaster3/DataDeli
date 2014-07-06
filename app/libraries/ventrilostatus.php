<?php

/*
	This file should not be modified. This is so that future versions can be
	dropped into place as servers are updated.
	
	Version 2.3.0: Supports phantoms.
	Version 2.2.1: Supports channel comments.
*/

class ventrilofunctions
{

    function StrKey($src, $key, &$res)
    {
        $key .= " ";
        if (strncasecmp($src, $key, strlen($key)))
            return false;

        $res = substr($src, strlen($key));
        return true;
    }


    function StrSplit($src, $sep, &$d1, &$d2)
    {
        $pos = strpos($src, $sep);
        if ($pos === false) {
            $d1 = $src;
            return;
        }

        $d1 = substr($src, 0, $pos);
        $d2 = substr($src, $pos + 1);
    }


    function StrDecode(&$src)
    {
        $res = "";

        for ($i = 0; $i < strlen($src);) {
            if ($src[$i] == '%') {
                $res .= sprintf("%c", intval(substr($src, $i + 1, 2), 16));
                $i += 3;
                continue;
            }

            $res .= $src[$i];
            $i += 1;
        }

        return ($res);
    }

    function VentriloDisplayEX1(&$stat, $name, $cid, $bgidx)
    {
        $ventfunc = new ventrilofunctions;
        $chan = $stat->ChannelFind($cid);

        echo "  <tr>\n";
        echo "    <td bgcolor=\"$bg\"><font color=\"$fg\"><strong>";
        echo $name;
        echo "</strong></font>\n";

        echo "      <table width=\"95%\" border=\"0\" align=\"right\">\n";

        // Display Client for this channel.

        for ($i = 0; $i < count($stat->m_clientlist); $i++) {
            $client = $stat->m_clientlist[$i];

            if ($client->m_cid != $cid)
                continue;

            echo "      <tr>\n";
            echo "        <td bgcolor=\"#FFFFFF\">";

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

            echo "  </td>\n";
            echo "      </tr>\n";
        }

        // Display sub-channels for this channel.

        for ($i = 0; $i < count($stat->m_channellist); $i++) {
            if ($stat->m_channellist[$i]->m_pid == $cid) {
                $cn = $stat->m_channellist[$i]->m_name;
                if (strlen($stat->m_channellist[$i]->m_comm)) {
                    $cn .= " (";
                    $cn .= $stat->m_channellist[$i]->m_comm;
                    $cn .= ")";
                }

                $ventfunc->VentriloDisplayEX1($stat, $cn, $stat->m_channellist[$i]->m_cid, $bgidx + 1);
            }
        }

        echo "      </table>\n";
        echo "    </td>\n";
        echo "  </tr>\n";
    }

    function VentriloDisplayEX2_Stripe($perc, $val, $bgidx)
    {
        $fgcol = "#000000";
        /**/
        if ($bgidx < 0) {
            $fgcol = "#FFFFFF";
            $bgcol = "#000000";
        } else {
            if ($bgidx % 2)
                $bgcol = "#FFFFCC";
            else
                $bgcol = "#FFFFFF";
        }

        echo "    <td width=\"$perc\" bgcolor=\"$bgcol\"><font color=\"$fgcol\">$val</font></td>\n";
    }


    function VentriloDisplayEX2(&$stat, $name, $cid, $bgidx)
    {
        // Display the table headers.

        $ventfunc = new ventrilofunctions;
        echo "  <tr>\n";

        $ventfunc->VentriloDisplayEX2_Stripe("5%", "Flags", -1);
        $ventfunc->VentriloDisplayEX2_Stripe("5%", "UID", -1);
        $ventfunc->VentriloDisplayEX2_Stripe("5%", "CID", -1);
        $ventfunc->VentriloDisplayEX2_Stripe("10%", "Sec", -1);
        $ventfunc->VentriloDisplayEX2_Stripe("10%", "Ping", -1);
        $ventfunc->VentriloDisplayEX2_Stripe("20%", "Name", -1);
        $ventfunc->VentriloDisplayEX2_Stripe("45%", "Comment", -1);

        echo "  </tr>\n";

        // Display all clients.

        for ($i = 0; $i < count($stat->m_clientlist); $i++) {
            echo "  <tr>\n";

            $client = $stat->m_clientlist[$i];

            $flags = "";

            if ($client->m_admin)
                $flags .= "A";

            if ($client->m_phan)
                $flags .= "P";

            $ventfunc->VentriloDisplayEX2_Stripe("5%", $flags, $bgidx);
            $ventfunc->VentriloDisplayEX2_Stripe("5%", $client->m_uid, $bgidx);
            $ventfunc->VentriloDisplayEX2_Stripe("5%", $client->m_cid, $bgidx);
            $ventfunc->VentriloDisplayEX2_Stripe("10%", $client->m_sec, $bgidx);
            $ventfunc->VentriloDisplayEX2_Stripe("10%", $client->m_ping, $bgidx);
            $ventfunc->VentriloDisplayEX2_Stripe("20%", $client->m_name, $bgidx);
            $ventfunc->VentriloDisplayEX2_Stripe("45%", $client->m_comm, $bgidx);

            echo "  </tr>\n";

            $bgidx += 1;
        }
    }

    function VentriloInfoEX1_Stripe(&$bgidx, $name, $val)
    {
        if ($bgidx % 2)
            $bgcolname = "#666666";
        else
            $bgcolname = "#333333";

        if ($bgidx % 2)
            $bgcolval = "#FFFFCC";
        else
            $bgcolval = "#FFFFFF";

        echo "  <tr>\n";
        echo "    <td width=\"35%\" bgcolor=\"$bgcolname\"><font color=\"#FFFFFF\">";
        echo "<strong>";
        echo $name;
        echo "</strong>";
        echo "</font></td>\n";
        echo "    <td width=\"65%\" bgcolor=\"$bgcolval\"><font color=\"#000000\">";
        echo "<div align=\"center\">";
        echo $val;
        echo "</div";
        echo "</font></td>\n";
        echo "  </tr>\n";

        $bgidx += 1;

    }


    function VentriloInfoEX1(&$stat)
    {
        $ventfunc = new ventrilofunctions;
        $bgidx = 0;

        $ventfunc->VentriloInfoEX1_Stripe($bgidx, "Name", $stat->m_name);
        $ventfunc->VentriloInfoEX1_Stripe($bgidx, "Phonetic", $stat->m_phonetic);
        $ventfunc->VentriloInfoEX1_Stripe($bgidx, "Comment", $stat->m_comment);
        $ventfunc->VentriloInfoEX1_Stripe($bgidx, "Auth", $stat->m_auth);
        $ventfunc->VentriloInfoEX1_Stripe($bgidx, "Max Clients", $stat->m_maxclients);
        $ventfunc->VentriloInfoEX1_Stripe($bgidx, "Voice Codec", $stat->m_voicecodec_desc);
        $ventfunc->VentriloInfoEX1_Stripe($bgidx, "Voice Format", $stat->m_voiceformat_desc);
        $ventfunc->VentriloInfoEX1_Stripe($bgidx, "Uptime", $stat->m_uptime);
        $ventfunc->VentriloInfoEX1_Stripe($bgidx, "Platform", $stat->m_platform);
        $ventfunc->VentriloInfoEX1_Stripe($bgidx, "Version", $stat->m_version);
        $ventfunc->VentriloInfoEX1_Stripe($bgidx, "Channel Count", $stat->m_channelcount);
        $ventfunc->VentriloInfoEX1_Stripe($bgidx, "Client Count", $stat->m_clientcount);
    }
}

class CVentriloClient
{
    var $m_uid; // User ID.
    var $m_admin; // Admin flag.
    var $m_phan; // Phantom flag.
    var $m_cid; // Channel ID.
    var $m_ping; // Ping.
    var $m_sec; // Connect time in seconds.
    var $m_name; // Login name.
    var $m_comm; // Comment.

    function Parse($str)
    {
        $ventfunc = new ventrilofunctions;
        $ary = explode(",", $str);

        for ($i = 0; $i < count($ary); $i++) {
            $ventfunc->StrSplit($ary[$i], "=", $field, $val);

            if (strcasecmp($field, "UID") == 0) {
                $this->m_uid = $val;
                continue;
            }

            if (strcasecmp($field, "ADMIN") == 0) {
                $this->m_admin = $val;
                continue;
            }

            if (strcasecmp($field, "CID") == 0) {
                $this->m_cid = $val;
                continue;
            }

            if (strcasecmp($field, "PHAN") == 0) {
                $this->m_phan = $val;
                continue;
            }

            if (strcasecmp($field, "PING") == 0) {
                $this->m_ping = $val;
                continue;
            }

            if (strcasecmp($field, "SEC") == 0) {
                $this->m_sec = $val;
                continue;
            }

            if (strcasecmp($field, "NAME") == 0) {
                $this->m_name = $ventfunc->StrDecode($val);
                continue;
            }

            if (strcasecmp($field, "COMM") == 0) {
                $this->m_comm = $ventfunc->StrDecode($val);
                continue;
            }
        }
    }
}

class CVentriloChannel
{
    var $m_cid; // Channel ID.
    var $m_pid; // Parent channel ID.
    var $m_prot; // Password protected flag.
    var $m_name; // Channel name.
    var $m_comm; // Channel comment.

    function Parse($str)
    {
        $ventfunc = new ventrilofunctions;
        $ary = explode(",", $str);

        for ($i = 0; $i < count($ary); $i++) {
            $ventfunc->StrSplit($ary[$i], "=", $field, $val);

            if (strcasecmp($field, "CID") == 0) {
                $this->m_cid = $val;
                continue;
            }

            if (strcasecmp($field, "PID") == 0) {
                $this->m_pid = $val;
                continue;
            }

            if (strcasecmp($field, "PROT") == 0) {
                $this->m_prot = $val;
                continue;
            }

            if (strcasecmp($field, "NAME") == 0) {
                $this->m_name = $ventfunc->StrDecode($val);
                continue;
            }

            if (strcasecmp($field, "COMM") == 0) {
                $this->m_comm = $ventfunc->StrDecode($val);
                continue;
            }
        }
    }
}


class CVentriloStatus
{
    // These need to be filled in before issueing the request.

    var $m_cmdprog; // Path and filename of external process to execute. ex: /var/www/html/ventrilo_status
    var $m_cmdcode; // Specific status request code. 1=General, 2=Detail.
    var $m_cmdhost; // Hostname or IP address to perform status of.
    var $m_cmdport; // Port number of server to status.

    // These are the result variables that are filled in when the request is performed.

    var $m_error; // If the ERROR: keyword is found then this is the reason following it.

    var $m_name; // Server name.
    var $m_phonetic; // Phonetic spelling of server name.
    var $m_comment; // Server comment.
    var $m_maxclients; // Maximum number of clients.
    var $m_voicecodec_code; // Voice codec code.
    var $m_voicecodec_desc; // Voice codec description.
    var $m_voiceformat_code; // Voice format code.
    var $m_voiceformat_desc; // Voice format description.
    var $m_uptime; // Server uptime in seconds.
    var $m_platform; // Platform description.
    var $m_version; // Version string.

    var $m_channelcount; // Number of channels as specified by the server.
    var $m_channelfields; // Channel field names.
    var $m_channellist; // Array of CVentriloChannel's.

    var $m_clientcount; // Number of clients as specified by the server.
    var $m_clientfields; // Client field names.
    var $m_clientlist; // Array of CVentriloClient's.

    function Parse($str)
    {
        $ventfunc = new ventrilofunctions;
        // Remove trailing newline.

        $pos = strpos($str, "\n");
        if ($pos === false) {
        } else {
            $str = substr($str, 0, $pos);
        }

        // Begin parsing for keywords.

        if ($ventfunc->StrKey($str, "ERROR:", $val)) {
            $this->m_error = $val;
            return -1;
        }

        if ($ventfunc->StrKey($str, "NAME:", $val)) {
            $this->m_name = $ventfunc->StrDecode($val);
            return 0;
        }

        if ($ventfunc->StrKey($str, "PHONETIC:", $val)) {
            $this->m_phonetic = $ventfunc->StrDecode($val);
            return 0;
        }

        if ($ventfunc->StrKey($str, "COMMENT:", $val)) {
            $this->m_comment = $ventfunc->StrDecode($val);
            return 0;
        }

        if ($ventfunc->StrKey($str, "AUTH:", $this->m_auth))
            return 0;

        if ($ventfunc->StrKey($str, "MAXCLIENTS:", $this->m_maxclients))
            return 0;

        if ($ventfunc->StrKey($str, "VOICECODEC:", $val)) {
            $ventfunc->StrSplit($val, ",", $this->m_voicecodec_code, $desc);
            $this->m_voicecodec_desc = $ventfunc->StrDecode($desc);
            return 0;
        }

        if ($ventfunc->StrKey($str, "VOICEFORMAT:", $val)) {
            $ventfunc->StrSplit($val, ",", $this->m_voiceformat_code, $desc);
            $this->m_voiceformat_desc = $ventfunc->StrDecode($desc);
            return 0;
        }

        if ($ventfunc->StrKey($str, "UPTIME:", $val)) {
            $this->m_uptime = $val;
            return 0;
        }

        if ($ventfunc->StrKey($str, "PLATFORM:", $val)) {
            $this->m_platform = $ventfunc->StrDecode($val);
            return 0;
        }

        if ($ventfunc->StrKey($str, "VERSION:", $val)) {
            $this->m_version = $ventfunc->StrDecode($val);
            return 0;
        }

        if ($ventfunc->StrKey($str, "CHANNELCOUNT:", $this->m_channelcount))
            return 0;

        if ($ventfunc->StrKey($str, "CHANNELFIELDS:", $this->m_channelfields))
            return 0;

        if ($ventfunc->StrKey($str, "CHANNEL:", $val)) {
            $chan = new CVentriloChannel;
            $chan->Parse($val);

            $this->m_channellist[count($this->m_channellist)] = $chan;
            return 0;
        }

        if ($ventfunc->StrKey($str, "CLIENTCOUNT:", $this->m_clientcount))
            return 0;

        if ($ventfunc->StrKey($str, "CLIENTFIELDS:", $this->m_clientfields))
            return 0;

        if ($ventfunc->StrKey($str, "CLIENT:", $val)) {
            $client = new CVentriloClient;
            $client->Parse($val);

            $this->m_clientlist[count($this->m_clientlist)] = $client;
            return 0;
        }

        // Unknown key word. Could be a new keyword from a newer server.

        return 1;
    }

    function ChannelFind($cid)
    {
        for ($i = 0; $i < count($this->m_channellist); $i++)
            if ($this->m_channellist[$i]->m_cid == $cid)
                return ($this->m_channellist[$i]);

        return NULL;
    }

    function ChannelPathName($idx)
    {
        $chan = $this->m_channellist[$idx];
        $pathname = $chan->m_name;

        for (; ;) {
            $chan = $this->ChannelFind($chan->m_pid);
            if ($chan == NULL)
                break;

            $pathname = $chan->m_name . "/" . $pathname;
        }

        return ($pathname);
    }

    function Request()
    {
        $cmdline = $this->m_cmdprog;
        $cmdline .= " -c" . $this->m_cmdcode;
        $cmdline .= " -t" . $this->m_cmdhost;

        if (strlen($this->m_cmdport)) {
            $cmdline .= ":" . $this->m_cmdport;

            // For password to work you MUST provide a port number.

            if (strlen($this->m_cmdpass))
                $cmdline .= ":" . $this->m_cmdpass;
        }

        // Just in case.

        $cmdline = escapeshellcmd($cmdline);

        // Execute the external command.

        $pipe = popen($cmdline, "r");
        if ($pipe === false) {
            $this->m_error = "PHP Unable to spawn shell.";
            return -10;
        }

        // Process the results coming back from the shell.

        $cnt = 0;

        while (!feof($pipe)) {
            $s = fgets($pipe, 1024);

            if (strlen($s) == 0)
                continue;

            $rc = $this->Parse($s);
            if ($rc < 0) {
                pclose($pipe);
                return ($rc);
            }

            $cnt += 1;
        }

        pclose($pipe);

        if ($cnt == 0) {
            // This is possible since the shell might not be able to find
            // the specified process but the shell did spawn. More likely to
            // occur then the -10 above.

            $this->m_error = "PHP Unable to start external status process.";
            return -11;
        }

        return 0;
    }
}

;

?>