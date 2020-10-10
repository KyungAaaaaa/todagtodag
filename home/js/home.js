function askLocation() {
    navigator.geolocation.getCurrentPosition(handleGeoSuccess, function () {
        console.log("위치 정보 받아오기 실패")
    });
}

//위치정보를 받아오기 성공하면 실행할 함수
function handleGeoSuccess(position) {
    const $lat = position.coords.latitude;
    const $lng = position.coords.longitude;
    load_location_name($lat, $lng);
}


askLocation();


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//현재 내 위치의 지역명 가져오기
function load_location_name(y, x) {

    // 주소-좌표 변환 객체를 생성
    const $geocoder = new kakao.maps.services.Geocoder();

    function searchDetailAddrFromCoords(x, y, callback) {
        // 좌표로 법정동 상세 주소 정보를 요청합니다
        $geocoder.coord2Address(x, y, callback);
    }

    // 현재 지도 좌표로 주소를 검색해서 출력
    searchDetailAddrFromCoords(x, y, function (result, status) {
            if (status === kakao.maps.services.Status.OK) {
                const $detailAddr = '<p>' + result[0].address.region_1depth_name + '시 ' + result[0].address.region_2depth_name + ' ' + result[0].address.region_3depth_name + '</p>';
                $(".location").children("span").append($(`${$detailAddr}`));
            }

            $.ajax({
                url    : "home/home_current_location.php",
                type   : "POST",
                data   : {
                    addr_1: result[0].address.region_1depth_name,
                    addr_2:result[0].address.region_2depth_name,
                    addr_3:result[0].address.region_3depth_name,
                },
                success: function (data) {
                    $(".location").children("div").children("div").append(data)
                }
            })
        }
    )


}