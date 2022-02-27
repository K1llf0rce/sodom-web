<?php
    $filePath = "/tmp/.cwebzfs.txt";
    shell_exec("echo '' > '$filePath'");
    shell_exec("/sbin/zpool status >> '$filePath'");
    $poolVar = shell_exec("grep 'state' '$filePath' | cut -d ' ' -f 3 | tr '[A-Z]' '[a-z]' ");
    $poolName = shell_exec("grep 'pool' '$filePath' | cut -d ':' -f 2 | tr -d '\r\n ' ");
    $fullSpace = shell_exec("df -H /'$poolName'/ | tail -n 1 | tr -s ' ' | cut -d ' ' -f 2 | tr -d 'G,T,M' ");
    $usedSpace = shell_exec("df -H /'$poolName'/ | tail -n 1 | tr -s ' ' | cut -d ' ' -f 3 | tr -d 'G,T,M' ");
    $freeSpace = shell_exec("df -H /'$poolName'/ | tail -n 1 | tr -s ' ' | cut -d ' ' -f 4 | tr -d 'G,T,M' ");
    $spaceDataUnit = shell_exec("df -H /'$poolName'/ | tail -n 1 | tr -s ' ' | cut -d ' ' -f 4 | tr -d '[0-9]' ");
    $poolStatus = shell_exec("grep 'state' '$filePath' | cut -d ' ' -f 3 | tr '[A-Z]' '[a-z]' ");
    $poolMirrors = shell_exec("grep -c 'mirror' '$filePath'");
    $poolDrives = shell_exec("grep -c 'ata-' '$filePath'");
    $zfsPool = shell_exec("grep -m 1 'ata-' '$filePath' | tr '\t' '\r' | cut -d ' ' -f 4");
    
    function listDrives($numOfDrives, $filePath) {
        for ($x = 1; ($x) <= ($numOfDrives); $x++) {
            $driveName = shell_exec("grep 'ata-' '$filePath' | tr -d '\t' | cut -d ' ' -f 5 | head -n '$x' | tail -n 1");
            $nameLength = strlen($driveName);
            $driveStatus = shell_exec("grep 'ata-' '$filePath' | head -n '$x' | tail -n 1 | tr -d '\t ' | cut -b '$nameLength'- | tr -d '0'");
            echo '<tr><th>'.$x.'</th><td>'.$driveName.'</td><td>'.$driveStatus.'</td></tr>';
        }
    }
?>