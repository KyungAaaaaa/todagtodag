function askLocation() {
    navigator.geolocation.getCurrentPosition(handleGeoSuccess, handleGeoError);
}

function handleGeoError() {

}

function handleGeoSuccess(position) {
    const $lat = position.coords.latitude;
    const $lng = position.coords.longitude;
    load_location_name($lat, $lng);
}


askLocation();


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function load_location_name(y, x) {
// 주소-좌표 변환 객체를 생성합니다
    var geocoder = new kakao.maps.services.Geocoder();
// 현재 지도 중심좌표로 주소를 검색해서 지도 좌측 상단에 표시합니다
    searchAddrFromCoords(x, y, displayCenterInfo);

    searchDetailAddrFromCoords(x, y, function (result, status) {
            if (status === kakao.maps.services.Status.OK) {
                var detailAddr = '<div>' + result[0].address.region_1depth_name + '시 ' + result[0].address.region_2depth_name + ' ' + result[0].address.region_3depth_name + '</div>';
                console.dir(result[0]);

                let $location_text = $(".location").find("span");
                $location_text.append($(`${detailAddr}`));

            }
        }
    )
    ;

    function searchAddrFromCoords(x, y, callback) {
        // 좌표로 행정동 주소 정보를 요청합니다
        geocoder.coord2RegionCode(x, y, callback);
    }

    function searchDetailAddrFromCoords(x, y, callback) {
        // 좌표로 법정동 상세 주소 정보를 요청합니다
        geocoder.coord2Address(x, y, callback);
    }

// 지도 좌측상단에 지도 중심좌표에 대한 주소정보를 표출하는 함수입니다
    function displayCenterInfo(result, status) {
        if (status === kakao.maps.services.Status.OK) {
            var infoDiv = $(".location").find("span");

            for (var i = 0; i < result.length; i++) {
                // 행정동의 region_type 값은 'H' 이므로
                if (result[i].region_type === 'H') {
                    infoDiv.innerHTML = result[i].address_name;
                    break;
                }
            }
        }
    }
}