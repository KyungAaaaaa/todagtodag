<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";

    if (isset($_POST['mode'])) $mode = $_POST['mode'];
    else return;

    if ($mode === "insert") {
        if (isset($_POST['comment'])) $comment = $_POST['comment'];
        if (isset($_POST['star_rating'])) $star = $_POST['star_rating'];
        if (isset($_POST['kindness'])) $kindness = $_POST['kindness'];
        if (isset($_POST['wait_time'])) $wait_time = $_POST['wait_time'];
        if (isset($_POST['expense'])) $expense = $_POST['expense'];
        if (isset($_POST['hospital_id'])) $hospital_id = $_POST['hospital_id'];
        if (isset($_POST['member_num'])) $member_num = $_POST['member_num'];
        if (isset($_POST['appointment_num'])) $appointment_num = $_POST['appointment_num'];
        $regist_time = date('yy-m-d');
        $query = "insert into review values(null,'{$hospital_id}', {$member_num} ,{$star}, {$kindness},{$wait_time},{$expense}, '{$comment}', '{$regist_time}');";
        $result = $con->query($query) or die(mysqli_error($con));
        $query = "update appointment set review_no=(SELECT LAST_INSERT_ID()) where num={$appointment_num}";
        $result = $con->query($query) or die(mysqli_error($con));
        echo "success";
    } elseif ($mode === "delete") {
        if (isset($_POST['review_no'])) $review_no = $_POST['review_no'];
        $query = "delete from review where no={$review_no}";
        $result = $con->query($query) or die(mysqli_error($con));

        $result=$con->query("select num from appointment where review_no={$review_no};");
        $row=mysqli_fetch_row($result);
        $query = "update appointment set review_no=null where num={$row[0]}";
        $result = $con->query($query) or die(mysqli_error($con));
        echo "success";
    } elseif ($mode === "detail") {
        if (isset($_POST['review_no'])) $review_no = $_POST['review_no'];
        $query = "select * from review where no={$review_no}";
        $result = $con->query($query);
        if (mysqli_num_rows($result) !== 0) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);

        } else {
            echo "실행앙ㄴ됌";
        }
    }
?>