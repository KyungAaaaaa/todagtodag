<?php

    if (isset($_POST['mode'])) $mode = $_POST['mode'];
    if (isset($_POST['category'])) $category = $_POST['category'];

    if (!isset($mode)) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        ?>

		<!DOCTYPE html>
		<html lang="ko">
		<head>
			<meta charset="utf-8">
			<title>토닥토닥</title>
			<link rel="stylesheet" type="text/css" href="./css/mypage.css">
			<link rel="shortcut icon" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag3.png">
			<script src="./js/mypage.js" defer></script>
			<script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
		</head>

		<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		</header>
		<section><? } ?>
	<div class="container">
	<div class="left_box">
		<div class="user_info"><p>김경아 님</p>
			<p>아이디나 이메일</p>
			<p>가입날짜나 레벨</p>
		</div>
		<div class="nav_list">
			<ul>
				<li><h4 class="my_page">마이페이지</h4></li>
                <?php
                    if (isset($category) && $category == "member") { ?>
			<li class="nav_menu"><span class="nav_title current_category">내 정보</span>
            <? } else { ?>
				<li class="nav_menu"><span class="nav_title">내 정보</span>
                    <? } ?>
					<ul>
                        <?php if ((isset($category) && $category === "member") && (isset($mode) && $mode = "modify")) { ?>
							<li><a href="member_form.php?modify=modify" class="current_page">내 정보 수정</a></li>
                        <? } else { ?>
							<li><a href="member_form.php?modify=modify">내 정보 수정</a></li>
                        <? }
                            if ((isset($category) && $category === "member") && (isset($mode) && $mode === "post")) { ?>
								<li><a href="#" class="current_page">작성 글</a></li>
                            <? } else { ?>
								<li><a href="#">작성 글</a></li>
                            <? } ?>
                        <?php if ((isset($category) && $category === "member") && (isset($mode) && $mode === "comment")) { ?>
							<li><a href="#" class="current_page">작성 댓글</a></li>
                        <? } else { ?>
							<li><a href="#">작성 댓글</a></li>
                        <? } ?>
					</ul>
				</li>
                <?php
                    if (isset($category) && $category === "appointment") { ?>
				<li class="nav_menu"><span class="nav_title current_category">예약</span> <? } else{ ?>
				<li class="nav_menu"><span class="nav_title">예약</span> <? } ?>
					<ul>   <?php if ((isset($category) && $category == "appointment") && (isset($mode) && $mode === "appointment_list")) { ?>
							<li><a href="member_appointment.php" class="current_page">예약 조회</a></li>
                        <? } else { ?>
							<li><a href="member_appointment.php">예약 조회</a></li>
                        <? }
                            if ((isset($category) && $category == "appointment") && (isset($mode) && $mode === "review_list")) { ?>
								<li><a href="member_review.php" class="current_page">리뷰 관리</a></li>
                            <? } else { ?>
								<li><a href="member_review.php">리뷰 관리</a></li>  <? } ?>
					</ul>
				</li>
				<li class="nav_menu"><span class="nav_title">병원</span>
					<ul>
						<li>관심 병원</li>
					</ul>
				</li>
				<li class="nav_menu"><span class="nav_title">#</span>
					<ul>
						<li>#</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="right_box">
	<div class="content"><?
    if (!isset($mode)) {
        ?>
		<h1 class="content_title">메인</h1>
		<div>
			<span class="content_item"><h4>프로필</h4></span>
			<span class="content_item"><h4>최근 예약 > </h4></span>
		</div>
		<div>
			<span class="content_item"><h4>최근 글 > </h4></span>
			<span class="content_item"><h4>관심 병원 > </h4></span>
		</div>
		<span class="content_item"><h4>최근 문의 내역 > </h4></span>

		</div>
		</div>
		</div>
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>
		</body>
		</html>  <? } ?>