<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    if (isset($_POST['area_1'])) $area_1 = $_POST['area_1'];
    else $area_1="서울특별시";
    if (isset($_POST['area_2'])) $area_2 = $_POST['area_2'];
    else $area_2="강동구";
    select_area($area_1,$area_2,$con);


    function select_area($area_1,$area_2,$con)
    {
        $query = "select name,addr from hospital where addr like '%{$area_1} {$area_2}%';";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
            echo json_encode(mysqli_fetch_all($result));
    }


?>