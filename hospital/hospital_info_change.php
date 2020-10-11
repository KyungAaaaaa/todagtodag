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
                        center: new kakao.maps.LatLng(<?= $row['mapy'] . "," . $row['mapx'] ?>), //지도의 중심좌표.
                        level: 1 //지도의 레벨(확대, 축소 정도)
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
                    var markerPosition = new kakao.maps.LatLng(<?= $row['mapy'] . "," . $row['mapx'] ?>);

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
            $query = "SELECT * from review where hospital_id='{$hospital_id}'";
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
                        while ($i < 5) {
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
    <div class="hospital_appointment">
        <div class="hospital_calander">
            <div class="subject"><img src="./img/clock.png">예약가능날짜</div>
            <div class="hospital_calander_head">
                <div class="hospital_calander_year_month">
                    <span><?php echo "$year 년 $month 월" ?></span>
                </div>
                <div class="hospital_calander_button">
                    <!-- 현재가 1월이라 이전 달이 작년 12월인경우 -->
                    <?php if ($month == 1) : ?>
                        <!-- 작년 12월 -->
                        <button id="hospital_calander1">&nbsp;▼&nbsp;</button>
                        <script>
                            $("#hospital_calander1").click(function() {
                                $.ajax({
                                        url: 'hospital_info_change.php',
                                        type: 'POST',
                                        data: {
                                            "hospital_id": "<?= $hospital_id ?>",
                                            "current_tab": "appointment",
                                            "year": <?= $year - 1 ?>,
                                            "month": 12
                                        },
                                        success: function(data) {
                                            $(".content").html(data);
                                        }
                                    })
                                    .done(function() {
                                        console.log("done");
                                    })
                                    .fail(function() {
                                        console.log("error");
                                    })
                                    .always(function() {
                                        console.log("complete");
                                    });
                            })
                        </script>
                    <?php else : ?>
                        <!-- 이번 년 이전 월 -->
                        <button id="hospital_calander2">&nbsp;▼&nbsp;</button>
                        <script>
                            $("#hospital_calander2").click(function() {
                                $.ajax({
                                        url: 'hospital_info_change.php',
                                        type: 'POST',
                                        data: {
                                            "hospital_id": "<?= $hospital_id ?>",
                                            "current_tab": "appointment",
                                            "year": <?= $year ?>,
                                            "month": <?= $month - 1 ?>
                                        },
                                        success: function(data) {
                                            $(".content").html(data);
                                        }
                                    })
                                    .done(function() {
                                        console.log("done");
                                    })
                                    .fail(function() {
                                        console.log("error");
                                    })
                                    .always(function() {
                                        console.log("complete");
                                    });
                            })
                        </script>
                    <?php endif ?>

                    <!-- 현재가 12월이라 다음 달이 내년 1월인경우 -->
                    <?php if ($month == 12) : ?>
                        <!-- 내년 1월 -->
                        <button id="hospital_calander3">&nbsp;▲&nbsp;</button>
                        <script>
                            $("#hospital_calander3").click(function() {
                                $.ajax({
                                        url: 'hospital_info_change.php',
                                        type: 'POST',
                                        data: {
                                            "hospital_id": "<?= $hospital_id ?>",
                                            "current_tab": "appointment",
                                            "year": <?= $year + 1 ?>,
                                            "month": 1
                                        },
                                        success: function(data) {
                                            $(".content").html(data);
                                        }
                                    })
                                    .done(function() {
                                        console.log("done");
                                    })
                                    .fail(function() {
                                        console.log("error");
                                    })
                                    .always(function() {
                                        console.log("complete");
                                    });
                            })
                        </script>
                    <?php else : ?>
                        <!-- 이번 년 다음 월 -->
                        <button id="hospital_calander3">&nbsp;▲&nbsp;</button>
                        <script>
                            $("#hospital_calander3").click(function() {
                                $.ajax({
                                        url: 'hospital_info_change.php',
                                        type: 'POST',
                                        data: {
                                            "hospital_id": "<?= $hospital_id ?>",
                                            "current_tab": "appointment",
                                            "year": <?= $year ?>,
                                            "month": <?= $month + 1 ?>
                                        },
                                        success: function(data) {
                                            $(".content").html(data);
                                        }
                                    })
                                    .done(function() {
                                        console.log("done");
                                    })
                                    .fail(function() {
                                        console.log("error");
                                    })
                                    .always(function() {
                                        console.log("complete");
                                    });
                            })
                        </script>
                    <?php endif ?>
                </div>
            </div>
            <div class="hospital_calander_body">
                <table>
                    <tr>
                        <td>일</td>
                        <td>월</td>
                        <td>화</td>
                        <td>수</td>
                        <td>목</td>
                        <td>금</td>
                        <td>토</td>
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
                                        <span id="hospital_calander_day<?php echo $n ?>"><?php echo $n++ ?></span>
                                        <script>
                                            // 1일을 눌렀을때 클릭이벤트 (1일만 이벤트발생 안해서 넣어줌)
                                            $("#hospital_calander_day1").click(function() {
                                                <?php
                                                //클릭한 날짜의 데이터를 요일로 바꾼다.
                                                $current_date = "$year-$month-01";
                                                $current_time = strtotime($current_date);
                                                $current_week = date('w', $current_time);
                                                switch ($current_week) {
                                                    case '0':
                                                        $current_week = "sun";
                                                        break;
                                                    case '1':
                                                        $current_week = "mon";
                                                        break;
                                                    case '2':
                                                        $current_week = "tue";
                                                        break;
                                                    case '3':
                                                        $current_week = "wed";
                                                        break;
                                                    case '4':
                                                        $current_week = "thu";
                                                        break;
                                                    case '5':
                                                        $current_week = "fri";
                                                        break;
                                                    case '6':
                                                        $current_week = "sat";
                                                        break;
                                                    default:
                                                        break;
                                                }
                                                ?>
                                                console.log("<?php echo "{$year}{$month}01{$current_week}" ?>");
                                                <?php
                                                $query = "SELECT {$current_week} from hospital where id='{$hospital_id}'";
                                                $result = mysqli_query($con, $query);
                                                $row = mysqli_fetch_array($result);
                                                $operating_time = $row["{$current_week}"];
                                                ?>
                                                console.log("<?php echo "{$operating_time}" ?>");
                                                $.ajax({
                                                        url: 'hospital_info_change.php',
                                                        type: 'POST',
                                                        data: {
                                                            "hospital_id": "<?= $hospital_id ?>",
                                                            "current_tab": "appointment",
                                                            "calander_data": "<?php echo "{$year}{$month}01" ?>",
                                                            "operating_time": "<?= $operating_time ?>",
                                                        },
                                                        success: function(data) {
                                                            $(".content").html(data);
                                                        }
                                                    })
                                                    .done(function() {
                                                        console.log("done");
                                                    })
                                                    .fail(function() {
                                                        console.log("error");
                                                    })
                                                    .always(function() {
                                                        console.log("complete");
                                                    });
                                            })

                                            // 1일을 제외한 나머지 클릭이벤트
                                            $("#hospital_calander_day<?php echo $n ?>").click(function() {
                                                //한자리수 데이터에 0을 붙인다. 나머지는 두글자로 입력
                                                if (<?php echo $n ?> < 10) {
                                                    <?php
                                                    //클릭한 날짜의 데이터를 요일로 바꾼다.
                                                    $current_date = "$year-$month-0$n";
                                                    $current_time = strtotime($current_date);
                                                    $current_week = date('w', $current_time);
                                                    switch ($current_week) {
                                                        case '0':
                                                            $current_week = "sun";
                                                            break;
                                                        case '1':
                                                            $current_week = "mon";
                                                            break;
                                                        case '2':
                                                            $current_week = "tue";
                                                            break;
                                                        case '3':
                                                            $current_week = "wed";
                                                            break;
                                                        case '4':
                                                            $current_week = "thu";
                                                            break;
                                                        case '5':
                                                            $current_week = "fri";
                                                            break;
                                                        case '6':
                                                            $current_week = "sat";
                                                            break;
                                                        default:
                                                            break;
                                                    }
                                                    ?>
                                                    console.log("<?php echo "{$year}{$month}0{$n}{$current_week}" ?>");
                                                    <?php
                                                    $query = "SELECT {$current_week} from hospital where id='{$hospital_id}'";
                                                    $result = mysqli_query($con, $query);
                                                    $row = mysqli_fetch_array($result);
                                                    $operating_time = $row["{$current_week}"];
                                                    ?>
                                                    console.log("<?php echo "{$operating_time}" ?>");
                                                    $.ajax({
                                                            url: 'hospital_info_change.php',
                                                            type: 'POST',
                                                            data: {
                                                                "hospital_id": "<?= $hospital_id ?>",
                                                                "current_tab": "appointment",
                                                                "calander_data": "<?php echo "{$year}{$month}0{$n}" ?>",
                                                                "operating_time": "<?= $operating_time ?>",
                                                            },
                                                            success: function(data) {
                                                                $(".content").html(data);
                                                            }
                                                        })
                                                        .done(function() {
                                                            console.log("done");
                                                        })
                                                        .fail(function() {
                                                            console.log("error");
                                                        })
                                                        .always(function() {
                                                            console.log("complete");
                                                        });
                                                } else {
                                                    //클릭한 날짜의 데이터를 요일로 바꾼다.
                                                    <?php
                                                    $current_date = "$year-$month-$n";
                                                    $current_time = strtotime($current_date);
                                                    $current_week = date('w', $current_time);
                                                    switch ($current_week) {
                                                        case '0':
                                                            $current_week = "sun";
                                                            break;
                                                        case '1':
                                                            $current_week = "mon";
                                                            break;
                                                        case '2':
                                                            $current_week = "tue";
                                                            break;
                                                        case '3':
                                                            $current_week = "wed";
                                                            break;
                                                        case '4':
                                                            $current_week = "thu";
                                                            break;
                                                        case '5':
                                                            $current_week = "fri";
                                                            break;
                                                        case '6':
                                                            $current_week = "sat";
                                                            break;
                                                        default:
                                                            break;
                                                    }
                                                    ?>
                                                    console.log("<?php echo "{$year}{$month}{$n}{$current_week}" ?>");
                                                    <?php
                                                    $query = "SELECT {$current_week} from hospital where id='{$hospital_id}'";
                                                    $result = mysqli_query($con, $query);
                                                    $row = mysqli_fetch_array($result);
                                                    $operating_time = $row["{$current_week}"];
                                                    ?>
                                                    console.log("<?php echo "{$operating_time}" ?>");
                                                    $.ajax({
                                                            url: 'hospital_info_change.php',
                                                            type: 'POST',
                                                            data: {
                                                                "hospital_id": "<?= $hospital_id ?>",
                                                                "current_tab": "appointment",
                                                                "calander_data": "<?php echo "{$year}{$month}{$n}" ?>",
                                                                "operating_time": "<?= $operating_time ?>",
                                                            },
                                                            success: function(data) {
                                                                $(".content").html(data);
                                                            }
                                                        })
                                                        .done(function() {
                                                            console.log("done");
                                                        })
                                                        .fail(function() {
                                                            console.log("error");
                                                        })
                                                        .always(function() {
                                                            console.log("complete");
                                                        });
                                                }
                                            })
                                        </script>
                                    <?php endif ?>
                                </td>
                            <?php endfor; ?>
                        </tr>
                    <?php endfor; ?>
                </table>
            </div>
            <?php
            if (!isset($_POST["calander_data"])) {
                $_POST["calander_data"] = "";
            }
            ?>
            <p>예약선택일 : </p>
            <input type="text" id="calander_data" value="<?= $_POST["calander_data"] ?>">
        </div>
        <div class="hospital_reservation_time">
            <div class="subject">&nbsp;<img src="./img/clock.png">예약가능시간</div>
            <select size="10">
                <option value="" disabled>--------시간을 선택하세요---------</option>
                <?php
                if (!isset($_POST["operating_time"])) {
                    $_POST["operating_time"] = "";
                }
                $e_operating_time = explode("-", $_POST["operating_time"]);
                $e_operating_time0 = ceil($e_operating_time[0] / 100);
                $e_operating_time1 = floor($e_operating_time[1] / 100);
                for ($i = $e_operating_time0; $i <= $e_operating_time1; $i++) {
                    if ($i < 10) {
                ?>
                        <option value="" id="option<?php echo "{$i}" ?>"><?php echo "0{$i}:00" ?></option>
                        <script>
                            $("#option<?php echo "{$i}" ?>").click(function() {
                                $("#calander_data2").val("<?php echo "0{$i}" ?>");
                            })
                        </script>
                    <?php
                    } else {
                    ?>
                        <option value="" id="option<?php echo "{$i}" ?>"><?php echo "{$i}:00" ?></option>
                        <script>
                            $("#option<?php echo "{$i}" ?>").click(function() {
                                $("#calander_data2").val("<?php echo "{$i}" ?>");
                            })
                        </script>
                <?php
                    }
                }
                ?>
            </select>
            <p>예약선택시간 : </p>
            <input type="text" id="calander_data2">
        </div>
        <div class="hospital_reservation_department">
            <div class="subject">&nbsp;<img src="./img/description.png">진료과목</div>
            <select size="10">
                <option value="" disabled>--------과목을 선택하세요--------------</option>
                <?php
                $query = "SELECT `department` from hospital where id='{$hospital_id}'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_array($result);

                $hospital_department = explode(",", $row["department"]);
                for ($i = 0; $i < count($hospital_department); $i++) {
                ?>
                    <option value="" id="option<?php echo "{$i}" ?>"><?php echo "{$hospital_department[$i]}" ?></option>
                    <script>
                        $("#option<?php echo "{$i}" ?>").click(function() {
                            $("#calander_data3").val("<?php echo "{$hospital_department[$i]}" ?>");
                        })
                    </script>
                <?php
                }
                ?>
            </select>
            <p>선택과목 : </p>
            <input type="text" id="calander_data3">
        </div>
    </div>

<?php
}
?>