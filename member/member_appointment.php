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
		<script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
		<link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag3.png">
		<script src="./js/member_form.js" charset="utf-8"></script>
		<link rel="stylesheet" href="./css/mypage.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
		<script src="./js/mypage.js" defer></script>
	</head>

	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		</header>
		<section>
            <?php
                $_POST['mode'] = 'appointment_list';
                $_POST['category'] = 'appointment';
                include "member_mypage.php";

            ?>
			<div class="content_title">
				<h1> 예약 조회 </h1></div>
			<div>
				<div class="period"><p>조회 기간</p>
					<span><input type="date" name="date_1" id="date_1"> - <input type="date" name="date_2" id="date_2"></span>
					<button id="select_date">조회</button>
					<button id="all_date">전체 기간</button>
				</div>
				<ul id="appointment_list">
					<?include "member_mypage_data.php"?>
				</ul>
			</div>
			</div>
			</div>
			</div>

		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>
	</body>

</html>