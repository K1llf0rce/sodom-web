<?php
    include_once "includes/header.php";
    #get newest data
    shell_exec("cat '' > /tmp/webzfs.txt");
    shell_exec("sudo zpool status >> /tmp/webzfs.txt");
    $indexpage = true;
    $hostnameVar = shell_exec("cat /proc/sys/kernel/hostname");
    $uptimeVar = shell_exec("uptime -p | cut -d ' ' -f 2-6");
    $ipVar = shell_exec("ip a | grep -m 2 -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'");
    $smbVar = shell_exec("systemctl is-active smbd");
    $poolVar = shell_exec("cat /tmp/webzfs.txt | grep 'state' | cut -d ' ' -f 3 | tr '[A-Z]' '[a-z]' ");
?>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/data.php">Pool</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/smb.php">SMB</a>
                </li>
                </ul>
            </div>
        </nav>
        <div class="mainContainer">
            <div id="statsDisplay">
                <p id="hostnameStatus">Hostname: <?php echo $hostnameVar ?></p>
                <p id="ipStatus">IP: <?php echo $ipVar ?></p>
                <p id="uptimeStatus">Uptime: <?php echo $uptimeVar ?></p>
                <p id="smbStatus">SMB-Status: <?php echo $smbVar ?></p>
                <p id="poolStatus">Pool-Status: <?php echo $poolVar ?></p>
            </div>
        </div>
        <script src="js/main.js"></script>
        <?php
            include_once "includes/footer.php";
        ?>
    </body>
</html>