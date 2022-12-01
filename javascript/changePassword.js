function pwdRegex(pwd) {
    let r = 1;
    var lengthRegex = new RegExp("(?=.{8,})");
    var numberRegex = new RegExp("(?=.*[0-9])");
    var upperCaseLetterRegex = new RegExp("(?=.*[A-Z])");
    if(lengthRegex.test(pwd)) {
        $("#pwdCLength").attr("icon", "fluent-mdl2:completed-solid");
        $("#pwdCLength").css("color", "green");
    } 
    else {
        $("#pwdCLength").attr("icon", "akar-icons:circle-x-fill");
        $("#pwdCLength").css("color", "red");
        r = 0;
    }

    if(numberRegex.test(pwd)) {
        $("#pwdCNumber").attr("icon", "fluent-mdl2:completed-solid");
        $("#pwdCNumber").css("color", "green");
    } 
    else {
        $("#pwdCNumber").attr("icon", "akar-icons:circle-x-fill");
        $("#pwdCNumber").css("color", "red");
        r = 0;
    }

    if(upperCaseLetterRegex.test(pwd)) {
        $("#pwdCUCL").attr("icon", "fluent-mdl2:completed-solid");
        $("#pwdCUCL").css("color", "green");
    } 
    else {
        $("#pwdCUCL").attr("icon", "akar-icons:circle-x-fill");
        $("#pwdCUCL").css("color", "red");
        r = 0;
    }
    if(r == 1) {
        return true;
    }
    else {
        return false;
    }
}


$("#pwd").keyup( () => {
    pwdRegex($("#pwd").val());
})

$("#pwdConfirm").keyup(() => {
    if($("#pwdConfirmR").val() === $("#pwdR").val()){
        $("#pwdCSame").attr("icon", "fluent-mdl2:completed-solid");
        $("#pwdCSame").css("color", "green");
    } 
    else {
        $("#pwdCSame").attr("icon", "akar-icons:circle-x-fill");
        $("#pwdCSame").css("color", "red");
    }
})

$("#changePasswordForm").submit((e) => {
    if($("#pwdR").val() == "" || pwdRegex($("#pwdR").val()) || $("#pwdConfirmR").val() == "" || $("#pwdConfirmR").val() != $("#pwdR").val()){
        e.preventDefault();
        $(".inputs").css("border", "1px solid red");
        setTimeout(() => {$(".inputs").css("border", "none");}, 100);
        setTimeout(() => {$(".inputs").css("border", "1px solid red");}, 200);
        setTimeout(() => {$(".inputs").css("border", "none");}, 300);
        setTimeout(() => {$(".inputs").css("border", "1px solid red");}, 400);
        setTimeout(() => {$(".inputs").css("border", "none");}, 500);
    }
})

$("#pwdEye").on("click", () => {
    if($("#pwd").attr("type") === "password") {
        $("#pwd").attr("type", "text");
        $("#pwdConfirm").attr("type", "text");
        $("#pwdEyeIcon").attr("icon", "clarity:eye-line");
        $("#pwdEyeIcon").attr("color", "black");
    }
    else {
        $("#pwd").attr("type", "password");
        $("#pwdConfirm").attr("type", "password");
        $("#pwdEyeIcon").attr("icon", "clarity:eye-hide-line");
        $("#pwdEyeIcon").attr("color", "grey");
    }
})

$("#pwdConfirm").keyup(() => {
    let r = 1;
    if($("#pwdConfirm").val() === $("#pwd").val()){
        $("#pwdCSame").attr("icon", "fluent-mdl2:completed-solid");
        $("#pwdCSame").css("color", "green");
    } 
    else {
        $("#pwdCSame").attr("icon", "akar-icons:circle-x-fill");
        $("#pwdCSame").css("color", "red");
        r = 0;
    }
    if(r == 1) {
        $("#pwdConfirm").attr("correct", "1");
    }
    else {
        $("#pwdConfirm").attr("correct", "0");
    }
})

$("#changePasswordForm").css("top", "0px");