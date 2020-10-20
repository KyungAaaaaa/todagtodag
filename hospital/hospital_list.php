<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    if (isset($_POST['area_1'])) $area_1 = $_POST['area_1'];
    else $area_1 = "";
    if (isset($_POST['area_2'])) $area_2 = $_POST['area_2'];
    else $area_2 = "";
    if (isset($_REQUEST['search'])) $search = $_REQUEST['search'];
    else $search = "";
    if (isset($_REQUEST['department'])) $department = $_REQUEST['department'];
    else $department = "";
    if (isset($keyword)) select_area2($keyword, $con);
    elseif (!isset($_POST['val'])) {
        $keyword = "";
        select_area2($keyword, $con);
    } else select_area($area_1, $area_2, $search, $department, $con);


    function select_area($area_1, $area_2, $search, $department, $con)
    {
        $query = "select id,name,addr,ifnull(avg,0.0) as avg from hospital left join (select hospital_id,round(AVG(star_rating),1) as avg from review group by hospital_id) r on hospital.id = r.hospital_id where addr like '%{$area_1} {$area_2}%' and (name like '%{$search}%') and department like '%{$department}%';";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        echo json_encode(mysqli_fetch_all($result));
    }

    function select_area2($search, $con)
    {
        $query = "select id,name,addr,ifnull(avg,0.0) as avg from hospital left join (select hospital_id,round(AVG(star_rating),1) as avg from review group by hospital_id) r on hospital.id = r.hospital_id where addr like'%{$search}%' or name like'%{$search}%';";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        $str = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $str = "<li><a href='hospital_info.php?hospital_id={$row['id']}'><h3>{$row['name']}</h3>{$row['addr']}</a><span><img src='img/yellow_star.png'>{$row['avg']}</span></li>";
            echo $str;
        }
        if ($str === "") echo "<li>찾으시는 병원이 존재하지 않습니다.</li>";
    }

?>