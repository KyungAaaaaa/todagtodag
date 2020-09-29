<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>토닥토닥</title>
		<link rel="stylesheet" type="text/css" href="./css/common.css?ver=1">
	</head>

	<body>
		<header>
            <?php include "./header.php"; ?>
		</header>
		<section>
            <?php include "home/home.php"; ?>
		</section>
		<footer>
            <?php include "./footer.php"; ?>
		</footer>
	</body>

</html>