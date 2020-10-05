<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    if (isset($_POST['hospital_id'])) $hospital_id = $_POST['hospital_id'];
    $query = "select * from hospital where id='{$hospital_id}'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['current_tab'])) $tab = $_POST['current_tab'];
    else $tab = "detail";

    if ($tab === "detail") {
        echo "<div class='hospital_detail'>
            <div class='hospital_operating_ours'>
            <div class='subject'><img src='img/clock.png'>운영시간</div>
            <ul>
            <li> 월요일 {$row['mon']} </li>
            <li> 화요일 {$row['tue']}</li>
            <li> 수요일 {$row['wed']}</li>
            <li> 목요일 {$row['thu']}</li>
            <li> 금요일 {$row['fri']}</li>
            <li> 토요일 {$row['sat']}</li>
            <li> 일요일 {$row['sun']}</li>
            <li> 공휴일 {$row['holiday']}</li>
            </ul
            </div>
            <div class='hospital_tel'>
            <div class='subject'><img src='img/call.png'>전화번호</div>
            <span>{$row['tel']}</span>
            </div>
            <div class='hospital_department'>
            <div class='subject'><img src='img/description.png'>진료과목</div>
            ";

        $department = explode(',', $row['department']);
        for ($i = 0; $i < sizeof($department); $i++) {
            echo '<span>' . $department[$i] . '</span><br>';
        }
        echo "
            </div>
            <div class='hospital_map'>
            <div class='subject'><img src='img/cursor.png'>상세 위치</div>
            {$row['map_description']}
            <div id='map'>
            
            <script>
                const container = document.getElementById('map'); //지도를 담을 영역의 DOM 레퍼런스
                const options = { //지도를 생성할 때 필요한 기본 옵션
                        center: new kakao.maps.LatLng(" . $row['mapy'] . "," . $row['mapx'] . "), //지도의 중심좌표.
                        level : 1 //지도의 레벨(확대, 축소 정도)
                    };
    
                const map = new kakao.maps.Map(container, options); //지도 생성 및 객체 리턴
            
                 // 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
                 var mapTypeControl = new kakao.maps.MapTypeControl();
                
                 // 지도에 컨트롤을 추가해야 지도위에 표시됩니다
                 // kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
                 map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);
                
                 // 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
                 var zoomControl = new kakao.maps.ZoomControl();
                 map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);
            
            
                // 마커가 표시될 위치입니다
                var markerPosition = new kakao.maps.LatLng(" . $row['mapy'] . "," . $row['mapx'] . ");
            
                // 마커를 생성합니다
                var marker = new kakao.maps.Marker({
                    position: markerPosition
                });
            
                // 마커가 지도 위에 표시되도록 설정합니다
                marker.setMap(map);
            </script>
            </div>
                    </div>
                    </div> ";
    } else if ($tab === "review") {
        echo "리뷰테이블 설계하기전!";
    } else if ($tab === "appointment") {
        echo "예약테이블 설계하기전!";
    }
?>