<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>토닥토닥</title>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css" defer>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/board/free/css/notice.css" defer>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<link rel="shortcut icon" href="http://<?= $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/btn_top.js" defer></script>
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/drop_down.js" defer></script>
</head>

<body>
	<header>
		<?php $_POST["mode"] = "white";
		include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		<div class="background_image">
			<p id="p1">토닥토닥 게시판을 알려드립니다.</p>
			<p id="p2">↓ 아래로 드래그 해주세요.</p>
		</div>
	</header>
	<a id="btn_top" href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/back_to_top.png" class="to_the_top"></a>
	<section>
		<div id="board_box">
			<br><br><br><br><br>
			<h3>
				자유게시판
			</h3>
			<form class="search" action="free_list.php?mode=search" method="POST">
				<div class="info_search">
					<select name="find">
						<option value="subject">제목</option>
						<option value="content">내용</option>
						<option value="id">작성자</option>
					</select>
					<input  autocomplete="off" type="text" name="search">
					<input type="submit" value="검색">
				</div>
			</form>
			<ul id="board_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">제목</span>
					<span class="col3">글쓴이</span>
					<span class="col4">첨부</span>
					<span class="col5">등록일</span>
					<span class="col6">조회</span>
				</li>
				<?php
				if (isset($_GET["page"]))
					$page = $_GET["page"];
				else
					$page = 1;

				include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
				include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";

				create_table($con, 'free');
				create_table($con, 'free_ripple');
				// $con = mysqli_connect("localhost", "user1", "12345", "sample");

				if(isset($_GET["mode"])&&$_GET["mode"]=="search"){
					$find = $_POST["find"];
					$search = $_POST["search"];
					$q_search = mysqli_real_escape_string($con,$search);
					$sql = "SELECT * from `free` where $find like '%$q_search%' order by num desc;";
				}else{
					$sql = "SELECT * from free order by num desc;";
				}

				$result = mysqli_query($con, $sql);
				$total_record = mysqli_num_rows($result); // 전체 글 수

				$scale = 10;

				// 전체 페이지 수($total_page) 계산 
				if ($total_record % $scale == 0)
					$total_page = floor($total_record / $scale);
				else
					$total_page = floor($total_record / $scale) + 1;

				// 표시할 페이지($page)에 따라 $start 계산  
				$start = ($page - 1) * $scale;

				$number = $total_record - $start;

				for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
					mysqli_data_seek($result, $i);
					// 가져올 레코드로 위치(포인터) 이동
					$row = mysqli_fetch_array($result);
					// 하나의 레코드 가져오기
					$num         = $row["num"];
					$id          = $row["id"];
					$name        = $row["name"];
					$subject     = $row["subject"];
					$regist_day  = $row["regist_day"];
					$hit         = $row["hit"];
					if ($row["file_name_0"])
						$file_image = "<img src='./img/file.gif'>";
					else
						$file_image = " ";
				?>
					<li>
						<span class="col1"><?= $number ?></span>
						<span class="col2_1"><a href="free_view.php?num=<?= $num ?>&page=<?= $page ?>"><?= $subject ?></a></span>
						<span class="col3"><?= $id ?></span>
						<span class="col4"><?= $file_image ?></span>
						<span class="col5"><?= $regist_day ?></span>
						<span class="col6"><?= $hit ?></span>
					</li>
				<?php
					$number--;
				}
				mysqli_close($con);

				?>
			</ul>
			<ul id="page_num">
				<?php
				if ($total_page >= 2 && $page >= 2) {
					$new_page = $page - 1;
					echo "<li><a href='free_list.php?page=$new_page'>◀ 이전</a> </li>";
				} else
					echo "<li>&nbsp;</li>";

				// 게시판 목록 하단에 페이지 링크 번호 출력
				for ($i = 1; $i <= $total_page; $i++) {
					if ($page == $i)     // 현재 페이지 번호 링크 안함
					{
						echo "<li><b> $i </b></li>";
					} else {
						echo "<li><a href='free_list.php?page=$i'> $i </a><li>";
					}
				}
				if ($total_page >= 2 && $page != $total_page) {
					$new_page = $page + 1;
					echo "<li> <a href='free_list.php?page=$new_page'>다음 ▶</a> </li>";
				} else
					echo "<li>&nbsp;</li>";
				?>
			</ul> <!-- page -->
			<ul class="buttons">
				<li><button onclick="location.href='free_list.php'">목록</button></li>
				<li>
					<?php
							if ($userid) {
							?>
						<button onclick="location.href='free_form.php'">글쓰기</button>
					<?php
							} else {
					?>
						<a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
					<?php
							}
					?>
				</li>
			</ul>
		</div> <!-- board_box -->
	</section>
	<footer>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
	</footer>
</body>

</html>