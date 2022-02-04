<?php
    include_once "includes/header.php";
    #get newest data
    shell_exec("cat '' > /tmp/webzfs.txt");
    shell_exec("sudo zpool status >> /tmp/webzfs.txt");
    $poolStatus = shell_exec("cat /tmp/webzfs.txt | grep 'state' | cut -d ' ' -f 3 | tr '[A-Z]' '[a-z]' ");
    $poolName = shell_exec("cat /tmp/webzfs.txt | grep 'pool' | cut -d ':' -f 2 | tr -d ' ' ");
    $poolMirrors = shell_exec("cat /tmp/webzfs.txt | grep -c 'mirror'");
    $poolDrives = shell_exec("cat /tmp/webzfs.txt | grep -c 'ata-'");
    $zfsPool = shell_exec("cat /tmp/webzfs.txt | grep -m 1 'ata-' | tr '\t' '\r' | cut -d ' ' -f 4");
?>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/data.php">Pool</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/smb.php">SMB</a>
                </li>
                </ul>
            </div>
        </nav>
        <div id="contentWrapper">
            <div class="mainContainer">
                <div id="poolstatDisplay">
                    <p>Pool-Name: <span id="floater"><?php echo $poolName ?></span></p>
                    <p>Pool-Status: <span id="floater"><?php echo $poolStatus ?></span></p>
                    <p>Drives: <span id="floater"><?php echo $poolDrives ?></span></p>
                </div>
            </div>
            <div class="mainContainer">
                <table id="driveTable" class="table table-bordered table-dark table-responsive-sm">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">State</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($x = 1; $x <= ($poolDrives); $x++) {
                            $driveName = shell_exec("cat /tmp/webzfs.txt | grep 'ata-' | tr -d '\t' | cut -d ' ' -f 5 | head -n '$x' | tail -n 1");
                            $nameLength = strlen($driveName);
                            $driveStatus = shell_exec("cat /tmp/webzfs.txt | grep 'ata-' | head -n '$x' | tail -n 1 | tr -d '\t ' | cut -b '$nameLength'- | tr -d '0'");
                            echo '<tr><th>'.$x.'</th><td>'.$driveName.'</td><td>'.$driveStatus.'</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="js/main.js"></script>
        <?php
            include_once "includes/footer.php";
        ?>
    </body>
</html>