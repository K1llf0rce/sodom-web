<?php
    #cache newest data
    shell_exec("cat '' > /tmp/websmb.txt");
    shell_exec("sudo sudo smbstatus >> /tmp/websmb.txt");
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
                    <table id="driveTable" class="table table-bordered table-dark table-responsive-sm">
                        <thead>
                            <tr>
                            <th scope="col">User</th>
                            <th scope="col">Group</th>
                            <th scope="col">PID</th>
                            <th scope="col">Machine</th>
                            <th scope="col">Protocol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                for ($x = $clientStart; $x < $clientEnd; $x++) {
                                    $clientPID = shell_exec("cat /tmp/websmb.txt | tr -s ' ' | cat /tmp/websmb.txt | tr -s ' ' | head -n '$x' | tail -n 1 | cut -d ' ' -f 1");
                                    $clientUser = shell_exec("cat /tmp/websmb.txt | tr -s ' ' | cat /tmp/websmb.txt | tr -s ' ' | head -n '$x' | tail -n 1 | cut -d ' ' -f 2");
                                    $clientGroup = shell_exec("cat /tmp/websmb.txt | tr -s ' ' | cat /tmp/websmb.txt | tr -s ' ' | head -n '$x' | tail -n 1 | cut -d ' ' -f 3");
                                    $clientMachine = shell_exec("cat /tmp/websmb.txt | tr -s ' ' | cat /tmp/websmb.txt | tr -s ' ' | head -n '$x' | tail -n 1 | cut -d ' ' -f 4");
                                    $clientProtocol = shell_exec("cat /tmp/websmb.txt | tr -s ' ' | cat /tmp/websmb.txt | tr -s ' ' | head -n '$x' | tail -n 1 | cut -d ' ' -f 6");
                                    echo '<tr><th>'.$clientUser.'</th><td>'.$clientGroup.'</td><td>'.$clientPID.'</td><td>'.$clientMachine.'</td><td>'.$clientProtocol.'</td></tr>';
                                }
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