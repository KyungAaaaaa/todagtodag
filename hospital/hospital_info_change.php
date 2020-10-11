<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    if (isset($_POST['hospital_id'])) $hospital_id = $_POST['hospital_id'];
    $query = "select * from hospital where id='{$hospital_id}'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['like_status'])) {
        $status = $_POST['like_status'];
        $interest_no = $_POST['interest_no'];
        $member_num = $_POST['member_num'];
        $hospital_id = $_POST['hospital_id'];

        if ($status === "like") {
            $query = "delete from interest where no={$interest_no}";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            ?>
	        <img src='img/unlike.png' value='unlike'>
	        <input type='hidden' id='interest_no' name='interest_no' value=''>
	        <?php
            return;
        } else {
            $query = "insert into interest values (null,$member_num,'$hospital_id')";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));

            $query = "select * from interest where `member_num`='{$member_num}' and `hospital_id`='{$hospital_id}'";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            $num_row = mysqli_num_rows($result);
            if ($num_row !== 0) {
                $row = mysqli_fetch_assoc($result);
                ?>
				<img src='img/like.png' value='like'>
				<input type='hidden' id='interest_no' name='interest_no' value='<?= $row['no'] ?>'>
                <?php
            }
            return;
        }
    }

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
            if (mysqli_num_rows($review_result) !== 0) :
                while ($reviews = mysqli_fetch_assoc($review_result)) :
            ?>
                    <li>
                        <div class="user_info"><img src='img/user.png'>
                            <h4>
                                <?php
                                $query = "select `id` from members where num={$reviews['member_num']}";
                                $member_id = $con->query($query) or die(mysqli_error($con));
                                $member_id = mysqli_fetch_row($member_id);
                                ?>
                                <?= $member_id[0] ?></h4>
                        </div>
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
            else : echo "<li>리뷰가 존재하지 않습니다</li>";
            endif; ?>
</li>
</ul>

</div>
<?php
} else if ($tab === "appointment") {
        ?>
        <?php
        // POST으로 넘겨 받은 year값이 있다면 넘겨 받은걸 year변수에 적용하고 없다면 현재 년도
        $year = isset($_POST['year']) ? $_POST['year'] : date('Y');
        // POST으로 넘겨 받은 month값이 있다면 넘겨 받은걸 month변수에 적용하고 없다면 현재 월
        $month = isset($_POST['month']) ? $_POST['month'] : date('m');

        $date = "$year-$month-01"; // 현재 날짜
        $time = strtotime($date); // 현재 날짜의 타임스탬프
        $start_week = date('w', $time); // 1. 시작 요일
        $total_day = date('t', $time); // 2. 현재 달의 총 날짜
        $total_week = ceil(($total_day + $start_week) / 7);  // 3. 현재 달의 총 주차
        ?>
        <?php echo "$year 년 $month 월" ?>
		<!-- 현재가 1월이라 이전 달이 작년 12월인경우 -->
        <?php if ($month == 1) : ?>
			<!-- 작년 12월 -->
			<button id="hospital_calander1">이전 달</button>
			<script>
                $("#hospital_calander1").click(function () {
                    $.ajax({
                        url    : 'hospital_info_change.php',
                        type   : 'POST',
                        data   : {
                            "hospital_id": "<?= $hospital_id ?>",
                            "current_tab": "appointment",
                            "year"       : <?= $year - 1 ?>,
                            "month"      : 12
                        },
                        success: function (data) {
                            $(".content").html(data);
                        }
                    })
                        .done(function () {
                            console.log("done");
                        })
                        .fail(function () {
                            console.log("error");
                        })
                        .always(function () {
                            console.log("complete");
                        });
                })
			</script>
        <?php else : ?>
			<!-- 이번 년 이전 월 -->
			<button id="hospital_calander2">이전 달</button>
			<script>
                $("#hospital_calander2").click(function () {
                    $.ajax({
                        url    : 'hospital_info_change.php',
                        type   : 'POST',
                        data   : {
                            "hospital_id": "<?= $hospital_id ?>",
                            "current_tab": "appointment",
                            "year"       : <?= $year ?>,
                            "month"      : <?= $month - 1 ?>
                        },
                        success: function (data) {
                            $(".content").html(data);
                        }
                    })
                        .done(function () {
                            console.log("done");
                        })
                        .fail(function () {
                            console.log("error");
                        })
                        .always(function () {
                            console.log("complete");
                        });
                })
			</script>
        <?php endif ?>

		<!-- 현재가 12월이라 다음 달이 내년 1월인경우 -->
        <?php if ($month == 12) : ?>
			<!-- 내년 1월 -->
			<button id="hospital_calander3">다음 달</button>
			<script>
                $("#hospital_calander3").click(function () {
                    $.ajax({
                        url    : 'hospital_info_change.php',
                        type   : 'POST',
                        data   : {
                            "hospital_id": "<?= $hospital_id ?>",
                            "current_tab": "appointment",
                            "year"       : <?= $year + 1 ?>,
                            "month"      : 1
                        },
                        success: function (data) {
                            $(".content").html(data);
                        }
                    })
                        .done(function () {
                            console.log("done");
                        })
                        .fail(function () {
                            console.log("error");
                        })
                        .always(function () {
                            console.log("complete");
                        });
                })
			</script>
        <?php else : ?>
			<!-- 이번 년 다음 월 -->
			<button id="hospital_calander3">다음 달</button>
			<script>
                $("#hospital_calander3").click(function () {
                    $.ajax({
                        url    : 'hospital_info_change.php',
                        type   : 'POST',
                        data   : {
                            "hospital_id": "<?= $hospital_id ?>",
                            "current_tab": "appointment",
                            "year"       : <?= $year ?>,
                            "month"      : <?= $month + 1 ?>
                        },
                        success: function (data) {
                            $(".content").html(data);
                        }
                    })
                        .done(function () {
                            console.log("done");
                        })
                        .fail(function () {
                            console.log("error");
                        })
                        .always(function () {
                            console.log("complete");
                        });
                })
			</script>
        <?php endif ?>

		<table border="1">
			<tr>
				<th>일</th>
				<th>월</th>
				<th>화</th>
				<th>수</th>
				<th>목</th>
				<th>금</th>
				<th>토</th>
			</tr>

			<!-- 총 주차를 반복합니다. -->
            <?php for ($n = 1, $i = 0; $i < $total_week; $i++) : ?>
				<tr>
					<!-- 1일부터 7일 (한 주) -->
                    <?php for ($k = 0; $k < 7; $k++) : ?>
						<td>
							<!-- 시작 요일부터 마지막 날짜까지만 날짜를 보여주도록 -->
                            <?php if (($n > 1 || $k >= $start_week) && ($total_day >= $n)) : ?>
								<!-- 현재 날짜를 보여주고 1씩 더해줌 -->
                                <?php echo $n++ ?>
                            <?php endif ?>
						</td>
                    <?php endfor; ?>
				</tr>
            <?php endfor; ?>
		</table>
        <?php
    }
?>