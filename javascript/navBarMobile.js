function showNavBar() {
    if(window.matchMedia("(max-width: 1000px)").matches) {
        $("#navBarMobile").css("display", "block");
        let accBtns = $("#buttons");
        accBtns.remove();
        $("#navBarMobile").append(accBtns);
        accBtns.css("display", "none");
        $("#controlPanelBtn").css("right", "auto");
        if(window.location.search.substring(1).includes("login=show")) 
            setTimeout(() => {
                $("#textBox").css("top", "100%");
                $("#slideBar").css("display", "flex");
                $("#slideBar").css("top", "-100vh");
            }, 500);
        if(window.location.search.substring(1).includes("register=show")) 
            setTimeout(() => {
                $("#textBox").css("top", "100%");
                $("#slideBar").css("display", "flex");
                $("#slideBar").css("top", "-200vh");
            }, 500);
    } else 
        if($("#navBarMobile").css("display") == "block") {
            $("#navBarMobile").css("display", "none");
            let accBtns = $("#buttons");
            accBtns.remove();
            $("body").prepend(accBtns);
            accBtns.css("display", "flex");
            $("#controlPanelBtn").css("right", "-15%");
        }
}

function openDropMenuAnimation() {
    $("#ham2").css("display", "none");
    $("#ham1").css("rotate", "45deg");
    $("#ham1").css("transform", "translateY(1vh)");
    $("#ham3").css("rotate", "-45deg");
    $("#ham3").css("transform", "translateY(-1vh)");
    $("#navBarMobile").css("height", "100%");
    setTimeout(()=>{$("#buttons").css("display", "flex")}, 800);
    setTimeout(()=>{$("#pagesMenu").css("display", "flex")}, 800);
}

function closeDropMenuAnimation() {
    $("#ham1").css("rotate", "0deg");
    $("#ham1").css("transform", "translateY(0px)");
    $("#ham3").css("rotate", "0deg");
    $("#ham3").css("transform", "translateY(0px)");
    $("#ham2").css("display", "block");
    $("#navBarMobile").css("height", "10%");
    $("#buttons").css("display", "none");
    $("#pagesMenu").css("display", "none");
}

$("#logo").click(function (e) { 
    closeDropMenuAnimation();
    $("#textBox").css("top", "20%");
    $("#slideBar").css("top", "-300vh");
    setTimeout(()=>{$("#slideBar").css("display", "none");}, 1000);
});

$("#loginBtn").click(function (e) { 
    if(!window.matchMedia("(max-width: 1000px)").matches)
        return;
    closeDropMenuAnimation();
    $("#textBox").css("top", "100%");
    $("#slideBar").css("display", "flex");
    setTimeout(() => {
        $("#slideBar").css("top", "-100vh");
    }, 500);
    
    
});

$("#registerBtn").click(function (e) { 
    if(!window.matchMedia("(max-width: 1000px)").matches)
        return;
    closeDropMenuAnimation();
    $("#textBox").css("top", "100%");
    setTimeout(() => {
        $("#slideBar").css("display", "flex");
        $("#slideBar").css("top", "-200vh");
    }, 500);
    
});

$("#dropMenuButton").click(function (e) { 
    if($("#ham2").css("display") != "none") {
        openDropMenuAnimation();
    } else {
        closeDropMenuAnimation();
    }
    
});

showNavBar();
$(window).resize(function () { 
    showNavBar();
});

