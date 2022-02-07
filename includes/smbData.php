<?php
    #cache newest data
    shell_exec("echo '' > /tmp/websmb.txt");
    shell_exec("date +%H:%M:%S >> /tmp/websmb.txt");
    shell_exec("sudo smbstatus | tr -s ' ' >> /tmp/websmb.txt");
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
?>