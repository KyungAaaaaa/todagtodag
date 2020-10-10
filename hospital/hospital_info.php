<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>토닥토닥</title>
		<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/hospital/css/hospital_info.css">
		<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/css/common.css">
		<script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
		<script type="text/javascript"
		        src="http://dapi.kakao.com/v2/maps/sdk.js?appkey=4a9b86a6ef0cefc3bf4d293322310ba3&libraries=services"></script>
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/hospital/js/hospital_info.js" defer></script>
		<link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag3.png">
		<style type="text/css">
			table {
				border-spacing: 0;
			}
			table td {
				text-align: center;
			}
		</style>
	</head>
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/btn_top.js"></script>
	<body>
		<header>
            <?php
                session_start();
                include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		</header>
		<a id="btn_top" href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/back_to_top.png"
		                              class="to_the_top"></a>
		<section>
			<div class="container">
                <?php
                    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
                    if (isset($_GET['hospital_id'])) $hospital_id = $_GET['hospital_id'];
                    else alert_back("올바르지 않은 접근입니다.");

                    $query = "select `id`,`name`,`addr`,`file_name_0`,`file_copied_0`,`file_type_0` from hospital where id='{$hospital_id}'";
                    $result = mysqli_query($con, $query);
                    $num_row = mysqli_num_rows($result);
                    if ($num_row === 0) alert_back("올바르지 않은 접근입니다.");
                    $row = mysqli_fetch_assoc($result);

                    $file_name = $row['file_name_0'];
                    $file_copied = $row['file_copied_0'];
                    $file_type = $row['file_type_0'];
                ?>
				<div class="hospital_info">
                    <?php
                        if (strpos($file_type, "image") !== false) echo "<img src='../../admin/data/$file_copied'>";
                        else echo "<img src='img/hospital.png'>" ?>
					<div>
						<h2><?= $row['name'] ?></h2>
                        <?= $row['addr'] ?>
					</div>
				</div>
				<div class="menu">
					<ul>
						<li class="current" id="hospital_detail">상세정보</li>
						<li id="hospital_review">리뷰</li>
						<li id="hospital_appointment">예약하기</li>
					</ul>
				</div>
				<div class="content">
					<form method="post"><input type="hidden" name="hospital_id" id="hospital_id"
					                           value="<?= $hospital_id ?>"></form>
                    <?php include "hospital_info_change.php" ?>
				</div>
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>
	</body>

</html>