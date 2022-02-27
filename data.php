<?php
    include_once "includes/header.php";
    include_once "includes/zfsData.php";
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
                    <a class="nav-link disabled" href="#">SMB</a>
                </li>
                </ul>
            </div>
        </nav>
        <div id="contentWrapper">
            <div class="mainContainer">
                <h1 class="containerHeading">ZFS Status:</h1>
                <div id="poolstatDisplay">
                    <p>Pool-Name: <span id="floater"><?php echo $poolName ?></span></p>
                    <p>Pool-Status: <span id="floater"><?php echo $poolStatus ?></span></p>
                    <p>SATA-Drives: <span id="floater"><?php echo $poolDrives ?></span></p>
                </div>
            </div>
            <div class="mainContainer">
            <h1 class="containerHeading">Drives:</h1>
                <div class="tableContainer">
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
                            listDrives(intval($poolDrives), $filePath);
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="mainContainer">
                <h1 class="containerHeading">Space Allocation:</h1>
                <div class="chartContainer">
                    <canvas id="spaceChart"></canvas>
                </div>
                <p id="poolSpaceAll">Pool-Space: <span id="floater"><?php echo "$fullSpace$spaceDataUnit" ?></span></p>
                    <p id="poolSpaceUsed">Used: <span id="floater"><?php echo "$usedSpace$spaceDataUnit" ?></span></p>
                    <p id="poolSpaceFree">Free: <span id="floater"><?php echo "$freeSpace$spaceDataUnit" ?></span></p>
            </div>
        </div>
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
                        display: false,
                    },
                }
            }
            });
        </script>
        <script src="js/main.js"></script>
        <?php
            include_once "includes/footer.php";
        ?>
    </body>
</html>