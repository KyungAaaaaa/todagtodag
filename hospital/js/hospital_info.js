const $menu = $('.menu');
const $detail_tab = $menu.find('#hospital_detail');
const $review_tab = $menu.find('#hospital_review');
const $appointment_tab = $menu.find('#hospital_appointment');
const $hospital_id = $('#hospital_id').val();
const $user_id = $('#user_id').val();

function tab_change(event) {
    $detail_tab.removeClass("current")
    $review_tab.removeClass("current")
    $appointment_tab.removeClass("current")
    $(event.target).addClass("current");

    let $current_tab = "";
    if ($detail_tab.hasClass('current') === true) {
        $current_tab = "detail";
    } else if ($review_tab.hasClass('current') === true) {
        $current_tab = "review";
    } else if ($appointment_tab.hasClass('current') === true) { 
        $current_tab = "appointment";
    }

    $.ajax({
        type   : "POST",
        url    : "hospital_info_change.php",
        data   : {
            hospital_id: $hospital_id,
            current_tab: $current_tab,
            user_id: $user_id
        },
        success: function (data) {
            $(".content").html(data);
        }
    })

}

$detail_tab.on("click", tab_change);
$review_tab.on("click", tab_change);
$appointment_tab.on("click", tab_change);

// $detail_tab.addClass("current");


$(".like_btn #checkbox").on("click", function () {
    // const $status = $(this).children("#checkbox:checked").val();
    if($(this).is(":checked") === true){
        $status="unlike";
    }

    if($(this).is(":checked") === false){
          $status="like";
    }
    const $interest_no = $('#interest_no').val();
    const $member_num = $('#member_num').val();
    const $hospital_id = $('#hospital_id').val();
    console.log($status);
    $.ajax({
        type   : "POST",
        url    : "hospital_info_change.php",
        data   : {
            member_num : $member_num,
            hospital_id: $hospital_id,
            like_status: $status,
            interest_no: $interest_no
        },
        success: function (data) {
        console.log(data)
            $('#interest_no').val(data);
        }
    })
});