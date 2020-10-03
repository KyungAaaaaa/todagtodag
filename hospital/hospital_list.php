<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    if (isset($_POST['area_1'])) $area_1 = $_POST['area_1'];
    else $area_1="";
    if (isset($_POST['area_2'])) $area_2 = $_POST['area_2'];
    else $area_2="";
    if (isset($_REQUEST['search'])) $search = $_REQUEST['search'];
    else $search="";
    if (isset($keyword))select_area2($keyword,$con);
    else select_area($area_1,$area_2,$search,$con);




    function select_area($area_1,$area_2,$search,$con)
    {
        $query = "select name,addr from hospital where addr like '%{$area_1} {$area_2}%' and (addr like'%{$search}%' or name like'%{$search}%');";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
            echo json_encode(mysqli_fetch_all($result));
    }

    function select_area2($search,$con)
    {
        $query = "select name,addr from hospital where addr like'%{$search}%' or name like'%{$search}%';";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        while ($row=mysqli_fetch_assoc($result)){
            echo "<li><h3>{$row['name']}</h3>{$row['addr']}</li>";
        }
    }

?>