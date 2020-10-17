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
      case 'members_procedure':
        $sql = "
            CREATE PROCEDURE `members_procedure`()
            BEGIN
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1001','12345','홍길동','010-0000-0000','user1001@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 101호','2020-10-19', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1002','12345','이길동','010-0000-0000','user1002@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 102호','2020-10-19', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1003','12345','김길동','010-0000-0000','user1003@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 201호','2020-10-19', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1004','12345','고길동','010-0000-0000','user1004@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 202호','2020-10-20', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1005','12345','조길동','010-0000-0000','user1005@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 301호','2020-10-20', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1006','12345','방길동','010-0000-0000','user1006@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 302호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1007','12345','하길동','010-0000-0000','user1007@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 401호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1008','12345','소길동','010-0000-0000','user1008@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 501호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1009','12345','윤길동','010-0000-0000','user1009@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 502호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1010','12345','마길동','010-0000-0000','user1010@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 601호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1011','12345','박길동','010-0000-0000','user1011@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 602호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1012','12345','포길동','010-0000-0000','user1012@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 701호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1013','12345','임길동','010-0000-0000','user1013@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 702호','2020-10-22', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1014','12345','주길동','010-0000-0000','user1014@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 801호','2020-10-22', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1015','12345','안길동','010-0000-0000','user1015@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 802호','2020-10-22', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1016','12345','남궁길동','010-0000-0000','user1016@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 901호','2020-10-23', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1017','12345','강길동','010-0000-0000','user1017@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 1001호','2020-10-23', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1018','12345','독고길동','010-0000-0000','user1018@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 1002호','2020-10-24', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1019','12345','제갈길동','010-0000-0000','user1019@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 1101호','2020-10-24', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1020','12345','독고길동','010-0000-0000','user1020@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 1102호','2020-10-25', 2);
            END";
        break;
      case 'appointment_procedure':
        $sql = "
            CREATE PROCEDURE `appointment_procedure`()
            BEGIN
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (1,'A1100031','2020-10-19','15',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (2,'A1100031','2020-10-19','16',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (3,'A1100031','2020-10-19','17',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (4,'A1100031','2020-10-20','15',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (5,'A1100031','2020-10-20','12',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (6,'A1100031','2020-10-21','14',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (7,'A1100031','2020-10-21','15',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (8,'A1100031','2020-10-21','16',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (9,'A1100031','2020-10-22','11',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (10,'A1100031','2020-10-23','09',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (11,'A1100031','2020-10-24','09',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (12,'A1100031','2020-10-24','10',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (13,'A1100031','2020-10-24','11',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (14,'A1100031','2020-10-24','12',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (15,'A1100031','2020-10-24','13',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (16,'A1100031','2020-10-24','14',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (17,'A1100031','2020-10-24','15',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (18,'A1100031','2020-10-25','12',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (19,'A1100031','2020-10-25','13',' 내과','코감기','before', null);
            INSERT INTO `appointment` (`member_num`,`hospital_id`,`appointment_date`,`appointment_time`,`appointment_department`,`appointment_detail`,`appointment_status`,`review_no`) VALUES (20,'A1100031','2020-10-25','14',' 내과','코감기','before', null);
            END";
        break;
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
