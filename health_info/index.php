<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>토닥토닥</title>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css?ver=8">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/notice/css/notice.css">
</head>

<body>
    <header>
    <?php include  $_SERVER['DOCUMENT_ROOT']."/todagtodag/header.php"; ?>
    </header>
    <section>
        <div>
            <h1>건 강 정 보</h1>
            총 x 개의 글
        </div><br>
        <div>
            <input type="search" name="search" id="">
        </div>
        <div>태그 & 화살표</div>
        <br><br><br>
        <div>카테고리 버튼</div>
        <br>
        많이 찾는 건강 정보
        <div>이미지 게시판</div>
        <br>
        <div>더보기 버튼(모든 리스트)</div>





    </section>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT']."/todagtodag/footer.php"; ?>
    </footer>
</body>

</html>