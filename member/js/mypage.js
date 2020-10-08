$(".my_page").on("click", function () {
    location.href = "member_mypage.php";
});

// =============  예약조회  =========================
$("#select_date").on("click", function () {
    $.ajax({
        type   : "POST",
        url    : "member_mypage_data.php",
        data   : {
            date_1:$("#date_1").val(),
            date_2:$("#date_2").val(),
            period_mode:"select_date"
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
            $("#date_2").val(new Date().toISOString().slice(0,10));
           $("#appointment_list").html(data);
           console.dir(data);
        }
    })
})


$("#date_2").val(new Date().toISOString().slice(0,10));