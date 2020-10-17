<?php
function create_procedure($con, $procedure_name)
{
  $flag = "NO";
  $sql = "SHOW PROCEDURE STATUS WHERE db = 'todagtodag';";
  $result = mysqli_query($con, $sql) or die('Error: ' . mysqli_error($con));

  while ($row = mysqli_fetch_row($result)) {
    if ($row[1] === "$procedure_name") { //문자열로 넘어오므로 ""으로 처리 ''은 문자열뿐아니라 속성도 반영
      $flag = "OK";
      break;
    }
  } //end of while

  if ($flag === "NO") {
    switch ($procedure_name) {
      case 'media_procedure':
        $sql = "
            CREATE PROCEDURE `media_procedure`()
            BEGIN
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:02)','12','RdzvyvGcOYQ');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:03)','6','RdzvyvGcOYQ');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:04)','13','CitIMlaa8To');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:05)','36','xLD8oWRmlAE');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:06)','11','GywDFkY3z-c');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:07)','13','MQOCQ1i0_5o');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:08)','19','NtKZVFoK6wA');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:09)','10','N9c8BIXjiT0');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8','2nsbio5UrKc');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (17:02)','6','3Wf29RiKp70');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (17:02)','5','-5KAN9_CzSA');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (18:02)','9','9_CcYN8MVO8');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (17:02)','42','rA56B4JyTgI');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (16:02)','12','o_UUYwymh30');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (17:02)','53','te5SP_CKQ3k');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (18:02)','62','uX9E7Hl0wNM');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (19:02)','76','6sLRw78lyO8');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (10:02)','83','juhZlwS0ekw');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (14:02)','35','fs0vfsOCmCk');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:02)','25','VwKOVKMiSAk');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (13:02)','36','-i-qbFRamWY');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (12:02)','22','uSzHq2KhAtU');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (11:02)','26','rgLhzxUhQTU');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (16:02)','26','fn8Hz1UgCjg');
            END";
        break;

      // case 'notice_procedure':
      //   $sql = "
      //       CREATE PROCEDURE `free_procedure`()
      //       BEGIN
      //       INSERT INTO `carecenter` (`city`,`area`,`area_health`,`type`,`name`,`address`,`tel`) VALUES ('');
      //       END";
      //   break;

      // case 'faq_procedure':
      //   $sql = "
      //       CREATE PROCEDURE `free_procedure`()
      //       BEGIN
      //       INSERT INTO `carecenter` (`city`,`area`,`area_health`,`type`,`name`,`address`,`tel`) VALUES ('');
      //       END";
      //   break;

      // case 'question_procedure':
      //   $sql = "
      //       CREATE PROCEDURE `free_procedure`()
      //       BEGIN
      //       INSERT INTO `carecenter` (`city`,`area`,`area_health`,`type`,`name`,`address`,`tel`) VALUES ('');
      //       END";
      //   break;

      // case 'free_procedure':
      //   $sql = "
      //       CREATE PROCEDURE `free_procedure`()
      //       BEGIN
      //       INSERT INTO `carecenter` (`city`,`area`,`area_health`,`type`,`name`,`address`,`tel`) VALUES ('');
      //       END";
      //   break;

      //   case 'health_info_procedure':
      //     $sql = "
      //         CREATE PROCEDURE `free_procedure`()
      //         BEGIN
      //         INSERT INTO `carecenter` (`city`,`area`,`area_health`,`type`,`name`,`address`,`tel`) VALUES ('');
      //         END";
      //   break;

        default : 
        echo "<script>alert('해당 프로지서명이 없습니다. 점검요망!');</script>";
      break;
    }

    if (mysqli_query($con, $sql)) {
      echo "<script>alert('$procedure_name 프로시저가 생성되었습니다.');</script>";
      call_procedure($con, $procedure_name);
    } else {
      echo "프로시저 생성 중 실패원인" . mysqli_error($con);
    }
  } //end of if flag

} //end of function
function call_procedure($con, $procedure_name)
{
  $sql = "call " . $procedure_name . ";";
  $result = mysqli_query($con, $sql) or die('Error: ' . mysqli_error($con));
  if ($result) {
    echo "<script>alert('$procedure_name 프로시저가 정상적으로 작동되었습니다.');</script>";
  } else {
    echo "프로시저 작동 중 실패원인" . mysqli_error($con);
  }
}
