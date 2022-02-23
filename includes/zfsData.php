<?php
    #cache newest data
    shell_exec("echo '' > /tmp/webzfs.txt");
    shell_exec("date +%H:%M:%S >> /tmp/websmb.txt");
    shell_exec("/sbin/zpool status >> /tmp/webzfs.txt");
    $poolVar = shell_exec("cat /tmp/webzfs.txt | grep 'state' | cut -d ' ' -f 3 | tr '[A-Z]' '[a-z]' ");
    $poolName = shell_exec("cat /tmp/webzfs.txt | grep 'pool' | cut -d ':' -f 2 | tr -d '\r\n ' ");
    $fullSpace = shell_exec("df -H /'$poolName'/ | tail -n 1 | tr -s ' ' | cut -d ' ' -f 2 | tr -d 'G,T,M' ");
    $usedSpace = shell_exec("df -H /'$poolName'/ | tail -n 1 | tr -s ' ' | cut -d ' ' -f 3 | tr -d 'G,T,M' ");
    $freeSpace = shell_exec("df -H /'$poolName'/ | tail -n 1 | tr -s ' ' | cut -d ' ' -f 4 | tr -d 'G,T,M' ");
    $spaceDataUnit = shell_exec("df -H /'$poolName'/ | tail -n 1 | tr -s ' ' | cut -d ' ' -f 4 | tr -d '[0-9]' ");
    $poolStatus = shell_exec("cat /tmp/webzfs.txt | grep 'state' | cut -d ' ' -f 3 | tr '[A-Z]' '[a-z]' ");
    $poolMirrors = shell_exec("cat /tmp/webzfs.txt | grep -c 'mirror'");
    $poolDrives = shell_exec("cat /tmp/webzfs.txt | grep -c 'ata-'");
    $zfsPool = shell_exec("cat /tmp/webzfs.txt | grep -m 1 'ata-' | tr '\t' '\r' | cut -d ' ' -f 4");
    
    function listDrives($numOfDrives) {
        for ($x = 1; ($x) <= ($numOfDrives); $x++) {
            $driveName = shell_exec("cat /tmp/webzfs.txt | grep 'ata-' | tr -d '\t' | cut -d ' ' -f 5 | head -n '$x' | tail -n 1");
            $nameLength = strlen($driveName);
            $driveStatus = shell_exec("cat /tmp/webzfs.txt | grep 'ata-' | head -n '$x' | tail -n 1 | tr -d '\t ' | cut -b '$nameLength'- | tr -d '0'");
            echo '<tr><th>'.$x.'</th><td>'.$driveName.'</td><td>'.$driveStatus.'</td></tr>';
        }
    }
?>