<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>토닥토닥</title>
		<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/hospital/css/hospital.css">
		<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/css/common.css">
		<script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/hospital/js/hospital.js" defer></script>
		<link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag3.png">
	</head>

	<body>
		<header>
            <?php
                session_start();
                include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		</header>
		<section>
            <?php
                include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
                if (isset($_POST['keyword'])) $keyword = $_POST['keyword'];
                else $keyword = null;
            ?>
			<div class="container">
				<h1>병원 찾기</h1>
				<div class="menu">
					<div class="select_box">
						<select id="h_area1" name="h_area1" onChange="cat1_change(this.value,h_area2)">
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
						<select id="department" name="department">
							<option value="" selected>전체</option>
							<option value="가정의학과">가정의학과</option>
							<option value="내과">내과</option>
							<option value="비뇨기과">비뇨기과</option>
							<option value="피부과">피부과</option>
							<option value="정신과">정신과</option>
							<option value="정형외과">정형외과</option>
							<option value="산부인과">산부인과</option>
							<option value="신경외과">신경외과</option>
							<option value="신경과">신경과</option>
							<option value="소아청소년과">소아청소년과</option>
							<option value="성형외과">성형외과</option>
							<option value="안과">안과</option>
							<option value="치과">치과</option>
						</select>
                        <?php
                            if (isset($keyword)) { ?>
								<input type='text' value='<?= $keyword ?>' name='search' id='search'>
                                <?php
                            } else {
                                ?>
								<input type='text' placeholder='검색어를 입력하세요' name='search' id='search'>
                            <?php } ?>
						<span id="btn">확인</span>
					</div>
				</div>
				<div class="hospital_list">
					<ul>
                        <?php
                            include "hospital_list.php"; ?>
					</ul>
				</div>
			</div>
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>
	</body>
</html>