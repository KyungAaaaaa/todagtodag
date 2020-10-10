$(".my_page").on("click", function () {
    location.href = "member_mypage.php";
});

// =============  예약조회  =========================
$("#select_date").on("click", function () {
    $.ajax({
        type   : "POST",
        url    : "member_mypage_data.php",
        data   : {
            date_1     : $("#date_1").val(),
            date_2     : $("#date_2").val(),
            period_mode: "select_date"
        },
        success: function (data) {
            $("#appointment_list").html(data);
            console.dir(data);
        }
    })
})
$("#all_date").on("click", function () {
    $.ajax({
        type   : "POST",
        url    : "member_mypage_data.php",
        success: function (data) {
            $("#date_1").val(null);
            $("#date_2").val(null);
            $("#appointment_list").html(data);
            console.dir(data);
        }
    })
})

//리뷰작성
// $("#date_2").val(new Date().toISOString().slice(0,10));
const $content = $("#review_pop_content");
let $hospital_id = "";
$(".review_write").on("click", function () {
    const $item = $(this).parent();

    const $hospital_name = $item.children("h3").text();
    const $date = $item.children("p").text();
    const $img_src = $item.parent().children("img").attr("src");
    $hospital_id = $item.children(".hospital_id").val();
    console.dir($hospital_id);

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
    $content.find("#review_hospital_name").html($hospital_name);
    $content.find("#review_appointment_date").html($date);
    $content.find("#review_hospital_logo").attr("src", $img_src);


    $("#review_pop").fadeIn();

    $('#star_grade span').click(function () {
        $(this).parent().children("span").removeClass("on");  /* 별점의 on 클래스 전부 제거 */
        $(this).addClass("on").prevAll("span").addClass("on"); /* 클릭한 별과, 그 앞 까지 별점에 on 클래스 추가 */
        return false;
    });

})

$("#popup_write").on("click", function () {
    $.ajax({
        type   : "POST",
        url    : "review_write.php",
        data   : {
            mode       : "insert",
            hospital_id: $hospital_id,
            userid     : $(".userid").val(),
            star_rating: $("#star_grade").find(".on").length,
            comment    : $("#review_pop_comment").val()
        },
        success: function (data) {
            if (data == true) {
                alert("등록이 완료되었습니다.")
                popup_close();
            }
        }
    })
})

$("#close").on("click", function () {
    popup_close();
});

$(".review_delete").on("click", function () {
    const $this_span = $(this).parent();
    const $review_id = $this_span.find(".review_no").val();
    if (confirm("리뷰를 삭제하시겠습니까?") === true) {
        $.ajax({
            type   : "POST",
            url    : "review_write.php",
            data   : {
                mode     : "delete",
                review_no: $review_id
            },
            success: function (data) {
                if (data == true) {
                    alert("삭제되었습니다.")
                    $this_span.parent().remove();
                }
            }
        })
    }
})

function popup_close() {
    $("#star_grade").children("span").removeClass("on");

    $content.find("textarea").val("");

    $("body").css("overflow", "auto");
    $("#backgroundSmsLayer").remove();
    $("#review_pop").fadeOut();
}
