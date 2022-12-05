$("#loginBtn").children("a").css("pointer-events", "none");
$("#registerBtn").children("a").css("pointer-events", "none");

$("#loginBtn").on("click", () => {
    $("#slideBar").css("top", "-100vh");
})

$("#registerBtn").on("click", () => {
    $("#slideBar").css("top", "-200vh");
})

$("#textBox").children("h1")  .on("click", () => {
    $("#slideBar").css("top", "0vh");
})

if(window.location.search.substring(1).includes("login=show")) setTimeout(() => {
    $("#slideBar").css("top", "-100vh");
}, 500);
if(window.location.search.substring(1).includes("register=show")) setTimeout(() => {
    $("#slideBar").css("top", "-200vh");
}, 500);
