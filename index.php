<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O altă perspectivă</title>
    <!-- CSS for landing page -->
    <link rel="stylesheet" href="style/landingPage.css">
    <?php 
        include './importantLinks.html';
    ?>
</head>

<body>
    <?php
        // If the browser has any cookies saved with a login data, then
        //the user is automatically logged in
        include "./accountSystemButtons.php";
        include "./accountSettings.php";
        if(isset($_COOKIE["email"]) && isset($_COOKIE["username"]) && isset($_COOKIE["cookieKey"]) && isset($_SESSION['username'])) {
            if($_COOKIE['username'] == $_SESSION['username']){
                header("location: ./home.php");
                die();
            }

        }
        include "./background.html";
        if(isset($GET["login"])) {
            echo '<input type = "hidden" id="ifLogin" value = "true"/>';
        }
        if(isset($GET["register"])) {
                echo '<input type = "hidden" id="ifRegister" value = "true"/>';
        }
        include './navBarMobile.html';
    ?>
    <div id="slideBar">
        <img id="landingPageImage" src="./images/landingPageSideIllustration.png" alt="A lamp to make your day shine.">
        <div id="login" class = "centerH">
            <h2 class = "centerH">Autentificare</h2>
            <form id="loginForm" class = "flexClmEvn" method="POST" action="./includes/login.inc.php">
                <?php
                    if(isset($_GET["error"]))
                    if($_GET["error"] == "loginAccNotVerfied"){
                        echo '
                        <div class="pwdCondition" style="text-align: center; margin: 0px 10%; padding: 5%;">
                            <p style = "color: red; text-style: underline;">Acest cont nu este verificat. Ati primit un mail cu un link de confirmare.</p>
                        </div>';   
                    }
                ?>
                <label for="email">
                    <input class="inputs errorEffect" type="text" name="email" id="email" placeholder="Email...">
                </label>
                <?php
                    if(isset($_GET["error"]))
                    if($_GET["error"] == "loginEmail"){
                        echo '
                        <div class="pwdCondition">
                            <p style = "color: red; text-style: underline;">Nu există un cont asociat cu această adresă de mail.</p>
                        </div>';   
                    }
                ?>
                <div id="pwdBox" class="errorEffect">
                    <label for="pwd">
                        <input class="inputs" type="password" name="pwd" id="pwd" placeholder="Parolă..." maxlength=15>
                    </label>
                    <div id="pwdEye">
                        <iconify-icon id="pwdEyeIcon" icon="clarity:eye-hide-line"
                            style="color: grey; font-size: 1.5rem">
                    </div>
                </div>
                <?php
                    if(isset($_GET["error"]))
                    if($_GET["error"] == "loginPwd"){
                        echo '
                        <div class="pwdCondition">
                            <p style = "color: red; text-style: underline;">Parolă incorectă</p>
                        </div>
                        <div class="pwdCondition">
                            <a id="linkToRenewPassword" href = "./requestPasswordChange.php">Mi-am uitat parola</a>
                        </div>
                        ';   
                    }
                ?>
                <label for="keepSignedIn" id="keepSignedInLabel">
                    <input type="checkbox" name="keepSignedIn" id="keepSignedIn">
                    <p>Ține-mă minte</p>
                </label>
                <input type="submit" value="Autentificare" id="submitBtn">
            </form>
        </div>
        <div id="register" class = "centerH">
            <h2 class = "centerH" >Înregistrare</h2>
            <form id="registerForm" class = "flexClmEvn" method="POST" action="./includes/register.inc.php">
                <label for="usernameR">
                    <input class="inputs" type="text" name="usernameR" id="usernameR" placeholder="Nume utilizator...">
                </label>
                <?php
                    if(isset($_GET["error"]))
                    if($_GET["error"] == "username"){
                        echo '
                        <div class="pwdCondition">
                            <p style = "color: red; text-style: underline;">Numele de utilizator indisponibil</p>
                        </div>';   
                    }
                ?>
                <label for="emailR">
                    <input class="inputs" type="text" name="emailR" id="emailR" placeholder="Email...">
                </label>
                <?php
                    if(isset($_GET["error"]))
                    if($_GET["error"] == "email"){
                        echo '
                        <div class="pwdCondition">
                            <p style = "color: red; text-style: underline;">Deja există un cont asociat cu acest email</p>
                        </div>';
                    }
                ?>
                <label for="pwdR">
                    <input class="inputs" type="password" name="pwdR" id="pwdR" placeholder="Parolă..." maxlength=15>
                    <div id="pwdEyeR">
                        <iconify-icon id="pwdEyeIconR" icon="clarity:eye-hide-line"
                            style="color: grey; font-size: 1.5rem">
                    </div>
                </label>
                <div id="pwdConditions">
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
                <label for="pwdConfirmR">
                    <input class="inputs" type="password" name="pwdConfirmR" id="pwdConfirmR"
                        placeholder="Confirmă parola..." maxlength=15>
                </label>
                <div class="pwdConditions">
                    <div class="pwdCondition">
                        <div>
                            <iconify-icon id="pwdCSame" icon="akar-icons:circle-x-fill"
                                style="color: red; font-size: 1.3rem">
                        </div>
                        <p>parolele trebuie să coincidă</p>
                    </div>
                </div>
                <input type="submit" value="Înregistrare" id="submitBtnR">
            </form>
        </div>
    </div>
    <div id="textBox">
        <h1>O altă perspectivă</h1>
        <h2>Privește lucrurile dintr-o altă dimensiune.</h2>
        <button><a href="./home.php" id="toHomeBtn">Citește</a></button>
    </div>
    <div id="socialPlatforms">
        <a href="https://www.facebook.com" target="_blank">
            <iconify-icon icon="bi:facebook" style="color: white; font-size: 36px"></iconify-icon>
        </a>
        <a href="https://www.instagram.com" target="_blank">
            <iconify-icon icon="bi:instagram" style="color: white; font-size: 36px"></iconify-icon>
        </a>
        <a href="https://www.twitter.com" target="_blank">
            <iconify-icon icon="bi:twitter" style="color: white; font-size: 36px"></iconify-icon>
        </a>
        <a href="https://www.youtube.com" target="_blank">
            <iconify-icon icon="bi:youtube" style="color: white; font-size: 36px"></iconify-icon>
        </a>
        <a href="https://www.patreon.com" target="_blank">
            <iconify-icon icon="cib:patreon" style="color: white; font-size: 36px"></iconify-icon>
        </a>
    </div>

    <?php
        include './footer.html';
    ?>
</body>
<script src="./javascript/login.js"></script>
<script src="./javascript/register.js"></script>
<script src="./javascript/indexPage.js"></script>
<!-- Account system buttons javascript -->
<script src="./javascript/accountSystemButtons.js"></script>
<!-- Account sttings javascript -->
<script src="./javascript/accountSettings.js"></script>
<!-- Nav bar for mobile devices javascript -->
<script src="./javascript/navBarMobile.js"></script>

</html>