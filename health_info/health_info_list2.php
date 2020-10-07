<!DOCTYPE html>
<html lang="ko" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>토닥토닥</title>
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css?ver=9">
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/health_info/css/list.css?ver=5">
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag2.png">
    <script src="http://code.jquery.com/jquery-1.7.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/btn_top.js"></script>
</head>

<body>
    <header>
        <?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
    </header>
    <section>
    <a id="btn_top" href="#">TOP</a>
    <form method="post">
        <input type="submit" name="load_data" value="데이터 받아오기">
    </form>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    ?>
        <!-- ********************** -->
        <!-- data list -->
        <!-- ********************** -->
        <div class="list_box">
            <h2>건강 정보</h2>
            <div class="health_info_list_api">
                <ul>
                    <?php
                    include "health_info_list2_api.php"; ?>
                </ul>

            </div>
        </div>
        <!-- code_box -->
    </section>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
    </footer>
</body>

</html>