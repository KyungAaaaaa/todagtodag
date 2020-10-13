<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";

if (isset($_POST['hospital_id'])) {
    $hospital_id = $_POST['hospital_id'];
} else {
    $hospital_id = "";
}

if (isset($_POST['appointment_date'])) {
    $appointment_date = $_POST['appointment_date'];
} else {
    $appointment_date = 0;
}
if (isset($_POST['appointment_time'])) {
    $appointment_time = $_POST['appointment_time'];
} else {
    $appointment_time = 0;
}
if (isset($_POST['appointment_department'])) {
    $appointment_department = $_POST['appointment_department'];
} else {
    $appointment_department = 0;
}

//hospital_id가 appointment테이블에 존재하는지
$query = "SELECT EXISTS (select * from `appointment` where hospital_id = '$hospital_id' ) as success;";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$success = $row["success"];

//appointment_date가 appointment테이블에 존재하는지
$query = "SELECT EXISTS (select * from `appointment` where appointment_date = '$appointment_date' ) as success2;";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$success2 = $row["success2"];

//appointment_time가 appointment테이블에 존재하는지        
$query = "SELECT EXISTS (select * from `appointment` where appointment_time = '$appointment_time' ) as success3;";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$success3 = $row["success3"];

//appointment_department가 appointment테이블에 존재하는지        
$query = "SELECT EXISTS (select * from `appointment` where appointment_department = ' $appointment_department' ) as success4;";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$success4 = $row["success4"];

mysqli_close($con);

if($success && $success2 && $success3 && $success4){
    echo "예약있음";
} else {
    echo "예약없음";
}
?>
