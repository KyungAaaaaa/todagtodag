<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
if (isset($_SESSION["user_id"])) {
  $id = $_SESSION["user_id"];
} else {
  echo ("<script>alert('로그인 후 이용해 주세요!');
    history.go(-1);
    </script>");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>HELF :: 관리자페이지</title>
  <link rel="stylesheet" type="text/css" href="./css/admin.css">
  <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
  <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/css/common.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />

  <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
  <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
</head>

<body>
  <script src="./chart/highcharts.js"></script>
  <script src="./chart/exporting.js"></script>
  <script src="./chart/export-data.js"></script>
  <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
  </header>
  <section id="sec1">
    <?php
    $sql = "SELECT * from `health_info` order by hit desc";
    $result = mysqli_query($con, $sql);
    $array = array();
    $array2 = array();
    $array3 = array();
    $count = "";

    for ($i = 0; $row = mysqli_fetch_array($result); $i++) {
      $array[$i] = $row["category"];
      $array2[$i] = $row["subject"];
      $array3[$i] = $row["hit"];
    }
    ?>

    <script>
      var arr1 = <?php echo  json_encode($array); ?>;
      var arr2 = <?php echo  json_encode($array2); ?>;
      var arr3 = <?php echo  json_encode($array3); ?>;
      console.log(arr1);
      console.log(arr2);
      console.log(arr3);
    </script>
    <div id="admin_border">

      <div id="snb">
        <div id="snb_title">
          <h1>관리자 페이지</h1>
        </div>
        <div id="admin_menu_bar">
          <br>
          <h3>회원관리</h3><!-- /.menu-title -->
          <ul>
            <li><a href="admin_members.php">회원관리</a></li>
          </ul>

          <br>
          <h3>병원관리</h3>
          <ul>
            <li><a href="admin_hospital.php">병원관리</a></li>
          </ul>

          <br>
          <h3>게시글 관리</h3>
          <ul>
            <li><a href="admin_notice.php">공지사항 관리</a></li>
            <li><a href="admin_free.php">자유게시판 관리</a></li>
            <li><a href="admin_media.php">영상게시판 관리</a></li>
          </ul>

          <br>
          <h3>건강정보 관리</h3>
          <ul>
            <li><a href="admin_health_info.php">건강정보 등록</a></li>
            <li><a href="admin_health_info_delete.php">건강정보 삭제</a></li>
          </ul>

          <br>
          <h3>통계</h3>
          <ul id="sta_ul">
            <li><a href="admin_statistics1.php">가입/예약 분석</a></li>
            <li><a href="admin_statistics2.php">인기 건강정보</a></li>
          </ul>
        </div>
      </div><!--  end of sub -->

      <div id="content">
        <div id="hot_program">
          <h3>통계 > 인기 건강정보</h3><br>
          <div id="container_pie">
          </div>
        </div>
        <script type="text/javascript">
          // Radialize the colors
          Highcharts.setOptions({
            colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
              return {
                radialGradient: {
                  cx: 0.5,
                  cy: 0.5,
                  r: 0.7
                },
                stops: [
                  [0, color],
                  [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                ]
              };
            })
          });

          // Build the chart
          Highcharts.chart('container_pie', {
            chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
            },
            title: {
              text: '인기 건강정보'
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
              pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                  enabled: true,
                  format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                  connectorColor: 'silver'
                }
              }
            },
            series: [{
              name: 'Share',
              data: [
                <?php
                for ($i = 0; $i < count($array); $i++) {
                  if ($i == count($array) - 1) {
                    echo "{ name: '" . $array[$i] . "', y:" . $array3[$i] . "} ";
                  } else {
                    echo "{ name: '" . $array[$i] . "', y:" . $array3[$i] . "}, ";
                  }
                }
                ?>
              ]
            }]
          });
        </script>
        <div id="p_ranking">
          <h3>인기 건강정보 랭킹 Top10!</h3><br>
          <ul id="ul_ranking">
            <li id="i9" style="background: #F23005;">
              <p class="r1"> 랭킹</p>
              <p class="r2">카테고리</p>
              <p class="r3">내용</p>
              <p class="r4">조회</p>
            </li>
            <?php
            for ($i = 0; $i < count($array2); $i++) {
              echo "<li>";
              $rank = $i + 1;
            ?>
              <p class="r1"><?= $rank ?></p>
              <p class="r2"><?= $array[$i] ?></p>
              <p class="r3"><?= $array2[$i] ?></p>
              <p class="r4"><?= $array3[$i] ?></p>
            <?php

              echo "</li>";
            }
            ?>
          </ul>
        </div>
      </div><!-- //content -->

    </div>
  </section>
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
  </footer>
</body>

</html>