<?php
//userid에 세션이 없다면 ""가 기본값으로 들어가게 되어있음, ""은 null과 같고 null은 0과 같음, 0은 조건문에서 false와 같음 


include_once $_SERVER["DOCUMENT_ROOT"] . "/todagtodag/db/db_connector.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/todagtodag/db/create_table.php";

create_table($con, 'health_info');

//상수 정의한 것, final int SCALE = 10; 이거와 같음
define('SCALE', 9);
$memo_content = "";

if (isset($_POST["mode"]) && $_POST["mode"] == "search") {
    //제목, 내용, 아이디
    $find = test_input($_POST["find"]);
    $search = test_input($_POST["search"]);

    // 방어막 설치 검색할 때는 꼭 해야함
    $q_search = mysqli_real_escape_string($con, $search);
    // 콤보박스에서 선택한 것이 find에 들어가고 검색하는 내용이 %$q_search% 안에 들어감
    $sql = "SELECT * from `health_info` where $find like '%$q_search%' order by num desc;";
} else {
    $sql = "SELECT * from `health_info` order by num desc";
}

$result = mysqli_query($con, $sql);
$total_record = mysqli_num_rows($result);

//페이지 나타낼 때 사용하는 것
$total_page = ($total_record % SCALE == 0) ? ($total_record / SCALE) : (ceil($total_record / SCALE));

//2.페이지가 없으면 디폴트 페이지 1페이지
if (empty($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$start = ($page - 1) * SCALE;
$number = $total_record - $start;
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>토닥토닥</title>
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css?ver=9">
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/css/list.css?ver=7">
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag2.png">
    <script src="http://code.jquery.com/jquery-1.7.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/btn_top.js"></script>
</head>

<body>
    <header>
        <?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
    </header>
    <a id="btn_top" href="#">TOP</a>
    <section>
        <!-- ********************** -->
        <!-- data list -->
        <!-- ********************** -->
        <div class="list_box">
            <h2>건강 정보</h2>
            <ul id="image_list">
                <?php
                // db의 code table 내용을 가져옴
                if (isset($_GET['category'])) {
                    $category_1 = $_GET['category'];
                    $sql = "SELECT * from `health_info` where category='{$category_1}' order by num desc;";
                } else {
                    $sql = "SELECT * from `health_info` order by num desc;";
                }
                $result = mysqli_query($con, $sql);

                // 전체 레코드 수
                $num_row = mysqli_num_rows($result);

                // 한페이지에 나타낼 레코드 수 9개

                // 전체 페이지 수
                ($num_row % SCALE == 0) ? $total_page = $num_row / SCALE : $total_page = ceil($num_row / SCALE);

                //출력을 시작할 레코드 위치 구하기 : 현재 페이지에서 -1 한 값에 뿌릴 개수를 곱하여 이전에 출력한 수를 구하고 남은 위치부터 출력함
                $start = ($page - 1) * SCALE;
                mysqli_data_seek($result, $start);

                //list 출력하기
                $flag_break = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <li class='code_view_anchor'>
                        <?php
                        if (isset($_GET['category'])) {
                        ?>
                            <a href='./health_info_view.php?page=<?= $page ?>&num=<?= $row['num'] ?>&hit=<?= $row['hit'] + 1 ?>&category=<?= $category_1 ?>'>
                            <?php
                        } else {
                            ?>
                                <a href='./health_info_view.php?page=<?= $page ?>&num=<?= $row['num'] ?>&hit=<?= $row['hit'] + 1 ?>'>
                                <?php
                            }
                                ?>
                                <span class='imageBox'>
                                    <img src='http://<?php echo $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/img/<?= $row['category'] ?>.png' alt="<?= $row['category'] ?>">
                                </span>
                                <span class='contentBox'>
                                    <h3>
                                        <?= $row['category'] ?></h3>
                                    <span class="content_explain">
                                        <p>
                                            <?= $row['subject'] ?></p>
                                    </span>
                                </span>
                                </a>
                    </li>
                <?php
                    if ($flag_break == 8) {
                        $flag_break = 0;
                        break;
                    } else {
                        $flag_break++;
                    }
                }
                ?>
            </ul>
            <!-- ********************** -->
            <!-- 하단 페이지 수 -->
            <!-- ********************** -->
            <ul id="page_num">
                <?php
                if ($total_page >= 2 && $page >= 2) {
                    $new_page = $page - 1;
                    echo "<li><a href='health_info_list.php?page=$new_page'>◀ 이전</a> </li>";
                } else
                    echo "<li>&nbsp;</li>";

                // 게시판 목록 하단에 페이지 링크 번호 출력
                for ($i = 1; $i <= $total_page; $i++) {
                    // 현재 페이지 번호 링크 안함
                    if ($page == $i) {
                        echo "<li><b> $i </b></li>";
                    } else {
                        echo "<li><a href='health_info_list.php?page=$i'> $i </a><li>";
                    }
                }
                if ($total_page >= 2 && $page != $total_page) {
                    $new_page = $page + 1;
                    echo "<li> <a href='health_info_list.php?page=$new_page'>다음 ▶</a> </li>";
                } else
                    echo "<li>&nbsp;</li>";
                ?>
            </ul>

            <!-- ********************** -->
            <!-- 하단 글쓰기 버튼 -->
            <!-- ********************** -->
            <ul class="buttons">
                <li>
                    <button onclick="location.href='health_info_form.php'">글쓰기</button>
                </li>
            </ul>
        </div>
        <!-- code_box -->
    </section>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
    </footer>
</body>

</html>