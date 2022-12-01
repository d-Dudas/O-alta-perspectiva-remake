$(".articles").hover(
    function () {
        $(this).children().css("top", "0px");
    },
    function () {
        $(this).children().css("top", "90%");
    }
);