<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";
    create_table($con, "members");
    create_table($con, "hospital");
    create_table($con, "notice");
    create_table($con, "review");
    create_table($con, "health_info");
    create_table($con, "interest");
    create_table($con, "media");
    create_table($con, "appointment");
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>토닥토닥</title>
		<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/css/common.css">
		<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/css/home.css">
		<link rel="shortcut icon" href="http://<?=$_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/js/slide.js" defer></script>
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/js/home.js" defer></script>
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/btn_top.js" defer></script>
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/drop_down.js" defer></script>
		<script src="http://dapi.kakao.com/v2/maps/sdk.js?appkey=4a9b86a6ef0cefc3bf4d293322310ba3&libraries=services"></script>
	</head>

	<body>
		<header>
            <?php include "./header.php"; ?>
		</header>
		<section>
            <?php include "./home/home.php"; ?>
		</section>
		<footer>
            <?php include "./footer.php"; ?>
		</footer>
	</body>

</html>