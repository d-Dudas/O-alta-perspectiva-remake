<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O altă perspectivă</title>
    <!-- CSS for verifyMail -->
    <link rel="stylesheet" href="./style/verifyMail.css">
    <?php
        include './importantLinks.html';
    ?>
</head>
<body>
    <?php
        include './background.html';
        include './navBarMobile.html';
    ?>
    <div id="confirmBox">
        <div id="items">
            <?php
                if(isset($_GET['vkey'])){
                    $vkey = $_GET['vkey'];

                    include './includes/dbc.inc.php';
                    $conn = dbConnect();

                    $resultSet = $conn->query("SELECT verified, vkey FROM accounts WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");

                    if($resultSet->num_rows == 1) {
                        $update = $conn->query("UPDATE accounts SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");
                        echo "<h1>Contul a fost verificat cu succes.</h1><button><a href=\"./index.php\">Înapoi pe pagina de pornire</a></button>";
                    }
                    else echo "<h1>Acest cont este invalid sau deja verificat.</h1><button><a href=\"./index.php?login=show\">Autentificare</a></button>";

                }
                else die("Something went wrong.");
            ?>
            
        </div>
    </div>
</body>
<!-- Nav bar for mobile devices javascript -->
<script src="./javascript/navBarMobile.js"></script>
</html>