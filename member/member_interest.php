<?php
?><?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>토닥토닥</title>
		<link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag3.png">
		<link rel="stylesheet" href="./css/mypage.css">
		<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/css/common.css">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

		<script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
		<script src="./js/member_form.js" charset="utf-8"></script>
		<script src="./js/mypage.js" defer></script>
	</head>

	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		</header>
		<section>
            <?php
                $_POST['mode'] = 'interest_list';
                $_POST['category'] = 'appointment';
                include "member_mypage.php";
            ?>
			<div class="content_title">
				<h1> 관심 병원 </h1></div>
			<div>
				<div class="location"><p>지역별 조회</p>
					<span><select id="h_area1" name="h_area1" onChange="cat1_change(this.value,h_area2)">
							<option value="none">전체</option>
							<option value='1' value2='서울특별시'>서울특별시</option>
							<option value='2' value2="부산광역시">부산광역시</option>
							<option value='3' value2="대구광역시">대구광역시</option>
							<option value='4' value2="인천광역시">인천광역시</option>
							<option value='5' value2="광주광역시">광주광역시</option>
							<option value='6' value2="대전광역시">대전광역시</option>
							<option value='7' value2="울산광역시">울산광역시</option>
							<option value='8' value2="강원도">강원도</option>
							<option value='9' value2="경기도">경기도</option>
							<option value='10' value2="경상남도">경상남도</option>
							<option value='11' value2="경상북도">경상북도</option>
							<option value='12' value2="전라남도">전라남도</option>
							<option value='13' value2="전라북도">전라북도</option>
							<option value='14' value2="제주특별자치도">제주특별자치도</option>
							<option value='15' value2="충청남도">충청남도</option>
							<option value='16' value2="충청북도">충청북도</option>
						</select>
						<select id="h_area2" name="h_area2">
							<option value="" selected>전체</option>
						</select>
						</span>
					<button id="btn">조회</button>
					<button id="all_btn">전체</button>
				</div>
				<ul id="interest_list">
                    <?php
                        include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
                        $query = "select id,name,addr,interest_no,member_num,file_name_0,file_copied_0,file_type_0 from hospital h inner join (select i.no as interest_no,member_num,hospital_id from interest i inner join members m on i.member_num=m.num) im on h.id=im.hospital_id where member_num=$member_num;"; //임시
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
                        }
                    ?>
				</ul>
			</div>
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/member/member_mypage_popup.php"; ?>
	</body>

</html>