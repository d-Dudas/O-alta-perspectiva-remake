function verifyUsername(username) {
    if(/^[a-z0-9_-]{3,16}$/igm.test(username)) {
        $("#usernameR").removeClass("errorEffectR");
        return true;
    }
    else {
        $("#usernameR").addClass("errorEffectR");
        return false;
    }
}

function verifyEmail(mail) 
{
 if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
    $("#emailR").removeClass("errorEffectR");
    return true;
 } else {
    $("#emailR").addClass("errorEffectR");
    return false;
 }
  
}

function pwdRegex(pwd) {
    var lengthRegex = new RegExp("(?=.{8,})");
    var numberRegex = new RegExp("(?=.*[0-9])");
    var upperCaseLetterRegex = new RegExp("(?=.*[A-Z])");
    let isCorrect = true;
    if(lengthRegex.test(pwd)) {
        $("#pwdCLength").attr("icon", "fluent-mdl2:completed-solid");
        $("#pwdCLength").css("color", "green");
        $("#pwdR").removeClass("errorEffectR");
    } 
    else {
        $("#pwdCLength").attr("icon", "akar-icons:circle-x-fill");
        $("#pwdCLength").css("color", "red");
        $("#pwdR").addClass("errorEffectR");
        isCorrect = false;
    }

    if(numberRegex.test(pwd)) {
        $("#pwdCNumber").attr("icon", "fluent-mdl2:completed-solid");
        $("#pwdCNumber").css("color", "green");
        $("#pwdR").removeClass("errorEffectR");
    } 
    else {
        $("#pwdCNumber").attr("icon", "akar-icons:circle-x-fill");
        $("#pwdCNumber").css("color", "red");
        $("#pwdR").addClass("errorEffectR");
        isCorrect = false;
    }

    if(upperCaseLetterRegex.test(pwd)) {
        $("#pwdCUCL").attr("icon", "fluent-mdl2:completed-solid");
        $("#pwdCUCL").css("color", "green");
        $("#pwdR").removeClass("errorEffectR");
    } 
    else {
        $("#pwdCUCL").attr("icon", "akar-icons:circle-x-fill");
        $("#pwdCUCL").css("color", "red");
        $("#pwdR").addClass("errorEffectR");
        isCorrect = false;
    }

    return isCorrect;
}

function verifyIfPasswordsAreTheSame() {
    let isCorrect = true;

    if($("#pwdConfirmR").val() === $("#pwdR").val()){
        $("#pwdCSame").attr("icon", "fluent-mdl2:completed-solid");
        $("#pwdCSame").css("color", "green");
        $("#pwdConfirmR").removeClass("errorEffectR");
    } 
    else {
        $("#pwdCSame").attr("icon", "akar-icons:circle-x-fill");
        $("#pwdCSame").css("color", "red");
        $("#pwdConfirmR").addClass("errorEffectR");
        isCorrect = false;
    }

    return isCorrect;
}

// Funcția verifică la fiecare modificare
// dacă username-ul atinge standardele minime
$("#usernameR").keyup( () => {
    if(/^[a-z0-9_-]{3,16}$/igm.test($("#usernameR").val())) {
        $("#usernameR").css("border", "none");
        $("#usernameR").css("color", "black");
    }
    else {
        $("#usernameR").css("border", "1px solid red");
        $("#usernameR").css("color", "red");
    }
})

// Funcția verifică dacă textul introdus
// în câmpul de input este într-adevăr o
// adresă de mail
$("#emailR").keyup( () => {
    if(verifyEmail($("#emailR").val())) {
        $("#emailR").css("border", "none");
        $("#emailR").css("color", "black");
    }
    else {
        $("#emailR").css("border", "1px solid red");
        $("#emailR").css("color", "red");
    }
})

$("#pwdR").keyup( () => {
    pwdRegex($("#pwdR").val());
    verifyIfPasswordsAreTheSame();
})

$("#pwdConfirmR").keyup(() => {
    verifyIfPasswordsAreTheSame();
})

$("#pwdEyeR").on("click", () => {
    if($("#pwdR").attr("type") === "password") {
        $("#pwdR").attr("type", "text");
        $("#pwdConfirmR").attr("type", "text");
        $("#pwdEyeIconR").attr("icon", "clarity:eye-line");
    }
    else {
        $("#pwdR").attr("type", "password");
        $("#pwdConfirmR").attr("type", "password");
        $("#pwdEyeIconR").attr("icon", "clarity:eye-hide-line");
    }
})

// Dacă inputurile nu sunt acceptate, atunci
// se împiedică trimitere formului
$("#registerForm").submit((e) => {
    if(
        !verifyUsername($("#usernameR").val()) ||
        !verifyEmail($("#emailR").val()) ||
        !pwdRegex($("#pwdR").val()) ||
        !verifyIfPasswordsAreTheSame()
        ){
            e.preventDefault();
            $(".errorEffectR").css("border", "1px solid red");
            setTimeout(() => {$(".errorEffectR").css("border", "none");}, 100);
            setTimeout(() => {$(".errorEffectR").css("border", "1px solid red");}, 200);
            setTimeout(() => {$(".errorEffectR").css("border", "none");}, 300);
            setTimeout(() => {$(".errorEffectR").css("border", "1px solid red");}, 400);
            setTimeout(() => {$(".errorEffectR").css("border", "none");}, 500);
    }
})