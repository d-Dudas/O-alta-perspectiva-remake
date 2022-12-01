$("#commentsList").scrollTop("100%");

$("#writeComment").submit((e) => {
    if($("#comment").attr("placeholder") === "Autentificați-vă pentru a scrie un comentariu" || 
    $("#comment").val() == ""){
        e.preventDefault();
    }
})

$("input[type=hidden]").change(() => {
    window.close();
})

function cancelDelete() {
    $("#confirmDeleteBox").remove();
}

function confirmDelete(id) {
    $("#confirmDeleteBox").remove();
    $('body').
    prepend('<form id = "confirmDeleteBox" action="./includes/deleteArticle.inc.php" method="POST"><input type="hidden" name="id" value='+ id +' style="display:none;"><p>Ștergeți acest articol?</p><button onclick="cancelDelete()">Nu</button><input type="submit" value="Da"/></form>');
}

$("#adminEditButton").hover(function () {
        $("#adminEditIcon").css("color", "green");
    }, function () {
        $("#adminEditIcon").css("color", "black");
    }
);

$("#deleteArticleButton").hover(function () {
    $("#adminDeleteIcon").css("color", "red");
}, function () {
    $("#adminDeleteIcon").css("color", "black");
}
);