<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/hospital/hospital_create_procedure.php";

if (isset($_POST["member_num"])) $member_num = $_POST["member_num"];
if (isset($_POST["hospital_id"])) $hospital_id = $_POST["hospital_id"];
if (isset($_POST["appointment_date"])) $appointment_date = $_POST["appointment_date"];
if (isset($_POST["appointment_time"])) $appointment_time = $_POST["appointment_time"];
if (isset($_POST["appointment_department"])) $appointment_department = $_POST["appointment_department"];
if (isset($_POST["appointment_detail"])) $appointment_detail = $_POST["appointment_detail"];
$appointment_detail = str_replace("\n", "\\n", $appointment_detail);

// PK 초기값 세팅
$query = "alter table appointment auto_increment = 1223;";
$result = mysqli_query($con, $query);

// 이벤트 스케쥴러 on
$query = "set global event_scheduler = on;";
$result = mysqli_query($con, $query);

// 진료/예약 데이터 넣기
$query = "INSERT into `appointment` (member_num, hospital_id, appointment_date, appointment_time
    , appointment_department, appointment_detail, appointment_status) values (
    $member_num, '$hospital_id', '$appointment_date', '$appointment_time', ' $appointment_department'
    , '$appointment_detail', 'before');";
$result = mysqli_query($con, $query);

// 예약된 번호 가져오기
$query = "SELECT * from `appointment` where member_num = {$member_num} and hospital_id = '{$hospital_id}' 
    and appointment_date = '{$appointment_date}' and appointment_time = '{$appointment_time}' 
    and appointment_department = ' {$appointment_department}';";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$num = $row["num"];

// 프로시져 생성
hospital_create_procedure($con, "hospital_procedure{$num}", $num);

// 이벤트 스케쥴러 생성
$query = "CREATE event hospital_scheduler{$num}
on schedule every 1 minute 
starts '{$appointment_date} {$appointment_time}:00:00'
do
call hospital_procedure{$num}();";

$result=mysqli_query($con,$query) or die('Error: '.mysqli_error($con));

if ($result) {
    echo "<script>alert('hospital_procedure{$num} 이벤트스케쥴러가 생성되었습니다.');</script>";
} else {
    echo "이벤트스케쥴러 생성 중 실패원인" . mysqli_error($con);
}

mysqli_close($con);
?>

<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/hospital/css/hospital_appointment.css">

<div class="container">
    <div class="container_content">
        <!-- <img src="./img/checked1.png"> -->
        <img src="./img/checked2.png">
        <h2>토닥토닥을 이용해 주셔서 감사합니다.</h2>
        <h1>고객님, <span>진료예약</span>이 <span>완료</span>되었습니다.</h1>
        <p>고객님이 예약하신 번호는 <span><?php echo "$num" ?></span> 입니다.</p>
        <p>예약정보 확인은 마이페이지/예약조회의<br>"자세히보기"에서 하실 수 있습니다.</p>
        <div class="container_button">
            <button id="container_button1" onclick="location.href = 'http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/index.php';">
                홈으로 가기
            </button>
            <button id="container_button2">자세히 보기</button>
        </div>
    </div>
</div>