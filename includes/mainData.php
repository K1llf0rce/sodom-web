<?php 
    $hostnameVar = shell_exec("cat /proc/sys/kernel/hostname");
    $uptimeVar = shell_exec("uptime -p | cut -d ' ' -f 2-6");
    $ipVar = shell_exec("ip a | grep -m 2 -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'");
    $smbVar = shell_exec("systemctl is-active smbd");
    $poolVar = shell_exec("cat /tmp/webzfs.txt | grep 'state' | cut -d ' ' -f 3 | tr '[A-Z]' '[a-z]' ");
    $poolName = shell_exec("cat /tmp/webzfs.txt | grep 'pool' | cut -d ':' -f 2 | tr -d '\r ' ");
    $fullSpace = shell_exec('df -H /"$poolName"/ | tail -n 1 | tr -s " " | cut -d " " -f 2 | tr -d "G,T,M" ');
    $usedSpace = shell_exec('df -H /"$poolName"/ | tail -n 1 | tr -s " " | cut -d " " -f 3 | tr -d "G,T,M" ');
    $freeSpace = shell_exec('df -H /"$poolName"/ | tail -n 1 | tr -s " " | cut -d " " -f 4 | tr -d "G,T,M" ');
    $spaceDataUnit = shell_exec('df -H /"$poolName"/ | tail -n 1 | tr -s " " | cut -d " " -f 4 | tr -d "[0-9]" ');
    $poolStatus = shell_exec("cat /tmp/webzfs.txt | grep 'state' | cut -d ' ' -f 3 | tr '[A-Z]' '[a-z]' ");
    $poolMirrors = shell_exec("cat /tmp/webzfs.txt | grep -c 'mirror'");
    $poolDrives = shell_exec("cat /tmp/webzfs.txt | grep -c 'ata-'");
    $zfsPool = shell_exec("cat /tmp/webzfs.txt | grep -m 1 'ata-' | tr '\t' '\r' | cut -d ' ' -f 4");
?>