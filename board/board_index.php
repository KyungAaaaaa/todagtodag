<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";
create_table($con,"members");
create_table($con,"hospital");
create_table($con,"notice");
create_table($con,"review");
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>토닥토닥</title>
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/drop_down.js" defer></script>
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag3.png">

</head>

	<body>
    <header>
        <?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
    </header>
		<section>
            
		</section>
		<footer>
        <?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>
	</body>
	
</html>