<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O altă perspectivă</title>
    <!-- CSS for confirmareMesajTrimis page -->
    <link rel="stylesheet" href="style/confirmareMesajTrimis.css">
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
        <div id="confirmBoxContent" class = "centerH heavyBlur fiveShadow flexClmEvn">
            <div><iconify-icon id="messageSentIcon" icon = "bi:send-check"></div>
            <p>Mesajul a fost trimis cu succes. În curent vă vom răspunde printr-un mail.</p>
            <p>Vă  mulțumim!</p>
            <a href="./home.php" class = "lightBlur">Înapoi pe pagina principală</a>
        </div>
    </div>
    <div id="informatiiGenerale" class = "lightBlur fiveShadow flexClmEvn">
        <p>De asemenea, ne găsiți și pe următoarele platforme:</p>

        <a href = "https://www.facebook.com" target = "_blank"><iconify-icon class = "socialPlatformIcon" icon = "bi:facebook"></iconify-icon> Facebook</a>
        <a href = "https://www.instagram.com" target = "_blank"><iconify-icon icon = "bi:instagram"></iconify-icon> Instagram</a>
        <a href = "https://www.twitter.com" target = "_blank"><iconify-icon icon = "bi:twitter"></iconify-icon>Twitter</a>
        <a href = "https://www.youtube.com" target = "_blank"><iconify-icon icon = "bi:youtube"></iconify-icon>Youtube</a>
        <a href = "https://www.patreon.com" target = "_blank"><iconify-icon icon = "cib:patreon"></iconify-icon>Patreon</a>
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