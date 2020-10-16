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
					<span class="col2"><?= $name ?> | <?= $regist_day ?></span>
				</li>
				<li>
					<p id="youTubePlayer1">

						<!-- <script>
							// youtube API 불러옴
							var tag = document.createElement('script');
							tag.src = "https://www.youtube.com/player_api";
							var firstScriptTag = document.getElementsByTagName('script')[0];
							firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

							// 플레이어변수 설정
							var youTubePlayer1;

							function onYouTubeIframeAPIReady() {
								youTubePlayer1 = new YT.Player('youTubePlayer1', {
									width: '740',
									height: '450',
									videoId: '<?= $video_name ?>',
									playerVars: {
										rel: 0
									}, //추천영상 안보여주게 설정
									events: {
										//로딩할때 이벤트 실행
										'onStateChange': onPlayerStateChange //플레이어 상태 변화시 이벤트실행
									}
								}); //youTubePlayer1셋팅
							}

							function onPlayerReady(event) {
								event.target.playVideo(); //자동재생
								//로딩할때 실행될 동작을 작성한다.
							}

							function onPlayerStateChange(event) {
								if (event.data == YT.PlayerState.PLAYING) {
									//플레이어가 재생중일때 작성한 동작이 실행된다.
								}
							}
						</script>

					</p>플레이어를 불러올 영역 -->
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