<!DOCTYPE html>

<html>

	<head>

		<meta charset="utf-8">
		<title>토닥토닥</title>


		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/drop_down.js" defer></script>
		<link rel="shortcut icon" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/todagtodag_logo.png">

		<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/introduce/css/normalize.css">
		<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/introduce/css/slide.css">
		<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css">
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/introduce/js/vendor/modernizr.custom.min.js"></script>
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/introduce/js/vendor/jquery-1.10.2.min.js"></script>
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/introduce/js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/introduce/js/slide.js"></script>

	</head>

	<body>
		<header>

            <?php $_POST['mode']="white";
                include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		</header>
		<section>
			<div class="slideshow">
				<div class="slideshow_slides">
					<a href="#"
					   style="background-image: url(https://cdn.imweb.me/thumbnail/20190516/5cdcfae3db63e.jpg);"
					   id="slideshow1">
						<p class="p1">건강이 편해지다</p>
						<p class="p2">병원 예약/접수 필수웹 토닥토닥</p>
						<input type="button" value="진료 예약하기"
						       onclick="location.href='http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/hospital/hospital.php'">
					</a>
					<a href="#"
					   style="background-image: url(https://cdn.imweb.me/thumbnail/20190520/5ce2129278793.jpg);"
					   id="slideshow2">
						<p class="p1">사람들이 건강해지는<br>편리한 방법을 만들어 갑니다</p>
						<input type="button" value="건강정보 확인 하러 가기"
						       onclick="location.href='http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/index.php'">
					</a>
					<a href="#" style="background-image: url(http://127.0.0.1/todagtodag/img/doctor.jpg);"
					   id="slideshow3">
						<p class="p1">CONVENIENT<br>USEFULL<br>BETTER</p>
						<p class="p2">TODAGTODAG</p>
						<input type="button" value="로그인하러 가기"
						       onclick="location.href='http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/login/login_form.php'">
					</a>
					<a href="#"
					   style="background-image: url(https://cdn.imweb.me/thumbnail/20190520/5ce2129a02a0d.jpg);"
					   id="slideshow4">
						<p class="p1">병원 예약 필수 사이트<br>토닥토닥</p>
						<input type="button" value="홈으로 가기"
						       onclick="location.href='http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/index.php'">
					</a>
				</div>
				<!-- <div class="slideshow_nav">
                    <a href="#" class="prev">prev</a>
                    <a href="#" class="next">next</a>
                </div> -->
				<div class="slideshow_indicator">
					<ul>
						<li><a href="#" class="active"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
					</ul>
				</div>
			</div>
		</section>
	</body>

</html>