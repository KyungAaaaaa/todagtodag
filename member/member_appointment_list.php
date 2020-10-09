<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    $period_mode = "all";
    if (isset($_POST['period_mode'])) $period_mode = $_POST['period_mode'];
    if ($period_mode === "select_date") {
        if (!empty($_POST['date_1']) && !empty($_POST['date_2'])) {
            $date1 = $_POST['date_1'];
            $date2 = $_POST['date_2'];
        } else {
            alert_back("조회하실 날짜를 선택해주세요");
        }

//    if ( $period_mode==="a") $query = "select * from appointment where date between {$date_1} and {$date_2};";
        $query = "select * from hospital where id='A';";
    } elseif ($period_mode === "all") $query = "select * from hospital limit 5;"; //임시
    $result = $con->query($query);
    if (mysqli_num_rows($result) !== 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $file_name = $row['file_name_0'];
            $file_copied = $row['file_copied_0'];
            $file_type = $row['file_type_0'];
            $root="http://".$_SERVER['HTTP_HOST']."/todagtodag";
            ?>
			<li><span>
                	<?php
                        if (strpos($file_type, "image") !== false) echo "<img src='{$root}/admin/data/$file_copied'>";
                        else echo "<img src='{$root}/img/todagtodag3.png'>" ?>
                <a href='#'><h3><?= $row['name'] ?></h3><p>진료일 : 2020.09.20</p>
	                <input type='hidden' class="userid" value='<?=$userid?>'>
	                <input type='hidden' class="hospital_id" value='<?=$row['id']?>'>
	                <button class="review_write">리뷰 작성</button>
                <?
                    //                    if ($row['리뷰id'] === null) {
                    //이용완료 - 리뷰가 있을때
                    //이용완료 - 리뷰가 없을때
                    // 예약취소
                    if ("상태" === "이용완료") {
                        ?>
		                <p>이용이 완료 되었습니다.</p>
                        <?php
                        if ("리뷰아이디" === null) { ?>
			                <p>이용이 완료 되었습니다.</p>
			                <a href='#'><button class="review_write">리뷰 작성</button></a>
                            <?
                        } else {
                            //리뷰관리페이지 이동 -
                            echo "<a href='#'><button>작성한 리뷰 보기</button></a>";
                        };
                    } elseif ("상태" === "이용전") { ?>
		                <!--	     위치 바꿔주기 -->
		                <a href='#'><button>예약 취소</button></a>
		                <a href='#'><button>자세히 보기</button></a>
                        <?php
                    } elseif ("상태" === "예약취소") {
                        ?>
		                <p>예약 취소</p>
                        <?
                    }

                ?>
				</a></span>
			</li>

            <?php
        }


    } else
        echo "<li>해당 기간에 예약기록이 없습니다.</li>";
?>