<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    if (isset($_POST['mode'])) {
        $mode = $_POST['mode'];
    }

    if ($mode === "insert") {
        if (isset($_POST['comment'])) $comment = $_POST['comment'];
        if (isset($_POST['star_rating'])) $star = $_POST['star_rating'];
        if (isset($_POST['hospital_id'])) {
            $hospital_id = $_POST['hospital_id'];
//        $query = "select `id` from hospital where id='{$hospital_name}';";
//        $result = $con->query($query) or die(mysqli_error($con));
//        $row = mysqli_fetch_assoc($result);
//        $hospital_id = $row['id'];
        }
        if (isset($_POST['userid'])) {
            $userid = $_POST['userid'];
            $query = "select `num` from members where id='{$userid}';";
            $result = $con->query($query) or die(mysqli_error($con));
            $row = mysqli_fetch_assoc($result);
            $member_num = $row['num'];
        }

//    $query = "insert into review values(null,       `hospital_id` , `member_num` ,`star_rating` , `content` , `regist_day`);";
        $query = "insert into review values(null,'{$hospital_id}', {$member_num} ,{$star} , '{$comment}', '2020-01-05');";
        $result = $con->query($query) or die(mysqli_error($con));
        echo true;
    } elseif ($mode === "delete") {
        if (isset($_POST['review_no'])) $review_no = $_POST['review_no'];
        $query = "delete from review where no={$review_no}";
        $result = $con->query($query) or die(mysqli_error($con));
        echo true;
    }


?>