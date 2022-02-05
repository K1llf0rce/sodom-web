<?php
    #cache newest data
    shell_exec("cat '' > /tmp/webzfs.txt");
    shell_exec("sudo zpool status >> /tmp/webzfs.txt");
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
                <div id="statsDisplay">
                    <p id="hostnameStatus">Hostname: <span id="floater"><?php echo $hostnameVar ?></span></p>
                    <p id="ipStatus">IP: <span id="floater"><?php echo $ipVar ?></span></p>
                    <p id="uptimeStatus">Uptime: <span id="floater"><?php echo $uptimeVar ?></span></p>
                    <p id="smbStatus">SMB-Status: <span id="floater"><?php echo $smbVar ?></span></p>
                    <p id="poolStatus">Pool-Status: <span id="floater"><?php echo $poolVar ?></span></p>
                    <p id="poolSpaceAll">Pool-Space: <span id="floater"><?php echo "$fullSpace$spaceDataUnit" ?></span></p>
                    <p id="poolSpaceUsed">Used: <span id="floater"><?php echo "$usedSpace$spaceDataUnit" ?></span></p>
                    <p id="poolSpaceFree">Free: <span id="floater"><?php echo "$freeSpace$spaceDataUnit" ?></span></p>
                </div>
            </div>
            <div class="mainContainer">
                <h1 id="spaceChartHeading">Space Allocation:</h1>
                <div class="chartContainer">
                    <canvas id="spaceChart"></canvas>
                </div>
            </div>
        </div>
        <script src="js/main.js"></script>
        <script>
            new Chart("spaceChart", {
            type: "pie",
            data: {
                labels: ["Free", "Used"],
                datasets: [{
                backgroundColor: ["#cfcfcf", "#4f4f4f"],
                data: [
                    <?php echo $freeSpace ?>,
                    <?php echo $usedSpace ?>
                ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                        labels: {
                            color: "#ffffff",
                            boxWidth: 20,
                            boxHeight: 20
                        }
                    },
                }
            }
            });
        </script>
        <?php
            include_once "includes/footer.php";
        ?>
    </body>
</html>