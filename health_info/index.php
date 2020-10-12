<?php
session_start();

include_once $_SERVER["DOCUMENT_ROOT"]."/todagtodag/db/db_connector.php";


if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = "";
}


?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>토닥토닥</title>
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css">
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/css/health_info.css">
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
    <script src="http://code.jquery.com/jquery-1.7.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/btn_top.js" defer></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/drop_down.js" defer></script>
</head>

<body>
    <header>
        <?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
    </header>
    <section>
        <a id="btn_top" href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/back_to_top.png" class="to_the_top"></a>
        <div class="health_info">
            <div class="info_main">
                <h2>어떤 건강정보를 찾으시나요?</h2>
                <p>총 <em style="color: red;">1024개</em> 의 건강정보 컨텐츠가 있습니다.</p>
            </div>
            <form class="search" action="./health_info_list.php" method="GET">
                <div class="info_search">
                    <button class="search_btn"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/img/icon_search.png" alt="검색" class="icon"></button>
                    <input class="search_bar" type="search" name="search" placeholder="찾으시는 건강정보를 입력하세요">
                    <input type="hidden" name="mode" value="search">
                </div>
            </form>
            <!-- <div class="search_tag">
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
            </div> -->
        </div>
    </section>
    <div class="health_contents">
        <section class="total_contents">
            <div class="contents_list">
                <ul class="lists">
                    <?php
                        $sql_1 = "select * from health_info";
                        $result_1 = mysqli_query($con,$sql_1);
                        $row_1 = mysqli_fetch_array($result_1);

                        $category_1 = $row_1['category'];
                    ?>
                    <li class="category"><a class="items" href='./health_info_list.php?category=치과'>치과</a></li>
                    <li class="category"><a class="items" href='./health_info_list.php?category=안과'>안과</a></li>
                    <li class="category"><a class="items" href='./health_info_list.php?category=정형외과'>정형외과</a></li>
                    <li class="category"><a class="items" href='./health_info_list.php?category=피부과'>피부과</a></li>
                    <li class="category"><a class="items" href='./health_info_list.php?category=소아과'>소아과</a></li>
                    <li class="category"><a class="items" href='./health_info_list.php?category=내과'>내과</a></li>
                    <li class="category"><a class="items" href='./health_info_list.php?category=비뇨기과'>비뇨기과</a></li>
                    <li class="category"><a class="items" href='./health_info_list.php?category=이비인후과'>이비인후과</a></li>
                    <li class="category"><a class="items" href='./health_info_list.php?category=외과'>외과</a></li>
                    <li class="category"><a class="items" href='./health_info_list.php?category=신경외과'>신경외과</a></li>
                    <li class="category"><a class="items" href='./health_info_list.php?category=정신과'>정신과</a></li>
                    <li class="category"><a class="items" href='./health_info_list.php?category=산부인과'>산부인과</a></li>
                    <li class="category"><a class="items" href='./health_info_list.php?category=생활건강'>생활건강</a></li>
                    <li class="category"><a class="items" href='./health_info_list.php?category=코로나'>코로나</a></li>
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
                <?php

                $sql = "select * from health_info order by hit desc limit 4";
                $result = mysqli_query($con, $sql); //결과값을 레코드셋으로 돌려준다

                if (!$result)
                echo "<li>게시판 DB 테이블이 생성 전이거나 아직 게시글이 없습니다! </li>";
                else {
                while ($row = mysqli_fetch_array($result)) //레코드셋 안의 객체들을 배열로 하나씩 가져온다
                {
                
                ?>

                <li class="list_view_anchor">
                <a href='./health_info_view.php?page=<?=$page?>&num=<?=$row['num']?>&hit=<?=$row['hit']+1?>'>
                            <span class='imageBox'>
                                <img src='http://<?php echo $_SERVER['HTTP_HOST']?>/todagtodag/health_info/img/<?=$row['category']?>.png' alt="<?=$row['category']?>">
                            </span>
                            <span class='contentBox'>
                                <h3>
                                    <?=$row['category']?></h3>
                                <span class="content_explain">
                                    <p>
                                        <?=$row['subject']?></p>
                                </span>
                            </span>
                </a>
                </li>
                <?php
                }
            }
            ?>
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