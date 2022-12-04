$(".articles").hover(
    function () {
        $(this).children().css("top", "0px");
    },
    function () {
        $(this).children().css("top", "90%");
        $(".articlePreviewSmall").css("top", "80%");
    }
);

if(window.matchMedia("(max-width: 1000px)").matches) {
    $("#mostRecentArticle a, recentArticles a").addClass("articleOnMobileScreen");
}