


//예약내용 자세히 보기
// $("#col2_1").on("click", function () {

//     popup_open();
    
// })

$("#close").on("click", function () {

    popup_close();
    
})

// $("#popup_write").on("click", function () {
//     var $pass = $("#read_pw").val();
//     console.log($pass);
//     if($pass){
//         $.ajax({
//             type   : "POST",
//             url    : "password.php",
//             data   : {
//                 num : $num,
//                 page : $page,
//                 pass: $pass
//             },
//             success: function (data) {
//                 if (data === "fail") {
//                     alert("비밀번호 불일치");
//                 }
//             }
//         })
//         }
//     })

function popup_open() {
    $("body").css("overflow", "hidden");
    $("body").append("<div id='backgroundSmsLayer'></div>");
    $("#backgroundSmsLayer").css({
        "position"        : "fixed",
        "top"             : "0px",
        "left"            : "0px",
        "width"           : "100%",
        "height"          : "100%",
        "background-color": "#000",
        "z-index"         : "-1",
        "opacity"         : "0.3"

    });

    $("input[type=radio]").prop("checked", false);
    $("#popup").fadeIn();
}

function popup_close() {
    $("#star_grade").children("span").removeClass("on");

    // $content.find("textarea").val("");

    $("body").css("overflow", "auto");
    $("#backgroundSmsLayer").remove();
    $("#popup").fadeOut();
}
