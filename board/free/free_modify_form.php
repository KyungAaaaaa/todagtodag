<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>토닥토닥</title>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/board/free/css/notice.css">
	<link rel="shortcut icon" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/btn_top.js" defer></script>
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/drop_down.js" defer></script>
	<script>
		function check_input() {
			if (!document.board_form.subject.value) {
				alert("제목을 입력하세요!");
				document.board_form.subject.focus();
				return;
			}
			if (!document.board_form.content.value) {
				alert("내용을 입력하세요!");
				document.board_form.content.focus();
				return;
			}
			document.board_form.submit();
		}
	</script>
</head>

<body>
	<header>
		<?php $_POST["mode"] = "white";
		include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		<div class="background_image">
			<p id="p1">토닥토닥 게시판을 알려드립니다.</p>
			<p id="p2">↓ 아래로 드래그 해주세요.</p>
		</div>
	</header>
	<a id="btn_top" href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/back_to_top.png" class="to_the_top"></a>
	<section>
		<div id="board_box">
			<br><br><br>
			<h3 id="board_title">
				자유게시판  > 수정
			</h3>
			<?php
			$num  = $_GET["num"];
			$page = $_GET["page"];

			include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
			include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";

			create_table($con, 'free');
			create_table($con, 'free_ripple');
			// $con = mysqli_connect("localhost", "user1", "12345", "sample");

			$sql = "select * from free where num=$num";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			$id 		= $row["id"];
			$name       = $row["name"];
			$subject    = $row["subject"];
			$content    = $row["content"];
			$file_name  = $row["file_name_0"];
			?>
			<form name="board_form" method="post" action="dmi_free.php?num=<?= $num ?>&page=<?= $page ?>&mode=modify" enctype="multipart/form-data">
				<ul id="board_form">
					<li>
						<span class="col1">작성자 : </span>
						<span class="col2"><?= $id ?></span>
					</li>
					<li>
						<span class="col1">제목 : </span>
						<span class="col2"><input autocomplete="off" name="subject" type="text" value="<?= $subject ?>"></span>
					</li>
					<li id="text_area">
						<span class="col1">내용 : </span>
						<span class="col2">
							<textarea name="content"><?= $content ?></textarea>
						</span>
					</li>
					<li>
						<?php
						if ($file_name === '') {
						?>
							<span class="col1"> 첨부 파일</span>
							<span class="col2"><input type="file" name="upfile" multiple="multiple"></span>
						<?php
						} else {
						?>
							<span class="col1"> 첨부 파일</span>
							<span class="col2" onclick="location.href='free_click.php?num=<?= $num ?>&page=<?= $page ?>'"><?= $file_name ?></span>
						<?php
						}
						?>
					</li>
				</ul>
				<ul class="buttons">
					<li><button type="button" onclick="check_input()">수정하기</button></li>
					<li><button type="button" onclick="location.href='free_list.php'">목록</button></li>
				</ul>
			</form>
		</div> <!-- board_box -->
	</section>
	<footer>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
	</footer>
</body>

</html>