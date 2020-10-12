<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/todagtodag/db/db_connector.php";
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/health_info/lib/code_func.php";
$num = $id = $subject = $content = $day = $hit = $image_width = $q_num = "";
$file_type_0 = "";
if (empty($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

//get으로 보내는 것도 있고, post로 보내는 것도 있어서 둘다 받을 수 있도록 설계
switch (isset($_GET["num"])) {
    case true:
        $postAndget_num = $_GET["num"];
        $postAndget_hit = $_GET["hit"];
        break;
    case false:
        $postAndget_num = $_GET["num"];
        $postAndget_hit = $_GET["hit"];
        break;
    default:
        break;
}

if (isset($postAndget_num) && !empty($postAndget_num)) {
    $num = test_input($postAndget_num);
    $hit = test_input($postAndget_hit);
    $q_num = mysqli_real_escape_string($con, $num);

    // 조회수 증가
    $sql = "UPDATE `health_info` SET `hit`=$hit WHERE `num`=$q_num;";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }

    // 내용 출력을 위한 구문
    $sql = "SELECT * from `health_info` where num = $q_num;";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
    $row = mysqli_fetch_array($result);

    $id = $row['id'];
    $hit = $row['hit'];
    $category = $row['category'];
    $subject = htmlspecialchars($row['subject']);
    $content = htmlspecialchars($row['content']);
    $subject = str_replace("\n", "<br>", $subject);
    $subject = str_replace(" ", "&nbsp;", $subject);
    $content = str_replace("\n", "<br>", $content);
    $content = str_replace(" ", "&nbsp;", $content);
    $file_name_0 = $row['file_name_1'];
    $file_copied_0 = $row['file_copied_1'];
    $file_type_0 = $row['file_type_1'];
    $day = $row['regist_day'];

    //숫자 0 " " '0' null 0.0   $a = array()
    if (!empty($file_copied_0) && $file_type_0 == "image") {
        //이미지 정보를 가져오기 위한 함수 width, height, type
        $image_info = getimagesize("./data/" . $file_copied_0);
        $image_width = $image_info[0];
        $image_height = $image_info[1];
        $image_type = $image_info[2];
        if ($image_width > 400) $image_width = 400;
    } else {
        $image_width = 0;
        $image_height = 0;
        $image_type = "";
    }
}

?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>토닥토닥</title>
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css?ver=9">
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/css/health_info.css?ver=9">
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
    <script type="text/javascript" src="./js/member_form.js?ver=2"></script>
    <title></title>
</head>

<body>
    <header>
        <?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
    </header>
    
    <div id="wrap">
        <div id="content">
            <div id="col2">
                <div id="title">
                    <h3><div class="col2"><?= $subject ?></div></h3>
                </div>
                <div class="clear"></div>
                <div id="write_form_title"></div>
                <div class="clear"></div>
                <div id="write_form">
                    <div class="write_line"></div>
                    <div id="write_row1">
                            작성자 :
                            <?= $id ?>
                            <div class="col1">
                            조회 :
                            <?= $hit ?>
                            &nbsp;&nbsp;&nbsp; 작성일:
                            <?= $day ?>
                            </div>
                        </div>
                    </div>
                    <!--end of write_row1 -->
                    <div class="write_line"></div>
                    <div id="write_row3">
                        <div class="col2">
                            <?php
                            if ($file_type_0 == "image") {
                                echo "<img src='./data/$file_copied_0' width='$image_width'><br>";
                            } elseif (!empty($_SESSION['user_id']) && !empty($file_copied_0)) {
                                $file_path = "./data/" . $file_copied_0;
                                $file_size = filesize($file_path);
                            }
                            ?>
                        </div>
                        <p><?= $content ?></p>
                        <br>
                    </div>
                    <!--end of write_row3 -->
                    <div class="write_line"></div>
                    <br>
                </div>
                <!--end of write_form -->
                <div class="write_line"></div>

                <div id="write_button">
                    <?php 
                        if(isset($_GET['category'])){
                    ?>
                    <a href="./health_info_list.php?page=<?= $page ?>&category=<?=$_GET['category']?>"><img src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/img/list.png"></a>
                <?php        
                } else {
                    ?>
                    <a href="./health_info_list.php?page=<?= $page ?>"><img src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/img/list.png"></a>
                    <?php
                }
                    ?>    
                    <?php
                    //관리자이거나 해당된 작성자일경우 수정, 삭제가 가능하도록 설정
                    if ($_SESSION['user_id'] == "ksskss" || $_SESSION['user_id'] == $id) {
                        echo ('<a href="./health_info_form.php?mode=update&num=' . $q_num . '"><img src="../health_info/img/modify.png"></a>&nbsp;');
                        echo ('<a style="cursor: pointer;"><img src="../health_info/img/delete.png" onclick="check_delete(' . $q_num . ')"></a>&nbsp;');
                    }
                    //로그인하는 유저에게 글쓰기 기능을 부여함.
                    if (!empty($_SESSION['user_id'])) {
                        echo '<a href="health_info_form.php"><img src="../health_info/img/write.png"></a>';
                    }
                    ?>
                </div>
                <!--end of write_button-->
            </div>
            <!--end of col2  -->
        </div>
        <!--end of content -->
    </div>
    <!--end of wrap  -->
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
    </footer>
</body>

</html>