<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    if (isset($_POST['hospital_id'])) $hospital_id = $_POST['hospital_id'];
    $query = "select * from hospital where id='{$hospital_id}'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['current_tab'])) $tab = $_POST['current_tab'];
    else $tab = "detail";

    if ($tab === "detail") {
        ?>
		<div class='hospital_detail'>
			<div class='hospital_operating_ours'>
				<div class='subject'><img src='img/clock.png'>운영시간</div>
				<table>
					<tr>
						<th>월요일</th>
						<th>화요일</th>
						<th>수요일</th>
						<th>목요일</th>
						<th>금요일</th>
					</tr>
					<tr>
						<td><?= $row['mon'] ?></td>
						<td><?= $row['tue'] ?></td>
						<td><?= $row['wed'] ?></td>
						<td><?= $row['thu'] ?></td>
						<td><?= $row['fri'] ?></td>
					</tr>
				</table>
				<table>
					<tr>
						<th>토요일</th>
						<th>일요일</th>
						<th>공휴일</th>
					</tr>
					<tr>
						<td><?= $row['sat'] ?></td>
						<td><?= $row['sun'] ?></td>
						<td><?= $row['holiday'] ?></td>
					</tr>
				</table>
			</div>
			<div class='hospital_tel'>
				<div class='subject'><img src='img/call.png'>전화번호</div>
				<span><?= $row['tel'] ?></span>
			</div>
			<div class='hospital_department'>
				<div class='subject'><img src='img/description.png'>진료과목</div>
                <?php

                    $department = explode(',', $row['department']);
                    for ($i = 0; $i < sizeof($department); $i++) {
                        echo '<span>' . $department[$i] . '</span><br>';
                    }
                ?>
			</div>
			<div class='hospital_map'>
				<div class='subject'><img src='img/cursor.png'>상세 위치</div>
                <?= $row['map_description'] ?>
				<div id='map'>

					<script>
                        const container = document.getElementById('map'); //지도를 담을 영역의 DOM 레퍼런스
                        const options = { //지도를 생성할 때 필요한 기본 옵션
                            center: new kakao.maps.LatLng(<?=$row['mapy'] . "," . $row['mapx']?>), //지도의 중심좌표.
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
                        var markerPosition = new kakao.maps.LatLng(<?=$row['mapy'] . "," . $row['mapx']?>);

                        // 마커를 생성합니다
                        var marker = new kakao.maps.Marker({
                            position: markerPosition
                        });

                        // 마커가 지도 위에 표시되도록 설정합니다
                        marker.setMap(map);
					</script>
				</div>
			</div>
		</div>
        <?php
    } else if ($tab === "review") {
        ?>
		<div class='hospital_review'>
		<ul>
        <?php
        $query = "select * from review where hospital_id='{$hospital_id}'";
        $review_result = $con->query($query) or die(mysqli_error($con));
        if (mysqli_num_rows($review_result)!==0):
        while ($reviews = mysqli_fetch_assoc($review_result)) :
            ?>
			<li>
				<div class="user_info"><img src='img/user.png'><h4>
                    <?php
                        $query = "select `id` from members where num={$reviews['member_num']}";
                        $member_id = $con->query($query) or die(mysqli_error($con));
                        $member_id = mysqli_fetch_row($member_id);
                        ?>
                       <?=$member_id[0]?></h4></div>
				<?php
                        $i = 0;
                        echo "<div class='review_content'><p>";
                        while ($i < $reviews['star_rating']) {
                            echo "<img src='img/star.png'>";
                            $i++;
                        }
                        while ($i <5) {
                            echo "<img src='img/empty_star.png'>";
                            $i++;
                        }
                        echo "</p>";
                    ?>

					<p><?= $reviews['content'] ?></p>
					<p class="regist_day"><?= $reviews['regist_day'] ?></p>
			</div>

        <?php endwhile;
        else: echo "<li>리뷰가 존재하지 않습니다</li>";
        endif;?>
		</li>
		</ul>

		</div>
        <?php
    } else if ($tab === "appointment") {
        echo "예약테이블 설계하기전!";
    }
?>