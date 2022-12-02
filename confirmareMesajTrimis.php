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
        include "./accountSystemButtons.php";
        include "./background.html";
    ?>

    <div id="confirmBox">
        <div id="confirmBoxContent">
            <div><iconify-icon icon = "bi:send-check" style="color: white; font-size: 15vmin"></div>
            <p>Mesajul a fost trimis cu succes. În curent vă vom răspunde printr-un mail.</p>
            <p>Vă  mulțumim!</p>
            <a href="./home.php">Înapoi pe pagina principală</a>
        </div>
    </div>
    <div id="informatiiGenerale">
        <p>De asemenea, ne găsiți și pe următoarele platforme:</p>

        <a href = "https://www.facebook.com" target = "_blank"><iconify-icon icon = "bi:facebook" style="color: #3131319d; font-size: 6vmin"></iconify-icon> Facebook</a>
        <a href = "https://www.instagram.com" target = "_blank"><iconify-icon icon = "bi:instagram" style="color: #3131319d; font-size: 6vmin"></iconify-icon> Instagram</a>
        <a href = "https://www.twitter.com" target = "_blank"><iconify-icon icon = "bi:twitter" style="color: #3131319d; font-size: 6vmin"></iconify-icon>Twitter</a>
        <a href = "https://www.youtube.com" target = "_blank"><iconify-icon icon = "bi:youtube" style="color: #3131319d; font-size: 6vmin"></iconify-icon>Youtube</a>
        <a href = "https://www.patreon.com" target = "_blank"><iconify-icon icon = "cib:patreon" style="color: #3131319d; font-size: 6vmin"></iconify-icon>Patreon</a>
    </div> 
</body>
<!-- Account system buttons javascript -->
<script src="javascript/accountSystemButtons.js"></script>
</html>