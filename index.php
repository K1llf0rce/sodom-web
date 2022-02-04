<?php
    $indexpage = true;
    $hostnameVar = shell_exec("echo Hello World");
    $uptimeVar = shell_exec("uptime -p | cut -d ' ' -f 2-6");
    $ipVar = shell_exec("ip a | grep -m 2 -Eo 'inet (addr:)?([0-9]*\.){3}[0-9]*' | grep -Eo '([0-9]*\.){3}[0-9]*' | grep -v '127.0.0.1'");
    $smbVar = shell_exec("systemctl is-enabled cups");
    $poolVar = shell_exec("cat /tmp/webzfs.txt | grep 'state' | cut -d ' ' -f 3 | tr '[A-Z]' '[a-z]' ");
?>
<html lang="en">
    <body>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="css/styles.css">
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet"> 
            <title>Sodom-Web</title>
        </head>
        <nav class="navbar navbar-custom navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="/index.html">
                <img src="img/harddrive.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Sodom-Web
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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
        <div id="mainContainer">
            <div id="statsDisplay">
                <p id="hostnameStatus">Hostname: <?php echo $hostnameVar ?></p>
                <p id="ipStatus">IP: <?php echo $ipVar ?></p>
                <p id="uptimeStatus">Uptime: <?php echo $uptimeVar ?></p>
                <p id="smbStatus">SMB-Status: <?php echo $smbVar ?></p>
                <p id="poolStatus">Pool-Status: <?php echo $poolVar ?></p>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
    </body>
</html>