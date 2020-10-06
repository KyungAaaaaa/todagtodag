<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <title>토닥토닥</title>
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/introduce/css/normalize.css">
    <link rel="stylesheet" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/introduce/css/slide.css?ver=2">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/css/common2.css?ver=7">
    <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag2.png">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/introduce/js/vendor/modernizr.custom.min.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/introduce/js/vendor/jquery-1.10.2.min.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/introduce/js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/introduce/js/slide.js"></script>
</head>

<body style="overflow-y: hidden;">
    <header style="position: relative; z-index: 2; color: #dddddd;">
        <?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
    </header>
    <section style="position: relative; top: -60px;  z-index: 1;">
        <div class="slideshow" style="min-height: 755px;">
            <div class="slideshow_slides">
                <a href="#" style="background-image: url(https://cdn.imweb.me/thumbnail/20190516/5cdcfae3db63e.jpg);">
                    <p>병원 예약 필수 사이트<br>토닥토닥</p>
                    <input type="button" value="안녕하세요.">
                </a>
                <a href="#" style="background-image: url(https://cdn.imweb.me/thumbnail/20190520/5ce2129278793.jpg);">
                    <p>병원 예약 필수 사이트<br>토닥토닥</p>
                    <input type="button" value="안녕하세요.">
                </a>
                <a href="#" style="background-image: url(https://cdn.imweb.me/thumbnail/20190520/5ce21364bce96.jpg);">
                    <p>병원 예약 필수 사이트<br>토닥토닥</p>
                    <input type="button" value="안녕하세요.">
                </a>
                <a href="#" style="background-image: url(https://cdn.imweb.me/thumbnail/20190520/5ce2129a02a0d.jpg);">
                    <p>병원 예약 필수 사이트<br>토닥토닥</p>
                    <input type="button" value="안녕하세요.">
                </a>
            </div>
            <!-- <div class="slideshow_nav">
                <a href="#" class="prev">prev</a>
                <a href="#" class="next">next</a>
            </div> -->
            <div class="slideshow_indicator">
                <ul>
                    <li><a href="#" class="active"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
        </div>
    </section>
</body>

</html>