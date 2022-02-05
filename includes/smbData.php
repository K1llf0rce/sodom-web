<?php
    $smbVar = shell_exec("systemctl is-active smbd");
    $smbVersion = shell_exec("cat /tmp/websmb.txt | tr -s ' ' | grep 'version' | cut -d ' ' -f 3 ");
    $clientStart = shell_exec("cat /tmp/websmb.txt | tr -s ' ' | grep -m 1 -n '\-\-\-\-' | cut -c 1");
    $clientEnd = shell_exec("cat /tmp/websmb.txt | tr -s ' ' | grep -m 2 -n '\-\-\-\-' | cut -c 1 | head -n 2 | tail -n 1");
    $clientEnd = intval($clientEnd)-2;
    $clientStart = intval($clientStart)+1;
?>