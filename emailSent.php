<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O altă perspectivă</title>
    <!-- CSS for this page -->
    <link rel="stylesheet" href="./style/emailSent.css">
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
            <h1>Înregistrare reușită!</h1>
            <div id = "emailSentIconBox"><iconify-icon id = "emailSentIcon" icon = "ic:outline-attach-email" style="color: grey; font-size: 20vmin"></div>
            <h2>Un link de confirmare a fost trimis pe mail.</h2>
            <button><a href="./index.php">Înapoi pe pagina de pornire.</a></button>
        </div>
    </div>
</body>
<!-- Nav bar for mobile devices javascript -->
<script src="./javascript/navBarMobile.js"></script>
</html>