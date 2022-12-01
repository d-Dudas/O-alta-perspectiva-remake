$("#addArticle").submit((e) => {
    if($("#titlu").val() == "" ||
        $("#author").val() == "" ||
        $('#image_file')[0].files[0] == ""){
        e.preventDefault();
        $("label").css("border", "1px solid red");
        $("label").css("border-radius", "20px");
        setTimeout(() => {$("label").css("border", "none");}, 100);
        setTimeout(() => {$("label").css("border", "1px solid red");}, 200);
        setTimeout(() => {$("label").css("border", "none");}, 300);
        setTimeout(() => {$("label").css("border", "1px solid red");}, 400);
        setTimeout(() => {$("label").css("border", "none");}, 500);
    }
})

$("#addSuggestions").submit((e) => {
    if($("#suggestionTitle").val() == "" ||
        $("#suggestionPoster").val() == "" ||
        $("#suggestionLink").val() == ""){
        e.preventDefault();
        $("#addSuggestions input[type='text']").css("border", "1px solid red");
        $("#addSuggestions input[type='text']").css("border-radius", "20px");
        setTimeout(() => {$("#addSuggestions input[type='text']").css("border", "none");}, 100);
        setTimeout(() => {$("#addSuggestions input[type='text']").css("border", "1px solid red");}, 200);
        setTimeout(() => {$("#addSuggestions input[type='text']").css("border", "none");}, 300);
        setTimeout(() => {$("#addSuggestions input[type='text']").css("border", "1px solid red");}, 400);
        setTimeout(() => {$("#addSuggestions input[type='text']").css("border", "none");}, 500);
    }
})
