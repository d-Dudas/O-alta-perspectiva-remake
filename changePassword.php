<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O altă perspectivă</title>
    <!-- CSS for ChangePassword page -->
    <link rel="stylesheet" href="style/changePassword.css">
    <?php

        if(!isset($_GET["email"])){
            header("location: ./home.php");
            die();
        }        

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
        <form id="changePasswordForm" class="centerH heavyBlur fiveShadow flexClmEvn" method="POST" action="./includes/changePassword.inc.php">
            <div class="inputBox">
                <label for="pwd">
                    <input class="inputs" type="password" name="pwd" id="pwd" placeholder="Parola nouă" maxlength=15>
                </label>
                <div id="pwdEye">
                    <iconify-icon id="pwdEyeIcon" icon="clarity:eye-hide-line" style="color: black; font-size: 1.5rem">
                </div>
            </div>
            <div id="pwdConditions" class = "flexClmEvn">
                <div class="pwdCondition">
                    <div>
                        <iconify-icon id="pwdCLength" icon="akar-icons:circle-x-fill"
                            style="color: red; font-size: 1.3rem">
                    </div>
                    <p>între 8 și 15 caractere</p>
                </div>
                <div class="pwdCondition">
                    <div>
                        <iconify-icon id="pwdCNumber" icon="akar-icons:circle-x-fill"
                            style="color: red; font-size: 1.3rem">
                    </div>
                    <p>cel puțin o cifră</p>
                </div>
                <div class="pwdCondition">
                    <div>
                        <iconify-icon id="pwdCUCL" icon="akar-icons:circle-x-fill"
                            style="color: red; font-size: 1.3rem">
                    </div>
                    <p>cel puțin o literă majusculă</p>
                </div>
            </div>
            <div class="inputBox">
                <label for="pwdConfirm">
                    <input class="inputs" type="password" name="pwdConfirm" id="pwdConfirm"
                        placeholder="Confirmă parola nouă" maxlength=15>
                </label>
            </div>
            <div class="pwdConditions">
                <div class="pwdCondition">
                    <div>
                        <iconify-icon id="pwdCSame" icon="akar-icons:circle-x-fill"
                            style="color: red; font-size: 1.3rem">
                    </div>
                    <p>parolele trebuie să coincidă</p>
                </div>
            </div>
            <input type="hidden" name="email" value = <?php echo $_GET["email"]?>>
            <input type="hidden" name="vkey" value = <?php echo $_GET["vkey"]?>>
            <input type="submit" value="Schimbă parola" id="submitBtn" class = "fiveShadow">
        </form>
    </div>
    <div id="informatiiGenerale" class="lightBlur fiveShadow flexClmEvn">
        <p>Pentru un cont securizat, vă recomandăm să folosiți o parolă puternică, de lungimea între 8 și 15 caractere, cu cel puțin o cifră și cel puțin o literă majuscula. Pentru a parolă mai sigură, puteți folosi și caracterele : .-_ </p>

        <p>Vă sugerăm să nu alegeți o parolă similară cu adresa de mail.</p>
    </div>

    <?php 
        include './footer.html';
    ?>
</body>
<!-- Account system buttons javascript -->
<script src="javascript/accountSystemButtons.js"></script>
<!-- ChangePassword.js -->
<script src="javascript/changePassword.js"></script>
<!-- Nav bar for mobile devices javascript -->
<script src="./javascript/navBarMobile.js"></script>
</html>