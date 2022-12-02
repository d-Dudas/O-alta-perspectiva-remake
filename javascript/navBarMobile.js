if(window.matchMedia("(max-width: 1000px)").matches) {
    $("#navBarMobile").css("display", "block");
}

$("#dropMenuButton").click(function (e) { 
    if($("#ham2").css("display") != "none") {
        $("#ham2").css("display", "none");
        $("#ham1").css("rotate", "45deg");
        $("#ham1").css("transform", "translateY(1vh)");
        
        $("#ham3").css("rotate", "-45deg");
        $("#ham3").css("transform", "translateY(-1vh)");
    } else {
        $("#ham1").css("rotate", "0deg");
        $("#ham1").css("transform", "translateY(0px)");
        $("#ham3").css("rotate", "0deg");
        $("#ham3").css("transform", "translateY(0px)");
        $("#ham2").css("display", "block");
    }
    
});