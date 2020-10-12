<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    if (isset($_POST['member_num'])) $member_num = $_POST['member_num'];
    if (isset($_POST['area_1'])) $area_1 = $_POST['area_1'];
    else $area_1 = "";
    if (isset($_POST['area_2'])) $area_2 = $_POST['area_2'];
    else $area_2 = "";
    $query = "select id,name,addr,interest_no,member_num,file_name_0,file_copied_0,file_type_0 from hospital h inner join (select i.no as interest_no,member_num,hospital_id from interest i inner join members m on i.member_num=m.num) im on h.id=im.hospital_id where member_num=$member_num and addr like '%{$area_1}%' and addr like '%{$area_2}%';"; //임시
    $result = $con->query($query);
    if (mysqli_num_rows($result) !== 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $file_name = $row['file_name_0'];
            $file_copied = $row['file_copied_0'];
            $file_type = $row['file_type_0'];
            $root = "http://" . $_SERVER['HTTP_HOST'] . "/todagtodag";
            ?>
			<li><span>
                	<?php
                        if (strpos($file_type, "image") !== false) echo "<img src='{$root}/admin/data/$file_copied'>";
                        else echo "<img src='{$root}/hospital/img/hospital.png'>" ?>
                <a href='http://<?= $_SERVER["HTTP_HOST"] ?>/todagtodag/hospital/hospital_info.php?hospital_id=<?= $row["id"] ?>'><h3><?= $row['name'] ?></h3><p><?= $row['addr'] ?></p></a>
	                <a><button>예약하기</button></a>
				</span>
			</li>
            <?php
        }
    }else{
    	?>
	    <li>선택하신 지역의 병원이 존재하지 않습니다.</li>
<?php
    }
?>