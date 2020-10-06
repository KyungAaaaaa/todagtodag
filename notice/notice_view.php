<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>PHP 프로그래밍 입문</title>
	<title>토닥토닥</title>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/notice/css/notice.css">
</head>

<body>
	<header>
		<?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
	</header>
	<section>
		<div id="board_box">
			<h3 class="title">
				공지사항
			</h3>
			<?php
			$num  = $_GET["num"];
			$page  = $_GET["page"];

			include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
			include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";

			create_table($con, 'notice');
			// $con = mysqli_connect("localhost", "user1", "12345", "sample");

			$sql = "select * from notice where num=$num";
			$result = mysqli_query($con, $sql);

			$row = mysqli_fetch_array($result);
			$id      = $row["id"];
			$name      = $row["name"];
			$regist_day = $row["regist_day"];
			$subject    = $row["subject"];
			$content    = $row["content"];
			$file_name    = $row["file_name"];
			$file_type    = $row["file_type"];
			$file_copied  = $row["file_copied"];
			$hit          = $row["hit"];

			$content = str_replace(" ", "&nbsp;", $content);
			$content = str_replace("\n", "<br>", $content);

			$new_hit = $hit + 1;
			$sql = "update notice set hit=$new_hit where num=$num";
			mysqli_query($con, $sql);
			?>
			<ul id="view_content">
				<li>
					<span class="col1"><b>제목 :</b> <?= $subject ?></span>
					<span class="col2"><?= $name ?> | <?= $regist_day ?></span>
				</li>
				<li>
					<?php
					if ($file_name) {
						$real_name = $file_copied;
						$file_path = "./data/" . $real_name;
						$file_size = filesize($file_path); //php 함수

						echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='notice_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
					}
					?>
					<?= $content ?>
				</li>
			</ul>
			<ul class="buttons">
				<li><button onclick="location.href='notice_list.php?page=<?= $page ?>'">목록</button></li>
				<li><button onclick="location.href='notice_modify_form.php?num=<?= $num ?>&page=<?= $page ?>'">수정</button></li>
				<li><button onclick="location.href='dmi_notice.php?num=<?= $num ?>&page=<?= $page ?>&mode=delete'">삭제</button></li>
				<li><button onclick="location.href='notice_form.php'">글쓰기</button></li>
			</ul>
		</div> <!-- board_box -->
	</section>
	<footer>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
	</footer>
</body>

</html>