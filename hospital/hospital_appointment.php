<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";

if (isset($_POST["member_num"])) $member_num = $_POST["member_num"];
if (isset($_POST["hospital_id"])) $hospital_id = $_POST["hospital_id"];
if (isset($_POST["appointment_date"])) $appointment_date = $_POST["appointment_date"];
if (isset($_POST["appointment_time"])) $appointment_time = $_POST["appointment_time"];
if (isset($_POST["appointment_department"])) $appointment_department = $_POST["appointment_department"];
if (isset($_POST["appointment_detail"])) $appointment_detail = $_POST["appointment_detail"];
$appointment_detail = str_replace("\n", "\\n", $appointment_detail);

$query = "INSERT into `appointment` (member_num, hospital_id, appointment_date, appointment_time
    , appointment_department, appointment_detail, appointment_status, review_no) values (
    $member_num, '$hospital_id', '$appointment_date', '$appointment_time', ' $appointment_department'
    , '$appointment_detail', 'before', 1);";
$result = mysqli_query($con, $query);
mysqli_close($con);
?>

<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/hospital/css/hospital_appointment.css">

<div class="container">
    <div class="container_content">
        <!-- <img src="./img/checked1.png"> -->
        <img src="./img/checked2.png">
        <h2>토닥토닥을 이용해 주셔서 감사합니다.</h2>
        <h1>고객님, <span>진료예약</span>이 <span>완료</span>되었습니다.</h1>
        <p>고객님이 예약하신 번호는 <span>0000</span> 입니다.</p>
        <p>예약정보 확인은 마이페이지/예약조회의<br>"자세히보기"에서 하실 수 있습니다.</p>
        <div class="container_button">
            <button id="container_button1" onclick="location.href = 'http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/index.php';">
                홈으로 가기
            </button>
            <button id="container_button2">자세히 보기</button>
        </div>
    </div>
</div>