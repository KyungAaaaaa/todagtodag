<?php
?><?php
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
		<!--		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">-->
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
		<!--		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>-->
		<style>


		</style>
	</head>

	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		</header>
		<section>
            <?php
                $_POST['mode'] = 'appointment_list';
                $_POST['category'] = 'appointment';
                include "member_mypage.php";

            ?>
			<div class="content_title">
				<h1> 예약 조회 </h1></div>
			<div>
				<div class="period"><p>조회 기간</p>
					<span><input type="date" name="date_1" id="date_1"> - <input type="date" name="date_2" id="date_2"></span>
					<button id="select_date">조회</button>
					<button id="all_date">전체 기간</button>
				</div>
				<ul id="appointment_list">
                    <? include "member_appointment_list.php" ?>
				</ul>
			</div>
			</div>
			</div>
			</div>

		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>

        <?php
            $query = "select * from hospital limit 1";
            $result = $con->query($query) or die(mysqli_error($con));

        ?>
		<div id="review_pop">
			<div id="review_pop_content">
				<div><h1>리뷰 작성 </h1></div>
				<span><img src='../img/todagtodag3.png' id="review_hospital_logo"><div><h3 id="review_hospital_name">병원이름</h3><p id="review_appointment_date">진료일</p></div>  </span>
				<p id="star_grade">
					<span>★</span>
					<span>★</span>
					<span>★</span>
					<span>★</span>
					<span>★</span>
				</p>

				<div><h1>친절</h1>
					<input type="radio" name="radio1" id="radio0" class="checkbox">
					<label for="radio0" class="input-label radio">불친절해요</label>
					<input type="radio" name="radio1" id="radio1" class="checkbox">
					<label for="radio1" class="input-label radio">그냥 그래요</label>
					<input type="radio" name="radio1" id="radio2" class="checkbox">
					<label for="radio2" class="input-label radio">친절해요</label>
				</div>
				<div><h1>대기</h1>
					<input type="radio" name="radio2" id="radio3" class="checkbox">
					<label for="radio3" class="input-label radio">오래걸려요</label>
					<input type="radio" name="radio2" id="radio4" class="checkbox">
					<label for="radio4" class="input-label radio">적당해요</label>
					<input type="radio" name="radio2" id="radio5" class="checkbox">
					<label for="radio5" class="input-label radio">빨라요</label></div>
				<div><h1>진료비</h1>
					<input type="radio" name="radio3" id="radio6" class="checkbox">
					<label for="radio6" class="input-label radio">비싸요</label>
					<input type="radio" name="radio3" id="radio7" class="checkbox">
					<label for="radio7" class="input-label radio">적당해요</label>
					<input type="radio" name="radio3" id="radio8" class="checkbox">
					<label for="radio8" class="input-label radio">저렴해요</label></div>
				<p><textarea cols="50" rows="10" id="review_pop_comment" name="review_pop_comment"></textarea></p>
				<div id="popup_btn">
					<button id="popup_write"> 등록</button>
					<button id="close">취소</button>
				</div>
				</span>
			</div>
	</body>

</html>