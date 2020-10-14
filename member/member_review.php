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
		<!--		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">-->
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
				<ul id="board_list">
					<li>
						<span class="col1">병원명</span>
						<span class="col2">진료일</span>
						<span class="col3">작성일</span>
						<span class="col4">별점</span>
						<span class="col5">편집</span>
					</li>
                    <?php
                        $query = "select DATE_FORMAT(STR_TO_DATE(appointment_date, '%Y%m%d'),'%Y-%m-%d ') as appointment_date,name,no,regist_day,star_rating from appointment a inner join (select * from review r inner join hospital h on r.hospital_id=h.id) rhjoin on a.review_no=rhjoin.no  where a.member_num={$member_num};";
                        $result = $con->query($query) or die(mysqli_error($con));
                        while ($row = mysqli_fetch_assoc($result)) {
                            $hospital_name = $row['name'];
                            $regist_day = $row['regist_day'];
                            $star_rating = $row['star_rating'];
                            $appointment_date = $row['appointment_date'];

                            ?>
							<li><span class="col1"><?= $hospital_name ?></span>
								<span class="col2"><?= $appointment_date ?></span>
								<span class="col3"><?= $regist_day ?></span>
								<span class="col4"><?= $star_rating ?></span>
								<span class="col5">
									<input type="hidden" class="review_no" value=<?= $row['no'] ?>>
									<button class="review_delete">삭제</button>
								</span>
							</li>
                            <?php
                        }
                    ?>
				</ul>
			</div>
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>
	</body>
</html>