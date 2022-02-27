<?php
    include_once "includes/header.php";
    include_once "includes/smbData.php";
?>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/data.php">Pool</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/smb.php">SMB</a>
                </li>
                </ul>
            </div>
        </nav>
        <div id="contentWrapper">
            <div class="mainContainer">
                <h1 class="containerHeading">SMB Status:</h1>
                <div class="statsDisplay">
                    <p id="smbStatus">SMB-Status: <span id="floater"><?php echo $smbVar ?></span></p>
                    <p id="smbStatus">SMB-Version: <span id="floater"><?php echo $smbVersion ?></span></p>
                </div>
            </div>
            <div class="mainContainer">
                <h1 class="containerHeading">Clients:</h1>
                <div class="tableContainer">
                    <table id="smbClientTable" class="table table-bordered table-dark table-responsive-sm">
                        <thead>
                            <tr>
                            <th scope="col">User</th>
                            <th scope="col">Group</th>
                            <th scope="col">PID</th>
                            <th scope="col">IP</th>
                            <th scope="col">Protocol</th>
                            <th scope="col">Encryption</th>
                            <th scope="col">Signing</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                listClients($clientStart, $clientEnd, $filePath);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mainContainer">
                <h1 class="containerHeading">Shares/Services:</h1>
                <div class="tableContainer">
                    <table id="smbSharesTable" class="table table-bordered table-dark table-responsive-sm">
                        <thead>
                            <tr>
                            <th scope="col">IP</th>
                            <th scope="col">PID</th>
                            <th scope="col">Share/Service</th>
                            <th scope="col">Time of Connection</th>
                            <th scope="col">Encryption</th>
                            <th scope="col">Signing</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                listShares($shareStart, $shareEnd, $filePath);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="js/main.js"></script>
        <?php
            include_once "includes/footer.php";
        ?>
    </body>
</html>