$("#settingsButton").click(function() {
    var panel = $("#settingsPanel");
    if(panel.css("display") == "none")
    {
        panel.css("display", "block");
    } else {
        panel.css("display", "none");
    }
});

$("#pwdEye").on("click", () => {
    if($("#pwd").attr("type") === "password") {
        $("#pwd").attr("type", "text");
        $("#pwdEyeIcon").attr("icon", "clarity:eye-line");
    }
    else {
        $("#pwd").attr("type", "password");
        $("#pwdEyeIcon").attr("icon", "clarity:eye-hide-line");
    }
});

$("#changeUsernameForm").submit((e) => {
    if($("#username").val() == "" || $("#pwd").val() == ""){
        e.preventDefault();
        $(".errorEffect").css("border", "1px solid red");
        setTimeout(() => {$(".errorEffect").css("border", "none");}, 100);
        setTimeout(() => {$(".errorEffect").css("border", "1px solid red");}, 200);
        setTimeout(() => {$(".errorEffect").css("border", "none");}, 300);
        setTimeout(() => {$(".errorEffect").css("border", "1px solid red");}, 400);
        setTimeout(() => {$(".errorEffect").css("border", "none");}, 500);
    }
});

if(window.location.search.substring(1).includes("showAccSettings=true")) 
    $("#settingsPanel").css("display", "block");