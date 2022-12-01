$("#registerBtn").hover(
    function () {
        $(this).addClass("btnInR").removeClass("btnOutR");
    },
    function () {
        $(this).addClass("btnOutR").removeClass("btnInR");
    },
);

$("#loginBtn").hover(
    function () {
        $(this).addClass("btnInL").removeClass("btnOutL");
    },
    function () {
        $(this).addClass("btnOutL").removeClass("btnInL");
    },
);

$("#logoutBtn").hover(
    function () {
        $(this).addClass("btnInL").removeClass("btnOutL");
    },
    function () {
        $(this).addClass("btnOutL").removeClass("btnInL");
    },
);

$("#controlPanelBtn").hover(
    function () {
        //$(this).addClass("btnInR").removeClass("btnOutR");
        $(this).css("right", "-10%");
    },
    function () {
        //$(this).addClass("btnOutR").removeClass("btnInR");
        $(this).css("right", "-15%");
    },
);
