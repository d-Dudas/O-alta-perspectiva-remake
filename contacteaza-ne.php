<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O altă perspectivă</title>
    <!-- CSS for thiss page -->
    <link rel="stylesheet" href="style/contacteaza-ne.css">
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
    <div id="contactBox">
        <form method = "POST" action="./includes/sendMessage.inc.php" id="contactForm">
            <input type="text" id="name" name="name" placeholder="Nume...">
            <?php
                if(isset($_SESSION['email']))
                    echo '<input type="hidden" name="email" id="email" value="'.$_SESSION['email'].'">';
                else
                    echo '<input type="text" id="email" name="email" placeholder="Adresă mail...">
                            <p id = "emailAlert">Adresă mail invalidă</p>';
            ?>
            <label for="mesaj">
                <textarea name="mesaj" id="mesaj" cols="30" rows="10" placeholder="Mesajul dumneavoastră..."></textarea>
            </label>
            <input type="submit" value="Trimite">
        </form>
    </div>
    <div id="informatiiGenerale">
        <p>De asemenea, ne găsiți și pe următoarele platforme:</p>

        <a href = "https://www.facebook.com" target = "_blank"><iconify-icon class = "socialPlatformIcon" icon = "bi:facebook"></iconify-icon> Facebook</a>
        <a href = "https://www.instagram.com" target = "_blank"><iconify-icon class = "socialPlatformIcon" icon = "bi:instagram"></iconify-icon> Instagram</a>
        <a href = "https://www.twitter.com" target = "_blank"><iconify-icon class = "socialPlatformIcon" icon = "bi:twitter"></iconify-icon>Twitter</a>
        <a href = "https://www.youtube.com" target = "_blank"><iconify-icon class = "socialPlatformIcon" icon = "bi:youtube"></iconify-icon>Youtube</a>
        <a href = "https://www.patreon.com" target = "_blank"><iconify-icon class = "socialPlatformIcon" icon = "cib:patreon"></iconify-icon>Patreon</a>
    </div> 

    <?php 
        include './footer.html';
    ?>
</body>
<script src="./javascript/contacteaza-nePage.js"></script>
<!-- Account system buttons javascript -->
<script src="javascript/accountSystemButtons.js"></script>
<!-- Nav bar for mobile devices javascript -->
<script src="./javascript/navBarMobile.js"></script>
</html>