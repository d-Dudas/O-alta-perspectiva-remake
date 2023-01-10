<?php
if(!empty($_SESSION["username"])) {

    $chk = "checked";
    $error = "";
    if(isset($_GET["error"])) {
        $error = $_GET["error"];
    }

    echo '
    <div id = "accSettingsDiv">
        <div id = "printUsername">
            <p>Bine ai venit, '.$_SESSION["username"].'!</p>
        </div>
        <div id="settingsButton">
            <iconify-icon id="accountSettingsButton" icon="material-symbols:settings-outline"></iconify-icon>
        </div>
    </div>
    <div id = "settingsPanel" class = "heavyBlur fiveShadow flexClmEvn">
        <div id = "changeUsername">
            <h2 id = "changeUsernameTitle" class = "flexClmEvn">Schimbă numele de utilizator</h2>
            <form id = "changeUsernameForm" class = "flexClmEvn" method = "POST" action = "./includes/changeUsername.inc.php">
                <label for="username">
                    <input class="inputs errorEffect" type="text" name="username" id="username" placeholder="Noul nume de utilizator...">
                </label>';
    if($error == "changeUsernameError1"){
        echo '
        <div class="pwdCondition">
            <p style = "color: red; text-style: underline;">Acest username deja este folosit de un utilizator. </p>
        </div>
        ';
    }
    if($error == "changeUsernameError2"){
        echo '
        <div class="pwdCondition">
            <p style = "color: red; text-style: underline;">Numele de utilizator trebuie să aibă între 3 și 16 caractere, fără caractere speciale. </p>
        </div>
        ';
    }
    echo '
    <div id="pwdBox" class="errorEffect">
        <label for="pwd">
            <input class="inputs" type="password" name="pwd" id="pwd" placeholder="Parolă..." maxlength=15>
        </label>
        <div id="pwdEye">
            <iconify-icon id="pwdEyeIcon" icon="clarity:eye-hide-line"
                style="color: grey; font-size: 1.5rem">
        </div>
    </div>';
    if ($error  == "changeUsernamePwd") {
        echo '
        <div class="pwdCondition">
            <p style = "color: red; text-style: underline;">Parolă incorectă.</p>
        </div>';
    }
    echo '
        <input type = "hidden" style = "display: none" name = "usrId" value = 1 >
        <input type="submit" value="Schimbă" id="submitChangeUsername">
    </form>
    </div>
    <div id = "changePreferences">
        <h2 id = "changePreferencesTitle" class = "flexClmEvn">Schimbă preferințele</h2>
        <form id = "changePreferencesForm" class = "flexClmEvn" method = "POST" action = "./includes/changePreferences.inc.php">
            <label for="international" class = "flexRowEvn">
                <input type="checkbox" id="international" name="preferences[]" value = "international" ';
        if(in_array("international", $_SESSION["preferences"])) {
            echo $chk;
        }
        echo '>
        Internațional</label>
        <label for="politic" class = "flexRowEvn">
            <input type="checkbox" id="politic" value="politic" name="preferences[]" ';
        if(in_array("politic", $_SESSION["preferences"])) {
            echo $chk;
        }
        echo '>
        Politic</label>
        <label for="educatie" class = "flexRowEvn">
            <input type="checkbox" id="educatie" value="educatie" name="preferences[]" ';
        if(in_array("educatie", $_SESSION["preferences"])) {
            echo $chk;
        }
        echo '>
        Educație</label>
        <label for="sanatate" class = "flexRowEvn">
            <input type="checkbox" id="sanatate" value="sanatate" name="preferences[]" ';
        if(in_array("sanatate", $_SESSION["preferences"])) {
            echo $chk;
        }
        echo '>
        Sănătate</label>
        <label for="opinii" class = "flexRowEvn">
            <input type="checkbox" id="opinii" value="opinii" name="preferences[]"';
        if(in_array("opinii", $_SESSION["preferences"])) {
            echo $chk;
        }
        echo '>
        Opinii</label>
        <label for="infrastructura" class = "flexRowEvn">
            <input type="checkbox" id="infrastructura" value="infrastructura" name="preferences[]" ';
        if(in_array("infrastructura", $_SESSION["preferences"])) {
            echo $chk;
        }
        echo '>
        Infrastructură</label>
        <label for="administratie" class = "flexRowEvn">
            <input type="checkbox" id="administratie" value="administratie" name="preferences[]" ';
        if(in_array("administratie", $_SESSION["preferences"])) {
            echo $chk;
        } 
        echo '>
        Administrație</label>
        <label for="cultura" class = "flexRowEvn">
            <input type="checkbox" id="cultura" value="cultura" name="preferences[]"';
        if(in_array("cultura", $_SESSION["preferences"])){
            echo $chk;
        }
        echo '>
        Cultură</label>
            <input type = "hidden" style = "display: none" name = "usrId" value = '.$_SESSION["id"].'>
            <input type="submit" value="Salvează" id="submitChangePreferences">
    </form>
    </div>
    </div>';
}

?>