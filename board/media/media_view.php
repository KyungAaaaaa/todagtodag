<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>토닥토닥</title>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/board/media/css/notice.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/btn_top.js" defer></script>
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/drop_down.js" defer></script>
	<!-- <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/board/media/js/youtube.js" defer></script> -->
</head>

<body>
	<header>
		<?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
	</header>
	<section>
		<div id="board_box">
			<h3 class="title">
				영상게시판
			</h3>
			<?php
			$num  = $_GET["num"];
			$page  = $_GET["page"];

			include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
			include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";

			create_table($con, 'media');
			// $con = mysqli_connect("localhost", "user1", "12345", "sample");

			$sql = "select * from media where num=$num";
			$result = mysqli_query($con, $sql);

			$row = mysqli_fetch_array($result);
			$id      = $row["id"];
			$name      = $row["name"];
			$regist_day = $row["regist_day"];
			$subject    = $row["subject"];
			$content    = $row["content"];
			$hit          = $row["hit"];
			$video_name = htmlspecialchars($row['video_name']);
			// $video_name = str_replace("\n", "<br>", $video_name);
			// $video_name = str_replace(" ", "&nbsp;", $video_name);
			// $video_name = substr($video_name, -11);	

			$content = str_replace(" ", "&nbsp;", $content);
			$content = str_replace("\n", "<br>", $content);

			// https://www.youtube.com/watch?v=bfslaJu2-RA&ab_channel=DJ%ED%8B%B0%EB%B9%84%EC%94%A8

			$new_hit = $hit + 1;
			$sql = "update media set hit=$new_hit where num=$num";
			mysqli_query($con, $sql);
			?>
			<ul id="view_content">
				<li>
					<span class="col1"><b>제목 :</b> <?= $subject ?></span>
					<span class="col2"><?= $id ?> | <?= $regist_day ?></span>
				</li>
				<li>
					
					<p align="middle">
					<iframe width="740" height="440" src="https://www.youtube.com/embed/<?=$video_name?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	
					<!-- <iframe width="740" height="432" src="https://www.youtube.com/embed/<?= $video_name ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
					</p>
					<br>
					<?= $content ?>
				</li>
			</ul>
			<ul class="buttons">
				<li><button onclick="location.href='media_list.php?page=<?= $page ?>'">목록</button></li>
				<li><button onclick="location.href='media_modify_form.php?num=<?= $num ?>&page=<?= $page ?>'">수정</button></li>
				<li><button onclick="location.href='dml_board.php?num=<?= $num ?>&page=<?= $page ?>&mode=delete'">삭제</button></li>
				<li><button onclick="location.href='media_form.php'">글쓰기</button></li>
			</ul>
		</div> <!-- board_box -->
	</section>
	<footer>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
	</footer>
</body>

</html>