<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    if (isset($_POST['addr_1'])) $addr_1 = $_POST['addr_1'];
    if (isset($_POST['addr_2'])) $addr_2 = $_POST['addr_2'];
    if (isset($_POST['addr_3'])) $addr_3 = $_POST['addr_3'];
//    $query = "select * from hospital where addr like '%$addr_1%' and addr like '%$addr_2%' and addr like '%$addr_3%' limit 3;";
    $query = "select * from hospital where addr like '%$addr_1%' and addr like '%$addr_2%' limit 3;";
    $result = $con->query($query) or die(mysqli_error($con));
    if (mysqli_num_rows($result) !== 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $hospital_id = $row['id'];
            $hospital_name = $row['name'];
            $hospital_addr = $row['addr'];
            $file_name = $row['file_name_0'];
            $file_copied = $row['file_copied_0'];
            $file_type = $row['file_type_0'];

            ?>
			<span class="hospital_item">
				<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/hospital/hospital_info.php?hospital_id=<?= $hospital_id ?>">
					<?php
                        if (strpos($file_type, "image") !== false) echo "<img src='../../admin/data/$file_copied'>";
                        else echo "<img src='http://" . $_SERVER['HTTP_HOST'] . "/todagtodag/home/img/세로.jpg'>"
                    ?>

				<h3><?= $hospital_name ?></h3>
				<p><?= $hospital_addr ?></p></a>
			</span>
            <?php
        }
    } else {
        echo '<p>현재 지역에 병원이 없습니다</p>';
    }


?>