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
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/faq/js/faq.js"></script>
</head>

<body>
	<header>
		<?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
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
			<h3 id="board_title">
				자주 묻는 질문 > 글 쓰기
			</h3>
			<form name="board_form" method="post" action="dmi_faq.php?mode=insert&id=<?=$userid?>&name=<?=$username?>" enctype="multipart/form-data">
				<ul id="board_form">
					<li>
						<span class="col1">이름 : </span>
						<span class="col2"><?= $username ?></span>
					</li>
					<li>
						<span class="col1">제목 : </span>
						<span class="col2"><input name="subject" type="text"></span>
					</li>
					<li id="text_area">
						<span class="col1">내용 : </span>
						<span class="col2">
							<textarea name="content"></textarea>
						</span>
					</li>
				</ul>
				<ul class="buttons">
					<li><button type="button" onclick="check_input()">완료</button></li>
					<li><button type="button" onclick="location.href='faq_list.php'">목록</button></li>
				</ul>
			</form>
		</div> <!-- board_box -->
	</section>
	<footer>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
	</footer>
</body>

</html>