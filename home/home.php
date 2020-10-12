<a id="btn_top" href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/back_to_top.png"
                              class="to_the_top"></a>
<div id="home_img_bar">
	<div class="slideBox">
		<div class="slide_image_box">
			<a href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/banner_1.png"
			                 alt="첫번째 이미지"></a>
			<a href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/banner_2.png"
			                 alt="두번째 이미지"></a>
		</div>
		<div class="slide_nav">
			<a href="#" id="prev">prev</a>
			<a href="#" id="next">next</a>
		</div>
		<div class="slide_indicator">
			<a href="#" class="active">1</a>
			<a href="#">2</a>
		</div>
	</div>
</div>
<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
?>
<div class="container">
	<div class="search">
		<form action="http://localhost/todagtodag/hospital/hospital.php" method="POST">
			<input type="text" placeholder="검색어를 입력하세요 ex)병원명.." name="keyword">
			<button><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/search.png" alt="검색"></button>
		</form>
	</div>

	<div class="location">
		<h1>내 주변 병원</h1><span><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/placeholder.png"></span>
		<div>
			<div></div>
			<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/hospital/hospital.php">
			<span id="hospital_more">
				<h2>병원 찾기 ></h2>
			</span></a>
		</div>
	</div>
	<div class="today_health_info">
		<h1>오늘의 건강 정보</h1>
		<div class="content">
            <?
                $query = "select num from health_info";
                $result = $con->query($query) or die($con);
                if ($num_rows = mysqli_num_rows($result) !== 0){
                $health_info_num = [];
                while ($row = mysqli_fetch_row($result)) {
                    array_push($health_info_num, $row[0]);
                }
                $array = [];
                for($i=0;$i<5;$i++){
                    array_push($array, $i);
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
                if (strpos($file_type, "image") !== false) echo "<img src='{$root}/health_info/data/$file_copied'>";
                else echo "<img src='{$root}/hospital/img/hospital.png'>";
            ?>
			<div><h2><?= $subject ?></h2>
				<p><?= $content ?></p>
				<span><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/health_info_view.php?num=<?= $num ?>&hit=<?= $hit ?>"><h4>더보기 ></h4></a></span>
			</div>
		</div>
        <? } ?>
	</div>
	<div class="notice">
		<h1>공지사항</h1>
		<div></div>
	</div>
</div>
