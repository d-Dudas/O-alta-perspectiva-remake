let fileIsOk = 0;

$("#article-upload").change(function () {
    var fileExtension = ['pdf', 'docx', 'doc'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {;
        $("#formatAlert").css("display", "initial");
        $("#noContentAlert").css("display", "none");
        fileIsOk = 0;
    }
    else {
        $("#formatAlert").css("display", "none");
        $("#noContentAlert").css("display", "none");
        fileIsOk = 1;
    }

})

$("#sendArticleForm").submit((e) => {
    if(!validateEmail($("#email").val()))
    {
        e.preventDefault();
        $("#emailAlert").css("display", "initial");
    }
    if($("#name").val() == "" || $("#articleTitle").val() == "" || $("#email").val() == ""){
        e.preventDefault();
        $("input[type='text']").css("border", "1px solid red");
        setTimeout(() => {$("input[type='text']").css("border", "none");}, 100);
        setTimeout(() => {$("input[type='text']").css("border", "1px solid red");}, 200);
        setTimeout(() => {$("input[type='text']").css("border", "none");}, 300);
        setTimeout(() => {$("input[type='text']").css("border", "1px solid red");}, 400);
        setTimeout(() => {$("input[type='text']").css("border", "none");}, 500);
    }
    if(fileIsOk == 0){
        e.preventDefault();
        $("#noContentAlert").css("display", "initial");
    }
    else {
        $("#noContentAlert").css("display", "none");
    }
})

function validateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
    return (false)
}

$("#email").keyup( () => {
    if(validateEmail($("#email").val())) {
        $("#email").css("border", "none");
        $("#email").css("color", "black");
    }
    else {
        $("#email").css("border", "1px solid red");
        $("#email").css("color", "red");
        r = 0;
    }
});