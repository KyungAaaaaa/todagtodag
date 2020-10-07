<?php
    session_start();

    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = "1";
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

	<head>
		<meta charset="utf-8">
		<title>토닥토닥</title>
		<link rel="stylesheet" type="text/css" href="./css/mypage.css">
		<link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag3.png">
		<link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/css/common.css">
		<link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/member/css/member.css">
		<!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />-->

		<script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
		<script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/member/js/member_form.js"></script>

		<script>
            $(document).ready(function () {
                M.AutoInit();
                $('.collapsible').collapsible();
            });
		</script>
	</head>

	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		</header>
		<section>
			<div id="admin_border">
				<div id="snb">
					<div id="snb_title">
						<h1>마이페이지</h1>
					</div>
					<div id="admin_menu_bar">
						<h2>내 정보</h2><!-- /.menu-title -->
						<ul>
							<li>내 정보수정</li>
						</ul>

						<h2>예약 관리</h2>
						<ul>
							<li>예약 조회</li>
							<li>리뷰 작성</li>
							<li>리뷰 관리</li>
						</ul>

						<h2>병원 관리</h2>
						<ul>
							<li>관심 병원</li>
						</ul>

					</div>
				</div><!--  end of sub -->

				<div id="content">

					<div>

		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>


	</body>

</html>