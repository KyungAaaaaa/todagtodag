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
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
		<script src="./js/mypage.js" defer></script>
	</head>

	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		</header>
		<section>
            <?php
                $_POST['mode'] = 'review_list';
                $_POST['category'] = 'appointment';
                include "member_mypage.php";

            ?>
			<div class="content_title">
				<h1> 리뷰 관리 </h1></div>
			<div>
				<div class="title">작성한 후기</div>
				<ul id="review_list">
					<li>
						<span class="col1">병원명</span>
						<span class="col2">진료일</span>
						<span class="col3">작성일</span>
						<span class="col4">별점</span>
						<span class="col5"></span>
					</li>
                    <?php $page = isset($_GET["page"]) ? $_GET["page"] : 1;
//                        $query = "select DATE_FORMAT(STR_TO_DATE(appointment_date, '%Y%m%d'),'%Y-%m-%d ') as appointment_date,name,no,regist_day,star_rating from appointment a inner join (select * from review r inner join hospital h on r.hospital_id=h.id) rhjoin on a.review_no=rhjoin.no  where a.member_num={$member_num};";
                        $query = "select appointment_date,name,no,regist_day,star_rating from appointment a inner join (select * from review r inner join hospital h on r.hospital_id=h.id) rhjoin on a.review_no=rhjoin.no  where a.member_num={$member_num};";
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
                                $hospital_name = $row['name'];
                                $regist_day = $row['regist_day'];
                                $star_rating = $row['star_rating'];
                                $appointment_date = $row['appointment_date'];

                                ?>
								<li >
									<input type="hidden" class="review_no" value=<?= $row['no'] ?>>
									<a class="review_detail">
									<span class="col1"><?= $hospital_name ?></span>
									<span class="col2"><?= $appointment_date ?></span>
									<span class="col3"><?= $regist_day ?></span>
									<span class="col4"><?= $star_rating ?></span></a>
									<span class="col5">
									<button class="review_delete">삭제</button>
								</span>
								</li>
                                <?php
                            }
                        } else {
                            echo "작성한 리뷰가 없습니다";
                            $total_page = 0;
                        }
                    ?>
				</ul>
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
		<div id="popup">
			<div id="popup_content">
			</div>
			<div id="popup_btn">
<!--				<button id="cancel" class="cancel">예약취소</button>-->
<!--				<button id="popup_detail"> 관리</button>-->
<!--				<button id="popup_write"> 등록</button>-->
				<button id="close">닫기</button>
			</div>
		</div>
	</body>
</html>