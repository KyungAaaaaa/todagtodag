<a id="btn_top" href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/back_to_top.png"
                              class="to_the_top"></a>
<div id="home_img_bar">
	<div class="slideBox">
		<div class="slide_image_box">
			<a href="#"
			   style="background-image: url(http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/background13.jpg);">
				<p class="p1">진료/예약 많이 불편하고 힘드시죠?</p>
				<p class="p2">병원 찾기부터 웹사이트 접수/예약까지</p>
			</a>
			<a href="#"
			   style="background-image: url(http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/background8.jpg);">
				<p class="p1">토닥토닥이 진료/예약을 도와드리겠습니다</p>
				<p class="p2">언제 어디서든 원하는 시간, 병원을 예약할 수 있습니다</p>
			</a>
			<a href="#"
			   style="background-image: url(http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/background6.jpg);">
				<p class="p1">우리가족 건강 파트너, 토닥토닥</p>
				<p class="p2">소중한 건강과 행복을 챙길 수 있는 토닥토닥으로 여러분들을 초대합니다</p>
			</a>
		</div>
	</div>
</div>
<div class="slide_indicator">
	<a href="#" class="active">1</a>
	<a href="#">2</a>
	<a href="#">3</a>
</div>
<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
?>
<div class="container">
	<div class="search">
		<form action="http://localhost/todagtodag/hospital/hospital.php" method="POST">
			<div>
				<input type="text" placeholder="검색어를 입력하세요 ex)병원명.." name="keyword">
				<button><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/search.png" alt="검색"></button>
			</div>
		</form>
	</div>
	<br>
	<div class="location">
		<h1>내 주변 병원</h1><span><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/placeholder.png"></span>
		<div>
			<div>

			</div>
		</div>
	</div>
	<div class="today_health_info">
		<h1>오늘의 건강 정보</h1>
		<div class="content">
            <?
                $query = "select num from health_info";
                $result = $con->query($query) or die($con);
                if ($num_rows = mysqli_num_rows($result) !== 0) {
                $health_info_num = [];
                while ($row = mysqli_fetch_row($result)) {
                    array_push($health_info_num, $row[0]);
                }
                $num = array_rand($health_info_num);
                $query = "select * from health_info where num={$health_info_num[$num]}";
                $result = $con->query($query) or die($con);
                $row = mysqli_fetch_assoc($result);
                $num = $row['num'];
                $subject = $row['subject'];
                $content = $row['content'];
                $hit = $row['hit'] + 1;
                $file_name = $row['file_name_1'];
                $file_copied = $row['file_copied_1'];
                $file_type = $row['file_type_1'];
                $root = "http://" . $_SERVER['HTTP_HOST'] . "/todagtodag";
            ?>
	                <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/health_info_view.php?page=1&num=<?= $num ?>&hit=<?= $hit ?>">
                <?php
                    if (strpos($file_type, "image") !== false) echo "<img src='{$root}/health_info/data/$file_copied' style='border-radius: 30px; margin-left: 10px; width: calc(var(--content--width) / 4 - 10px); height: 280px;'>";
                    else echo "<img src='{$root}/hospital/img/hospital.png' style='border-radius: 30px; margin-left: 10px; width: calc(var(--content--width) / 4 - 10px); height: 280px;'>";
                ?></a>
				<div> <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/health_info_view.php?page=1&num=<?= $num ?>&hit=<?= $hit ?>"><h2><?= $subject ?></h2>
					<p><?= str_replace("\n", "<br>", $content) ?></p></a>

			<span><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/index.php"><h4>더보기 ></h4></a></span>
		</div>
        <? } else { ?>
			<div>
				<p>등록된 건강 정보가 없습니다.</p>
			</div>
        <? } ?>
	</div>


</div>
<div class="two_content">
	<div class="notice">
		<h1>공지사항</h1><a
				href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/notice/notice_list.php">전체보기</a>
		<div class="content">
            <?
                $query = "select * from notice order by regist_day desc limit 6";
                $result = $con->query($query) or die($con);
                if ($num_rows = mysqli_num_rows($result) !== 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $num = $row['num'];
                        $subject = $row['subject'];
                        $regist_day = $row['regist_day'];
                        ?>
						<div>
							<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/notice/notice_view.php?num=<?= $num ?>&page=1">
                                <span><?= $subject ?></span><span><?= $regist_day ?></span>
							</a></div>
                        <?
                    }
                }
            ?>

		</div>
	</div>
	<div class="FAQ">
		<h1>FAQ</h1><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/faq/faq_list.php">전체보기</a>
		<div class="content">
            <?
                $query = "select * from faq order by regist_day desc limit 6";
                $result = $con->query($query) or die($con);
                if ($num_rows = mysqli_num_rows($result) !== 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $num = $row['num'];
                        $subject = $row['subject'];
                        $regist_day = $row['regist_day'];
                        ?>
						<div>
							<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/faq/faq_view.php?num=<?= $num ?>&page=1">
								<span><?= $subject ?></span><span><?= $regist_day ?></span>
							</a></div>
                        <?
                    }
                }
            ?>

		</div>
	</div>
</div>
</div>
