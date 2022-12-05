
function resetMenuElements() {
    if(window.matchMedia("(max-width: 1000px)").matches) return;
    $(".selectedPanelElements").css("top", "100%");
}

function showThis(id) {
    if(window.matchMedia("(max-width: 1000px)").matches) return;
    resetMenuElements();

    $(id).css("top", "5vh");
}

function setZIndexForMenuButtons() {
    if(window.matchMedia("(max-width: 1000px)").matches) return;
    let i = 100;
    $(".menuButton").each(function() {
        $(this).css("z-index", i);
        i--;
    });
}

if(!window.matchMedia("(max-width: 1000px)").matches) {
    setZIndexForMenuButtons();
    $("#addArticle").css("top", "5vh");
}

if(window.location.search.substring(1).includes("editArticle=")) {
    showThis("#editArticle");
}