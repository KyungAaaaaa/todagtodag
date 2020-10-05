

function askLocation() {
    navigator.geolocation.getCurrentPosition(handleGeoSuccess, handleGeoError);
}

function handleGeoError() {

}

function handleGeoSuccess(position) {
    const $lat = position.coords.latitude;
    const $lng = position.coords.longitude;
    const locationObj = {
        $lat, $lng
    }
    let $location_text = $(".location").find("span");
    $location_text.append($(`<p>${$lat} / ${$lng}</p>`));

}


askLocation();


