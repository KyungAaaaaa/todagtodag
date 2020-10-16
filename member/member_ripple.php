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
		<link rel="shortcut icon" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
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
                $_POST['mode'] = 'comment';
                $_POST['category'] = 'board';

                include "member_mypage.php"; ?>
			<div class="content_title">
				<h1>작성 댓글</h1></div>
			<ul id="ripple_list">
				<li>
					<span class="col1"></span>
					<span class="col2">내용</span>
					<span class="col3"></span>
					<span class="col4">작성일</span>
				</li>
                <?php
                    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
                    $query = "select fr.num as ripple_num,fr.content,fr.parent,fr.id,fr.regist_day,subject from free_ripple fr inner join free f on fr.parent=f.num where fr.id='{$userid}' order by fr.regist_day desc ;";
                    $result = $con->query($query) or die(mysqli_error($con));

                    if (mysqli_num_rows($result)) {
                        $total_record = mysqli_num_rows($result);

                        $scale = 10; // 가져올 글 수

                        // 전체 페이지 수($total_page) 계산
                        if ($total_record % $scale == 0)
                            $total_page = floor($total_record / $scale);
                        else
                            $total_page = floor($total_record / $scale) + 1;

                        // 표시할 페이지($page)에 따라 $truncated_num(한페이지에서 10개 리스트 보여지고 그 뒤 짤리는 넘버) 계산
                        $truncated_num = ($page - 1) * $scale;
                        $start_num = $total_record - $truncated_num;

                        //게시판 맨 상단 번호
                        $number = $total_record - $truncated_num;
                        for ($i = $truncated_num; $i < $truncated_num + $scale && $i < $total_record; $i++) {
                            mysqli_data_seek($result, $i);
                            $row = mysqli_fetch_array($result);
                            $parent = $row['parent'];
                            $content = $row['content'];
                            $regist_day = $row['regist_day'];
                            ?>
							<li>
								<input type="hidden" class="ripple_num" value="<?= $row['ripple_num'] ?>">
								<span class="col1"><input type="checkbox" name="ripple_check"></span>
								<span class="col2"><?= $content ?></span>
								<span class="col3">
									<a href='http://<?= $_SERVER["HTTP_HOST"] ?>/todagtodag/board/free/free_view.php?num=<?= $row['parent'] ?>&page=1'>원문보기 ▷</a></span>
								<span class="col4"><?= $regist_day ?></span>
							</li>
                            <?php
                            $number--;
                        }
                    } else {
                        echo "작성한 댓글이 없습니다";
                        $total_page = 0;
                    }
                ?>
			</ul>
			<div>
				<input type="checkbox" id="all_check""><label for="all_check">전체 선택</label>
				<button id="delete_ripple">선택 삭제</button>
			</div>
			<ul class="page_num">
                <?php
                    if ($total_page >= 2 && $page >= 2) {
                        $new_page = $page - 1;
                        echo "<li><a href='member_ripple.php?page=$new_page'>◀ 이전</a> </li>";
                    } else
                        echo "<li>&nbsp;</li>";

                    // 게시판 목록 하단에 페이지 링크 번호 출력
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($page == $i)     // 현재 페이지 번호 링크 안함
                        {
                            echo "<li><b> $i </b></li>";
                        } else {
                            echo "<li><a href='member_ripple.php?page=$i'> $i </a><li>";
                        }
                    }
                    if ($total_page >= 2 && $page != $total_page) {
                        $new_page = $page + 1;
                        echo "<li> <a href='member_ripple.php?page=$new_page'>다음 ▶</a> </li>";
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