<?php
    session_start();
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = "1";
    }
?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<title>토닥토닥</title>
		<link rel="stylesheet" type="text/css" href="./css/mypage.css">
		<link rel="shortcut icon" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag3.png">
		<script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
	</head>

	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		</header>
		<section>
			<div class="container">
				<div class="left_box">
					<div class="user_info"><p>김경아 님</p>
						<p>아이디나 이메일</p>
						<p>가입날짜나 레벨</p>
					</div>
					<div class="nav_list">
						<ul>
							<li class="nav_menu"><span class="nav_title">내 정보</span>
								<ul>
									<li><a href="member_form.php?modify=modify">내 정보 수정</a></li>
									<li>작성 글</li>
									<li>작성 댓글</li>
								</ul>
							</li>
							<li class="nav_menu"><span class="nav_title">예약</span>
								<ul>
									<li>예약 조회</li>
									<li>리뷰 작성</li>
									<li>리뷰 관리</li>
								</ul>
							</li>
							<li class="nav_menu"><span class="nav_title">병원</span>
								<ul>
									<li>관심 병원</li>
								</ul>
							</li>
							<li class="nav_menu"><span class="nav_title">커뮤니티</span>
								<ul>

								</ul>
							</li>
						</ul>
					</div>
				</div>
				<div class="right_box">
					<div class="content">
						<h1 class="content_title">마이페이지</h1>
						<div>
							<span class="content_item">프로필</span>
							<span class="content_item">최근 예약 > </span>
						</div>
						<div>
							<span class="content_item">최근 글 > </span>
							<span class="content_item">관심 병원 > </span>
						</div>
						<span class="content_item">최근 문의 내역 > </span>
					</div>
				</div>
			</div>
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>
	</body>
</html>