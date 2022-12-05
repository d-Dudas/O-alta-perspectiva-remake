<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O altă perspectivă</title>
    <!-- CSS for confirmareArticolTrimis page -->
    <link rel="stylesheet" href="style/confirmareArticolTrimis.css">
    <?php
        include './importantLinks.html';
    ?>
    
</head>
<body>
<?php
        include './navBar.html';
        include './navBarMobile.html';
        include "./accountSystemButtons.php";
        include "./background.html";
    ?>
    <div id="confirmBox">
        <div id="confirmBoxContent">
            <div><iconify-icon id = "messageSentIcon" icon = "bi:send-check"></div>
            <p>Articolul a fost trimis cu succes.</p>
            <p>Vă  mulțumim!</p>
            <a href="./home.php">Înapoi pe pagina principală</a>
        </div>
    </div>
    <div id="informatiiGenerale">
        <p>Organizația noastră tinde spre cooperarea cu comunitatea și apreciază orice scriere cu valoare culturală.</p>

        <p>Vă rugăm să completați fiecare câmp.</p>

        <p>După trimiterea articolului veți primi un e-mail de confirmare, apoi un e-mail în care vă vom comunica data publicării, sau cerințele de reeditare.</p>

        <p>Vă mulțumim!</p>
    </div>

    <?php 
        include './footer.html';
    ?>
</body>
<!-- Account system buttons javascript -->
<script src="javascript/accountSystemButtons.js"></script>
<!-- Nav bar for mobile devices javascript -->
<script src="./javascript/navBarMobile.js"></script>
</html>