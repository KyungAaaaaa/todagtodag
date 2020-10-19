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
			<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/css/common.css">
			<link rel="stylesheet" type="text/css" href="./css/mypage.css">
			<link rel="shortcut icon" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
			<script src="./js/mypage.js" defer></script>
			<script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
		</head>

		<body>
		<header>
            <?php
                include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		</header>
		<section><? }
    if (!$userid) {
        echo("<script>
							alert('로그인 후 이용해주세요');
							location.href='/todagtodag/login/login_form.php';
							</script>
						");
        exit;
    }
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    $query = "select num,`name`,`email`,`regist_day` from members where id='{$userid}';";
    $result = $con->query($query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    $member_num = $row['num'];
    $member_name = $row['name'];
    $member_email = $row['email'];
    $member_regist_day = $row['regist_day'];
?>
	<input type="hidden" id="member_num" value="<?= $member_num ?>">
	<div class="container">
	<div class="left_box">
		<div class="member_info">
			<img src="img/profile_1.png">
			<p id="member_name"><?= $member_name ?> 님</p>
			<p><?= $member_email ?></p>
			<p>가입 <?= $member_regist_day ?></p>
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
                        <?php if ((isset($category) && $category === "member") && (isset($mode) && $mode === "modify")) { ?>
							<li><a href="member_form.php?mode=modify" class="current_page">내 정보 수정</a></li>
                        <? } else { ?>
							<li><a href="member_form.php?mode=modify">내 정보 수정</a></li>
                        <? } ?>

					</ul>
				</li>
                <?php
                    if (isset($category) && $category === "appointment") { ?>
			<li class="nav_menu"><span class="nav_title current_category">예약</span> <?
                } else{ ?>
				<li class="nav_menu"><span class="nav_title">예약</span> <? } ?>
					<ul>   <?php
                            if ((isset($category) && $category === "appointment") && (isset($mode) && $mode === "interest_list")) { ?>
								<li><a href="member_interest.php" class="current_page">관심 병원</a></li>
                            <? } else { ?>
								<li><a href="member_interest.php">관심 병원</a></li>  <? }
                            if ((isset($category) && $category === "appointment") && (isset($mode) && $mode === "appointment_list")) { ?>
								<li><a href="member_appointment.php" class="current_page">예약 조회</a></li>
                            <? } else { ?>
								<li><a href="member_appointment.php">예약 조회</a></li>
                            <? }
                            if ((isset($category) && $category === "appointment") && (isset($mode) && $mode === "review_list")) { ?>
								<li><a href="member_review.php" class="current_page">리뷰 관리</a></li>
                            <? } else { ?>
								<li><a href="member_review.php">리뷰 관리</a></li>
                            <? } ?>
					</ul>
				</li>
                <?php
                    if (isset($category) && $category === "board") { ?>
				<li class="nav_menu"><span class="nav_title current_category">게시판</span>
                    <? } else{ ?>
				<li class="nav_menu"><span class="nav_title">게시판</span> <? } ?>
					<ul>
                        <?php
                            if ((isset($category) && $category === "board") && (isset($mode) && $mode === "post")) { ?>
								<li><a href="member_board.php" class="current_page">작성 글</a></li>
                            <? } else { ?>
								<li><a href="member_board.php">작성 글</a></li>
                            <? } ?>
                        <?php if ((isset($category) && $category === "board") && (isset($mode) && $mode === "comment")) { ?>
							<li><a href="member_ripple.php" class="current_page">작성 댓글</a></li>
                        <? } else { ?>
							<li><a href="member_ripple.php">작성 댓글</a></li>
                        <? }
                            if ((isset($category) && $category === "board") && (isset($mode) && $mode === "question")) { ?>
								<li><a href="member_question.php" class="current_page">문의 내역</a></li>
                            <? } else { ?>
								<li><a href="member_question.php">문의 내역</a></li>
                            <? } ?>
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
		<div class="content_layout">
			<span class="content_item">
				<h4><a href="member_form.php?mode=modify">내 프로필</h4></a>
				<?php
                    $query = "select * from members where num={$member_num};";
                    $result = $con->query($query) or die(mysqli_error($con));
                    if (mysqli_num_rows($result) !== 0) {
						$row = mysqli_fetch_assoc($result); 
						$address = explode("$",$row['address']);
						?>
						<p>휴대폰 번호 : <?= $row['phone'] ?></p>
						<p>주소 : <?= $address[0] ?> <?= $address[1] ?> <?= $address[2] ?></p>
	                    <div id="info_modify"><a href="member_form.php?mode=modify">내정보 수정하기 > </a></div>
                    <? } ?>
			</span>

			<span class="content_item"><a href="member_appointment.php">
					<h4>최근 예약 > </h4></a>
				 <?
                     $query = "select * from appointment a inner join hospital h on a.hospital_id=h.id where member_num={$member_num} order by appointment_date desc limit 4;";

                     $result = $con->query($query) or die(mysqli_error($con));
                     if (mysqli_num_rows($result) !== 0) {
                         while ($row = mysqli_fetch_assoc($result)) { ?>
							 <p><a href='member_appointment.php'><?= $row['name'] ?></a></p>
                         <? }
                     } else { ?>
						 <p>예약내역이 없습니다.</p>
                     <? } ?>
			</span>
		</div>

		<div class="content_layout">
		<span class="content_item">
				<h4><a href="member_board.php">최근 글 > </a></h4>
			 <? $query = "select * from free where id='{$userid}' order by regist_day desc limit 4;";
                 $result = $con->query($query) or die(mysqli_error($con));
                 if (mysqli_num_rows($result) !== 0) {
                     while ($row = mysqli_fetch_assoc($result)) { ?>
						 <p><a href='http://<?= $_SERVER["HTTP_HOST"] ?>/todagtodag/board/free/free_view.php?num=<?= $row['num'] ?>&page=1'><?= $row['subject'] ?></a></p>
                     <? }
                 } else { ?>
					 <p>예약내역이 없습니다.</p>
                 <? } ?>
		</span>
			<span class="content_item">
		<h4><a href="member_interest.php">관심 병원 > </a></h4>
        <?
            $query = "select id,name,addr,interest_no from hospital h inner join (select i.no as interest_no,member_num,hospital_id from interest i inner join members m on i.member_num=m.num) im on h.id=im.hospital_id where member_num=$member_num limit 4;";

            $result = $con->query($query) or die(mysqli_error($con));
            if (mysqli_num_rows($result) !== 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
			        <p><a href='http://<?= $_SERVER["HTTP_HOST"] ?>/todagtodag/hospital/hospital_info.php?hospital_id=<?= $row["id"] ?>'><?= $row['name'] ?></a></p>
                <? }
            } else { ?>
		        <p>관심 병원을 추가해보세요!</p>
            <? } ?>
			</span>
		</div>
		<span class="content_item"><a
					href="http://<?= $_SERVER["HTTP_HOST"] ?>/todagtodag/member/member_question.php"><h4>최근 문의 내역 > </h4></a>
			 <?
                 $query = "select * from question where id='{$userid}' order by regist_day desc limit 4;";
                 $result = $con->query($query) or die(mysqli_error($con));
                 if (mysqli_num_rows($result) !== 0) {
                     while ($row = mysqli_fetch_assoc($result)) { ?>
						 <p><a href='http://<?= $_SERVER["HTTP_HOST"] ?>/todagtodag/service/question/question_view.php?num=<?= $row["num"] ?>&page=1'><?= $row['subject'] ?></a></p>
                     <? }
                 } else { ?>
					 <p>문의 내역이 존재하지 않습니다</p>
                 <? } ?>
		</span>

		</div>
		</div>
		</div>
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>
		</body>
		</html>  <?
    } ?>