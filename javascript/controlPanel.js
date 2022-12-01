
function resetMenuElements() {
    $(".selectedPanelElements").css("top", "100%");
}

function showThis(id) {
    resetMenuElements();

    $(id).css("top", "5vh");
}

function setZIndexForMenuButtons() {
    let i = 100;
    $(".menuButton").each(function() {
        console.log(typeof(this));
        $(this).css("z-index", i);
        i--;
    });
}

setZIndexForMenuButtons();
$("#addArticle").css("top", "5vh");

if(window.location.search.substring(1).includes("editArticle=")) {
    showThis("#editArticle");
}