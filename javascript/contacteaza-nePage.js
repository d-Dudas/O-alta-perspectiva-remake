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
        $("#emailAlert").css("display", "none");
    }
    else {
        $("#email").css("border", "1px solid red");
        $("#email").css("color", "red");
    }
})

$("#contactForm").submit((e) => {
    if(validateEmail($("#email").val()))
    {
        e.preventDefault();
        $("#emailAlert").css("display", "initial");
    }
    if($("#name").val() == "" || $("#mesaj").val() == "" || $("#email").val() == ""){
        e.preventDefault();
        $("input[type='text'], #mesaj").css("border", "1px solid red");
        setTimeout(() => {$("input[type='text'], #mesaj").css("border", "none");}, 100);
        setTimeout(() => {$("input[type='text'], #mesaj").css("border", "1px solid red");}, 200);
        setTimeout(() => {$("input[type='text'], #mesaj").css("border", "none");}, 300);
        setTimeout(() => {$("input[type='text'], #mesaj").css("border", "1px solid red");}, 400);
        setTimeout(() => {$("input[type='text'], #mesaj").css("border", "none");}, 500);
    }
})