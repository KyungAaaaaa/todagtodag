<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>토닥토닥</title>
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css?ver=8">
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/css/health_info.css?ver=5">
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag2.png">
</head>

<body>
    <header>
        <?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
    </header>
    <section>
        <div class="health_info">
            <div class="info_main">
                <h2>어떤 건강정보를 찾으시나요?</h2>
                <p>총 <em style="color: red;">1024개</em> 의 건강정보 컨텐츠가 있습니다.</p>
            </div>
            <form class="search">
                <div class="info_search">
                    <button class="search_btn"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/img/icon_search.png" alt="검색" class="icon"></button>
                    <input class="search_bar" type="search" placeholder="찾으시는 건강정보를 입력하세요">
                </div>
            </form>
            <div class="search_tag">
                <a class="tags" href="#">#태그</a>
                <a class="tags" href="#">#태그</a>
                <a class="tags" href="#">#태그</a>
                <a class="tags" href="#">#태그</a>
                <a class="tags" href="#">#태그</a>
                <a class="tags" href="#">#태그</a>
                <a class="tags" href="#">#태그</a>
                <div class="change">
                    <button class="btn_prev">
                        <img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/img/icon_prev.png" alt="이전" class="icon_prev">
                    </button>
                    <button class="btn_next">
                        <img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/img/icon_next.png" alt="다음" class="icon_next">
                    </button>
                </div>
            </div>
        </div>
    </section>
    <div class="health_contents">
        <section class="total_contents">
            <div class="contents_list">
                <ul class="lists">
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                    <li class="category"><a class="items" href="#">컨텐츠</a></li>
                </ul>
            </div>
        </section>
    </div>

    <section class="info_list">
        <div class="info_img_list">
            <header class="list_header">
                <small>미리미리 대비 하세요</small>
                <h3>많이 찾는 건강정보</h3>
            </header>
            <ul class="img_list">
                <li class="img_list_item"><a href="#" class="item_info">건강정보</a></li>
                <li class="img_list_item"><a href="#" class="item_info">건강정보</a></li>
                <li class="img_list_item"><a href="#" class="item_info">건강정보</a></li>
                <li class="img_list_item"><a href="#" class="item_info">건강정보</a></li>
                <li class="img_list_item"><a href="#" class="item_info">건강정보</a></li>
                <li class="img_list_item"><a href="#" class="item_info">건강정보</a></li>
            </ul>
            <div class="list_footer">
                <a class="total_info_list" href="health_info_list.php">더보기</a>
            </div>
        </div>
    </section>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
    </footer>
</body>

</html>