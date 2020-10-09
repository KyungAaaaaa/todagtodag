<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>토닥토닥</title>
		<script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
		<link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag3.png">
		<script src="./js/member_form.js" charset="utf-8"></script>
		<link rel="stylesheet" href="./css/mypage.css">
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
                        $query = "select `num` from members where id='{$userid}';";
                        $result = $con->query($query) or die(mysqli_error($con));
                        $row = mysqli_fetch_assoc($result);
                        $member_num = $row['num'];

                        $query = "select * from review a left join hospital b on a.hospital_id=b.id where member_num={$member_num};";
                        $result = $con->query($query) or die(mysqli_error($con));
                        while ($row = mysqli_fetch_assoc($result)) {
                            $hospital_name = $row['name'];
                            $regist_day = $row['regist_day'];
                            $star_rating = $row['star_rating'];
                            $review_content = $row['content'];
                            //예약테이블에서 진료일 가져오기
                            ?>
							<li><span class="col1"><?= $hospital_name ?></span>
								<span class="col2"><?= $regist_day ?></span>
								<span class="col3"><?= $regist_day ?></span>
								<span class="col4"><?= $star_rating ?></span>
								<span class="col5">
									<button id="review_delete">삭제</button>
								</span>
							</li>
                            <?php
                        }
                    ?>
				</ul>
			</div>
			<!--            </div>-->
			<!--            </div>-->
			<!--            </div>-->

		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>

		<!--        --><?php //include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/member/member_mypage_popup.php" ?>
	</body>

</html>