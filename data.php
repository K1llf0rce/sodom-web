<?php
    #get newest data
    #shell_exec("cat '' > /tmp/webzfs.txt");
    #shell_exec("sudo zpool status genesis >> /tmp/webzfs.txt");
    $poolStatus = shell_exec("cat /tmp/webzfs.txt | grep 'state' | cut -d ' ' -f 3 | tr '[A-Z]' '[a-z]' ");
    $poolName = shell_exec("cat /tmp/webzfs.txt | grep 'pool' | cut -d ':' -f 2 | tr -d ' ' ");
    $poolMirrors = shell_exec("cat /tmp/webzfs.txt | grep -c 'mirror'");
    $poolDrives = shell_exec("cat /tmp/webzfs.txt | grep -c 'ata-'");
    $zfsPool = shell_exec("cat /tmp/webzfs.txt | grep -m 1 'ata-' | tr '\t' '\r' | cut -d ' ' -f 4");
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
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/data.php">Pool</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/smb.php">SMB</a>
                </li>
                </ul>
            </div>
        </nav>
        <div id="mainContainer">
            <p>Pool-Status: <?php echo $poolStatus ?></p>
            <p>Name: <?php echo $poolName ?></p>
            <p>Mirros: <?php echo $poolMirrors ?></p>
            <p>Drives: <?php echo $poolDrives ?></p>
            <table id="driveTable" class="table table-bordered table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">State</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($x = 1; $x < ($poolDrives); $x++) {
                        $driveName = shell_exec("cat /tmp/webzfs.txt | grep 'ata-' | tr -d '\t' | cut -d ' ' -f 5 | head -n '$x' | tail -n 1");
                        $nameLength = strlen($driveName);
                        $driveStatus = shell_exec("cat /tmp/webzfs.txt | grep 'ata-' | head -n '$x' | tail -n 1 | tr -d '\t ' | cut -b '$nameLength'- | tr -d '0'");
                        echo '<tr><th scope="row">'.$x.'</th><td>'.$driveName.'</td><td>'.$driveStatus.'</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
    </body>
</html>