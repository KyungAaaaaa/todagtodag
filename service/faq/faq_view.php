<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>토닥토닥</title>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/faq/css/notice.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/btn_top.js" defer></script>
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/drop_down.js" defer></script>
</head>

<body>
	<header>
		<?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
	</header>
	<a id="btn_top" href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/back_to_top.png" class="to_the_top"></a>
	<section>
		<div id="board_box">
			<h3 class="title">
				자주 묻는 질문
			</h3>
			<?php
			$num  = $_GET["num"];
			$page  = $_GET["page"];

			include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
			include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";

			create_table($con, 'faq');
			// $con = mysqli_connect("localhost", "user1", "12345", "sample");

			$sql = "select * from faq where num=$num";
			$result = mysqli_query($con, $sql);

			$row = mysqli_fetch_array($result);
			$id      = $row["id"];
			$name      = $row["name"];
			$regist_day = $row["regist_day"];
			$subject    = $row["subject"];
			$content    = $row["content"];

			$content = str_replace(" ", "&nbsp;", $content);
			$content = str_replace("\n", "<br>", $content);

			?>
			<ul id="view_content">
				<li>
					<span class="col1"><b>제목 :</b> <?= $subject ?></span>
					<span class="col2"><?= $name ?> | <?= $regist_day ?></span>
				</li>
				<li>
					<?= $content ?>
				</li>
			</ul>
			<ul class="buttons">
				<li><button onclick="location.href='faq_list.php?page=<?= $page ?>'">목록</button></li>
				<li>
					<?php
					if ($userid === "admin") {
					?>
						<button onclick="location.href='faq_modify_form.php?num=<?= $num ?>&page=<?= $page ?>'">수정</button>
					<?php
					} else {
					?>
						<button style="display: none;">수정</button>
					<?php
					}
					?>

				</li>
				<li>
					<?php
					if ($userid === "admin") {
					?>
						<button onclick="location.href='dmi_faq.php?num=<?= $num ?>&page=<?= $page ?>&mode=delete'">삭제</button>
					<?php
					} else {
					?>
						<button style="display: none;">삭제</button>
					<?php
					}
					?>

				</li>
				<li>
					<?php
					if ($userid === "admin") {
					?>
						<button onclick="location.href='faq_form.php'">글쓰기</button>
					<?php
					} else {
					?>
						<button style="display: none;">글쓰기</button>
					<?php
					}
					?>
				</li>
			</ul>
		</div> <!-- board_box -->
	</section>
	<footer>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
	</footer>
</body>

</html>