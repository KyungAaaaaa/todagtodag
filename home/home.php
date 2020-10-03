<head>
	<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/css/home.css">
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/js/slide.js" defer></script>
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/js/home.js" defer></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>

<div id="home_img_bar">
	<div class="slideBox">
		<div class="slide_image_box">
			<a href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/banner_1.png"
			                 alt="첫번째 이미지"></a>
			<a href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/banner_2.png"
			                 alt="두번째 이미지"></a>
		</div>
		<div class="slide_nav">
			<a href="#" id="prev">prev</a>
			<a href="#" id="next">next</a>
		</div>
		<div class="slide_indicator">
			<a href="#" class="active">1</a>
			<a href="#">2</a>
		</div>
	</div>
</div>
<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/todagtodag/db/db_connector.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/todagtodag/db/create_table.php";
	create_table($con,"hospital");
?>
<div class="container">
	<div class="search">
		<form action="http://localhost/todagtodag/hospital/hospital.php" method="POST">
			<input type="text" placeholder="검색어를 입력하세요 ex)병원명.." name="keyword">
			<button><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/search.png" alt="검색"></button>
		</form>
	</div>

	<div class="location">
		<h1>내 주변 병원</h1><span><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/placeholder.png"></span>
		<div></div>
	</div>
	<div class="today_health_info">
		<h1>오늘의 건강 정보</h1>
		<div></div>
	</div>
	<div class="notice">
		<h1>공지사항</h1>
		<div></div>
	</div>
</div>
