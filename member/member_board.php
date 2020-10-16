<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>토닥토닥</title>
		<script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
		<link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
		<script src="./js/member_form.js" charset="utf-8"></script>
		<link rel="stylesheet" href="./css/mypage.css">
		<link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/css/common.css">
		<script src="./js/mypage.js" defer></script>
	</head>

	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		</header>
		<section>
            <?php
                $_POST['mode'] = 'post';
                $_POST['category'] = 'board';

                include "member_mypage.php"; ?>
			<div class="content_title">
				<h1> 글 관리 </h1>
			</div>
			<div>
				<div class="title">자유게시판</div>
				<ul id="post_list">
					<li>
						<span class="col1">제목</span>
						<span class="col2">댓글수</span>
						<span class="col3">조회수</span>
						<span class="col4">작성일</span>
						<span class="col5"></span>
					</li>
                    <?php
                        $free_page = isset($_GET["free_page"]) ? $_GET["free_page"] : 1;
                        $media_page = isset($_GET["media_page"]) ? $_GET["media_page"] : 1;
                        $query = "select id from members where num={$member_num};";
                        $result = $con->query($query) or die(mysqli_error($con));
                        $row = mysqli_fetch_assoc($result);

                        $query = "select f.num,ifnull(ripple,0) as ripple,f.regist_day,subject,hit from free f left join (select parent,count(*) as ripple from free_ripple group by parent) rp  on f.num=rp.parent where f.id='{$row['id']}' order by f.regist_day desc;";
                        $result = $con->query($query) or die(mysqli_error($con));
                        if (mysqli_num_rows($result)) {
                            $total_record = mysqli_num_rows($result);

                            $scale = 3; // 가져올 글 수

                            // 전체 페이지 수($total_page) 계산
                            if ($total_record % $scale == 0)
                                $total_page = floor($total_record / $scale);
                            else
                                $total_page = floor($total_record / $scale) + 1;

                            // 표시할 페이지($page)에 따라 $truncated_num(한페이지에서 10개 리스트 보여지고 그 뒤 짤리는 넘버) 계산
                            $truncated_num = ($free_page - 1) * $scale;
                            $start_num = $total_record - $truncated_num;

                            //게시판 맨 상단 번호
                            $number = $total_record - $truncated_num;
                            for ($i = $truncated_num; $i < $truncated_num + $scale && $i < $total_record; $i++) {
                                mysqli_data_seek($result, $i);
                                $row = mysqli_fetch_array($result);
                                $subject = $row['subject'];
                                $regist_day = $row['regist_day'];
                                $hit = $row['hit'];
                                $ripple = $row['ripple'];
                                ?>
								<li>
									<a href='http://<?= $_SERVER["HTTP_HOST"] ?>/todagtodag/board/free/free_view.php?num=<?= $row['num'] ?>&page=1'>
										<span class="col1"><?= $subject ?></span>
										<span class="col2"><?= $ripple ?></span>
										<span class="col3"><?= $hit ?></span>
										<span class="col4"><?= $regist_day ?></span></a>
									<span class="col5">	<input type="hidden" class="review_no"
									                              value=<?= $row['num'] ?>><a
												href="http://<?= $_SERVER["HTTP_HOST"] ?>/todagtodag/board/free/free_modify_form.php?num=<?= $row['num'] ?>&page=1">
										<button class="post_modify">수정</button></a></span>
								</li>
                                <?php
                            }
                        } else {
                            echo "작성한 글이 없습니다";
                            $total_page = 0;
                        }
                    ?>
				</ul>
			</div>
			<ul class="page_num">
                <?php
                    if ($total_page >= 2 && $free_page >= 2) {
                        $new_page = $free_page - 1;
                        echo "<li><a href='member_board.php?free_page={$new_page}&media_page=1'>◀ 이전</a> </li>";
                    } else
                        echo "<li>&nbsp;</li>";

                    // 게시판 목록 하단에 페이지 링크 번호 출력
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($free_page == $i)     // 현재 페이지 번호 링크 안함
                        {
                            echo "<li><b> $i </b></li>";
                        } else {
                            echo "<li><a href='member_board.php?free_page={$i}&media_page=1'> $i </a><li>";
                        }
                    }
                    if ($total_page >= 2 && $free_page != $total_page) {
                        $new_page = $free_page + 1;
                        echo "<li> <a href='member_board.php?free_page={$new_page}&media_page=1'>다음 ▶</a> </li>";
                    } else
                        echo "<li>&nbsp;</li>";
                ?>
			</ul> <!-- page -->
			<div>
				<div class="title">영상게시판</div>
				<ul id="media_list">
					<li>
						<span class="col1">제목</span>
						<span class="col2">조회수</span>
						<span class="col3">작성일</span>
						<span class="col4"></span>
					</li>
                    <?php
                        $query = "select id from members where num={$member_num};";
                        $result = $con->query($query) or die(mysqli_error($con));
                        $row = mysqli_fetch_assoc($result);

                        $query = "select * from media where id='{$userid}' order by regist_day desc;";
                        $result = $con->query($query) or die(mysqli_error($con));
                        if (mysqli_num_rows($result)) {
                            $total_record = mysqli_num_rows($result);

                            $scale = 3; // 가져올 글 수

                            // 전체 페이지 수($total_page) 계산
                            if ($total_record % $scale == 0)
                                $total_page = floor($total_record / $scale);
                            else
                                $total_page = floor($total_record / $scale) + 1;

                            // 표시할 페이지($page)에 따라 $truncated_num(한페이지에서 10개 리스트 보여지고 그 뒤 짤리는 넘버) 계산
                            $truncated_num = ($media_page - 1) * $scale;
                            $start_num = $total_record - $truncated_num;

                            //게시판 맨 상단 번호
                            $number = $total_record - $truncated_num;
                            for ($i = $truncated_num; $i < $truncated_num + $scale && $i < $total_record; $i++) {
                                mysqli_data_seek($result, $i);
                                $row = mysqli_fetch_array($result);
                                $subject = $row['subject'];
                                $regist_day = $row['regist_day'];
                                $hit = $row['hit'];
                                ?>
								<li>
									<a href='http://<?= $_SERVER["HTTP_HOST"] ?>/todagtodag/board/media/media_view.php?num=<?= $row['num'] ?>&page=1'>
										<span class="col1"><?= $subject ?></span>
										<span class="col2"><?= $hit ?></span>
										<span class="col3"><?= $regist_day ?></span></a>
									<span class="col4">	<input type="hidden" class="review_no"
									                              value=<?= $row['num'] ?>><a
												href="http://<?= $_SERVER["HTTP_HOST"] ?>/todagtodag/board/media/media_modify_form.php?num=<?= $row['num'] ?>&page=1">
										<button class="post_modify">수정</button></a></span>
								</li>
                                <?php
                            }
                        } else {
                            echo "작성한 글이 없습니다";
                            $total_page = 0;
                        }
                    ?>
				</ul>
			</div>
			<ul class="page_num">
                <?php
                    if ($total_page >= 2 && $media_page >= 2) {
                        $new_page = $media_page - 1;
                        echo "<li><a href='member_board.php?free_page=1&media_page=$new_page'>◀ 이전</a> </li>";
                    } else
                        echo "<li>&nbsp;</li>";

                    // 게시판 목록 하단에 페이지 링크 번호 출력
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($media_page == $i)     // 현재 페이지 번호 링크 안함
                        {
                            echo "<li><b> $i </b></li>";
                        } else {
                            echo "<li><a href='member_board.php?free_page=1&media_page=$i'> $i </a><li>";
                        }
                    }
                    if ($total_page >= 2 && $media_page != $total_page) {
                        $new_page = $media_page + 1;
                        echo "<li> <a href='member_ripple.php?free_page=1&media_page=$new_page'>다음 ▶</a> </li>";
                    } else
                        echo "<li>&nbsp;</li>";
                ?>
			</ul> <!-- page -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>
	</body>
</html>