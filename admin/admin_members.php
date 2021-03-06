<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";

if (isset($_GET["page"])) {
  $page = $_GET["page"];
} else {
  $page = "1";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>토닥토닥 :: 관리자페이지</title>
  <link rel="stylesheet" type="text/css" href="./css/admin.css?ver=4">
  <link rel="stylesheet" type="text/css" href="./css/admin_members.css?ver=3">

  <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
  <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/css/common.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />

  <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
  <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">

  <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/admin/js/materialize.js"></script>

  <script>
    //     document.addEventListener('DOMContentLoaded', function() {
    //   var elems = document.querySelectorAll('.collapsible');
    //   var instances = M.Collapsible.init(elems, options);

    // });

    // Or with jQuery

    $(document).ready(function() {
      M.AutoInit();
      $('.collapsible').collapsible();
    });
  </script>
</head>

<body>
  <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
  </header>
  <section>
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
            <li><a href="admin_faq.php">FAQ 관리</a></li>
            <li><a href="admin_question.php">문의게시판 관리</a></li>
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
        <h1 id="content_title">회원관리 > 회원<p>아이디를 클릭하시면 해당 회원의 상세 정보를 보실 수 있습니다.</p>
        </h1><br>
        <ul class="collapsible" data-collapsible="accordion">

          <?php
          if (isset($_GET["page"])) {
            $page = $_GET["page"];
          } else {
            $page = 1;
          }

          $sql = "select * from members";
          $result = mysqli_query($con, $sql);
          $total_record = mysqli_num_rows($result); // 전체 글 수
          $scale = 10;

          // 전체 페이지 수($total_page) 계산
          if ($total_record % $scale == 0) {
            $total_page = floor($total_record / $scale);
          } // 소수점 내림, 반올림은 round, 올림은 ceil
          else {
            $total_page = floor($total_record / $scale) + 1;
          }

          // 표시할 페이지($page)에 따라 $start 계산
          $start = ($page - 1) * $scale; // 페이지 세팅 넘버!!!!!

          $number = $total_record - $start;

          for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
            mysqli_data_seek($result, $i);
            // 가져올 레코드로 위치(포인터) 이동
            $row = mysqli_fetch_array($result);
            // 하나의 레코드 가져오기
            $id             = $row["id"];
            $name           = $row["name"];
            $phone          = $row["phone"];
            $email          = $row["email"];
            $address        = $row["address"];
            $level          = $row["level"];
          ?>
            <li>
              <div class="collapsible-header"><span><?= $id ?></span></div>
              <div class="collapsible-body">
                <table>
                  <tr id="first_tr">
                    <td class="td1">아이디 (이름)</td>
                    <td class="td2"><?= $id ?> (<?= $name ?>)</td>
                    <td class="td1">등급</td>
                    <td class="td2">
                      <select id="update_grade_<?= $i ?>" name="" class="no-autoinit">
                        <?php if ($level === '1') { ?>
                          <option value="1" selected>관리자</option>
                          <option value="2">일반회원</option>
                        <?php } else { ?>
                          <option value="1">관리자</option>
                          <option value="2" selected>일반회원</option>
                        <?php } ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="td1">전화번호</td>
                    <td class="td2"><?= $phone ?></td>
                    <td class="td1">이메일 주소</td>
                    <td class="td2"><?= $email ?></td>
                  </tr>
                  <tr>
                    <td class="td1">주소</td>
                    <td colspan="3" class="td3"><?= $address ?></td>
                  </tr>
                </table>
                <div class="butoon_col">
                  <button type="button" name="button" id="modify_btn_<?= $i ?>">수정</button>
                  <button type="button" name="button" onclick="location.href='user_curd.php?mode=delete&delete_id=<?= $id ?>'">탈퇴</button>
                </div>
                <script type="text/javascript">
                  $("#modify_btn_<?= $i ?>").click(function() {
                    var selected_option = $("#update_grade_<?= $i ?> option:selected").val();
                    $.ajax({
                        url: 'user_curd.php?mode=modify',
                        type: 'POST',
                        data: {
                          "id": "<?= $id ?>",
                          "level": selected_option
                        },
                        success: function(data) {
                          console.log(data);
                          if (data === "수정 완료") {
                            alert("회원등급 수정 완료!");
                          } else if (data === "수정 실패") {
                            alert("회원등급 수정 실패!");
                          }
                        }
                      })
                      .done(function() {
                        console.log("done");
                      })
                      .fail(function() {
                        console.log("error");
                      })
                      .always(function() {
                        console.log("complete");
                      });
                  })
                </script>
              </div>
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
            echo "<li><a href='admin_members.php?page=$new_page'>◀ 이전</a> </li>";
          } else {
            echo "<li>&nbsp;</li>";
          }

          // 게시판 목록 하단에 페이지 링크 번호 출력
          for ($i = 1; $i <= $total_page; $i++) {
            if ($page == $i) {     // 현재 페이지 번호 링크 안함
              echo "<li><b> $i </b></li>";
            } else {
              echo "<li><a href='admin_members.php?page=$i'>  $i  </a><li>";
            }
          }
          if ($total_page >= 2 && $page != $total_page) {
            $new_page = $page + 1;

            echo "<li> <a href='admin_members.php?page=$new_page'>다음 ▶</a> </li>";
          } else {
            echo "<li>&nbsp;</li>";
          }
          ?>
        </ul> <!-- page -->
      </div> <!-- end of content -->

    </div><!--  end of admin_board -->
  </section>
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
  </footer>


</body>

</html>