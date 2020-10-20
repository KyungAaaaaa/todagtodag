<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>토닥토닥</title>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/notice/css/notice.css">
	<link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/notice/js/notice.js"></script>
</head>

<body>
	<header>
		<?php $_POST["mode"] = "white"; include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		<div class="background_image">
			<p id="p1">토닥토닥 공지사항을 알려드립니다.</p>
			<p id="p2">↓ 아래로 드래그 해주세요.</p>
		</div>
	</header>
	<?php
	if (!$userid) {
		echo ("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
	?>
	<section>
		<div id="board_box">
			<br><br><br><br><br>
			<h3 id="board_title">
				공지사항 > 글 쓰기
			</h3>
			<form name="board_form" method="post" action="dmi_notice.php?mode=insert&id=<?=$userid?>&name=<?=$username?>" enctype="multipart/form-data">
				<ul id="board_form">
					<li>
						<span class="col1">이름 : </span>
						<span class="col2"><?= $username ?></span>
					</li>
					<li>
						<span class="col1">제목 : </span>
						<span class="col2"><input autocomplete="off" name="subject" type="text"></span>
					</li>
					<li id="text_area">
						<span class="col1">내용 : </span>
						<span class="col2">
							<textarea name="content"></textarea>
						</span>
					</li>
					<li>
						<span class="col1"> 첨부 파일</span>
						<span class="col2"><input type="file" name="upfile"></span>
					</li>
				</ul>
				<ul class="buttons">
					<li><button type="button" onclick="check_input()">완료</button></li>
					<li><button type="button" onclick="location.href='notice_list.php'">목록</button></li>
				</ul>
			</form>
		</div> <!-- board_box -->
	</section>
	<footer>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
	</footer>
</body>

</html>