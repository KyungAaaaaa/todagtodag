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
  <link rel="stylesheet" type="text/css" href="./css/admin_members.css?ver=6">

  <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag2.png">
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
          <h2>회원관리</h2><!-- /.menu-title -->
          <ul>
            <li><a href="admin_members.php">회원관리</a></li>
          </ul>

          <h2>병원관리</h2>
          <ul>
            <li><a href="admin_hospital.php">병원관리</a></li>
            <li><a href="admin_board_review.php">후기게시판</a></li>
            <li><a href="admin_board_together.php">같이할건강</a></li>
          </ul>

          <h2>게시글 관리</h2>
          <ul>
            <li><a href="admin_notice.php">공지사항 관리</a></li>
            <li><a href="admin_program_manage.php">프로그램 관리</a></li>
            <li><a href="admin_program_payment.php">결제 관리</a></li>

          </ul>

          <h2>통계</h2>
          <ul id="sta_ul">
            <li><a href="admin_statistics1.php">매출 분석</a></li>
            <li><a href="admin_statistics2.php">인기 프로그램</a></li>
          </ul>
        </div>
      </div><!--  end of sub -->

      <div id="content">
        <h1 id="content_title">병원관리 > 병원<p>병원명을 클릭하시면 해당 병원의 상세 정보를 보실 수 있습니다.</p>
        </h1><br>
        <ul class="collapsible" data-collapsible="accordion">
          <?php
          if (isset($_GET["page"])) {
            $page = $_GET["page"];
          } else {
            $page = 1;
          }

          $sql = "SELECT * from hospital";
          $result = mysqli_query($con, $sql);
          $total_record = mysqli_num_rows($result); // 전체 글 수

          $scale = 20;

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
            $addr           = $row["addr"];
            $tel            = $row["tel"];
            $department     = $row["department"];

            $mon            = $row["mon"];
            $tue            = $row["tue"];
            $wed            = $row["wed"];
            $thu            = $row["thu"];
            $fri            = $row["fri"];
            $sat            = $row["sat"];
            $sun            = $row["sun"];
            $holiday        = $row["holiday"];
            $file_name_0    = $row['file_name_0'];
            $file_copied_0  = $row['file_copied_0'];
            $file_type_0    = $row['file_type_0'];

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
          ?>
            <li>
              <div class="collapsible-header"><span><?= $name ?></span></div>
              <div class="collapsible-body">
                <form id="hospital_form" action="hospital_curd.php" method="post" enctype="multipart/form-data">
                  <table>
                    <tr>
                      <?php
                      if ($file_type_0 == "image") {
                      ?>
                        <td class="td1">이미지파일</td>
                        <td colspan="3" class="td2">
                          <img src='./data/<?= $file_copied_0 ?>' width='<?= $image_width ?>' style='width: 100px; height: 100px;'><br>
                        </td>
                      <?php
                      } else if (!empty($_SESSION['user_id']) && !empty($file_copied_0)) {
                        $file_path = "./data/" . $file_copied_0;
                        $file_size = filesize($file_path);
                      ?>
                        <td class="td1">첨부파일</td>
                        <td colspan="3" class="td2">
                          <?= $file_name_0 ?> &nbsp; [ <?= $file_size ?> Byte ] &nbsp;
                          <!-- 2. 업로드된 이름을 보여주고 [저장] 할것인지 선택한다. -->
                          <span class="butoon_col">
                            <button type="button" name="button" onclick="location.href='download.php?mode=download&id=<?= $id ?>'">저장</button>
                          </span>
                        <?php
                      }
                        ?>
                    </tr>
                    <tr id="first_tr">
                      <td class="td1">번호</td>
                      <td class="td2"><span><?= $id ?></span><input type="hidden" value="<?= $id ?>" id="modify_id_<?= $i ?>"></td>
                      <td class="td1">병원명</td>
                      <td class="td2"><input type="text" value="<?= $name ?>" id="modify_name_<?= $i ?>"></td>
                    </tr>
                    <tr>
                      <td class="td1">주소</td>
                      <td colspan="3" class="td3"><input type="text" value="<?= $addr ?>" id="modify_addr_<?= $i ?>"></td>
                    </tr>
                    <tr>
                      <td class="td1">전화번호</td>
                      <td colspan="3" class="td3"><input type="text" value="<?= $tel ?>" id="modify_tel_<?= $i ?>"></td>
                    </tr>
                    <tr>
                      <td class="td1">부서</td>
                      <td colspan="3" class="td3"><input type="text" value="<?= $department ?>" id="modify_department_<?= $i ?>"></td>
                    </tr>
                    <tr>
                      <td class="td1" colspan="4">운영시간</td>
                    </tr>
                    <tr>
                      <td class="td1">월</td>
                      <td colspan="3" class="td3"><input type="text" value="<?= $mon ?>" id="modify_mon_<?= $i ?>"></td>
                    </tr>
                    <tr>
                      <td class="td1">화</td>
                      <td colspan="3" class="td3"><input type="text" value="<?= $tue ?>" id="modify_tue_<?= $i ?>"></td>
                    </tr>
                    <tr>
                      <td class="td1">수</td>
                      <td colspan="3" class="td3"><input type="text" value="<?= $wed ?>" id="modify_wed_<?= $i ?>"></td>
                    </tr>
                    <tr>
                      <td class="td1">목</td>
                      <td colspan="3" class="td3"><input type="text" value="<?= $thu ?>" id="modify_thu_<?= $i ?>"></td>
                    </tr>
                    <tr>
                      <td class="td1">금</td>
                      <td colspan="3" class="td3"><input type="text" value="<?= $fri ?>" id="modify_fri_<?= $i ?>"></td>
                    </tr>
                    <tr>
                      <td class="td1">토</td>
                      <td colspan="3" class="td3"><input type="text" value="<?= $sat ?>" id="modify_sat_<?= $i ?>"></td>
                    </tr>
                    <tr>
                      <td class="td1">일</td>
                      <td colspan="3" class="td3"><input type="text" value="<?= $sun ?>" id="modify_sun_<?= $i ?>"></td>
                    </tr>
                    <tr>
                      <td class="td1">휴일</td>
                      <td colspan="3" class="td3"><input type="text" value="<?= $holiday ?>" id="modify_holiday_<?= $i ?>"></td>
                    </tr>
                    <tr>
                      <td class="td1">파일업로드</td>
                      <td colspan="4" class="td3"><input type="file" name="upfile" id="modify_upfile_<?= $i ?>"></td>
                    </tr>

                  </table>
                  <div class="butoon_col">
                    <button type="button" name="button" id="modify_btn_<?= $i ?>">수정</button>
                    <button type="button" name="button" onclick="location.href='hospital_curd.php?mode=delete&delete_id=<?= $id ?>'">탈퇴</button>
                  </div>
                </form>
                <script type="text/javascript">
                  $("#modify_btn_<?= $i ?>").click(function() {
                    var form = $('#hospital_form')[0];
                    var formData = new FormData(form);
                    formData.append("id", $("#modify_id_<?= $i ?>").val());
                    formData.append("name", $("#modify_name_<?= $i ?>").val());
                    formData.append("addr", $("#modify_addr_<?= $i ?>").val());
                    formData.append("tel", $("#modify_tel_<?= $i ?>").val());
                    formData.append("department", $("#modify_department_<?= $i ?>").val());
                    formData.append("mon", $("#modify_mon_<?= $i ?>").val());
                    formData.append("tue", $("#modify_tue_<?= $i ?>").val());
                    formData.append("wed", $("#modify_wed_<?= $i ?>").val());
                    formData.append("thu", $("#modify_thu_<?= $i ?>").val());
                    formData.append("fri", $("#modify_fri_<?= $i ?>").val());
                    formData.append("sat", $("#modify_sat_<?= $i ?>").val());
                    formData.append("sun", $("#modify_sun_<?= $i ?>").val());
                    formData.append("holiday", $("#modify_holiday_<?= $i ?>").val());
                    formData.append("upfile", $("#modify_upfile_<?= $i ?>")[0].files[0]);

                    $.ajax({
                        url: 'hospital_curd.php?mode=modify',
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function(data) {
                          console.log(data);
                          if (data === "수정 완료") {
                            alert("병원정보 수정 완료!");
                            location.reload();
                          } else {
                            alert("병원정보 수정 실패!");
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
            echo "<li><a href='admin_hospital.php?page=$new_page'>◀ 이전</a> </li>";
          } else {
            echo "<li>&nbsp;</li>";
          }

          // 게시판 목록 하단에 페이지 링크 번호 출력
          for ($i = 1; $i <= $total_page; $i++) {
            if ($page == $i) {     // 현재 페이지 번호 링크 안함
              echo "<li><b> $i </b></li>";
            } else {
              echo "<li><a href='admin_hospital.php?page=$i'>  $i  </a><li>";
            }
          }

          if ($total_page >= 2 && $page != $total_page) {
            $new_page = $page + 1;
            echo "<li> <a href='admin_hospital.php?page=$new_page'>다음 ▶</a> </li>";
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