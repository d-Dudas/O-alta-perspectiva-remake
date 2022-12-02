<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O altă perspectivă</title>
    <!-- CSS for requestchangePassword page -->
    <link rel="stylesheet" href="style/confirmEmailSentForPasswordChange.css">
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
            <p>A fost trimis un mail cu un link pentru schimbarea parolei.</p>
            <a id = "homeBtn" href="./home.php">Pagina principală</a>
        </div>
    </div>

</body>
<!-- Account system buttons javascript -->
<script src="javascript/accountSystemButtons.js"></script>
<script>
    $("#confirmBoxContent").css("top", "0px");
</script>

</html>