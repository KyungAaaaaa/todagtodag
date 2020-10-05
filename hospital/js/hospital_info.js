const $menu = $('.menu');
const $detail_tab = $menu.find('#hospital_detail');
const $review_tab = $menu.find('#hospital_review');
const $appointment_tab = $menu.find('#hospital_appointment');
const $hospital_id = $('#hospital_id').val();

function tab_change(event) {
    $detail_tab.removeClass("current")
    $review_tab.removeClass("current")
    $appointment_tab.removeClass("current")
    $(event.target).addClass("current");

    let $current_tab = "";
    if ($detail_tab.hasClass('current') === true) {
        $current_tab = "detail";

    } else if ($review_tab.hasClass('current') === true) $current_tab = "review";
    else if ($appointment_tab.hasClass('current') === true) $current_tab = "appointment";

    $.ajax({
        type   : "POST",
        url    : "hospital_info_change.php",
        data   : {
            hospital_id: $hospital_id,
            current_tab: $current_tab
        },
        success: function (data) {
            $(".content").html(data);
        }


    })

}

$detail_tab.on("click", tab_change);
$review_tab.on("click", tab_change);
$appointment_tab.on("click", tab_change);

$detail_tab.addClass("current");


