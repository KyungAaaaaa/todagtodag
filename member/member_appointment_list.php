<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    $period_mode = "all";
    if (isset($_POST['period_mode'])) $period_mode = $_POST['period_mode'];
    if (isset($_POST['member_num'])) $member_num = $_POST['member_num'];

    //기간을 선택해서 조회할때
    if ($period_mode === "select_date") {
        if (!empty($_POST['date_1']) && !empty($_POST['date_2'])) {
            $date1 = $_POST['date_1'];
            $date2 = $_POST['date_2'];


            $query = "select num,appointment_date as `date`,file_name_0,file_copied_0,file_type_0,name,id,
		            appointment_time,appointment_department,appointment_detail,appointment_status,review_no from appointment a left join hospital h on a.hospital_id=h.id 
					where (appointment_date between date(DATE_FORMAT('{$date1}','%Y%m%d')) and date(DATE_FORMAT('{$date2}','%Y%m%d'))) and a.member_num={$member_num} order by `date` desc;";

            $result = $con->query($query) or die(mysqli_error($con));
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
                            ?>
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
                echo "<li>예약기록이 없습니다.</li>";


        } else {
            echo "<li>조회할 날짜를 선택하세요.</li>";
            return;
        }

    } elseif ($period_mode === "all") {
        $query = "select num,appointment_date as `date`,file_name_0,file_copied_0,file_type_0,name,id,
       appointment_time,appointment_department,appointment_detail,appointment_status,review_no from appointment a left join hospital h on a.hospital_id=h.id where a.member_num={$member_num} order by `date` desc;";
        $result = $con->query($query);
        if (mysqli_num_rows($result) !== 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $file_name = $row['file_name_0'];
                $file_copied = $row['file_copied_0'];
                $file_type = $row['file_type_0'];
                $root = "http://" . $_SERVER['HTTP_HOST'] . "/todagtodag";
                ?>
				<li>
					<span>
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
                                            ?>
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
            echo "<li>예약기록이 없습니다.</li>";
    }

?>