<?php
    include_once "includes/header.php";
    include_once "includes/mainData.php";
    $indexpage = true;
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
        <div id="contentWrapper">
            <div class="mainContainer">
                <h1 class="containerHeading">Device Status:</h1>
                <div id="statsDisplay">
                    <p id="hostnameStatus">Hostname: <span id="floater"><?php echo $hostnameVar ?></span></p>
                    <p id="ipStatus">IP: <span id="floater"><?php echo $ipVar ?></span></p>
                    <p id="uptimeStatus">Uptime: <span id="floater"><?php echo $uptimeVar ?></span></p>
                    <p id="osName">OS: <span id="floater"><?php echo $osName ?></span></p>
                    <p id="kernelVer">Kernel: <span id="floater"><?php echo $kernelVer ?></span></p>
                </div>
            </div>
        </div>
        <script src="js/main.js"></script>
        <?php
            include_once "includes/footer.php";
        ?>
    </body>
</html>