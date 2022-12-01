$("#requestChangePasswordForm").css("top", "0px");

function validateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
    return (false)
}

$("#requestChangePasswordForm").submit((e) => {
    if(!validateEmail($("#email").val()) || $("#email").val() == "") {
        e.preventDefault();
        $("label[for='email']").css("border", "1px solid red");
        setTimeout(() => {$("label[for='email']").css("border", "none");}, 100);
        setTimeout(() => {$("label[for='email']").css("border", "1px solid red");}, 200);
        setTimeout(() => {$("label[for='email']").css("border", "none");}, 300);
        setTimeout(() => {$("label[for='email']").css("border", "1px solid red");}, 400);
        setTimeout(() => {$("label[for='email']").css("border", "none");}, 500);
    }
})