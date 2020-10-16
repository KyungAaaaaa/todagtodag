<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    if (isset($_POST['mode'])) $mode = $_POST['mode'];
    if (isset($_POST['appointment_num'])) $appointment_num = $_POST['appointment_num'];

    if ($mode === "detail") {
//        $query = "select h.name as hospital_name,addr,tel,a.name as member_name,num,appointment_date,appointment_time from hospital h inner join
//					(select a.num,name,DATE_FORMAT(STR_TO_DATE(appointment_date, '%Y%m%d'),'%Y-%m-%d ') as appointment_date,appointment_time,hospital_id
//					from appointment a inner join members m on a.member_num=m.num) a on h.id=a.hospital_id where num={$appointment_num}";

        $query = "select h.name as hospital_name,addr,tel,a.name as member_name,num,appointment_date,appointment_time from hospital h inner join 
					(select a.num,name,appointment_date,appointment_time,hospital_id 
					from appointment a inner join members m on a.member_num=m.num) a on h.id=a.hospital_id where num={$appointment_num}";

        
        $result = $con->query($query) or die(mysqli_error($con));
        if (mysqli_num_rows($result) !== 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
			<div id="appointment_detail">
				<div><h4>예약 상세조회</h4></div>
				<div><h2>◎ 예약정보</h2></div>
				<table>
					<tr>
						<th>예약자</th>
						<td><?= $row['member_name'] ?></td>
					</tr>
					<tr>
						<th>예약번호</th>
						<td><?= $row['num'] ?></td>
					</tr>
					<tr>
						<th>진료일</th>
						<td><?= $row['appointment_date'] ?> / <?= $row['appointment_time'] ?>시</td>
					</tr>
					<tr>
						<th>병원명</th>
						<td><?= $row['hospital_name'] ?></td>
					</tr>
					<tr>
						<th>전화번호</th>
						<td><?= $row['tel'] ?></td>
					</tr>
					<tr>
						<th>병원주소</th>
						<td><?= $row['addr'] ?></td>
					</tr>
				</table>
				<div><h2>◎ 유의사항</h2></div>
				<ul>
					<li>예약 취소는 진료시간 2시간 전까지 가능합니다.</li>
					<li>예매취소시점과 해당 카드사의 환불 처리기준에 따라 취소금액의 환급방법과 환급일은 다소 차이가 있을 수 있습니다.
					</li>
					<li>예매 취소 시 최초 결제 동일카드로 예매 시점에 따라 취소 수수료와 배송료를 재승인합니다. 신한카드 포인트로 결제하신 경우, 포인트(5천포인트이상시)에서 먼저 재승인을
						하고,
						차액만
						카드에서 승인합니다.
					</li>
				</ul>
			</div>
            <?php
        } else {
            echo "실행앙ㄴ됌";
        }


    } elseif ($mode === "cancel") {
        $query = "update appointment set `appointment_status`='cancel' where num={$appointment_num}";
        $result = $con->query($query) or die(mysqli_error($con));
        echo "success";
    }
?>