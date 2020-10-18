<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";

$num=$id=$subject=$content=$day=$hit=$video_name="";
$mode="insert";
$checked="";

if (isset($_GET["mode"])&&$_GET["mode"]=="insert") {
    $mode="insert";
    $num = test_input($_GET["num"]);
    $q_num = mysqli_real_escape_string($con, $num);

    $sql="SELECT * from `media` where num ='$q_num';";
    $result = mysqli_query($con, $sql);

    $row=mysqli_fetch_array($result);
    $video_name= htmlspecialchars($row['video_name']);
    // $video_name=str_replace("\n", "<br>", $video_name);
    // $video_name=str_replace(" ", "&nbsp;", $video_name);

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>토닥토닥</title>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css" defer>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/board/media/css/notice.css" defer>
	<link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/board/free/js/notice.js" defer></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/btn_top.js" defer></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/drop_down.js" defer></script>
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
	<br><br><br>
	<section>
		<div id="board_box">
			<h3 id="board_title">
				영상게시판 > 글 쓰기
			</h3>
			<form name="board_form" method="post" action="dml_board.php?mode=insert&id=<?=$userid?>&name=<?=$username?>" enctype="multipart/form-data">
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
					<li>
						<span class="col1">유튜브 링크</span>
						<span class="col2"><input type="text" name="video_name" value="<?=$video_name?>" placeholder="ex) https://www.youtube.com/watch?v=NyW4ypaqDhs"></span>
					</li>
				</ul>
				<ul class="buttons">
					<li><button type="button" onclick="check_input()">완료</button></li>
					<li><button type="button" onclick="location.href='media_list.php'">목록</button></li>
				</ul>
			</form>
		</div> <!-- board_box -->
	</section>
	<footer>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
	</footer>
</body>

</html>