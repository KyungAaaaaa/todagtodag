<?php
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
else $userlevel = "";
?>
<div id="top">
    <h3>
        <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/index.php">토닥토닥♥</a>
    </h3>
    <ul id="top_menu">
        <li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/index.php">HOME</a></li>
        <li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/index.php">진료/예약</a></li>
        <li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/index.php">건강정보</a></li>
        <li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/index.php">공지사항</a></li>
        <?php
        if (!$userid) {
        ?>

            <li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/member/member_form.php">회원가입</a> </li>
            <li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/login/login_form.php">로그인</a></li>
        <?php
        } else {
            $logged = $username . "(" . $userid . ")님[Level:" . $userlevel . "]";
            // $logged = "홍길동"."(" . "aaaa" . ")님[Level:" . "9" . ", Point:" . "100" . "]";
        ?>
            <li><?= $logged ?> </li>
            <li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/index.php">로그아웃</a> </li>
            <li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/index.php">정보수정</a></li>
        <?php
        }
        ?>
        <?php
        if ($userlevel == 1) {
        ?>
            <li><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/index.php">관리자모드</a></li>
        <?php
        }
        ?>
    </ul>
</div>