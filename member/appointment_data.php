<?php

    if (isset($_POST['mode']))$mode=$_POST['mode'];
    if ($mode==="detail"){
        if (isset($_POST['appointment_num']))$appointment_num=$_POST['appointment_num'];


        $query = "select * from appointment where num={$appointment_num}";
        $result = $con->query($query);
        if (mysqli_num_rows($result) !== 0) {
            $row = mysqli_fetch_assoc($result);
            print_r($row);

        } else {
            echo "실행앙ㄴ됌";
        }







    }elseif ($mode==="cancel"){

    }
?>