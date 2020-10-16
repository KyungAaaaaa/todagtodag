$(document).on("click",".email_btn",function (){
    $(this).parent().children("span").toggleClass("email");
    if (!(this).parent().children("span").hasClass("email")){(this).parent().children("span").fadeOut()}
})