<?php
    #cache newest data
    #shell_exec("echo '' > /tmp/websmb.txt");
    #shell_exec("date +%H:%M:%S >> /tmp/websmb.txt");
    #shell_exec("smbstatus | tr -s ' ' >> /tmp/websmb.txt");
    $smbVar = shell_exec("systemctl is-active smbd");
    $smbVersion = shell_exec("cat /tmp/websmb.txt | grep 'version' | cut -d ' ' -f 3");
    $clientStart = shell_exec("cat /tmp/websmb.txt | grep -m 1 -n '\-\-\-\-' | cut -d ':' -f 1");
    $clientEnd = shell_exec("cat /tmp/websmb.txt | grep -m 2 -n '\-\-\-\-' | cut -d ':' -f 1 | head -n 2 | tail -n 1");
    $shareStart = $clientEnd;
    $shareStart = intval($shareStart)+1;
    $clientEnd = intval($clientEnd)-2;
    $clientStart = intval($clientStart)+1;
    $shareEnd = shell_exec("cat /tmp/websmb.txt | grep -n 'No locked files' | cut -d ':' -f 1");
    $shareEnd = intval($shareEnd)-1;

    function listClients($start, $end) {
        for ($x = $start; $x < $end; $x++) {
            $clientPID = shell_exec("cat /tmp/websmb.txt | head -n '$x' | tail -n 1 | cut -d ' ' -f 1");
            $clientUser = shell_exec("cat /tmp/websmb.txt | head -n '$x' | tail -n 1 | cut -d ' ' -f 2");
            $clientGroup = shell_exec("cat /tmp/websmb.txt | head -n '$x' | tail -n 1 | cut -d ' ' -f 3");
            $clientMachine = shell_exec("cat /tmp/websmb.txt | head -n '$x' | tail -n 1 | cut -d ' ' -f 4");
            $clientProtocol = shell_exec("cat /tmp/websmb.txt | head -n '$x' | tail -n 1 | cut -d ' ' -f 6");
            $clientEncrypt = shell_exec("cat /tmp/websmb.txt | head -n '$x' | tail -n 1 | cut -d ' ' -f 7");
            $clientSign = shell_exec("cat /tmp/websmb.txt | head -n '$x' | tail -n 1 | cut -d ' ' -f 8");
            echo '<tr><th>'.$clientUser.'</th><td>'.$clientGroup.'</td><td>'.$clientPID.'</td><td>'.$clientMachine.'</td><td>'.$clientProtocol.'</td><td>'.$clientEncrypt.'</td><td>'.$clientSign.'</td></tr>';
        }
    }

    function listShares($start, $end) {
        for ($x = $start; $x < $end; $x++) {
            $shareMachine = shell_exec("cat /tmp/websmb.txt | head -n '$x' | tail -n 1 | cut -d ' ' -f 3");
            $sharePID = shell_exec("cat /tmp/websmb.txt | head -n '$x' | tail -n 1 | cut -d ' ' -f 2");
            $shareService = shell_exec("cat /tmp/websmb.txt | head -n '$x' | tail -n 1 | cut -d ' ' -f 1");
            $shareTimeOfCon = shell_exec("cat /tmp/websmb.txt | head -n '$x' | tail -n 1 | cut -d ' ' -f 4-10");
            $shareEncrypt = shell_exec("cat /tmp/websmb.txt | head -n '$x' | tail -n 1 | cut -d ' ' -f 11");
            $shareSign = shell_exec("cat /tmp/websmb.txt | head -n '$x' | tail -n 1 | cut -d ' ' -f 12");
            echo '<tr><th>'.$shareMachine.'</th><td>'.$sharePID.'</td><td>'.$shareService.'</td><td>'.$shareTimeOfCon.'</td><td>'.$shareEncrypt.'</td><td>'.$shareSign.'</td></tr>';
        }
    }
?>