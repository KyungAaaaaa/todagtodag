$(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#btn_top').fadeIn();
        } else {
            $('#btn_top').fadeOut();
        }
    });
    
    $("#btn_top").click(function() {
        $('html, body').animate({
            scrollTop : 0
        }, 400);
        return false;
    });
});
