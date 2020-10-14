<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    $period_mode = "all";
    if (isset($_POST['period_mode'])) $period_mode = $_POST['period_mode'];

    //기간을 선택해서 조회할때
    if ($period_mode === "select_date") {
        if (!empty($_POST['date_1']) && !empty($_POST['date_2'])) {
            $date1 = $_POST['date_1'];
            $date2 = $_POST['date_2'];
            echo "<li>{$date1}</li>";
            echo "<li>{$date2}</li>";
        } else {
            echo "<li>조회할 날짜를 선택하세요.</li>";
            return;
        }

//    if ( $period_mode==="a") $query = "select * from appointment where date between {$date_1} and {$date_2};";
        $query = "select * from hospital where id='A';";
    } elseif ($period_mode === "all") $query = "select num,DATE_FORMAT(STR_TO_DATE(appointment_date, '%Y%m%d'),'%Y-%m-%d') as `date`,file_name_0,file_copied_0,file_type_0,name,id,
       appointment_time,appointment_department,appointment_detail,appointment_status,review_no from appointment a left join hospital h on a.hospital_id=h.id order by `date` desc;";
    $result = $con->query($query);
    if (mysqli_num_rows($result) !== 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $file_name = $row['file_name_0'];
            $file_copied = $row['file_copied_0'];
            $file_type = $row['file_type_0'];
            $root = "http://" . $_SERVER['HTTP_HOST'] . "/todagtodag";
            ?>
			<li><span>
                	<?php
                        if (strpos($file_type, "image") !== false) echo "<img src='{$root}/admin/data/$file_copied'>";
                        else echo "<img src='{$root}/img/todagtodag_logo.png'>" ?>
                <a href='#'><h3><?= $row['name'] ?></h3><p>진료일 : <?= $row['date'] ?></p>
			<input type='hidden' class="hospital_id" value='<?= $row['id'] ?>'>
			<input type='hidden' class="appointment_num" value='<?= $row['num'] ?>'>
                <?
                    if ($row['appointment_status'] === 'success') {
                        ?>
		                <p>이용이 완료 되었습니다.</p>
                        <?php
                        if ($row['review_no'] === null) { ?>
			                <button class="review_write">리뷰 작성</button>
                            <?
                        } else {
//                            $query = "select * from appointment a inner join review r on a.review_no=r.no;";
//                            $review_result = $con->query($query);
//                            if (mysqli_num_rows($review_result) !== 0) {
//                                $review_row = mysqli_fetch_assoc($review_result);
//                                ?>
<!--				                <input type='hidden' class="review_star" value='--><?//= $review_row['star_rating'] ?><!--'>-->
<!--				                <input type='hidden' class="review_kindness" value='--><?//= $review_row['kindness'] ?><!--'>-->
<!--				                <input type='hidden' class="review_wait_time" value='--><?//= $review_row['wait_time'] ?><!--'>-->
<!--				                <input type='hidden' class="review_expense" value='--><?//= $review_row['expense'] ?><!--'>-->
<!--				                <input type='hidden' class="review_comment" value='--><?//= $review_row['comment'] ?><!--'>-->
				                <input type='hidden' class="review_no" value='<?= $row['review_no'] ?>'>
				                <button class='review_detail'>작성한 리뷰 보기</button><?
                        }
                    } elseif ($row['appointment_status'] === 'before') { ?>
		                <button class="cancel">예약 취소</button>
		                <button class="detail">자세히 보기</button>
                        <?php
                    } elseif ($row['appointment_status'] === 'cancel') {
                        ?>
		                <p>예약 취소</p>
                        <?
                    }

                ?></a>
		</span>
			</li>

        <?php }
    } else
        echo "<li>해당 기간에 예약기록이 없습니다.</li>";
?>