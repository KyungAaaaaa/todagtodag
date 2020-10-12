<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (isset($_SESSION["user_id"])) $userid = $_SESSION["user_id"];
    else $userid = "";
    if (isset($_SESSION["user_name"])) $username = $_SESSION["user_name"];
    else $username = "";
    if (isset($_SESSION["user_level"])) $userlevel = $_SESSION["user_level"];
    else $userlevel = "";
?>
<?
    if (isset($_POST['mode']) && $_POST['mode'] === "white") { ?>
<div id="top" class="white">
	<img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/todagtodag_logo_white.png">
    <? } else { ?>
<!--	<div id="top" class="red">-->
	<div id="top">
		<img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/todagtodag_logo.png">
		<? } ?>
		<h3><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/index.php" id="logo">토닥토닥</a></h3>
		<ul id="top_menu">
                <?php
                    if (!$userid) {
                        ?>
						<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/member/member_form.php">회원가입</a>
						</li>
						<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/login/login_form.php">로그인</a></li>
                        <?php
                    } else {
                        $logged = $username . "(" . $userid . ")님  [Level:" . $userlevel . "]";
                        ?>
						<li><?= $logged ?></li>
						<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/login/logout.php">로그아웃</a></li>
                        <?php
                    }
                    if ($userid && $userlevel == 1) { ?>
						<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/admin/admin_members.php">관리자모드</a>
						</li>
                        <?php
                    } else if ($userid) {
                        ?>
						<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/member/member_mypage.php">마이페이지</a>
						</li>
                        <?php
                    }
                ?>
			</ul>
				<ul id="top_menu2" >
					<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/introduce/introduce.php">소개</a></li>
					<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/hospital/hospital.php">진료/예약</a></li>
					<li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/index.php">건강정보</a></li>
					<li class="tab_down_menu1"><a
								href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/board/free/free_list.php">게시판</a>
						<ul class="down_menu1">
							<li>
								<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/board/free/free_list.php">자유게시판</a>
							</li>
							<li>
								<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/board/media/media_list.php">영상게시판</a>
							</li>
						</ul>
					</li>
					<li class="tab_down_menu2"><a
								href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/notice/notice_list.php">고객센터</a>
						<ul class="down_menu2">
							<li>
								<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/notice/notice_list.php">공지사항</a>
							</li>
							<li>
								<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/faq/faq_list.php">FAQ</a>
							</li>
							<li>
								<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/question/question_list.php">문의게시판</a>
							</li>
						</ul>
					</li>
				</ul>
	</div>