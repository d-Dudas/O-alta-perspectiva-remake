<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O altă perspectivă</title>
    <!-- CSS for requestchangePassword page -->
    <link rel="stylesheet" href="style/requestChangePassword.css">
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
    <div id="formBox">
        <form id="requestChangePasswordForm" method="POST" action="./includes/sendChangePasswordMail.inc.php">
            <label for="email">
                <input class="inputs" type="email" name="email" id="email" placeholder="Adresă de mail...">
            </label>
            <?php
                if(isset($_GET["error"])) {
                    if($_GET["error"] == "email"){
                        echo '
                        <div class="pwdCondition">
                            <p style = "color: red; text-style: underline;">Nu există un cont asociat cu această adresă de mail</p>
                        </div>
                        <div class="pwdCondition">
                            <a id="linkToRegister" href = "./index.php?register=show">Înregistrare</a>
                        </div>
                        ';
                    }
                    if($_GET["error"] == "emailSent"){
                        echo '
                        <div class="pwdCondition">
                            <p style = "color: red; text-style: underline;">A fost deja trimis un email pentru schimbarea parolei. Următoarea încercare disponibilă după 48 de ore de la trimiterea mailului.</p>
                        </div>
                        ';
                    }
                    if($_GET["error"] == "linkExpired"){
                        echo '
                        <div class="pwdCondition">
                            <p style = "color: red; text-style: underline;">Linkul a expirat. Vă rugăm să solicitați încă o dată schimbarea parolei.</p>
                        </div>
                        ';
                    }
                }
            ?>
            <input type="submit" value="Schimbă parola" id="submitBtn">
        </form>
    </div>

</body>
<!-- Account system buttons javascript -->
<script src="javascript/accountSystemButtons.js"></script>
<!-- ChangePassword.js -->
<script src="javascript/requestChangePassword.js"></script>
<!-- Nav bar for mobile devices javascript -->
<script src="./javascript/navBarMobile.js"></script>
</html>