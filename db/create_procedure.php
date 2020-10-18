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
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1001','MTIzNDU=','홍길동','010-0000-0000','user1001@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 101호','2020-10-19', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1002','MTIzNDU=','이길동','010-0000-0000','user1002@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 102호','2020-10-19', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1003','MTIzNDU=','김길동','010-0000-0000','user1003@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 201호','2020-10-19', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1004','MTIzNDU=','고길동','010-0000-0000','user1004@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 202호','2020-10-20', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1005','MTIzNDU=','조길동','010-0000-0000','user1005@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 301호','2020-10-20', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1006','MTIzNDU=','방길동','010-0000-0000','user1006@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 302호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1007','MTIzNDU=','하길동','010-0000-0000','user1007@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 401호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1008','MTIzNDU=','소길동','010-0000-0000','user1008@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 501호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1009','MTIzNDU=','윤길동','010-0000-0000','user1009@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 502호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1010','MTIzNDU=','마길동','010-0000-0000','user1010@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 601호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1011','MTIzNDU=','박길동','010-0000-0000','user1011@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 602호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1012','MTIzNDU=','포길동','010-0000-0000','user1012@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 701호','2020-10-21', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1013','MTIzNDU=','임길동','010-0000-0000','user1013@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 702호','2020-10-22', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1014','MTIzNDU=','주길동','010-0000-0000','user1014@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 801호','2020-10-22', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1015','MTIzNDU=','안길동','010-0000-0000','user1015@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 802호','2020-10-22', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1016','MTIzNDU=','남궁길동','010-0000-0000','user1016@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 901호','2020-10-23', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1017','MTIzNDU=','강길동','010-0000-0000','user1017@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 1001호','2020-10-23', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1018','MTIzNDU=','독고길동','010-0000-0000','user1018@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 1002호','2020-10-24', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1019','MTIzNDU=','제갈길동','010-0000-0000','user1019@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 1101호','2020-10-24', 2);
            INSERT INTO `members` (`id`,`password`,`name`,`phone`,`email`,`address`,`regist_day`,`level`) VALUES ('user1020','MTIzNDU=','독고길동','010-0000-0000','user1020@gmail.com','10000\$서울특별시 강남구 강남동\$1001동 1102호','2020-10-25', 2);
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
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','[저작권 없는 음악 모음] 신나는 비트의 밝은 브금 2시간 연속 듣기','.','2020-10-17 (15:00)','8','HpX_LCBGEcc');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','[저작권 없는 음악 모음] 행복한 느낌의 저작권 없는 밝은 음악 20곡 연속 듣기','.','2020-10-17 (17:02)','6','fn8Hz1UgCjg');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','공부할때 듣는 좋은 음악 지브리 OST 모음 19곡 연속재생 (Studio Ghibli OST No Ad)','.','2020-10-17 (17:02)','5','-MN4zQp2rny8');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','Studio Ghibli Best Songs Collection(Relaxing Piano) BGM!','.','2020-10-17 (18:02)','9','SpqjvCnnxlQ');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','[공부할 때 듣는 음악] 애니메이션 피아노 모음','.','2020-10-17 (17:02)','42','sFacBN7BC6M');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','[저작권 없는 음악] 활기차고 신나는 저작권 없는 음악 30곡 모음 No Copyright Music Exciting 30 Songs','.','2020-10-17 (16:02)','12','bm4Xjq2aBNg');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','플레이리스트 트렌디한 팝송 신나는 팝송 노래 저작권없는 팝송 모음 연속듣기 드라이브할때 운동할때 매장음악(광고없는음악)','.','2020-10-17 (17:02)','53','8ly380L4CDM');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','[PLAYLIST] 2020 차트상위권 씹어먹은 트렌디한 최신 팝송 모음 연속재생','.','2020-10-17 (18:02)','62','6sLRw78lyO8');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','[감성 팝송 모음] 카페에서 나올만한 감성 팝송 플레이리스트','.','2020-10-17 (19:02)','76','0jVwNKGXS7k');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','[Playlist] 약속있죠? 30분 동안 준비해봅시다. 텐션UP 그루브팝','.','2020-10-17 (10:02)','83','5EbvFoNY5Y0');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','[Nocopyrightmusic_저작권없는 음악] 무료비트','.','2020-10-17 (14:02)','35','6zB_3rXU398');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','흔한 노래는 지루해, 나만 알고 싶은 유니크한 노래 모음 | PLAYLIST','.','2020-10-17 (15:02)','25','PW8vA03AK1I');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','[저작권 없는 음악 모음] 잔잔하고 차분한 감성의 브이로그 브금 20곡 연속듣기','.','2020-10-17 (13:02)','36','ynRAqelEEY0');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','고급스러운 분위기의 재즈 음악 Slow Jazz Music Music For Work & Study','.','2020-10-17 (12:02)','22','t12XRRECUPU');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','호텔라운지에서 듣는 고급스러운 재즈 연주','.','2020-10-17 (11:02)','26','lOjEXquTyyA');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','신나는게 필요할때! 트렌디한 팝송 모음, 드라이브할때 좋은노래, 운동할때 듣는 노래 베스트30곡 (재업로드)','.','2020-10-17 (16:02)','26','Pz3FhGbCgcA');
            INSERT INTO `media` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`video_name`) VALUES ('ksskss','고성식','Last Summer - Ikson [Free Copyright-safe Music]','.','2020-10-17 (15:04)','13','n2oTA5JSk80');
            END";
        break;

      case 'notice_procedure':
        $sql = "
            CREATE PROCEDURE `notice_procedure`()
            BEGIN
            INSERT INTO `notice` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('admin','관리자','집단시설 및 다중이용시설 범위 및 대상',
'* 집단시설\\n
학교, 사업장, 청소년 · 가족시설, 어린이집, 유치원, 사회복지시설, 산후조리원, 의료기관 등\\n
* 다중이용시설\\n
도서관, 미술관, 공연장, 체육시설, 버스 · 철도 · 지하철 · 택시 등 대중교통, 쇼핑센터(대형마트 · 시장 · 면세점 · 백화점 등), 영화관, 대형식당, 대중목욕탕 등\\n
','2020-02-03 (15:07)','13');
INSERT INTO `notice` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('admin','관리자','코로나19 재응을 위한 대학 학사운영 가이드라인 안내',
'교육부에서 마련한 코로나19 대응을 위한 학사운영 가이드라인을 안내합니다. 주요 내용은 다음과 같습니다.\\n
* 수업일수 감축 시 교과별 수업일수 충족 방안 안내
* 등교중지 학생 등 출석인정 권고 및 신·편입생 등 휴학 권고
* 등록금 징수기일 및 반환기준 안내\\n
','2020-02-13 (15:06)','11');
INSERT INTO `notice` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('admin','관리자','15일간 강력한 사회적 거리두기, 정부부터 앞장서 실천한다! -주요내용과 지침-',
'<주요 내용>\\n
- ‘생활 방역’으로 전환하기 위한 15일간 강도 높은 사회적 거리 두기 범정부 지원 계획 -\\n
1. [왜, 지금, 15일 간 강력한 사회적 거리 두기인가]
 ○ 단기간에 강화된 사회적 거리 두기를 실시하여 코로나19 확산을 최대한 막고, 우리 보건의료체계가 감당 가능한 수준으로 확진자 발생을 억제할 필요
 ○ 앞으로도 지속가능한 사회적 거리 두기를 위해 국민이 일상 생활과 조화 가능한 ‘생활 방역’으로 이행해 나갈 필요\\n
2. [국민 여러분께] “지금부터 15일 간 외출을 자제하고 최대한 집 안에 머물러 주시기를 간곡히 부탁드립니다”
 ○ (국민) 불요불급한 모임, 외식, 행사, 여행을 가급적 연기하거나 취소하고, 생필품 구매, 의료기관 방문, 출퇴근이 아니면 외출을 자제
 ○ (직장인) ‘퇴근하면 집으로, 아프면 집에 있기’ 등 직장 내 행동지침 준수
 ○ (사업주) 재택근무, 유연근무, 출퇴근 시간 조정으로 밀집된 환경 피하고, ‘아프면 집에 있기, 아파하면 집에 보내기’ 가능한 근로환경 조성\\n
3. [범정부 지원] “정부 부처부터 대국민 지원과 적극 참여를 통해 사회적 거리두기에 동참하는 국민을 지원합니다”
 ○ (지원) 소상공인 지원책 실시, 장기적으로 생활 방역 전환 시 종합적 지원 방안 마련
 ○ (공공기관) ‘공무원 복무관리 특별 지침’ 통해 공공기관 밀집된 환경 피하고 ‘아프면 집에 있기, 아파하면 집에 보내기’ 원칙 실천
 ○ (거리 두기 확산) ‘사업장 내 거리 두기 지침’ 전파해 사기업도 ‘아프면 집에 있기, 아파하면 집에 보내기’ 참여 독려
  - 도서관, 박물관, 미술관 등 국립 다중이용시설 운영 중지
 ○ (현장 점검) 관련 위험 시설·업종 전면적인 점검\\n\\n
- 국민 행동 지침, 일반 사업장 지침 -\\n
1. 국민 행동 지침
 ① 불요불급한 외출, 모임, 외식, 행사, 여행 등은 연기하거나 취소하기
   * 해외에서 식사 시 감염사례 다수 보고되어, 특히 식사를 동반하는 행사·모임은 연기하거나 취소
 ② 발열 또는 호흡기 증상(기침, 인후통, 근육통 등) 있으면 출근하지 않고 집에서 충분히 휴식하기
 ③ 생필품 구매, 의료기관 방문, 출퇴근을 제외하고는 외출 자제하기
 ④ 다른 사람과 악수 등 신체 접촉 피하고, 2m 건강거리 두기
 ⑤ 손씻기, 기침예절 등 개인위생수칙 준수하기
 ⑥ 매일 주변 환경을 소독하고 환기시키기\\n
2. 직장에서 개인 행동 지침
 ① 흐르는 물에 비누로 손을 꼼꼼하게 씻기
 ② 다른 사람과 1~2m 이상 간격 유지하고 악수 등 신체 접촉 피하기
 ③ 탈의실, 실내 휴게실 등 다중이용공간 사용하지 않기,
 ④ 컵·식기 등 개인물품 사용하기
 ⑤ 마주보지 않고 일정 거리를 두고 식사하기
 ⑥ 퇴근 이후에는 다른 약속을 잡지 않고, 바로 집으로 돌아가기\\n
3. 사업주 지침
 ① 밀집된 근무 환경 최소화 위해 직원 좌석 간격 확대하거나, 재택근무, 유연근무, 출퇴근·점심 시간 조정 등 방안 시행
 ② 출장은 연기하거나 취소하고, 회의는 전화 통화나 영상회의 등을 활성화
 ③ 직원이나 시설방문자 대상 매일 발열이나 호흡기 증상 모니터링하고 유증상자는 출입하지 않도록 조치하기
 ④ 탈의실 등 공용 공간 폐쇄하고, 매일 자주 접촉하는 환경 표면을 소독하고 매일 2회 이상 환기하는 등 사업장 청결을 유지하며, 필요한 위생물품 비치하는 등 근무환경 관리하기
 ⑤ 유증상자는 재택근무, 병가·연차휴가·휴업 등 활용해 출근하지 않도록 하고, 매일 발열체크 등을 통해 근무 중에도 증상이 나타나면 즉시 퇴근하도록 조치하기\\n\\n
* 자세한 사항은 첨부된 보도자료 참조
','2020-03-22 (15:05)','36');
INSERT INTO `notice` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('admin','관리자','코로나19(COVID-19) 예상 및 확산방지를 위한 사업장 대응지침(8판)',
'코로나19(COVID-19) 예방 및 확산방지를 위한 사업장 대응지침의 일부 내용이 변경되었음(붙임 참고)을 알려드립니다.
각 사업장에서는 참고하시어 신종 코로나바이러스 감염증 예방 및 확산방지에 만전을 기해 주시기 바랍니다.
자세한 사항은 관할 고용노동청(지청) 또는 질병관리본부 콜센터(1339)를 통해 문의하시기 바랍니다\\n
첨부) 코로나19(COVID-19) 예방 및 확산방지를 위한 사업장 대응 지침(8판)\\n
','2020-04-13 (15:04)','13');
INSERT INTO `notice` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('admin','관리자','긴급재난지원금 안내문자, URL 누르지 마세요!',
'□ 행정안전부(장관 진영)는 긴급재난지원금을 사칭한 스미싱(문자메시지 해킹 사기) 등에 따른 피해방지를 위해 이용자들의 주의를 당부했다.\\n\\n
□ 5월 4일부터 긴급재난지원금 관련 절차들이 시작되는 만큼, 정부, 지자체, 카드사 등에서 안내 문자가 발송될 예정이나,
○ 이들 기관에서 발송하는 안내 문자에는 인터넷주소(URL) 링크가 포함되지 않는다고 밝혔다.\\n
□ 따라서, 긴급재난지원금과 관련하여 인터넷주소 클릭을 유도하는 문자는 스미싱 문자로 의심되므로,
○ 해당 사이트에 절대 접속하지 말고 즉시 삭제하는 등 각별한 주의가 필요하다고 밝혔다.\\n
','2020-05-04 (15:02)','12');
            INSERT INTO `notice` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('admin','관리자','코로나바이러스감염증-19 대응 집단시설.다중이용시설 소독 안내(제3-4판)',
'코로나바이러스감염증-19 대응 집단시설·다중이용시설 소독 안내 (제3-4판)을 올려드리니 업무에 활용하시기 바랍니다.\\n
* 소독제 관련 세부정보 및 붙임 7. 코로나19 살균·소독제품의 안전한 사용을 위한 세부지침의 최신 개정안 자료는 환경부(화학제품관리과) 초록누리(http://ecolife.me.go.kr) 에서 확인 가능\\n
','2020-08-19 (15:03)','6');
            END";
        break;

      case 'faq_procedure':
        $sql = "
            CREATE PROCEDURE `faq_procedure`()
            BEGIN
            INSERT INTO `faq` (`id`,`name`,`subject`,`content`,`regist_day`) VALUES ('admin','관리자','예약 하려는 병원이 안보입니다.',
'토닥토닥 예약서비스를 이용하는 병원만 예약이 가능합니다.\\n
예약 가능한 병원을 찾으시려면 메인페이지 상단에\\n
진료/예약 페이지에서 원하시는 병원을 검색하실수 있습니다.','2020-10-17 (15:02)');
            INSERT INTO `faq` (`id`,`name`,`subject`,`content`,`regist_day`) VALUES ('admin','관리자','당일 사용자취소의 경우도 예약 불이행으로 불이익을 받는건가요?',
'당일 예약인경우 예약시간이 지난 상태에서 취소 불가능하고,\\n
당일 예약시간 이전에 취소하시면 불이익이 없습니다.','2020-10-17 (15:02)');
            INSERT INTO `faq` (`id`,`name`,`subject`,`content`,`regist_day`) VALUES ('admin','관리자','관심병원 등록은 어떻게 하나요?',
'관심 병원 등록 방법은\\n
로그인 한 후 진료/예약 페이지에서 원하는 병원을 클릭한 후\\n
우측 상단에 엄지버튼을 누르면 등록됩니다.','2020-10-17 (15:02)');
            INSERT INTO `faq` (`id`,`name`,`subject`,`content`,`regist_day`) VALUES ('admin','관리자','예약 취소는 언제 까지 가능한가요?',
'예약시간 이전까지 취소가능하지만,\\n
병원마다 상이하므로 자세한 사항은 해당 병원으로 문의하시기 바랍니다.','2020-10-17 (15:02)');
            INSERT INTO `faq` (`id`,`name`,`subject`,`content`,`regist_day`) VALUES ('admin','관리자','예약하고 병원에 갔는데 예약이 안되어 있다고 합니다.',
'예약 시, 반드시 -진료/예약하기- 버튼을 누르셔야합니다\\n
예약실패의 경우가 있을수 있으니 반드시 예약성공 후 표기되는 예약 번호를 확인하시고 병원에 방문하시기 바랍니다.','2020-10-17 (15:02)');
            INSERT INTO `faq` (`id`,`name`,`subject`,`content`,`regist_day`) VALUES ('admin','관리자','예약 취소는 어떻게 하나요?',
'예약 취소는 반드시 예약하신 시간 이전에 하여 주시기 바랍니다.\\n
로그인 후 우측 상단에 마이페이지 > 좌측 메뉴에서 예약 조회를 선택합니다.\\n
예약하신 항목에 예약 취소 버튼을 누르시면 예약을 취소 하실수 있습니다,.','2020-10-17 (15:02)');
            INSERT INTO `faq` (`id`,`name`,`subject`,`content`,`regist_day`) VALUES ('admin','관리자','회원가입 후 로그인이 되지 않습니다.',
'회원가입시 고객님의 정보를 보호하기 위한 uNetTrust Co. LTd 에서 배포하는 보안 프로그램을 반드시 설치하시기 바랍니다.\\n
보안 프로그램을 반드시 설치하셔야만 회원가입을 하신후 서비스를 이용하실 수 있습니다.','2020-10-17 (15:02)');
            END";
        break;

      case 'question_procedure':
        $sql = "
            CREATE PROCEDURE `question_procedure`()
            BEGIN
            INSERT INTO `question` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`read_pw`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8','1357');
            INSERT INTO `question` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`read_pw`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8','1357');
            INSERT INTO `question` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`read_pw`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8','1357');
            INSERT INTO `question` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`read_pw`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8','1357');
            INSERT INTO `question` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`read_pw`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8','1357');
            INSERT INTO `question` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`read_pw`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8','1357');
            INSERT INTO `question` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`read_pw`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8','1357');
            INSERT INTO `question` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`,`read_pw`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8','1357');
            END";
        break;

      case 'free_procedure':
        $sql = "
            CREATE PROCEDURE `free_procedure`()
            BEGIN
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            INSERT INTO `free` (`id`,`name`,`subject`,`content`,`regist_day`,`hit`) VALUES ('ksskss','고성식','제목','내용','2020-10-17 (15:00)','8');
            END";
        break;

        case 'health_info_procedure':
          $sql = "
              CREATE PROCEDURE `health_info_procedure`()
              BEGIN
              INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','이갈이',
              '\\n\\n
이갈이란 특별한 목적 없이 윗니와 아랫니를 맞대고 치아끼리 갈아대는 행위를 말한다. 이갈이는 코골이와 마찬가지로 불쾌한 소리를 유발하여 주위 사람들에게 고통을 줄뿐만 아니라, 본인에게도 좋지 않은 영향을 미칠 수 있다. 이갈이를 포함한 얼굴 주위에 나타나는 다른 나쁜 습관(예를 들면 아래윗니를 꽉 물어보는 습관, 턱을 좌우로 앞뒤로 움직여 보는 습관, 손톱이나 연필을 물어뜯는 버릇, 뺨이나 입술을 무는 습관, 턱을 괴는 버릇, 혀를 내밀어 보는 습관 등)은 치아를 포함하여 음식을 씹는 데 관여하는 근육, 악(턱)관절 등 저작 기관에 나쁜 영향을 줄 수 있다.
이갈이는 주로 수면을 취하는 도중에 나타나는 경우가 대부분이지만 낮 동안에도 자기 자신도 모르게 이갈이를 하는 사람도 있다. 또 대부분의 이갈이 환자들은 다른 사람이 이야기를 해주기 전까지는 자신의 습관을 잘 모르므로 실제 이갈이는 알려진 것보다 훨씬 많을 것으로 생각된다.\\n\\n
원인\\n\\n
이갈이의 명확한 원인은 아직 밝혀지지 않았다. 한때는 윗니와 아랫니가 서로 만나는 치아의 접촉관계가 나쁜 경우 이를 꽉 물거나 이갈이가 발생한다고 여겨진 적도 있었지만, 여러 연구 결과 치아 배열 상태의 이상만으로 모든 이갈이를 설명할 수는 없으며, 치아 접촉관계와 이갈이 사이의 직접적인 관련성은 부족한 것으로 생각된다. 또 하나의 가설은 심리적 원인론으로 불안과 스트레스가 이갈이와 관련이 있고, 이를 가는 사람은 그렇지 않은 사람보다 더 많은 일상의 스트레스를 경험한다고 보고되고 있다.
이와 같은 정서적인 문제와 얼굴 및 구강의 나쁜 습관이 관련성이 있는 것으로 알려져 있으나, 정서적인 문제가 선행되는 것인지, 뒤이어 나타나는 것인지, 아니면 단순히 공존하는 것인지는 정확하지 않다. 이외에도 약물의 복용, 유전적 소인, 중추신경계의 장애 등이 이갈이의 원인 요소로 여겨지고 있으나 이러한 원인에 의한 이갈이는 매우 드물다.
명백한 원인이 없는 수면 관련 이갈이는 일차성으로 명명하고, 정신활성약물, 여흥용 약물, 다양한 내과질환 등과 연관이 된 이갈이는 이차성으로 구분한다. 치료로 유발되는 이차성 수면 관련 이갈이는 의원성 이갈이라고도 한다. 일차성의 경우는 건강한 소아와 성인에서 대개 나타나지만 이차성인 경우는 뇌성마비, 정신지체, 비정상운동 환자 등의 소아에서 관찰된다.
건강한 성인의 경우에 심리학적 평가를 해보면 환경적인 요인 때문에 생긴 스트레스와 불안 등과 밀접하게 연관이 된다.\\n\\n
증상\\n\\n
수면 중 일회성의 지속적인 악물기(긴장성 수축), 반복적이고 연속적인 유상성 근육 수축(율동성 저작근육 활동, RMHA)이 수면 중에 강하게 일어나면 자주 이가는 소리를 발생시킨다.\\n\\n
1. 비정상적인 치아의 마모와 치아관련 증상\\n
- 이갈이 시 접촉되는 치아들이 비정상적으로 많이 닳게 되며, 순간적으로 센 힘이 가해져 치아파절을 일으키기도 한다. 이로 인해 치아의 감각이 예민해 질 수 있다. 찬물에 시린 증상이나 저작 시 통증이 생긴다.\\n\\n
2. 턱근육 통증, 관자놀이 주위 통증\\n
- 음식물을 씹는 데 관여하는 근육(저작근)과 악(턱)관절은 수직으로 가해지는 힘은 잘 견디지만 이갈이처럼 수평 방향으로 가해지는 힘은 잘 견디지 못한다. 그래서 이갈이가 반복적으로 진행되면 턱을 움직이는 근육들이 비정상적인 힘을 많이 받게 되어 얼굴 주위 근육에 묵직하고 뻣뻣한 느낌이나 통증이 발생할 수 있다.\\n\\n
3. 악(턱)관절 이상\\n
- 악(턱)관절에 가해지는 과도한 힘으로 인해 관절에 손상이 나타나면 턱관절에서 소리(관절음)가 나기도 하고, 통증 및 기능 이상을 일으켜 정상적인 턱 운동을 방해할 수 있다.\\n\\n
4. 중증 수면 관련 이갈이는 수면 곤란을 초래하기도 한다. 환자뿐만 아니라 배우자에게도 영향을 끼칠 수 있다. 이를 갈 때 치아 마찰로 인한 소음이 대개는 불쾌하게 들리며 그 소리로 인해 주위 사람들의 수면을 방해하고 정신적인 피해를 준다.\\n\\n
진단/검사\\n\\n
우선 환자 자신이나 주위 사람들에 의해 심한 이갈이가 있다고 하는 경우, 위에서 언급한 증상들이 있는지를 검사한다. 턱(악)관절 및 치아에 손상이 있는지를 확인하기 위한 방사선 촬영이 필요하다. 하지만 가장 중요한 검사는 얼굴 주위 근육과 턱 운동 및 턱(악)관절에 이상이 있는지를 확인하는 것이다. 이때 치아의 마모나 파절여부도 검사한다. 또 앞에서 언급한 바와 같이 정서적 문제를 평가하기 위한 간이정신심리검사도 필수적인 검사이다.
간이정신심리검사는 90문항의 질문을 약 5~10분간에 걸쳐서 답하는 간단하고 재미있는 과정이다. 이와 같은 모든 진단 과정은 통증을 유발시키지 않는 간단한 과정이며, 진단 과정을 마친 이후에는 얻어진 여러 정보들을 가지고 담당의사와 면담을 하게 된다.
수면 관련 이갈이를 검사하기 위해서는 근육활동이 이갈이 소리와 연관이 있는지를 보기 위하여 저작근육에 음향기록 장치를 달아야 한다. 수면다원검사에서는 전형적인 근전도 허상이 귀나 저작근에 기준전극을 부착한 뇌파에 기록되는 것을 보면 알 수 있다. 이갈이의 근전도 소견은 1 Hz의 빈도로 0.25~2초 정도 지속되는 위상성 활동과 2초 이상 지속적으로 유지되는 긴장성 활동이 혼재되어 나타난다. 각각의 이갈이 사이에는 최소한 3초 이상의 근육활동이 없는 시간이 있어야 한다. 비디오기록으로 이갈이 운동을 확인할 수 있다. 이 가는 소리에 맞춰 저작근과 관자근의 근전도 활동이 증가된 소견을 검사에서 확인할 수 있다.
수면 관련 이갈이는 모든 수면단계에서 나타날 수 있으나 1, 2단계 비렘수면(전체의 80% 이상)에서 흔하게 나타나고 10% 미만만이 렘수면에서 일어난다. 일부 사람들은 수면 관련 이갈이가 렘수면에서 주로 나타나기도 하지만 젊고 건강한 환자에서는 드물다.
수면다원검사는 질환을 증명하거나 호흡곤란, 야경증, 안면하악 근경련, 간질 등의 동반질환을 배제하기 위한 경우에 실시한다. 중증의 경우에는 수면다원검사의 민감도는 중간 이상이다. 경증의 경우에는 검사마다 편차가 크기 때문에 민감도가 낮은 편이다. 이동식 재택검사는 환자가 지내는 생활환경에서 치료 후 효과를 측정하는 데는 사용될 수 있지만 진단적 특이도가 떨어지는 단점이 있다.
수면 관련 이갈이의 진단을 위해서는 단위시간당 최소한 4회 이상의 이갈이가 있거나 간질과 같은 비정상뇌파활동이 없으면서도 단위시간당 15회의 개별근육활동에 단위시간당 최소한 2회 이상의 이가는 소리가 들려야 진단할 수 있다. 다른 검사는 유용한 것이 없고 뇌파는 간질이 의심되는 경우에 해당된다.\\n\\n
치료\\n\\n
이갈이의 명확한 원인을 모르므로 원인 요소를 전부 제거하여 이갈이를 근본적으로 없애는 방법이 현실적으로는 없다고 할 수 있다.\\n
현재 이갈이를 없애는 가장 좋은 방법으로 제시되고 있는 것은 턱 주위의 근육긴장을 줄일 수 있는 안정 장치를 입 안에 장착하는 방법과 센서와 같은 장치를 몸에 달게 하여 이갈이를 하면 센서가 작동하여 이갈이의 중단과 경각을 주는 등의 행동 조절 요법이며, 다행히 이를 통하여 이갈이와 이로 인한 불편감을 줄일 수 있다.\\n\\n
1) 안정 장치\\n
안정 장치는 틀니 비슷한 모양으로 플라스틱의 일종으로 제작되며 본인이 쉽게 끼고 뺄 수 있다. 이것은 이갈이 시에 나타나는 과도한 근육 긴장을 줄일 수 있도록 특별히 디자인된 것이다. 안정 장치를 착용하면 턱(악)관절과 턱 주위 근육에 가해지는 과도한 힘이 줄어들고, 결과적으로 이갈이로 인해 나타나는 증상을 줄일 수 있을 뿐만 아니라 증상이 나타나는 것을 예방할 수 있다. 또 안정 장치는 윗니 전부 혹은 아랫니 전부를 덮어주므로 덮인 치아는 보호를 받으며, 반대 측 치아는 치아보다 훨씬 약한 강도를 가진 안정 장치와 맞닿게 되므로 치아가 마모되는 대신 장치가 마모되어 치아가 닳는 것을 방지할 수 있다.
안정 장치는 이갈이 방지를 위해서는 수면 시에만 장착하면 되지만 때로는 증상의 감소를 위해서 장착시간을 늘리기도 하며, 이갈이에 의해서 안정 장치가 닳기 때문에 정기적인 조정이 필요하다.\\n\\n
2) 행동 조절 요법\\n
행동 조절 요법의 목표는 이갈이 시에 활성화되는 근육에 긴장 완화를 유도하여 이갈이 활동을 감소시키는 것이다. 우선 낮 동안에 근육 긴장을 일으키는 구강악습관을 적극적으로 찾아 줄이는 것이 행동 치료의 첫걸음이다. 이를 위하여 근육의 이완을 유도하고 구강악습관 예방에 도움이 되는 간단한 운동 요법을 익히는 것이 효과적이다.
근육을 이완시키는 훈련 방법에는 근전도를 이용하는 방법도 있다. 근육의 활성 정도를 나타내는 그래프를 환자에게 보여줌으로써 어떤 상태일 때 근육 활성이 높아지고 낮아지는 지를 환자가 직접 확인해서 근육 이완을 유도하는 것이다. 이상의 방법을 통하여 낮 동안에 근육 긴장을 적극적으로 줄이는 것이 야간 동안에 이갈이를 줄일 수 있는 것으로 알려져 있다.
또한 전기적 자극을 통하여 근육의 이완을 유도하는 방법도 도움을 주며, 자기 전에 명상을 통하여 근육의 긴장을 푸는 점진적 이완 요법은 잠들기 직전 침대에 누워 눈을 감고 심호흡을 하면서 사지의 말단에서부터 몸의 중심부로 서서히 근육을 이완시키는 것인데 잠들기 전 근육을 이완시킴으로써 잠자는 도중에도 근육들이 이완되기를 기대하는 치료 방법이다. 그 외에도 약물을 사용하는 경우가 있으나 초기 치료법으로 추천되지는 않는다.\\n\\n
이상에서 설명한 바와 같이 이갈이는 완전히 없애기는 힘들지만 증상의 정도에 따라 적극적으로 대처하면 충분히 줄일 수 있다. 하지만 무엇보다도 중요한 것은 스트레스와 같은 심리적 요인이 이갈이에 영향을 미치므로 매사 긍정적인 마음으로 즐겁게 생활하기를 실천해본다.\\n
[네이버 지식백과] 이갈이 [bruxism] (서울대학교병원 의학정보, 서울대학교병원)',
'치과','2020-10-17 (15:00)','8');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','충치',
'치과의학상 우식증(齲蝕症)이라고 한다. 또 이환치 그 자체를 가리키는 경우도 있다. 충치가 없는 사람은 매우 드물고, 평균 85.7%에 해당하는 사람들에게 충치가 있다. 미개인에게는 적고, 반대로 문명인에게 많으며, 또 야생동물에는 없는데 동물원에서 자라는 사육동물에는 있다.\\n\\n
그 원인에 대해서는 미국의 치과의사이며 세균학자인 W. D. 밀러(1853~1907)의 연구를 바탕으로 한 화학세균설이 현재 일반적으로 인정되고 있다. 즉, 구강 내에 상주하는 세균[齒牙脫灰菌]의 발효작용에 의하여 치아에 부착된 음식찌꺼기의 당분이나 전분 등의 탄수화물이 분해되어 생기는 젖산이 치아의 경조직의 석회를 탈각시키며, 더욱이 유기성분은 단백질을 용해하는 다른 세균의 작용에 의해서 파괴된다는 설이다. 이 밖에 충치에 걸리기 쉬운 소질은 유전한다고 하며, 특히 치아의 발생기에 비타민이나 칼슘이 부족하여 법랑질의 발육불충분을 야기하거나, 당분이나 산성식품을 과도하게 섭취하거나, 당뇨병·신장병과 여성에서는 임신도 그 원인이 되어 있다.\\n\\n
음식물의 찌꺼기가 부착하기 쉬운 위턱·아래턱의 어금니의 표면에 있는 홈이나 쑥 들어간 곳이나 인접면 앞니의 사이 등이 발생하기 쉬운 부위이며, 우선 제1 표층에 있는 법랑질이 침식당한다. 이 단계를 우식 제1도, 즉 법랑질 우식이라고 하며, 지각신경이 없으므로 아프지 않으나 그 부분이 조잡하게 파괴되어 검게 변하게 된다. 이 시기의 치료는 병원에 다니는 횟수도 많지 않을 뿐 아니라, 최소비용으로 최대효과를 기대할 수 있다.\\n\\n
그것이 더욱 진행하여 상아질까지 이르게 되면 우식 제2도, 즉 상아질 우식이라고 한다. 상아질에는 상아세관이 있고, 이것에 따라 진행이 빨라지고 움푹 패는 공동이 생기기 쉬우며, 음식찌꺼기 등이 괴기 쉽게 되어 더욱 진행을 빨리 촉진시키며 썩은 냄새를 나게 한다. 상아질에는 치수(齒髓)의 분지(分枝)가 있으므로 찬 공기나 물에 접촉하면 통증이 있다. 이 단계에서는 상아질을 소독하기 위한 시일이 많이 걸리지만 완전히 치료할 수 있으며, 이것이 본래의 충치치료라고 할 수 있다. 즉, 치아충전술이 행하여진다.\\n\\n
일반적으로 치아질환은 자연치유가 될 수 없으므로 방치하면 그것은 곧 치수염을 일으키고 심한 통증을 느끼게 된다. 이 단계에서 치료를 시작하면 치수를 처치하는 일수만큼 더 걸린다. 이 경우 환자는 치통이 없어지기만 하면 곧 나은 것 같은 착각에 빠지기 쉬우나 실제는 통증을 가라앉히고 나서 충치의 치료를 시작하게 되는 것이다. 따라서 병원에 다니는 것을 중단하면 반드시 치수염을 재발시키고 이것을 되풀이하는 동안에 치주염까지 진행되어 더욱 치료가 어렵게 된다.\\n\\n
최근에는 식후의 구강위생의 철저함이 강조되고 있다. 플루오린의 치면 도포는 1969년 WHO 총회에서 그 추진이 결의되었으며, 현재는 치과병원에서 실시하고 있다. 즉, 맹출 직후의 유치 또는 영구치에 2% 플루오린화나트륨액 또는 8% 플루오린화주석액을 발라서 침으로 희석되지 않도록 30분 동안 그대로 방치한다. 바르는 횟수는 플루오린화주석에서는 1회, 플루오린화나트륨에서는 2주일에 3∼4회 실시하되 극약이므로 치과의사나 치과위생사가 아니면 실시할 수 없다. 이것은 충치의 원인이 되는 분해효소의 작용을 저지함으로써 예방목적을 달성하는 것이다. 더욱이 유치의 충치를 방치하는 것은 잘못으로 유치가 충치가 되면 잘 빠지지 않아 영구치의 치열을 나쁘게 하며, 그것이 영구치의 충치 원인이 되므로 반드시 치료받는 것이 바람직하다.\\n\\n\\n
[네이버 지식백과] 충치 [dental caries, 蟲齒] (두산백과)',
'치과','2020-10-17 (15:00)','12');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','입냄새 원인과 제거법',
'입냄새(구취)는 평소에 건강한 상태에는 별로 문제를 일으키지 않지만, 산소가 있는 상태에서 자라는 균들과 산소가 없는 상태에서 자라는 균들이 많이 있고, 일부 적은 비율이기는 하지만 곰팡이 종류들도 입안에 항시 존재한다.\\n\\n
입냄새는 왜 나는 것일까?\\n
굳이 우리 신체에 병이 없더라도 있을 수 있다. 주범은 입안에 있는 균들에 의한 부패작용과 이에 의한 황화산화물이다. 특히 아침에 구취가 심한 이유는 입을 다물고 있는 상태에서 타액의 분비도 적어서 밤 사이 산소가 없는 상태를 좋아하는 균들이 치아와 잇몸 사이 등에서 번식하고 음식 찌꺼기를 부패시키기 때문이다.\\n
그러므로 양치질을 하려면 취침 전에는 필수적이며, 치아, 치아 사이, 잇몸과 치아 사이, 그리고 혀와 혀뿌리까지(약간의 구토가 있을 때까지도 좋다) 골고루 양치질을 하는 편이 좋겠다. 굳이 아침에 아니더라도 입안이 건조한 상태는 구취의 원인이 된다. 즉 충분하지 못한 수분의 섭취나, 긴 연설, 스트레스, 여러 종류의 약제들이 원인이 된다. 여성의 경우 달마다 치르는 행사 기간에 심한 입냄새를 느낄 수도 있는데, 이유는 호르몬의 영향으로 잇몸이 붓고 이사이의 음식물의 부패로 인한다는 사람도 있다.\\n
의학적으로 어떤 질환들이 입냄새와 관련이 있는지 살펴보면 90% 이상이 구강의 위생상태가 불량하거나, 잇몸 질환, 백태, 음식물 찌꺼기, 불결한 의치, 상기도 감염인 인두염, 편도염, 그리고 구강암 등을 예로 들 수 있다. 나머지 10% 정도는 폐질환으로 기관지 확장증, 폐농양 등이 있고, 간질환으로 간성 혼수, 그리고 당뇨병으로 인한 합병증 등을 들 수 있다.\\n
이외에도 이비인후과에서는 만성 부비동염(축농증)으로 목 뒤로 누런 가래가 넘어가 항시 입냄새에 시달리는 환자, 어린이가 코 안에 휴지, 구슬 등을 넣고 한참 지나서야 누런 코가 흐르고 목 뒤로 콧물이 넘어가 심한 악취가 나서 오는 경우도 있다. 어느 정도는 강박적인 사고로 타인은 느끼지 못하는데도 스스로 입냄새에 시달려 고민하는 사람도 있다.\\n\\n
입냄새를 없애는 효과적인 방법은?\\n
타액이야말로 자연적으로 입냄새를 해결해 줄 수 있는 물질인데, 무엇보다 중요한 것은 구강의 건조 상태가 충치나 잇몸 질환을 유발하기 쉽고, 입냄새의 중요한 원인이므로 이를 방지하는 게 중요하다. 입냄새를 없애기 위해서는 자주 구강 및 치아, 인두를 청결히 하고, 항상 건조하지 않게 하는 게 제일 좋은 방법이지만, 지속될 때에는 전문의의 정확한 진찰을 받아 원인을 찾아 해결하면 그리 고민할 필요는 없는 질환이다.\\n\\n\\n
[네이버 지식백과] 입냄새 원인과 제거법 (중앙대학교병원 건강칼럼)',
'치과','2020-10-17 (15:00)','14');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','스케일링',
'치과에서 치아에 붙은 치석을 제거하는 시술.\\n\\n
어원은 딱딱한 물질을 긁어내거나 비늘(Scale)을 벗긴다는 뜻. 다른 말로 치석제거술이라고도 한다. 구강 내의 자연 치아나 인공치아에 부착된 경성 침착물(치석과 같은 딱딱한 침착물)이나 연성 침착물(치면 세균막, 음식물 잔사 및 외인성 색소)을 물리적으로 제거하여 거칠어진 치아 표면을 매끄럽게 함으로써 재부착을 방지할 목적으로 하는 예방 술식.\\n
치아에는 양치질을 주기적으로 하더라도 불순물은 끼게 되어있다. 물론 과거와는 달리 오늘날은 치약, 칫솔뿐만 아니라 치실, 치간칫솔, 구강청정제 같은 다양한 도구들이 나온 덕분에 치아 관리가 훨씬 더 수월해졌기에 예전보단 덜 심각하지만, 그래도 여전히 치아에는 불순물이 달라붙는다. 심지어 매일 꼬박꼬박 양치질에 가글, 그리고 치실까지 동원하는 등 빡빡하게 관리해도 쌓이는 속도를 늦출 수만 있을 뿐, 결국 쌓이는 것 자체를 막을 수는 없다. 그리고 이런 불순물들은 그 자체로는 문제될 것이 없지만 이 불순물들이 몰고 오는 부가적인 문제점들 때문에 치아와 잇몸에 악영향을 미칠 수 있으니 이것을 전용 기구(스케일러)로 제거해주어야 하는데 이 작업이 바로 스케일링이다.\\n
일반적으로 6개월마다 검사를 받는다. 흡연자같이 치석이 많이 부착되는 사람은 3개월 주기로 하고, 칫솔질이 잘 되고 구강 위생상태가 양호한 사람은 1년 주기로 한다. 충치가 생기기 쉬운 어린 나이에는 6개월 검진을 하는데 단골 치과의 경우 본인이 치아 관리를 열심히 한다면 의사의 판단하에 1년 주기로 바꿔준다.\\n
난생처음으로 시술받는 사람이라면 웬 석탄 덩어리가 잇몸에서 튀어나오는 것을 볼 수도 있다. 시술받은 후엔 확실히 입냄새의 질이 달라진다. 한번 자란 후엔 다시 나지 않는 치아를 물리적으로 갈아낸다는 편견과 치과의사가 계란을 스케일링하는 장면. 계란이 부서지지 않는다. 자주 시술받아야 한다는 점에 거부감을 가지는 사람도 많은 편이지만 이런 사람들도 입냄새가 달라진다는 점에 있어서는 이견을 제시하지 않는다.\\n
상술했듯 스케일링 과정에서 치아가 깎여나간다는 오해가 있는데 사실과 다르다. 당장 스케일링하는 영상을 유튜브에서 찾아봐도 치아를 드릴로 갈아내는 장면 따위는 어디에도 없다. 뭔가 진동기 비스무리한 기구로 치석만 깨뜨려 들어내는 장면만을 볼 수 있을 뿐이다. 물론 스케일링 받는 입장에서는 이를 갈아내는 것으로 착각할 만한 느낌이 들지만... 치아를 갈아내는 건 아니다. 스케일링으로는 결코 치아가 갈려나가지 않는다. 치석제거장비의 강도로는 치아를 갉아낼 수가 없다. 치료 중 약간의 통증이 오는 이유는 치석이 쌓이고 굳어 잇몸에 영향을 주고 있었던 것을 강제로 자극을 주어 제거하는 과정에서 영향을 받기 때문이다. 스케일링 과정에서는 어디까지나 치석 등의 침착물만 제거하며 치아에는 손상을 입히지 않는다. 그리고 치석은 상술했듯 시간을 두고 점차 쌓이는 물질이다. 이미 오랜 세월에 걸쳐 단단히 완성된 치아와의 강도 차이는 비교할 수 없다. 그래서 스케일링 도구들은 딱 치석만 갈아 없앨 만큼의 위력만 나오도록 만들어진다.\\n
수동 스케일링을 받아보면 치석을 제거를 위해 잇몸과 치아가 맞닿는 부분에도 기구를 사용하는데, 잇몸이 조금 아프거나 피가 약간 나는 수준에 그친다. 진짜 치아를 갈아버릴 정도의 강도로 기구를 작동시킨다면 잇몸도 같이 갈려 나가게 된다.\\n
간혹 너무 지나치게 피가 많이 나오는 경우도 있는데, 이땐 잇몸 검사를 받아보는 것이 좋다. 치석 때문에 잇몸이 내려 앉거나 혹은 잇몸 자체가 좀 안좋아서 피가 나는 경우다.\\n
스케일링 후 잇몸이나 치아 사이가 허전한 느낌이 나는 등의 이물감을 느낄 수 있는데 이게 치아를 깎아내는 원인이라고들 생각하는 계기이다. 그러나 이것은 치석이 없어지면서 일시적으로 빈 공간이 생겨서 그런 것이다. 시간이 지나면 저절로 잇몸이 반틈 정도 회복된다. 예시를 들자면 콧구멍 속에서 코딱지를 파낸 것과 같은 원리이다. 생애 단 한 번도 스케일링을 받아본 적이 없는 사람일수록 첫 스케일링 시 쇼크를 많이 받게 된다. 일단 치아 표면이 매우 맨들맨들해지고 잇몸과 치아 사이가 느껴진다. 특히, 처음 스케일링 받으면 앞니 위 아래쪽의 틈이 훤히 보이고 치석에 밀린 잇몸 때문에 잇몸 속살이 조금 빨갛게 보이는 게 충격적일 수 있으나 그만큼 매우 시원하기 때문에 스케일링을 자주 하게 된다. 잇몸이 붓거나 피가 나는 등 잇몸에 염증이 생기는 원인은 대부분 치석이기 때문에 꽤 나이가 들 때까지 스케일링을 안하고 산 사람은 첫 스케일링 후에 염증의 원인인 치석이 제거되니 자연히 잇몸이 붓거나 양치할 때마다 피가 나는 증상도 싹 사라지는 경험을 하게 되는 경우가 많다. 이 좋은 걸 왜 지금까지 안했던가! 하면서 스케일링 전도사가 되는 경우도 제법 있다.\\n
단, 스케일링은 치석을 제거할 뿐 치아미백(이를 하얗게 만드는 것)은 되지 않는다. 치아에 쌓인 칼슘과 인 덩어리를 제거하는거지 이미 속까지 착색된 치아를 깨끗하게 할 수 없다.. 치아미백은 건강보험 적용이 안되기 때문에 만일 천연 누런이를 미백하고 싶을 시엔 비용이 많이 깨질 각오해야 한다.\\n
치과에 가서 스케일링을 받으면 치과의에게 진료를 받고 치과위생사(치위생사)에게 스케일링을 받게 되는데, 왜 의사가 직접 안해주고 위생사에게 맡기냐고 의아해하는 경우가 가끔 있다고 한다. 물론 치과의사도 스케일링에 대한 교육과 실습은 받지만 학생 시절에 한두 번 경험하는 게 전부이고, 치위생사는 학교에서 3~4년 동안 스케일링에 대한 전문교육을 받으며, 실제 환자에게 스케일링을 한 경험도 훨씬 많다. 오히려 의사가 스케일링을 해준다고 해도 전문성이 있는 것이 아니고 훨씬 못하거나 아프게 할 가능성이 있는 것.치과의사의 설명 일반 병원에서 채혈이나 주사 접종을 의사가 직접 안하는 거랑 비슷하다고 생각하면 된다.\\n
초음파 스케일링은 스케일링을 하는 과정에서 엄청난 고주파 굉음이 발생하는데 이것 때문에 스케일링을 싫어하는 사람도 다수다. 흔히 가장 듣기 싫은 치과안의 소리를 충치를 갈아버리는 드릴 소리라 하는데 사람에 따라서 이 스케일링 소리가 더 듣기 싫다. 끼이이이익 끼긱 끼기긱!  하는 소리가 나서 굉장히 신경에 거슬린다. 그렇다고 귀마개로 귀를 막자니 치위생사나 의사의 지시사항을 못 들으니...\\n
또한 초음파 스케일링은 기구에서 물이 분사되는데 이를 제거하기 위해 진공흡입기 석션을 상시 대기 시킨다. 간혹 물이 너무 고일 경우 왼손을 들면 잠시 멈추고 이때 빨대를 물듯 입을 다물어 물을 전부 빼내면 된다.',
'치과','2020-10-17 (15:00)','21');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','비문증',
'비문증(飛蚊症, 영어: floaters 플로터스[*], 의학: myodesopsia)은 안구의 유리체 속에 떠다니는 운동성 부유물로 인해 눈앞에 무언가 떠다니는 것처럼 보이는 현상이다. 날파리증이라 불리기도 한다.
부유물들이 보이는 까닭은 그림자가 망막에 가려지거나 이들을 통과하는 빛의 굴절 때문이며 시야에 하나 또한 여러 개가 한꺼번에 나타날 수 있다. 관찰자의 눈 앞에 느리게 떠다니는 부유물은 점, 실, 조각, 거미줄처럼 나타난다.
이러한 부유물들이 눈 안에 실제 존재하므로 이들은 착시가 아닌 내시 현상으로 간주된다.\\n\\n
비문증은 눈을 채우고 있는 두꺼운 유동체인 유리체의 변화에 기인한다. 유리체는 눈을 대부분 채우고 있는 투명한 겔 같은 물질이다. 수정체 뒤의 유리체방에 위치해 있으며 안구의 4대 광학 요소 가운데 하나이다. 그러므로 부유물들은 눈의 빠른 움직임을 따라가지만 유동체 안에서는 느리게 떠다닌다. 처음에 이를 눈치를 챌 경우 자연스러운 반응은 이들을 직접 쳐다보려고 시도하는 것이다. 그러나 부유물들이 눈의 움직임을 따라가기 때문에 이들에 시선을 이동하려고 시도하는 것은 어려우며 시선 방향의 측면에 남게 된다. 부유물들은 실제로 눈 안에 완전하게 고정된 채 있지 않기 때문에 보인다. 눈의 혈관이 빛을 방해하기도 하지만, 이들은 일반적인 환경에서는 보이지 않는데 혈관 위치가 망막에 상대적으로 고정되어 있고 뇌가 신경 감각적응으로 인해 안정화된 영상을 무시해버리기 때문이다. 이러한 안정화는 부유물들에 의해 방해를 받기도 하는데 특히 이들이 눈에 보일 때 그러하다.\\n\\n
부유물들은 푸른 하늘과 같은 개방된 단색 공간이나 비어있는 표면을 응시할 때 특히 눈에 잘 띈다. 비문증을 영어로는 floater라고 하는데, 이는 부유물 을 가리키며 이러한 이름에도 불구하고 실제로 이들 다수는 안구의 아래에 가라앉는 경향이 있다.\\n\\n
부유물들은 특히 변화가 없으며 일상 시야에 지속적으로 나타난다. 이 증세는 드물지 않으며 대부분의 사람들에게는 심각한 문제를 일으키지는 않는다. 2002년 검안사 조사에 따르면 영국에서 1개월에 평균 14명의 환자들이 부유물 증상을 이야기하였다. 그러나 부유물들은 심각한 증세를 겪는 사람들에게 성가심과 집중 방해를 받을 수 있으며 특히 점들이 시야를 꾸준히 떠돌아다니는 것처럼 보일 때 그러하다.\\n\\n
비문증이 나타나는 원인은 다양하다. 간단히 말해 물질이 유리체로 들어올 정도로 눈에 위해가 가해진 경우 부유물들을 초래할 수 있다. 부유물들은 망막 박리로 인한 것일 수도 있으나 대부분의 경우 노화나 고도근시에 의한 유리체의 자연스런 변화에 의한 것이다.\\n\\n',
'안과','2020-10-17 (15:00)','24');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','난시',
'난시(亂視)란 안구의 굴절이상으로 인해 물체를 명확히 볼 수 없는 상태를 말한다. 굴절이상의 한 종류이나 근시나 원시와는 차이가 있다. 대신 근시나 원시와 같이 발생할 수는 있다. 난시가 있으면 상이 뚜렷하게 보이지 않는다거나, 상이 두 개로 번져보인다거나 하는 현상이 발생한다. 난시가 발생하는 원인에 대해서는 아직 뚜렷하게 밝혀진 것이 없다. 아무래도 눈이 피로하면 더 심해지는 경향이 있다.\\n\\n
난시는 크게 두 가지 종류로 나뉘는데, 하나는 안굴절력계가 대칭이 아니라 럭비공처럼 변해서 가로 방향의 빛과 세로 방향의 빛이 서로 다른 곳에 맺히는 정난시와 각막에 미세한 흠이 생기거나 표면이 울퉁불퉁해서 생기는 부정난시가 있다. 정난시는 또 직난시, 도난시, 사난시로 나뉜다. 직난시(바른난시, With-the-rule astigmatism)는 굴절력이 최대인 주경선이 수직 방향에 위치한다. (럭비공이 옆으로 누운 모양). 도난시(Against-the-rule astigmatism)는 굴절력이 최대인 주경선이 수평 방향에 위치한다. (럭비공이 세로로 서있는 모양). 마지막으로 사난시(경사난시, Oblique astigmatism)는 가장 가파른 곡선이 120~150도와 30~60도 사이에 위치한다. 일반적으로 난시라고 하면 앞의 것을 가리킨다.\\n
증상은 종류와 어떤 안구굴절현상이 동시에 일어나고 있는지에 따라 개인차가 있는 편이다. 주관적인 경험에 의하자면, 초기 증상의 경우 사물이 어른어른거리는 느낌이 들 수도 있는데, 이게 피로도 등으로 인해 심해질 경우 사람 팔이나 두상 등이 두쌍으로 보인다거나 달이 3개로 보이는 증상 등이 나타날 수도 있다. 그리고 웃긴게 안구 한쪽을 손가락으로 눌러본다던가 찡그리거나 핀홀 검사처럼 종이에 자그마한 구멍을 내서 보면 또 난시가 사라지는 경우도 있으니 어안이 벙벙하다. 덕분에 자꾸 찡그리다보면 미간에 주름진다.\\n
주경선의 초점에 따라 단순 난시냐 복합 난시냐가 갈린다. 또한 단순 난시와 복합난시도 근시성이냐 원시성이냐로 나뉜다. 단순 원시성 난시는 최초 초점선이 망막에 맺히지만 두 번째는 망막 뒤에 위치한다. 단순 근시성 난시는 반대로 최초 초점선이 망막 앞에 맺히지만 두 번째는 망막에 맺힌다. 복합 원시성 난시는 두 초점선이 망막 뒤에 위치한다. 복합 근시성 난시는 반대로 두 초점선이 망막 앞에 위치한다.\\n
큰 돋보기가 있다면 보다 정확하게 자가진단을 할 수 있다. 돋보기를 조금 멀리 떨어뜨린 채로 멀리 있는 사물을 보면 상하가 뒤집혀서 보이게 되는데 이 때 뚜렷하게 보이면 정상이거나 단순 근시이고 겹쳐 보이거나 해서 보기 불편하게 느껴지면 난시이다.\\n
사람들이 잘 모르는 부분이 있는데, 난시는 현대 사람들 대다수가 갖고 있는 비정시이며, 본인이 난시안인지 모르는 경우 역시 대다수이다. 보통 안경원에서는 실린더 굴절력 2.00까지의 안경 렌즈는 대부분 구비하고 있으며 가격 차이도 없다. 콘택트렌즈도 마찬가지로 팩렌즈는 2.25, 병렌즈는 1.75 정도까지는 구비되어 있는 곳이 많다. 안경 렌즈의 실린더 굴절력이 2.00을 초과하는 경우 RX라 불리는 주문 렌즈의 범위로 들어가나, 최근(?)에는 그 두 배 도수인 4.00까지는 여벌RX로 분류하는 안경원도 찾을 수 있는데 이 경우는 가격이 좀 더 저렴하다. 4.00마저 초과하면 빼도박도 못하는 RX렌즈가 되기 때문에 가격이 두 배 이상 뛴다.\\n
콘택트렌즈의 경우 팩렌즈는 하루착용(30개), 2주착용(6개) 제품들 모두 거의 45,000원으로 평준화되어 있고 병렌즈는 점포별로 가격이 들쑥날쑥하나 보통 제일 저렴한 렌즈는 일반 병렌즈의 두 배 정도 가격대로 잡혀 있다. 다만 서클렌즈를 난시교정용으로 하고자 한다면 각오를 좀 하는 게 좋다. 난시를 교정하는 토릭렌즈는 가공법부터가 완전히 다른데 거기에 색소까지 집어넣어야 하기 때문에 10만 원 초중반대 정도는 나오기 때문. 아무리 저렴해도 8만원 아래로는 찾기 어렵다. 심지어 사용기한도 일반 서클렌즈와 차이가 없기 때문에 서클렌즈에 난시를 넣는 건 포기하는 사람들이 많다. 하드렌즈의 경우는 구조 자체가 난시를 교정해 주기 때문에, 물론 난시교정용 하드렌즈를 맞추는 경우는 웬만해선 없다고 봐도 좋으나, 심한 수정체 난시 등 특수한 경우에는 교정하기도 한다.\\n
프랑스 등 유럽 일부 국가에서는 이런 심한 난시의 경우 질병으로 취급하여 렌즈값을 의료보험으로 해결할 수 있지만, 한국에서는 아직 안 된다. 난시까지 있는 눈의 경우 안경원과 안과 여러 군데를 돌며 처방을 확인해 보면 같은 도수 처방을 하나 이상 찾는 것조차 불가능에 가깝다. 안과와 안경원 어느 한 쪽이 잘 한다는 보장도 없고, 그저 검안사가 얼만큼 피검사자의 상황에 맞게끔 잘 검사해 주는지에 달려 있다.\\n
난시의 경우에는 굴절이상이 계속 바뀌는 경향이 있어서 어릴때부터 성인이 될 때까지 계속 안경렌즈를 바꿔야 하며, 난시가 일정 수준 이상 심해지면 안경을 써도 시력 0.6 ~ 0.8을 넘기기 힘든 경우가 많아지고, 이렇게 되면 시력교정술도 할 수 없게 된다. 또 수평-수직 굴절률 차이 값이 5디옵터 이상이면 병역 신체검사에서 4급 판정을 받게 된다(2009년까지는 4 이상이었다). 디옵터 절대값이 크면 클수록 난시 정도도 비례하여 심해진다.\\n
드물게 난시가 심하더라도 시력은 일반인 정도(나안시력이 1.0가량)인 사람들이 있다. 하지만 눈이 이 시력을 내기 위해 조절해야하는 것이 많기 때문에 눈의 피로가 대단히 심하다. 안경을 끼면 상당부분 완화되나 완벽하게 해소되지는 않는다. 또한 이 경우 안과에 가더라도 렌즈를 맞추지 못하는 경우가 있다. 렌즈를 맞추더라도 눈에 큰 변화가 없는 케이스인데, 어쩔 수 없이 안약만 처방 받고 끝나는 경우가 많다.\\n',
'안과','2020-10-17 (15:00)','51');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','녹내장',
'녹내장은 진행하는 시신경 병증으로 시신경의 기능에 이상을 초래하고 해당하는 시야의 결손을 유발하는 질환이다. 시신경은 눈으로 받아들인 빛을 뇌로 전달하여 ‘보게 하는’ 신경이므로 여기에 장애가 생기면 시야 결손이 나타나고, 말기에는 시력을 상실하게 된다.\\n
개방각 녹내장은 전방각이 닫히지 않고 정상적인 형태를 유지한 채 발생하는 녹내장을 말하고, 폐쇄각 녹내장은 갑자기 상승한 후방압력 때문에 홍채가 각막쪽으로 이동하여 전방각이 폐쇄되어 발생하는 녹내장을 말한다. 각막의 후면과 홍채의 전면이 이루는 각을 전방각이라 하며 이것이 눌리면 방수가 배출되는 통로가 막히게 되므로 안압이 빠르게 상승하게 된다.\\n\\n
녹내장 발병의 주요 원인은 안압 상승으로 인한 시신경의 손상이다. 시신경 손상이 진행하는 기전으로, 안압 상승에 의해 시신경이 눌려 손상된다는 기전과, 시신경 혈류에 장애가 생겨 시신경의 손상이 진행된다는 두 가지 기전으로 설명하고 있다. 그러나 아직까지 병을 유발하는 정확한 원인은 밝혀져 있지 않으며, 이를 밝히기 위한 연구를 지속적으로 수행하고 있다.\\n
안압이란 눈(안구)의 압력을 말한다. 안구를 축구공에 비유했을 때, 축구공 안에 공기가 너무 적어도 안되고 너무 많아도 안 되는 것처럼 눈의 형태를 유지하기 위해서는 안구 내부에 적절한 압력이 유지되어야 한다. 안압이 너무 낮으면 안구 자체가 작아지는 안구 위축이 올 수 있고, 너무 높으면 시신경이 손상 된다. 안압은 주로 방수(눈 안에서 생성되는 물로, 눈의 형태를 유지하고 눈 내부에 영양분을 공급하는 역할을 담당한다) 순환의 균형에 의해 결정된다.\\n
방수는 홍채 뒤쪽의 모양체라는 조직에서 매일 조금씩 생성되며, 생성된 양만큼 순환을 통해 눈 외부로 배출되는 흐름을 갖는다. 방수가 너무 많이 생성되거나 흐름에 장애가 생겨 배출이 적어질 경우 눈 내부의 압력이 올라가게 되는데, 이러한 과정을 통해 안압이 상승되어 녹내장을 일으키게 된다. 녹내장의 가족력이 있거나, 평소 안압이 높은 경우, 또는 고혈압, 당뇨병, 심혈관 질환 및 근시를 가진 사람에게서 발병률이 높다.\\n\\n
녹내장의 증상은 크게 급성과 만성으로 나누어 설명할 수 있다. 급성 녹내장은 전체 녹내장의 약 10% 정도를 차지하며, 안압(안압의 정상범위는 10 ~ 21mmHg)이 갑자기 상승하면서 시력 감소, 두통, 구토, 충혈 등의 증상이 나타날 수 있다.\\n
하지만 대부분의 녹내장은 시신경이 서서히 손상되므로 특별한 자각 증상을 느끼지 못하다가, 말기에 이르러 시야 장애 및 시력 저하 증상이 나타난다.\\n\\n
급성 녹내장은 통증이 심해 주로 응급실로 내원하게 되는 반면, 만성 녹내장은 증상이 나타나지 않으며, 증상이 나타났을 때에는 이미 말기이므로 치료가 어렵다. 따라서 정기적인 안압검사 및 안저검사(funduscopy)를 통해 녹내장을 조기에 발견하여 치료하는 것이 매우 중요하다. 이를 위해 안압측정, 시야검사, 시신경 단층 촬영검사, 망막시신경섬유층촬영검사 등의 정밀검사를 시행하고 녹내장을 진단 및 분류하여 치료 계획을 세웁니다.\\n\\n
급성인 경우 빨리 안압을 떨어뜨려 시신경을 보존하는 것이 중요하다. 먼저 안압을 내리는 안약을 점안하고, 안압하강제를 복용하고, 고삼투압제를 정맥주사로 투여하는 등의 처치를 통해 신속히 안압을 내린다. 안압이 내려간 후에는 홍채에 레이저를 이용하여 작은 구멍을 뚫어 방수의 순환 및 배출을 돕는다. 안압이 정상화된 후에는 시야검사를 통해 시야결손 유무를 확인한다.\\n
만성인 경우에는 더 이상의 시신경 손상을 막기 위해 안압하강제를 점안하는데, 한 종류의 약물에 반응이 없다면 다른 계열의 약물을 사용해 볼 수 있다. 만일 안압이 충분히 내려가지 않으면 다른 약제를 추가한다. 녹내장의 종류에 따라 레이저치료가 필요한 경우가 있으며 개개인의 상태에 따라 치료 방법이 다르다. 약물이나 레이저 치료로도 안압 조절이 잘 이루어지지 않는 경우에는 녹내장수술을 시행하게 되는데, 수술의 목적은 안압의 조절이며 이미 손상된 시신경을 복구시키는 것은 아니다.\\n\\n
녹내장은 특별한 예방보다는 조기 발견이 중요하므로 만 40세 이상이 되면 매년 녹내장 여부를 확인할 수 있는 검사를 받는 것이 좋다. 녹내장 중에는 안압이 정상범위(10 ~ 21mmHg)에 속하지만 시신경 손상이 진행되는 정상안압녹내장도 있기 때문에, 안압 이외에도 안저촬영 (fundus photography)을 통해 시신경섬유층의 결손 유무를 반드시 확인해야 한다.\\n\\n\\n
[네이버 지식백과] 녹내장 [glaucoma] (서울대학교병원 의학정보, 서울대학교병원)',
'안과','2020-10-17 (15:00)','45');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','라식과 라섹',
'컴퓨터 모니터나 스마트폰을 통해 텍스트를 읽을 때 글자가 뿌옇거나 뭉개져 보이는 등 시력 감소가 느껴져 시력 교정술을 고려하는 젊은 층 환자가 많다. 시력 감소는 수정체의 탄력성이 저하되며 초점 조절력이 떨어지는 것이 주요 원인이다.\\n\\n
눈의 조절력이 충분한 상태에서는 수정체를 두껍게 하거나 얇게 조절하여 가까이 있는 대상부터 멀리 있는 대상까지 초점을 맞춰 선명하게 인식할 수 있다. 가까이 있는 사물을 볼 때에는 수정체를 두껍게 하고 멀리 있는 사물은 수정체를 얇게 하여 초점을 맞춘다.\\n\\n
그러나 수정체의 탄력성이 떨어지거나 수정체의 모양 문제로 초점이 정확하게 맺히지 않아 시력이 떨어지게 되면 수술을 이용해 시력을 교정할 수 있다. 가장 널리 알려진 시력교정술은 라식과 라섹이다. 그렇다면 두 시력교정술의 차이점은 무엇이며 어떠한 부작용이 있을까.\\n\\n
라식과 라섹 모두 각막에 레이저를 쏘아 근시, 원시, 난시 등 굴절 이상 문제를 교정한다는 점에서는 같다. 수정체는 안구의 안쪽에 위치하고 있어 수정체를 변형할 수는 없으므로, 각막을 레이저로 깎아 빛의 굴절 각도를 조절하는 것.\\n\\n
라식은 각막을 얇게 절단하여 절편을 만들고, 이를 젖힌 뒤에 드러나는 각막 실질에 레이저를 쏘아 시력을 교정한다. 라섹은 각막 절편을 만들지 않고 각막 상피만을 벗기고 각막 실질에 레이저를 조사한다.\\n\\n
라식은 수술 후 시력 회복이 빠르다는 장점이 있으나 수술 후 회복 기간 동안 눈에 상처가 나지 않도록 주의해야 한다. 또한 각막의 양이 부족한 경우에는 라식 수술 시행이 어렵다. 반면 라섹은 시력 회복 속도는 느리지만 수술 이후 안정성이 높은 편이다. 라식 수술 후에 치료용 보호렌즈를 덮기 때문이다.\\n\\n
모든 사람이 라식과 라섹 가운데 시술 방법을 선택할 수 있는 것은 아니다. 본인의 수정체와 각막의 상태에 적합한 방법은 의사와의 상담을 통해 확인해야 한다\\n\\n\\n
출처 : 헬스컨슈머(http://www.healthumer.com)',
'안과','2020-10-17 (15:00)','31');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','허리 디스크',
'허리디스크는 척추 뼈와 뼈 사이의 구조물인 디스크가 탈출된 증상을 말합니다. 일반적으로 허리디스크라고 불리지만 디스크는 구조물의 이름일 뿐, 허리디스크에 해당하는 정확한 질환명은 ‘요추추간판탈출증’입니다. 디스크, 즉 추간판은 탄력성이 뛰어나 외부로부터의 물리적 충격을 완화시켜 주고 딱딱한 뼈끼리 직접 부딪히는 현상을 막아줍니다. 이 디스크가 외부의 큰 충격이나, 잘못된 자세 등으로 인해 튀어나오게 되면 염증이 생기고 신경을 눌러 요통, 방사통 등의 통증을 유발하는데, 이를 허리디스크라고 합니다.\\n\\n
허리디스크의 주요 원인은 잘못된 자세와 생활습관, 노화 등을 들 수 있습니다. 척추뼈가 비뚤어진 상태로 오랜 시간 지속적인 압박을 받으면 척추 뼈와 뼈 사이에 있는 디스크가 눌려 찌그러지면서 벌어진 쪽으로 밀려 나오게 됩니다. 마치 고무풍선의 한쪽을 누르면 다른 한쪽으로 바람이 밀려서 커지는 것과 같은 원리입니다. 디스크가 심하게 밀려 나온 상태에서 지속적으로 자극을 받게 되면 섬유테가 붓고 찢어지거나, 안에 있는 수핵이 섬유테를 찢고 터져서 밖으로 밀려 나오기도 합니다. 그럴 경우 우리 몸의 면역 세포들은 터진 수핵을 이물질로 인식하고 공격을 가하는데 이 과정에서 발생하는 여러 가지 물질들이 통증을 일으키는 원인으로 작용하기도 합니다. 척추에 압박을 주는 나쁜 자세와 습관은 아래와 같습니다.\\n
- 하루의 상당 부분을 의자에서 앉아서 보낼 경우
- 의자에 비스듬히 기대어 앉거나 다리를 꼬고 앉는 자세가 습관이 된 경우
- 무거운 물건을 들 때 허리에 부담이 간 경우
- 등을 굽히고 구부정하게 서거나 군인 같은 차려 자세로 장시간 서 있는 경우
- 옆으로 눕거나 엎드려 자는 습관
- 노화로 인해 낮아진 골밀도와 디스크의 퇴행
- 교통사고, 낙상 등의 외부 충격\\n\\n
허리디스크의 주된 증상은 요통과 방사통입니다. 허리를 중심으로 엉치까지광범위하게 통증이 발생하는 경우가 많으며 움직이거나 자세를 바꿀 때 통증이 심해지기도 합니다. 허리에서부터 발까지 특정 부위에 통증이 발생하는 경우도 있으나 무릎 밑 발가락 끝까지 방사되는 방사통도 있습니다. 특히 디스크가 탈출하여 신경근을 직접 자극하여 나타나는 하지 방사통은 견디기 힘들 정도로 통증이 극심합니다. 심한 경우 대소변 장애나 하지 마비 등의 증상이 나타날 수 있습니다.
일반적으로 나타나는 증상은 아래와 같습니다.\\n
- 허리가 쑤시고 통증이 있다.
- 허리, 엉덩이, 다리에 이르기까지 아프고 저리며 통증이 느껴진다.
- 기침, 재채기를 할 때 통증이 느껴진다.
- 눕거나 편한 자세를 하면 통증이 사라지기도 한다.
- 하반신이 무겁게 눌리는 느낌이 든다.
- 다리가 가늘어 지고 힘이 없다.\\n\\n
허리 디스크의 치료는 보존적인 방법과 수술적인 방법으로 나눌 수 있으며, 치료 방법을 선택할 때는 증상이 지속된 기간, 통증의 강도, 재발의 횟수, 환자의 직업, 나이, 성별, 작업량 등 여러 가지 조건을 고려해야 한다.\\n
1) 보존적 치료
보존적인 요법으로는 절대 안정, 소염 진통제의 복용, 골반 견인, 열 치료, 초음파 치료, 피하 신경 전기 자극(transcutaneous electrical nerve stimulation, TENS), 마사지, 코르셋이나 보조기의 착용, 경막 외 부신피질 호르몬 주사(epidural steroid injection), 복근 강화 운동, 올바른 허리 사용법에 대한 교육 등이 있다.\\n
급성 증상이 있는 경우 절대 안정이 도움이 되지만 그 기간은 일주일을 넘기지 않는 것이 좋다. 골반 견인은 전반적인 요통의 대증적인 치료로 사용되며, 이는 침상 안정의 효과를 극대화하여 추간판에 가해지는 압력을 감소시킨다. 가능하면 급성 동통이 사라지는 대로 코르셋을 착용하여 보행을 시작한다. 하지만, 코르셋은 장기간 착용하면 근육의 위축이 초래되므로 복근 및 등 근육 운동을 병행해야 한다.\\n
충분한 보존적 치료 없이 수술을 시행하는 것은 과잉치료가 될 가능성이 많으므로 주의해야 한다.\\n
2) 수술적 치료
수술적 요법은 6~12주 동안 보존적인 치료를 하여도 효과가 없는 참기 힘든 통증이 있거나, 하지 마비가 초래되어 호전되지 않거나 진행되는 경우, 대소변 장애가 초래되는 경우, 동통이 자주 재발하여 일상 생활이 어렵고 여가 선용에 지장이 있는 경우 시행한다. 수술 전 주된 증상이 신경근 자극에 의한 하지 방사통이 아니라 요통일 때에는 추간판 절제 수술을 시행하여도 요통은 별로 호전되지 않는다.\\n
수술적 방법으로는 기존의 절개 후 수술하는 고전적 방법부터 최소 침습적 수술이 있고, 최소 침습적 수술로는 수술 현미경 하의 수핵 절제술, 내시경을 이용한 수핵 절제술, 자동 경피적 수핵 절제술, 레이저를 이용한 수핵 절제술, 약물을 수핵 내에 주사하는 화학적 수핵 용해술이 있다. 주사로 녹여내는 방법은 최근 사용이 줄어들고 있는 추세이다.\\n\\n
비만인 경우 추간판 탈출증의 위험이 증가하므로 체중 관리를 고려한 식사를 하여야 한다.
흡연은 요통이나 좌골 신경통의 중요한 위험 인자로 알려져 있으므로, 흡연자의 경우 우선 금연을 시행해야 한다.\\n
요통 및 추간판 탈출증의 재발을 방지하기 위해 허리에 좋은 자세를 습관화하는 것이 중요하다.
물건을 들 때에는 항상 몸에 가깝게 붙여서 들고, 무릎을 굽히고 허리는 편 자세를 유지하며, 허리를 구부리면서 비틀지 않는다. 앉을 때에는 등받이가 약간 뒤로 기울어진 의자에 허리를 펴고 앉는다. 의자에 깊숙이 앉아 엉덩이를 등받이에 대어야 하며, 20~30분에 한번씩 일어나서 스트레칭을 해준다. 팔걸이가 있고 뒤꿈치가 땅에 닿는 높이의 의자가 좋다.\\n
서 있을 때에는 한쪽 발을 낮은 발판이나 상자 등에 올려놓으며, 작업대를 편안한 높이에 오도록 하고 작업한다. 운전할 때에는 좌석을 운전대에 가깝게 하고 무릎 쪽을 높게 하고, 허리에 쿠션을 받쳐서 지지할 수 있도록 한다. 잘 때에는 바닥은 비교적 단단하되 약간의 쿠션이 있는 것으로 하며, 무릎 밑에 베개를 받치거나 옆으로 돌아누워서 자도록 한다.\\n\\n\\n
[네이버 지식백과] 추간판 탈출증 [lumbar herniated intervertebral disc] (서울대학교병원 의학정보, 서울대학교병원)',
'정형외과','2020-10-17 (15:00)','33');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','도수치료',
'약물치료나 수술 없이 손으로 척추와 관절 등을 직접 자극하고 틀어진 관절을 바로 잡아 통증을 완화하는 것으로 만성 통증 및 운동장애, 자세이상, 체형 변형을 교정하고 치료하는 방법이다.\\n
물리 치료사가 신체의 척추, 관절 및 전신 근육 근막의 긴장을 이완시키고 교정하여 환자의 통증과 기능 개선을 위해 다각도로 접근하는 맞춤형 치료다.\\n
도수치료는 건강보험 급여 혜택을 받지 못하는 비급여 항목이기에 환자들이 진료비를 전액 부담해야 한다.\\n
하지만 실손보험을 통하면 도수치료는 연간 180회까지 받을 수 있기 때문에 대부분의 환자는 비용 부담을 피하기 위해 실손보험을 활용한다. 2009년 10월 이전에 판매된 옛 실손상품의 자기부담금은 0원이다. 2009년 10월부터 판매된 표준화 실손상품의 자기부담금도 전체 진료비의 10~20%에 불과하다. 회당 도수치료비가 10만원이라면 환자는 최대 2만원만 부담하면 된다.\\n
도수치료에 대한 명확한 심사 기준이 없기 때문에 의사 진단서만 있으면 손쉽게 보험금을 청구할 수 있기 때문에 일부 병·의원이 환자에게 고액의 도수치료를 권하는 등 부작용도 나타나고 있다\\n\\n\\n
[네이버 지식백과] 도수치료 [Manual Therapy] (한경 경제용어사전)',
'정형외과','2020-10-17 (15:00)','41');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','관절염',
'의학적으로 관절염이란 세균이나 외상과 같은 어떤 원인에 의해서 관절 내에 염증성 변화가 생긴 것을 총괄해서 지칭하는 병명이다. 관절염은 크게 급성과 만성으로 나뉜다.\\n\\n
급성\\n
급성 관절염은 다음과 같이 분류한다. ① 장액성(奬液性) 관절염:보통 외상(外傷)에 의해서 일어나는데 원인불명의 것도 있으며, 대개 하나의 관절에만 발생한다. ② 장액섬유소성(奬液纖維素性) 관절염:급성관절류머티즘 때에 일어나는데, 관절강 내에 혼탁한 삼출액(渗出液)이 괸다. 섬유소의 위막(僞膜)이 생겨 염증이 가라앉아도 심한 운동장애를 남긴다. ③ 화농성(化膿性) 관절염:관절의 개방창(開放創) 또는 임질·장티푸스·성홍열·패혈증(敗血症) 같은 전염병에 다발성을 보인다. 생후 1~2개월의 유아는 뼈가 심하게 상하여 치료할 수 없는 탈구(脫臼)를 일으킨다. 성인에서는 골막골수염에 걸려 화농부가 터져 고름이 관절로 들어가는 것이 많은데, 이를 2차화농관절염이라고 한다.\\n\\n
만성\\n
만성 관절염은 다음과 같이 분류한다. ① 특수성(特殊性) 염증:결핵성·매독성 혹은 중년 이후의 남자에 많은 요산(尿酸)의 대사 장애로 인한 통풍성(痛風性) 관절염이 있다. ② 다발성 관절염:만성관절류머티즘에 의한 것이 많은데 급성장액성 관절염에서 이행(移行)되거나 결핵·매독·임질의 경과중에 다발성으로 나타나기도 하며 패혈증의 하나인 것도 있다. 그밖에 스틸병(病)이라는 관절염도 포함된다. ③ 변형성 골관절염:뼈나 관절의 노화 또는 외상이 원인이다. ④ 혈우병성(血友病性) 관절염:혈우병을 앓을 때 관절 내의 출혈에 의한 것이다.\\n\\n
치료\\n
관절염 치료는 원인에 따라 급성일 경우에 운동이나 무거운 것을 들지 말며, 안정을 유지하고, 증세에 따라 천자(穿刺) ·절개 ·배농(排膿) 등을 한다. 운동은 급성기가 지난후에 장구(裝具)를 이용하여 서서히 하고, 운동장애나 강직·관절변형에 대하여는 관절성형수술을 하기도 한다.\\n\\n\\n
[네이버 지식백과] 관절염 [arthritis, 關節炎] (두산백과)',
'정형외과','2020-10-17 (15:00)','54');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','오십견',
'견불구라고도 한다. 어깨의 유착성 관절낭염으로, 관절 주머니 아래 부위가 달라 붙어서 어깨운동이 제한받고, 심한 통증이 나타나는데, 특히 밤에 심해서 잠을 이루지 못하는 경우도 있다. 주로 40~70대 연령층에서 발생하는 질병이며, 50세 이후에 특별한 원인이 없이 나타나는 것이 특징이기 때문에 붙여진 이름이다. 그러나 그보다 젊은 연령층에도 생길 수 있으며, 팔을 많이 사용하는 사람이나 주부에게 많이 발생하는 경향이 있다.\\n
특별한 원인 없이 1차적으로 일어나는 경우를 특발성 동결견 또는 유착성 관절낭염이라고 하며, 다른 병변으로 인한 경우를 2차성 동결견이라고 한다. 2차성으로 오는 경우의 원인은 관절주위를 둘러싸고 있는 근육이 퇴행성으로 파열되거나 이러한 근육 주위의 석회화현상, 이두박근염, 골성관절염 등이 있을 때 나타난다. 경추디스크, 심근경색증 등 심장질병에 의한 경우에도 발생할 수 있으며, 당뇨병·갑상선질병·결핵 등 전신적인 질병이 있을 때 나타나기도 한다. 또한 깁스 등으로 장기간 팔과 다리를 움직이지 못했을 때나 수술 후 합병증으로 발생하기도 한다.\\n
증세는 일상생활에 지장이 있을 정도로 어깨를 움직이기 어렵고 통증이 심하다. 뒷목이 뻣뻣하며, 통증이 있는 방향으로 돌아눕기가 힘들다. 이러한 증세는 점차 통증이 증가하는 동통기, 통증 때문에 운동하기가 어려워지는 동결기, 점차 통증이 감소하는 해리기를 거친다. 시간이 지나면 증세가 완화되는데, 보통 약 1~2년 정도 걸리는 것으로 알려져 있다.\\n
치료는 연부조직에 염증이 일어난 경우에는 국소적인 항염증 치료를 실시하며, 보조적으로 물리치료를 시행한다. 외상으로 인한 경우에는 손상 정도에 따라 부목으로 고정하거나 수술을 실시한다. 유착성 활액낭염으로 인한 경우에는 유착된 부위에 항염증 치료와 함께 견구축을 푸는 운동치료를 병행한다. 심한 경우에는 관절경 수술을 통하여 그 원인인 좁아진 관절낭을 펴준다.\\n\\n\\n
[네이버 지식백과] 오십견 [Frozen Shoulder, 五十肩] (두산백과)',
'정형외과','2020-10-17 (15:00)','37');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','아토피',
'아토피(Atopy)는 ‘부적절한’ 혹은 ‘기묘한’ 이란 뜻의 그리스어에서 유래하며, 정상인에게는 볼 수 없는 비정상적인 알레르기 반응을 의미합니다. 나타나는 신체 부위에 따라 알레르기 비염(코), 알레르기 결막염(눈), 알레르기 천식(기관지), 아토피 피부염(피부) 등으로 나뉘며 각각의 질환을 동시에 가지거나 성장에 따라 순차적으로 나타나기도 합니다.\\n
이중 아토피 피부염은 주로 유아와 소아에서 시작하여 장기간 지속되거나 재발하는 피부염으로 대개 5세 이전에 증상이 나타나서 성장과 더불어 증상이 완화되거나 사라지는 어린이에게 흔한 피부 질환입니다. 환자의 대부분은 사춘기 이전에 증상이 없어지므로 성인기까지 증상이 지속되는 경우는 드물지만, 약 10%에서는 성인이 되어서도 지속될 수 있으며, 드물게 청소년기 이후에 발생하기도 합니다. 발병 원인은 명확히 밝혀져 있지는 않으나, 유전적 원인 및 실내외의 각종 알레르기 자극(집먼지진드기, 꽃가루, 음식물 등)과 같은 환경적 요인이 더해져 발생하는 것으로 이해하고 있습니다.\\n
그 발생 부위는 연령에 따라 변화하는 양상을 보입니다. 유아기(생후 2달에서 2세 사이) 아토피 피부염은 얼굴의 양 볼에 가려움성 홍반이 나타나는 것이 특징입니다. 이를 태열이라고 부릅니다. 또한 머리와 사지의 폄 쪽에도 병변이 발생할 수 있습니다. 소아기(2세부터 10세 사이) 아토피 피부염은 팔꿉앞 부위, 오금부와 같은 굽힘 쪽의 피부염이 발생하는 것이 특징이며, 엉덩이, 눈꺼풀, 손목, 발목 등에도 나타납니다. 성인 아토피 피부염의 증상은 흔히 머리, 얼굴, 목의 피부염의 형태로 나타나서, 안면부 홍반, 인설, 구순염, 이마의 태선화 병변이 특징적으로 나타나고, 동시에 전신적 건조 피부, 뱀살 피부, 두피의 심한 비듬, 굽힘 쪽의 피부염이 동반됩니다. 또한 피부가 건조하고 두터워지는 만성 병변이 많이 나타납니다.\\n
아토피 피부염을 앓고 있는 어린이는 만성 습진으로 인한 고통 이외에도 질환에서 파생되는 여러 가지 문제로 인해 학교생활 등의 사회적 적응에 곤란을 느끼며, 보호자 또한 아픈 어린이를 돌보는 과정에서 많은 스트레스를 받게 됩니다. 따라서 적절한 치료는 환아의 질병을 치료할 뿐 아니라 환아 및 보호자의 삶의 질까지 향상시키는 효과가 있으므로 적극적으로 시행돼야 합니다.\\n
아토피 피부염 치료의 목표는 건조한 피부에 대한 적절한 수분 공급과 악화 요인의 제거, 그리고 가려움증 및 피부염을 감소시키는 것 등입니다. 보습제는 피부과 영역에서 가장 흔하게 처방되고 사용되는 품목으로, 특히 아토피 피부염의 경우에 필수적으로 동반되는 증상인 피부 건조증을 완화시키기 위해서, 그리고 피부 장벽의 유지를 위해 보습제의 사용은 필수적인 것으로 인식되고 있습니다.\\n
보습제만으로 조절이 안 될 경우 국소 치료제를 사용합니다. 아토피 피부염의 대표적인 국소 치료제에는 스테로이드제가 있으며 병변이 급성으로 악화될 때 단기간에 증상을 신속하고 효과적으로 호전시킬 수 있습니다. 흔히 환자나 보호자는 스테로이드 부작용에 대한 불안과 잘못된 지식으로 용법보다 적게 사용하거나 아예 사용하지 않으려는 경향이 있는데 이는 치료에 좋지 않은 영향을 줍니다.\\n
부작용은 연고의 강도, 부위, 밀폐 유무, 도포 면적 등과 관계됩니다. 소아, 특히 영•유아는 체중에 비해 체표 면적이 넓으므로 전신적인 부작용이 나타날 가능성이 크며 기저귀 부위는 밀폐가 되므로 흡수율이 높다는 것을 염두에 두어야 합니다. 또한 청소년의 가슴이나 허벅지는 빠르게 성장하는 부분이므로 연고에 의해 튼살이 생길 가능성이 크므로 조심하여야 합니다. 아직까지 국소 스테로이드제 만큼 효과적으로 피부염을 완화시킬 수 있는 약제는 없습니다. 따라서 환자와 보호자는 적절한 사용법을 교육받고 주기적인 관찰을 통해 부작용을 최소화 할 수 있도록 해야 합니다.\\n
국소 치료로도 호전이 안 되는 경우 항히스타민제, 경구 스테로이드제, 면역조절제와 같은 약물 치료를 고려할 수 있습니다. 최근에는 국소 면역조절제인 타크로리무스(tacrolimus)와 피메크로리무스(pimecrolimus)와 같은 칼시뉴린억제제(calcineurin inhibitor)가 개발되어 기존의 치료에 보조적으로 사용할 수 있을 뿐만 아니라 국소 스테로이드제의 사용으로 인해 발생할 수 있는 부작용을 최소화할 수 있으며, 장기간의 사용이 가능하므로 병변 재발의 예방 목적으로도 사용되고 있습니다.\\n
가정에서 실천할 수 있는 생활습관의 개선도 매우 중요합니다. 피부 보호를 위한 올바른 목욕습관 및 적절한 보습제 사용, 실내외의 알레르기 자극을 최소화하기 위한 의식주 환경 조성 등이 필수적입니다. 적당한 실내 온도(18~21°C)와 습도(40~60%)를 유지해야 합니다. 겨울철에는 실내 습도가 매우 건조하므로 적절한 가습기의 사용을 권합니다.\\n
목욕은 미지근한 물에 10분 정도 하고, 피부의 건조함을 막기 위해 3분 이내에 보습제를 발라야 하며, 피부가 늘 촉촉하게 유지될 수 있도록 보습제를 자주 사용해야 합니다. 특히 겨울철에는 담요나 카펫 사용, 모직으로 된 옷, 환기가 잘 되지 않는 실내 환경 등으로 인한 피부염을 악화시키는 항원에 대한 노출 기회가 늘어나는 것도 한 요인이 될 수 있으므로 이들 또한 피해야 합니다. 또한, 아토피 피부염의 발병 원인 중 빼놓을 수 없는 것이 바로 스트레스입니다. 스트레스를 완화시키는 생활 습관과 함께 증상 악화 시에는 즉시 피부과 전문의의 진료를 받는 것이 중요합니다.\\n\\n\\n
[네이버 지식백과] 아토피 피부염 (중앙대학교병원 건강칼럼)',
'피부과','2020-10-17 (15:00)','27');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','여드름',
'여드름은 털을 만드는 모낭에 붙어 있는 피지선에 발생하는 만성 염증성 질환입니다. 여드름은 보통 사춘기에 발생하지만, 어른에게도 나타날 수 있습니다. 여드름은 얼굴, 목, 등, 가슴 등과 같이 유분이 많은 피부 부위에 잘 생깁니다. 정상적인 상태에서 피지는 모낭 벽을 따라 위로 올라가서 피부를 통해 밖으로 배출됩니다. 피지가 피부 밖으로 배출되지 못하고 모낭 주위에 갇히면 염증을 불러일으키는 박테리아가 번식하는데, 이것이 여드름이 됩니다.\\n\\n
여드름은 호르몬 변화, 세균 감염, 유전성 요인 등으로 발생한다고 여겨지지만, 아직까지 정확한 원인을 모르는 상태입니다. 대체로 사춘기에 나타나는 여드름은 안드로겐이라는 남성호르몬에 자극받아 피지를 과다하게 내보내서 발생합니다. 하지만 성인 여드름은 여성에게 많이 나타나며, 특히 생리 전에 주기적으로 악화됩니다. 이 경우 프로게스테론이라는 황체호르몬, 기름이 많거나 털구멍을 밀폐시키는 화장품 등이 원인 또는 악화 인자가 될 수 있습니다. 정서적 긴장이나 스트레스, 수면 부족 등으로 부신피질 호르몬이 분비되어 피지선을 자극하면 여드름이 발생할 수 있습니다.\\n\\n
여드름의 증상으로 면포, 구진, 농포 등이 나타납니다. 심한 경우에는 결절이나 낭종이 생깁니다. 면포란 피지가 축적되어 모낭이 팽창한 것입니다. 면포에는 모낭 입구가 열려 있습니다. 면포에는 개방 면포와 폐쇄 면포라는 두 가지 종류가 있습니다. 흔히 블랙헤드라고도 하는 개방 면포는 그간 축적된 피지의 색이 검게 보이는 것입니다. 폐쇄 면포는 표면이 닫혀 있는 면포로, 흔히 화이트헤드라고 합니다. 면포가 오래되면 주위에 세균이 증식하고, 그 주위에 염증 세포가 모이면 붉은 여드름 구진, 곪는 여드름 농포를 형성합니다. 이 정도가 심해지면 결절과 낭종 등이 부어있는 상태가 됩니다.\\n\\n
여드름 치료 방법은 크게 바르는 약, 먹는 약, 외과적 치료로 나눌 수 있습니다. 여드름을 치료하는 원리는 막힌 모낭을 제거하여 피지가 잘 배출되도록 하거나, 세균의 성장과 염증, 피지 분비를 억제하는 것입니다. 여드름의 심한 정도와 형태에 따라서 먹는 약과 바르는 약을 단독으로 혹은 복합하여 선택합니다. 이러한 약에는 부작용이 있을 수 있으므로 의사의 처방이 필요합니다. 외과적인 치료로는 증상 부위에 대한 주사 요법, 여드름 압출 치료, 박피술, 레이저 치료, 광역동 치료 등이 있습니다.\\n\\n
보통 여드름은 사춘기에 시작되어 20대 중반에는 사라집니다. 그러나 최근에는 성인 여드름이 증가하고 있습니다. 성인 여드름은 사춘기보다 유병 기간이 길고 치료 반응이 느리다고 합니다. 물론 가벼운 여드름은 자연적으로 소멸할 수도 있고, 치료하지 않아도 좋아졌다 나빠졌다 하기도 합니다. 하지만 초기에 치료하지 않을 경우 피부 붉어짐, 색소 변화, 흉터 발생의 위험성이 높으므로, 적절히 치료해야 합니다.',
'피부과','2020-10-17 (15:00)','10');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','무좀',
'무좀은 발가락 사이, 발바닥, 손 등에 곰팡이균의 일종인 백선균에 의해 생기는 만성 재발성 질환이다. 이 백선균은 고온 다습한 환경에서 번식이 왕성해 주로 여름철에 많이 발생하고 특히 장마철에 증상이 심해진다. 무좀균은 일반인들이 알고 있듯 발에만 생기는 것이 아니고 생활 환경, 직업, 면역 상태, 무좀균의 요인에 따라 피부의 어느 부위나 발생 가능하다. 즉 무좀균이 음낭 및 사타구니를 침범하게 되면 완선, 손발톱 무좀, 기계충(두부백선), 도장 부스럼(체부백선) 같은 피부병도 생길 수 있다.\\n
무좀과 비슷한 증상을 보이는 다른 피부병이 많기 때문에 반드시 의사에게 병변을 보이고 정확한 진단을 받는 것이 중요하다. 특히 시중에 있는 무좀약을 약 1주일 정도 써도 별 효과를 보지 못하는 경우에는 전문의의 자세한 진찰이 필요한데, 피부의 균을 배양하여 정확한 균을 알아보는 진균 검사를 할 수도 있다.\\n
무좀 치료의 원칙은 꾸준한 약물 치료와 청결 건조를 병행하는 것이다. 약물 치료로 항진균제를 병변에 바르는데, 약을 바른 뒤 1주 정도면 활동성 곰팡이는 모두 죽고 가렵거나 물집이 생기던 증상도 좋아진다. 그러나 곰팡이 포자는 그대로 남아 고온 다습한 여건만 되면 재발하기 때문에 표피에 남아있는 포자까지 모두 죽이려면 6주 이상 꾸준히 발라 주어야 한다. 각화증이 심하다면 각질용해제를 바르기도 한다.\\n
땀이 난 발의 청결, 건조도 필요하다. 발에 염분이 남아 있으면 삼투압 현상으로 공기 중의 수분을 흡수해 발이 항상 축축해지므로 염분 제거를 위해 찬물에서 10분 이상 발을 씻는 것이 좋다. 가능하면 맨발로 지내는 시간을 늘리고 슬리퍼와 같이 통풍이 잘 되는 신을 신으며, 집에 돌아오면 신었던 구두를 햇볕에 말려 내부에 있는 균을 죽이거나 안에 포르말린을 묻힌 솜을 넣고 비닐로 하루 정도 싸 두는 방법, 자동차 에어컨에 소독용 항진균제를 자주 분무하는 방법도 권할 만하다.\\n
무좀에 걸린 상태에서 다시 2차적으로 다른 세균에 감염될 수 있는데, 특히 수포가 생겼을 때는 물집을 터뜨림으로써 세균 감염이 일어날 수 있으므로 주의해야 한다. 이차 세균 감염이 있을 때는 이것에 대한 치료를 먼저 하고 무좀 치료를 해야 하는데, 이럴 경우 무좀약만 바르게 되면 오히려 증세가 악화될 수도 있으므로 각별히 유의해야 한다. 같은 무좀이라도 세균 감염이 되었거나 습진성 병변으로 발전했을 때와 건기에 있을 때의 치료 방법이 다르므로 전문의의 진단에 따른 정확한 치료가 필요하다.\\n\\n\\n
[네이버 지식백과] 무좀 (삼성서울병원 건강칼럼)',
'피부과','2020-10-17 (15:00)','16');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','대상포진',
'대상포진은 수두-대상포진 바이러스(varicella-zoster virus, VZV)가 소아기에 수두를 일으킨 후 신경 주위에 무증상으로 남아 있다가, 수두-대상포진 바이러스에 대한 면역력이 떨어질 때 신경을 타고 나와 피부에 발진을 일으키면서 심한 통증을 유발하는 질환을 의미합니다.\\n\\n
대상포진의 주된 원인은 (세포 매개성) 고령, 면역 저하제 사용, 이식, 에이즈 등으로 인해 면역력이 떨어지는 것입니다. 면역력이 떨어지면, 바이러스가 증식하여 신경을 따라 피부로 다시 나오면서 대상포진이 발생합니다. 암, 에이즈, 항암 치료, 방사선 치료, 이식 후 거부 반응을 막기 위해 면역 억제제를 복용하거나 장기간 스테로이드를 복용하는 경우에 면역력이 감소할 수 있습니다. 이외에 질병, 사고, 스트레스 등으로 몸의 면역력이 약해져 대상포진이 발생하기도 합니다.\\n\\n
대상포진은 주로 몸통이나 엉덩이 부위에 생깁니다. 그러나 신경이 있는 부위이면 얼굴, 팔, 다리 등 어디에서든 발생할 수 있습니다.\\n
대상포진의 주요 증상은 통증입니다. 통증은 몸의 한쪽 부분에 국한되는 경우가 대부분입니다. 아프거나 따끔거리는 느낌의 통증이 발생합니다. 이러한 증상이 1~3일 정도 이어진 후 붉은 발진이 나타나며, 열이나 두통이 발생합니다. 수포는 2~3주 정도 지속됩니다. 수포가 사라진 후 농포, 가피가 형성되며, 점차 사라집니다.\\n
통증은 병변이 사라진 후에도 지속될 수 있습니다. 이것이 포진 후 신경통입니다. 드물게 수포 없이 통증이 발생하거나 통증 없이 수포가 발생하는 경우도 있습니다. 포진 후 신경통의 통증이 일반적인 진통제에 반응하지 않을 정도로 매우 심한 경우, 신경 차단술 등을 시행할 수도 있습니다.\\n\\n
대상포진은 피부 병변의 모양을 확인하여 진단합니다. 대상포진의 수포는 신경을 따라 무리를 지어 특징적(발진, 수포, 농포, 가피의 여러 단계가 산재한 양상)으로 나타나기 때문입니다. 다만 전형적인 피부 변화가 나타나지 않는 대상포진이 있기 때문에 피부 병변을 긁어 현미경적 검사, 바이러스 배양 검사, 분자 유전자 검사를 시행할 수 있습니다.\\n\\n
대상포진은 항바이러스제를 사용하여 치료합니다. 조기에 항바이러스제를 투약하는 것이 효과가 좋습니다. 대상포진으로 인한 통증을 조절하기 위해 진통제를 복용합니다. 진통제의 종류는 증상의 정도에 따라 선택합니다.
수포 부위에 박테리아가 감염되면 치료가 지연됩니다. 통증이 지속되며 붉은 기운이 증가하거나 다시 나타나는 경우에는 반드시 의사와 상담해야 합니다.',
'피부과','2020-10-17 (15:00)','28');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','야경증',
'야경증은 비렘(NREM) 수면 각성장애 중 하나로, 비렘수면기 중 수면 초반 1/3 앞쪽에서 가장 흔하며, 주로 소아에서 갑자기 잠에서 깨어 비명을 지르며 공황상태를 보이는 질환이다.\\n\\n
야경증의 정확한 원인은 모른다. 정서적 불안, 스트레스, 수면 부족, 그리고 고열 등에 의해 유발될 수 있는 것으로 알려져 있다.\\n\\n
야경증은 수면 중에 일어나서 강한 발성과 동작, 고도의 자율신경 반응을 동반하는 심한 공포와 공황상태를 보인다. 따라서 수면 중 경악장애라고도 한다. 수면의 처음 1/3 부분에서 공포에 질린 비명과 함께 잠에서 깨어나 일어나 앉으며 깨어나면 보통 그 에피소드에 대해 기억하지 못한다. 소아의 1~6% 정도가 경험하는 것으로 알려져 있고 남자 아이에게 더 흔하다. 몽유병(sleepwalking syndrome) 또는 야뇨증(nocturnal enuresis)과 동반되는 경우가 있다.\\n\\n
미국 정신의학회(American Psychiatric Association)의 정신장애 진단 통계편람(DSM-5)의 진단 기준에 따르면 다음의 기준을 모두 만족해야 한다.\\n
A. 대개 주요 수면 삽화의 초기 1/3 동안에 발생하며, 돌발적 비명과 함께 급작스럽게 잠에서 깨는 반복적인 삽화가 있다. 각 삽화 동안 심한 공포와 동공산대, 빈맥, 빈호흡, 발한 같은 자율신경계 반응의 징후가 있고, 삽화 동안 안심시키려는 다른 사람의 노력에 비교적 반응하지 않는다.
B. 꿈 이미지를 전혀 또는 거의(예, 단지 시각적 한 장면) 회상하지 못한다.
C. 삽화를 기억하지 못한다.
D. 삽화가 사회적, 직업적, 또는 다른 중요한 기능 영역에서 임상적으로 현저한 고통이나 손상을 초래한다.
E. 장애가 물질(예, 남용약물, 치료약물)의 생리적 효과로 인한 것이 아니다.
F. 공존하는 정신질환과 의학적 장애가 야경증 삽화를 충분히 설명할 수 없다.\\n\\n
일반적으로 특별한 치료를 요하지는 않는다. 대부분 성장함에 따라 증상이 감소하고, 이후의 정신 질환으로 발전하지는 않으므로 반드시 치료를 받을 필요는 없으며, 간단한 상담으로 충분하다. 그러나 증상이 수주 이상 지속되고 개인 및 가족의 삶의 질에 영향을 미치는 경우는 전문의의 상담을 받아야 한다. 가족 내 정서적 스트레스 등에 대한 평가가 필요할 수 있고 개인 및 가족 치료가 효과가 있을 수 있다.\\n\\n\\n
[네이버 지식백과] 야경증 [sleep terror disorder] (서울대학교병원 의학정보, 서울대학교병원)',
'소아과','2020-10-17 (15:00)','39');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','가와사키병',
'가와사키병은 소아에서 발생하는 원인 불명의 급성 열성 혈관염으로, 전신에 다양하게 침범한다. 피부, 점막, 임파절, 심장 및 혈관, 관절, 간 등에 기능 이상을 가져올 수 있고, 위장관 장애, 담당수종, 드물게 뇌수막 등의 염증이 나타날 수 있다.\\n\\n
가와사키병의 원인은 아직 밝혀지지 않았습니다. 다만 의학자들은 이 병이 유전적인 요인 때문에 발생한다고 추측하며, 세균이나 바이러스에 감염되었을 때 비정상적인 면역 반응이 일어나면서 이 병으로 발전된다는 견해도 있습니다. 이 병의 증상은 환자의 유전이나 환경에 따라 다르게 나타납니다. 어떤 아이는 아무런 이유 없이 보채기만 합니다.\\n
① 위험 인자
- 30일 이내 호흡기 질환
- 30일 이내 러그 세탁(집먼지 진드기 및 다른 미생물로 인해 전파될 가능성)
- 절지동물 매개체나 동물 숙주가 서식하는 곳 인근의 거주자\\n
② 이론
- 급성기 동안 면역계가 활성화되고, 혈관내피세포에 대한 항체가 형성됩니다.
- 임상 소견과 검사실 검사는 세균 독소에 의한 질병과 유사합니다. 이에 따라 미상의 세균에 의한 독소론 때문에 발병한다는 견해가 대두되고 있습니다.\\n\\n
가와사키병의 증상은 다음과 같습니다.\\n
① 발열
고열이 나타납니다. 평균 1~2주 지속되며 4주를 넘기지 않습니다.
40도 이상 고열로 앓아 누워있는 남성\\n
② 발열과 동반하여 다음의 5가지 중 4가지 이상의 소견이 나타남
- 양측성 결막 충혈
- 다양한 형태의 발진
- 일측 비화농 경부 림프절병증
- 점막 변화(구강과 인두 점막의 홍반 및 딸기혀과 붉고 균열된 입술 등)
- 사지 소견(손과 발의 부종과 홍조 등)\\n
③ 기타 증상과 징후
- 소화기 : 설사, 구토, 복통, 담낭 수종, 마비성 장폐쇄, 경도 황달, 간염(AST,ALT상승)
- 혈액 : 백혈구 증가, 혈소판 증가(2~3주), ESR, CRP 상승
- 뇨 : 단백뇨, 침사에 백혈구 증가
- 피부 : BCG 접종 부위 발적, 가피 형성
- 호흡기 : 기침, 콧물
- 신경 : 뇌척수액 단핵구 증가, 안면신경 마비
- 관절염\\n\\n
급성기에는 고용량 면역글로불린과 아스피린을 사용합니다. 고용량 면역글로불린의 약리적인 기전은 명확하지 않지만, cytokine에 의해 혈관 내피의 증식을 억제하고 전신적인 항염증 작용을 하는 것으로 추정됩니다. 발열 시작 10일 이내에 썼을 때 관상동맥 합병증을 억제합니다. 이에 따라 아스피린 단독 요법을 쓸 때의 관상동맥 이환율 20~25%를 약 2~4%로 감소시키는 효과를 보입니다. 예전에는 스테로이드를 항염제로 사용하면 오히려 관상동맥 합병증을 증가시킨다고 하여 적절하지 않은 치료로 간주하였으나, 최근에는 좋은 효과가 나타난 보고가 있어 향후 임상 연구가 더 필요한 상황입니다.\\n
발병 후 1~2주에는 반드시 심초음파 검사를 시행하여 관상동맥 상태를 파악해야 합니다. 관상동맥 합병증이 없는 경우 아급성기에 접어듭니다. 이때 항혈소판 효과를 기대하여 저용량 아스피린을 6~8주 투여합니다. 관상동맥 합병증이 없는 경우는 예후가 좋으므로 1년 이후에는 엄격한 추적 관찰을 권장하지 않습니다. 그러나 중등도 이상으로 관상동맥의 변화가 있는 환자(5mm 이상의 관상동맥류)는 심초음파 검사, 심전도, 운동부하검사, Thallium 심근 스캔 또는 SPECT 검사를 통해 매년 심근 허혈 유무를 정기적으로 추적해야 하며, 경우에 따라서는 관혈적인 관상동맥 조형술을 시행하여 관상동맥 협착 또는 폐쇄를 진단해야 합니다.\\n
관상동맥류의 약 50%는 수년에 걸쳐 정상 내경으로 회복된다고 합니다. 그러나 이런 경우에는 혈관 벽이 두터워져 있고 혈관 내벽이 증식되고 섬유화되어 있으므로, 이러한 해부학적, 생리학적 변화의 장기적인 예후는 아직 알지 못합니다. 관상동맥류가 지속되는 경우에는 장기적인 저용량 아스피린 요법 또는 항응고요법이 필요합니다. 관상동맥 협착 또는 폐쇄에 의한 허혈 소견이 있을 때는 심근 산소 소비를 줄이기 위해 칼슘 통로 차단제를 투여하며, 경피적 관상동맥 성형술이나 외과적 관상동맥 우회술을 고려합니다.\\n\\n
가와사키병은 호흡기 감염 바이러스 독성이 변형되면서 유전적으로 민감한 아이들이 많이 걸리는 것으로 추측됩니다. 대개 5세 이하의 아이가 이 병에 걸리며, 특히 6개월 이하의 영아나 6세 이상의 아이가 걸리면 심하게 앓거나 재발하는 경우가 많습니다. 따라서 부모는 아이가 감기와 유사한 증상을 보인다고 해서 감기라고 간과하면 안 되며 세심하게 관찰해야 합니다.\\n
가와사키병은 빨리 발견해서 치료하면 4일~7일의 입원 치료로 대부분의 증상을 크게 완화할 수 있습니다. 또한 진단 후 가능한 한 빨리 치료할 경우 심장병 등 합병증의 발생을 줄일 수 있습니다.\\n
병의 재발률은 1~3%이며 사망률은 0.1% 미만으로 알려져 있습니다. 병의 원인을 알 수 없으므로 특별한 예방법이 없습니다. 일반적 질병 예방 습관인 개인위생을 철저히 하는 것이 좋습니다. 병에 한 번 걸리고 난 뒤에는 더욱 주의를 기울여야 합니다.\\n',
'소아과','2020-10-17 (15:00)','30');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','돌발성 발진',
'돌발성 발진은 생후 6~24개월 영유아에게 많이 발생하는 양성 급성 전염병을 의미합니다. 이는 소아 장미진(roseola infantum)이라고도 불립니다. 돌발성 발진의 원인은 바이러스에 의한 감염입니다.\\n\\n
돌발성 발진의 원인은 헤르페스 바이러스인 HHV-6 또는 7에 의한 감염입니다. 이 바이러스는 유일하게 사람만을 숙주로 하므로, 인간 헤르페스 바이러스라고도 불립니다.\\n\\n
돌발성 발진의 증상은 다양합니다. 주로 10일 전후의 잠복기를 거쳐 급작스럽게 39~41℃ 정도의 고열이 발생하고, 이 고열이 3~4일 정도 지속되다가 내려가면서 발진이 나타납니다. 환아는 고열이 지속되는 동안 보통 몹시 보채고 식욕이 떨어지며, 열성 경련을 하기도 합니다.\\n
발진은 주로 몸통, 목, 귀 뒤에서 나타납니다. 드물게 얼굴이나 다리에 나타나기도 합니다. 발진은 빠르게 사라져서 24시간 이상 지속되는 경우가 드뭅니다. 뒷머리, 목, 귀 뒤의 림프절이 확대되는 경우가 많습니다. 인후, 결막, 고막의 발적, 목젖이나 구개열 부위의 궤양이 동반되기도 합니다.\\n\\n
돌발성 발진은 대증 요법을 이용하는 것 외에 특별한 치료법이 없습니다. 보통 6~7일 정도 지나면 자연 치유됩니다. 환아가 고열이 나고 보채면 해열제를 투여하고 충분한 수분을 공급합니다. 해열제로는 아세타미노펜, 이부프로펜을 사용할 수 있으며, 아스피린은 피해야 합니다.\\n\\n
돌발성 발진은 특별한 치료 없이 자연 치유됩니다. 이때 생긴 발진은 껍질도 벗겨지지 않아서 흉터도 남지 않습니다. 드물게 심한 고열로 인한 열성 경련이 발생할 수 있으므로 고열이 있을 때는 해열제를 투여하는 게 중요합니다.\\n',
'소아과','2020-10-17 (15:00)','6');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','소아마비',
'소아마비는 주로 소아의 뇌, 척수와 같은 중추신경계 중 특히 운동을 담당하는 부분에 폴리오(polio)라는 장 바이러스(enterovirus)에 의한 급성 감염이 발생하여 뇌신경 조직이 손상되면서 일시적 혹은 영구적인 신체 마비와 변형이 생기는 질환입니다.\\n\\n
소아마비의 원인은 폴리오(polio)라는 바이러스에 감염되는 것입니다. 폴리오 바이러스는 장 바이러스의 일종으로, 3가지 혈청형이 있습니다.\\n\\n
소아마비의 증상은 침범 부위와 정도, 병의 진행 시기에 따라 다릅니다. 부전형은 거의 후유증을 남기지 않고 지나갑니다. 비마비형은 척수에 부분적으로 변형을 일으키지만, 근육이나 신경에는 직접적인 영향을 미치지 않습니다. 마비형은 감염 후 침범된 척수가 지배하는 근육이나 신경에 영구적인 후유증을 남깁니다. 소아마비의 잠복기는 1~2주 정도입니다. 발병 초기에는 발열, 두통, 등의 통증, 발한, 구토, 설사 등 여름 감기와 비슷한 증상을 보입니다.\\n\\n
소아마비 예방 접종을 하지 않거나 불완전하게 시행한 소아에게 발열, 무균성 뇌막염, 이완성 마비 질환이 나타나면, 소아마비를 의심해야 합니다. 분변, 비인두 분비물 등에서 바이러스를 배양하여 폴리오 바이러스가 검출되는지 확인합니다. 예방 접종이 효과적으로 시행되면서 소아마비의 발생률이 감소하였습니다. 현재 소아마비는 거의 자취를 감추었습니다.\\n\\n
소아마비는 병기에 따라 치료 방법이 달라집니다. 소아마비는 병이 시작하는 급성기, 병에서 회복하는 회복기, 후유증 등 병의 흔적이 남는 잔유기로 구분됩니다. 급성기에는 신체에 나타나는 증세에 대한 약물 치료 및 대증 치료를 시행합니다. 환자를 비교적 딱딱한 침대 위에 팔다리를 바르게 하여 눕히고 절대 안정을 시킵니다. 이때 장딴지의 바깥쪽에 있는 인대는 주로 다리를 변형시키는 데 작용합니다. 다리를 바르게 위치하도록 하는 것이 중요합니다. 자극에 예민한 반응을 보여 보조기를 사용하기는 어렵습니다. 가벼운 관절 운동이나 뜨거운 찜질이 도움이 됩니다. 회복기에는 팔다리 변형을 막고, 관절 운동을 회복시키고, 근육에 대한 재활을 시행하는 데 중점을 둡니다. 잔유기에는 근육의 힘을 키우기 위해 물리 치료와 보조기 착용 등을 시행하여 치료합니다.\\n',
'소아과','2020-10-17 (15:00)','66');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','유당불내증',
'유당은 우유에 함유된 물질입니다. 유당 분해 효소인 락타아제가 부족한 사람이 유당을 섭취하면, 유당이 소장에서 삼투 현상에 의해 수분을 끌어들임으로써 팽만감과 경련을 일으키고, 대장을 통과하면서 설사를 유발합니다. 이러한 현상을 유당분해효소결핍증이라 합니다.\\n\\n
유당분해효소결핍증의 원인은 크게 3가지로 분류됩니다.//n
① 일차성 유당분해효소 결핍
광범위하게 나타납니다. 인종에 따라 발생률이 다릅니다. 유제품(우유, 치즈, 아이스크림, 요거트 등) 섭취 정도와 유당을 소화할 수 있는 개인의 능력과 관계가 깊습니다. 동양인은 어려서부터 락타아제의 결핍이 나타나 백인과 비교하였을 때 유당분해효소결핍증이 있는 경우가 많습니다.\\n
② 이차성 유당분해효소 결핍
유당분해효소를 분비하는 소장 세포가 장내 감염(로타바이러스 등) 등에 의해 손상을 받아 염증이 발생하면, 염증이 자연 치유되면서 락타아제 세포가 함께 소실되어 재생되지 않을 수 있습니다. 락타아제가 소실된 상태에서 우유를 섭취하면 유당이 제대로 소화되지 못하여 대장으로 직접 이동하여 유당분해효소결핍증이 나타납니다.\\n
③ 선천성 유당분해효소 결핍
상염색체 열성 유전 질환으로. 드물게 나타납니다. 신생아가 모유나 우유를 섭취한 후 난치성 설사 현상을 나타냅니다.\\n\\n
증상으로는 우유를 마신 후 속이 불편하거나 더부룩한 느낌, 설사와 복통, 복부 팽만, 오심 등의 증상이 나타날 수 있습니다. 증상을 일으키는 유당량은 개인마다 다릅니다. 유당 섭취량, 락타아제의 결핍 정도, 섭취 유당 함유 식품의 형태에 따라 좌우됩니다.\\n\\n
유당분해효소결핍증이 있더라도 부분적으로 소화된 제품(요구르트, 치즈, 가공유)을 섭취하는 등 새로운 방법을 이용할 수 있으므로 우유와 유제품을 기피할 필요는 없습니다. 따뜻한 우유를 먹으면 찬 우유를 먹는 것보다 증세가 완화됩니다. 영양이 많은 우유를 무조건 먹지 않기보다는, 조금씩 자주 마셔서 증세를 조금씩 치료해나가는 것이 좋습니다. 우유 대신 치즈, 요구르트 등의 식품을 먹는 것도 좋은 방법입니다. 소화를 돕는 성분을 첨가한 유제품을 구입해도 좋습니다. 우유를 다른 식품과 함께 먹으면 소화가 느려져 훨씬 수월하게 먹을 수 있습니다.\\n
유제품은 어린이 성장에 필요한 단백질 등의 영양소 공급원으로, 유제품을 먹지 않으면 칼슘 섭취량이 부족해질 수 있습니다. 따라서 우유를 대체할 방법을 찾아야 합니다. 또한 모유를 먹인 아기는 어떠한 경우에도 모유를 계속 먹여야 합니다. 신생아 및 유아의 유당분해효소결핍증은 우유 알레르기와 구분해야 합니다. 전문의의 진단을 받고 그 결과에 따라 우유를 선택해야 합니다.\\n',
'내과','2020-10-17 (15:00)','59');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','신부전증',
'신부전은 말 그대로 신장 기능이 제대로 이루어지지 않아 몸 안에 노폐물이 쌓여서 신체의 여러 가지 기능이 제대로 수행되지 않는 상태를 말한다. 신장기능이 감소하는 속도에 따라 수일 간에 발생하는 급성 신부전과 3개월 이상에 걸쳐 서서히 진행하는 만성 신부전으로 크게 나눌 수 있으며, 만성 신부전 중 잔여 신장 기능이 10% 미만이어서 투석이나 신장 이식과 같은 신대체요법을 시행하지 않으면 생명 연장이 어려운 말기 신부전이 있다.\\n
신장 기능은 20세에 최고에 달했다가 30세부터는 연령이 증가함에 따라 신장 기능의 지표인 사구체여과율이 지속적으로 감소한다. 이는 급성 신부전이 젊은층 보다 노령층에서 잘 발생하는 이유이기도 하다. 이외에도 노령층에서 잘 발생하는 이유로는 고혈압, 당뇨병, 죽상 경화증, 심부전 등의 전신 질환을 가지고 있는 경우가 많으며, 약제의 남용에 노출될 기회가 많고, 전립선비대증과 같은 폐쇄성 요로병증의 발생이 증가하기 때문이다.\\n\\n
- 급성 신부전\\n
급성 신부전은 실질적인 순환 혈류량의 감소로 생기는 신전성(腎前性), 신장 자체의 내인성 손상에 의한 내인성(內因性), 신장 하부의 요로계 폐쇄로 인한 신후성(腎後性)으로 나눠진다. 신전성은 급성 신부전의 가장 흔한 형태인데 신장으로 가는 혈류량을 감소시킬 수 있는 다양한 경우 모두가 이에 해당된다. 내인성의 대부분은 허혈성과 약제 같은 신독성 물질에 의한 경우이며, 신후성은 전체 급성 신부전 원인의 5% 미만을 차지하지만 노령층에서는 급성 신부전의 흔한 원인이 될 수 있다.\\n
급성 신부전의 증상 및 징후는 여러 가지가 있을 수 있다. 소변량이 현저히 감소하는 핍뇨나 방광에 오줌이 없는 무뇨가 나타날 수도 있고, 고혈압, 부종, 호흡곤란 등과 요검사에서 혈뇨, 단백뇨, 농뇨, 원주 등의 소견을 보일 수 있다. 핍뇨나 무뇨 등의 증상없이 신부전이 오기도 하는데, 보통 소변량이 유지되는 경우에는 회복될 가능성이 높은 편이다.\\n
급성 신부전의 치료는 원인을 찾아 교정하는 동시에 추가적 신장 손상이 없도록 보존적 치료를 하는 것이다. 급성 신부전을 예방하기 위해서는 특히 노령층의 경우 진통제 같은 신독성 물질을 사용할 때 주의하고 탈수를 피해야 한다.\\n
급성 신부전에 의한 사망률은 현대의학의 발전에도 불구하고 50%에 달한다. 이는 신부전 자체 때문이라기 보다는 신부전의 원인 질환 때문이라고 보고 있다. 급성 신부전에서 회복된 환자의 대부분은 일상 생활을 할 수 있을 정도로 신기능이 회복되지만, 약 5%의 환자는 신기능이 회복되지 않아 신대체요법을 받으며 여생을 보내야 한다.\\n\\n
- 만성 신부전\\n
만성 신부전의 원인질환으로는 빈도 순으로 당뇨병, 고혈압, 사구체 질환, 원인 불명, 다낭성 신질환 등이 있다. 노령층에서는 원인질환이 신장 경화증, 당뇨병, 세뇨관 간질성 신염, 폐쇄성 요로병증, 사구체 질환, 다낭성 질환의 순으로 약간 바뀐다. 만성 신부전의 증상은 두통, 피로감, 불면증, 요독성 악취, 딸꾹질, 소양증, 오심, 구토, 식욕 부진, 부종, 소변량의 감소, 근육 경련, 근력 약화 등이 나타나며, 검사에서 전해질 이상, 고혈압, 폐부종, 빈혈 등이 발견될 수 있다. 치료는 원인 질환에 대한 치료와 함께 증상 및 합병증에 대한 치료를 하게 된다. 만성 신부전은 신장 기능이 오랜 시간에 걸쳐 서서히 나빠져서 원래 상태로 호전되지 않으므로, 식이 요법과 보존적 약물 치료로 신장 기능이 나빠지는 속도를 최소화 해야 한다. 만약 악화되어 말기 신부전에 이른 경우는 생명 유지를 위해 신대체요법을 받아야 한다.\\n
만성 신부전을 예방하기 위해서는 다음과 같은 노력이 필요하다.\\n
• 신독성이 있는 약물은 가급적 피하는 것이 좋으며, 쓰게 되는 경우는 용량을 신장 기능에 맞게 조정하여 쓴다.
• 요로 감염은 조기에 치료한다.
• 요로 폐색이 있으면 즉시 해소시킨다.
• 지나친 염분과 단백 섭취를 피하고 적절한 몸무게를 유지한다.
• 고혈압을 조절한다.
• 일단 요검사에서 혈뇨나 단백뇨가 있다면 조기에 신장 전문의의 진료를 받아 꾸준히 치료한다.\\n\\n\\n
[네이버 지식백과] 신부전증 (삼성서울병원 건강칼럼)',
'내과','2020-10-17 (15:00)','51');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','통풍',
'통풍(痛風, Gout)은 대표적인 대사질환의 하나로 퓨린(Purine) 대사의 최종 산물인 요산이 혈액 내 남아 농도가 높아지는 고요산혈증(Hyperuricemia)으로 인해 발생되는 질환이다. 혈액 및 관절액 내의 요산은 요산염(Urate) 결정으로 남아 있는데 이것이 관절의 윤활막(Synovial membrane), 연골, 연골하골(Subchondral bone) 및 관절 주위 조직과 피하조직에 침착되고 이로 인해 염증과 통증을 동반하는 질환이다.\\n
통풍 발작이 재발하는 등 오래되면 골, 연골 등이 파괴되고 관절이 변형, 섬유화, 골강직증(Bony Ankylosis) 등으로 진행하는 유전적 성향의 질환이다. 통풍은 주로 중년 이상의 남성에게 많이 발생하는데, 근래에 발생 빈도가 증가되고 발병 연령이 낮아지는 이유는 환경적 영향에 의한 것으로 보인다. 여성 환자의 경우는 대개 폐경기 이후이거나 유전적 소인이 강하거나 신장 기능이 약화된 여성에게서 발병하곤 한다.\\n\\n
요산은 퓨린의 최종 대사산물로 37℃의 혈장에서 약 7.0mg/dl에 포화상태가 되므로 이 이상의 농도를 보일 때 고요산혈증이라 정의한다. 고요산혈증은 요산 생성의 과다 혹은 요산 배출의 감소로 발생하는데 간혹 위의 2가지 문제가 동시에 작용해서 이루어지기도 한다.\\n
요산 생성 과다는 새우젓, 맥주, 동물 내장 등 RNA와 DNA 퓨린이 다량 함유된 음식을 장기간 섭취하거나 체내에서 용혈성 질환, 림프종, 백혈병, 진성 적혈구과다증, 횡문근융해증(rhabdomyolysis) 등의 질병으로 요산 생성이 많아지는 경우에 발생한다. 대부분의 고요산혈증 환자는 요산 배출에 문제가 있어 일반인의 약 40% 정도밖에 요산을 배출하지 못하는데 이뇨제, 저용량 아스피린(aspirin), 에탐부톨(ethambutol), 피라진아미드(pyrazinamide) 등도 요산 배출을 억제한다.\\n
- 체외 과잉 섭취 : 장기간의 고(高)퓨린 식사
- 체내 과잉 생산 : 림프종, 백혈병, 항암요법 등
- 요산 배출 장애 : 고요산혈증 환자의 신장 기능 저하, 이뇨제\\n\\n
통풍은 1) 무증상 고요산혈증, 2) 급성 통풍성 관절염, 3) 간헐기 통풍, 4) 만성 결절성 통풍 등의 전형적인 4단계를 거친다.\\n
1) 무증상 고요산혈증
혈청 요산의 농도는 증가되어 있지만 관절염 증상, 통풍 결절, 요산 콩팥돌증 등의 증상은 아직 나타나지 않는 상태이며, 고요산혈증이 있는 대부분의 사람들이 거의 평생 동안 증상이 없이 지내게 된다.\\n
2) 급성 통풍성 관절염
대개 최소한 20년 동안 지속되는 고요산혈증이 지난 후 첫 번째 통풍발작이 나타나거나 콩팥돌증이 발생한다. 통풍의 가장 특징적인 증상은 매우 고통스러운 관절염의 급성 발작이다. 첫 번째 발작은 보통 하나의 관절을 침범하며 전신 증상은 없는 편이지만, 그 후에 발생하는 발작들은 여러 관절을 침범하고 열이 동반된다. 엄지발가락이 가장 흔하게 침범되는 관절이며, 그 외에도 사지관절 어디나 침범이 가능하다.
대부분의 첫 번째 급성 통풍발작은 갑자기 발생하며, 보통 환자가 편안히 잠든 밤에 시작된다. 이후 일부 환자는 아침에 일어나 첫 걸음을 디딜 때 증상이 나타나고, 어떤 환자들은 통증 때문에 잠에서 깨어나기도 한다. 침범된 관절은 수시간 이내에 뜨거워지고, 붉게 변하며, 부어 오르고, 극심한 통증이 발생한다. 가벼운 발작은 몇 시간 이내에 사라지거나 하루 이틀 정도 지속되지만 심할 경우에는 몇 주간 지속될 수 있다.\\n
3) 간헐기 통풍
간헐기 통풍은 통풍발작 사이의 증상이 없는 기간을 말한다. 일부 환자들에서는 발작이 다시 나타나지 않지만, 대부분의 환자들은 6개월에서 2년 사이에 두 번째 발작을 경험하게 된다. 통풍발작의 빈도는 치료를 받지 않는 환자의 경우 시간이 갈수록 증가한다. 나중에는 발작이 급성으로 나타나기보다는 서서히 나타나게 되고, 여러 관절을 침범하며, 더 심하고 오래 지속되는 경향을 보이게 된다.\\n
4) 만성 결절성 통풍
통증이 없는 간헐기를 지나 만성 결정성 통풍의 시기가 되면, 통풍은 다른 종류의 관절염과 유사하게 보인다. 통풍결절 형성과 통풍발작은 고요산혈증의 정도와 기간에 비례하여 증가한다. 첫 발작 후 통풍결절이 관찰되기 시작할 때까지는 평균 10년 정도 걸리고, 20년 후에는 1/4의 환자에게서 결절이 나타난다.\\n
통풍결절은 귓바퀴에서 가장 흔하게 발견되며 손가락, 손, 발가락, 발목, 무릎 등에 비대칭적이고 울퉁불퉁한 덩어리를 형성하므로 더 큰 장갑이나 구두가 필요하게 된다. 결절의 형성은 서서히 일어나며, 비록 결절 자체의 통증은 약하더라도 침범 부위의 관절에 점진적인 뻣뻣함과 지속적인 통증이 종종 발생한다. 결국 관절의 광범위한 손상과 함께 피부 밑에 큰 결절이 생성되어 손과 발이 괴상한 형태로 변해간다.\\n\\n
치료는 통풍의 각 단계마다 조금씩 다르다.\\n
1) 무증상 고요산혈증의 치료
고요산혈증이 통풍과 관련된 질환들을 일으키는 직접적이고 중요한 요소라는 명확한 증거는 없다. 통풍성 관절염, 콩팥돌증 등이 동반되지 않은 무증상 고요산혈증을 치료할 것인지에 대한 결정은 정해진 원칙보다 의사의 판단에 의해 시행되는 것이 옳으며, 비만, 고지질혈증, 알코올 중독, 고혈압 등과 관련한 생활 습관을 개선하는 것이 중요하다.\\n
2) 급성 통풍성 관절염의 치료
증상이 발생한 후에는 안정을 취하고 가능한 신속하게 적절한 치료를 시작해야 한다. 급성 통풍발작은 콜히친(colchicine), 비스테로이드 항염제, 스테로이드 등의 약물에 의해 효과적으로 증상을 완화시킬 수 있다. 치료를 빨리 시작하면 빠르고 효과적으로 증상이 호전될 수 있으므로, 통풍발작이 나타나면 즉시 약물 투여를 시작하는 것이 중요하다.\\n
3) 간헐기 동안의 통풍발작의 예방
소량의 콜히친을 매일 복용하면 급성 통풍발작을 매우 효과적으로 예방할 수 있다. 3~6개월 간의 예방적 사용 후에 콜히친 복용을 중단할 수 있지만, 이때 급성 통풍발작이 악화될 수 있다. 콜히친의 예방적 사용은 급성 염증반응을 멈추게 할 수는 있지만 조직 내에 쌓인 요산결정을 제거하지는 못하므로 급성 통증과 같은 경고 증상 없이 연골과 뼈의 파괴가 발생할 가능성도 있다.\\n
4) 만성 결절성 통풍의 치료
항고요산혈증 약물을 이용하여 고요산혈증을 조절하면 요산이 조직에 침착되는 것을 예방하고 혈중 요산농도를 정상화시킬 수 있다. 알로퓨리놀(allopurinol), 프로베네시드(probenecid) 등의 요산배설촉진제가 주로 사용된다.\\n\\n
고단백음식을 섭취하면 체내에서 요산 생성이 증가하게 된다. 그러나 현재 사용 가능한 항고요산혈증 약제의 효과가 매우 좋으므로 통풍 환자에서 특별한 식이요법은 필요하지 않다. 다만 열량 제한을 통한 체중 감량과 과식을 하지 않는 것이 중요하고, 절주하는 것도 중요하다. 체중 감량 프로그램이 실패하면 통풍발작이 일어날 수 있는데, 이는 요산의 농도가 급격하게 변화하기 때문이다. 또한 술을 갑자기 많이 마시면 술에 취해 있는 동안 일시적인 고젖산혈증이 발생하여 고요산혈증이 악화된다. 장기간 술을 마시는 것 역시 통풍을 악화시킬 수 있다.\\n\\n\\n
[네이버 지식백과] 통풍 [gout] (서울대학교병원 의학정보, 서울대학교병원)',
'내과','2020-10-17 (15:00)','22');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','패혈증',
'패혈증은 미생물 감염에 대한 전신적인 반응으로 주요 장기에 장애를 유발하는 질환입니다. 패혈증에 저혈압이 동반된 경우를 패혈성 쇼크라고 합니다.\\n\\n
패혈증은 뇌수막염, 피부 화농증, 욕창, 폐 질환, 담낭염, 신우염, 골수염, 감염된 자궁 등 다양한 장기 감염에서 유발됩니다. 패혈증을 일으키는 병원균은 연쇄상구균, 포도상구균, 대장균, 폐렴균, 녹농균, 진균, 클렙시엘라 변형 녹농균 등이 있습니다.\\n\\n
초기 증상으로는 호흡수가 빨라지고, 지남력(시간, 장소, 사람에 대한 인지력)의 상실이나 정신 착란 등의 신경학적 장애가 나타날 수 있다. 혈압의 저하 및 신체 말단에 공급되는 혈액량의 저하로 인하여 피부가 시퍼렇게 보이기도 한다. 균혈증(세균이 혈액 내에 돌아다니는 증상)이 있으면 세균이 혈류를 따라 돌아다니다가 신체의 특정 부위에 자리를 잡아 그 부위에 병적인 변화를 일으킬 수 있다. 원인균에 특이적인 피부의 변화가 나타나서 패혈증의 원인을 진단하는 데 도움이 되기도 한다. 소화기 계통의 증상으로는 구역, 구토, 설사 및 장 마비 증세가 나타나고 심한 스트레스 상황에서는 소화기의 출혈 증상도 나타날 수 있다.\\n\\n
패혈증의 원인이 되는 장기의 감염을 치료하는 것이 중요하다. 신체검진과 혈액검사, 영상 검사를 통해서 패혈증의 원인이 되는 신체의 감염 부위를 찾은 후 적절한 항생제를 사용하여 감염증을 치료한다. 패혈증의 원인균을 알아내기 위해서는 환자의 혈액을 채취하여 균을 배양하는 검사가 필요하지만 이는 적어도 3~5일 정도의 시간이 필요하므로 만일 환자의 상태가 위독하다면 배양 검사 결과가 나오기 전에 경험적인 치료를 시행해야 한다. 패혈증의 원인이 되는 감염 장기에 농양(고름)이나 괴사(세포나 조직의 일부가 죽은 것) 조직이 존재하거나 인공 장기가 삽입되어 있는 경우에는 이를 제거하는 방법을 심각히 고려해야 한다.\\n
패혈증을 치료할 때에는 환자의 혈압을 적정하게 유지시키고 신체의 각 조직에 혈액 및 산소가 충분히 공급되도록 해야 한다.\\n\\n\\n
[네이버 지식백과] 패혈증 [sepsis] (서울대학교병원 의학정보, 서울대학교병원)',
'내과','2020-10-17 (15:00)','37');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','요로결석',
'요로 결석은 소변이 생성되어 수송, 저장, 배설되는 길(요로)에 결석(돌)이 생긴 것을 말합니다. 돌이 생기는 곳에 따라 신장 결석, 요관 결석, 방광 결석, 요도 결석 등으로 나뉩니다.\\n\\n
요로 결석은 유전적 요인, 식이 습관, 생활 습관, 수술 병력, 요로 감염 등의 다양한 원인에 의해 발생합니다. 소변 내 특정 물질이 과포화 상태가 된 후 결정이 생기고, 이것이 더 응집되어 커지면서 임상적으로 문제가 발생합니다. 특히 결석이 자주 발생하는 환자는 옆구리 통증, 요로 감염, 신우신염 등의 증상으로 고통받으며, 그 외에도 신 기능이 저하될 수 있습니다. 따라서 결석은 예방이 매우 중요합니다.\\n\\n
요로 결석의 증상은 결석의 크기, 위치, 요로 폐색의 정도, 감염 등 합병증의 유무에 따라 다르게 나타납니다. 대표적인 증상은 아래와 같습니다.\\n
① 옆구리 통증
요로 결석의 특징적인 증상입니다. 진통제로도 없어지지 않는 심한 통증이 한쪽 또는 양쪽 허리에 나타납니다. 통증은 질 하복부나 고환 쪽으로 뻗칠 수 있습니다. 신장 결석이나 방광 결석의 경우에는 옆구리 통증이 잘 나타나지 않을 수 있으나, 요관 결석의 경우 요의 흐름이 막히면서 통증이 나타날 수 있습니다. 요로 결석의 통증은 맹장염과 비슷하여 맹장염으로도 의심받을 수 있습니다.\\n
② 혈뇨
소변을 보았을 때 소변이 빨갛게 보입니다. 혈뇨는 현미경으로만 관찰되기도 합니다.\\n
③ 배뇨 이상 증상
방광 결석, 요도 결석의 경우, 소변을 볼 때 심한 통증이 나타날 수 있으며, 빈뇨, 잔뇨감 등의 증상이 나타날 수 있습니다. 요도 결석인 경우 심한 통증과 소변을 보지 못하는 증상으로 응급실에 가기도 합니다.\\n
④ 소화기 증상
소화가 잘 안 되거나, 구역질, 구토 등의 증상이 나타날 수 있습니다.\\n
⑤ 고열
일반적으로는 열이 나지 않습니다. 세균에 감염되면 고열이 발생할 수 있습니다.\\n\\n
요로 결석의 치료 방법은 환자에 따라 다릅니다. 증상, 결석의 크기, 요폐나 요로 감염의 유무, 요로의 해부학적 이상 유무, 결석의 원인 등에 따라 치료법을 선택합니다.\\n
① 경과 관찰
우선 결석이 자연 배출되도록 기다립니다. 결석의 크기가 5㎜ 미만일 경우, 수분을 다량 섭취하고, 진통제를 투여하면서 줄넘기 등의 운동을 실시하며, 정기적으로 방사선 촬영하여 결석의 자연 배출 여부를 확인합니다. 단, 요로 결석으로 인해 요관 폐색이 발생하고 요로 감염이 동반되어 열이 나거나 오심, 구토 등의 증상이 심한 경우, 혹은 신장이 하나인 요로 결석의 경우에는 응급으로 요로 전환술(경피적 신루 설치, 요관 부목 거치)를 시행해야 합니다.\\n
② 체외 충격파 쇄석술
몸 밖에서 충격파를 주어 결석을 파쇄하여 자연 배출되도록 유도하는 치료법입니다.\\n
③ 요관경하 배석술
요도를 통해 내시경을 삽입하고 결석을 파쇄한 후 제거하는 수술 방법입니다.\\n
④ 복강경 혹은 개복 수술
요로 결석의 크기가 너무 커서 체외 충격파 쇄석술이나 내시경적 수술로 해결할 수 없을 경우 복강경이나 개복 수술을 고려할 수 있습니다. 최근에는 자주 시행하지 않습니다.\\n\\n
- 주의사항
① 수분을 충분히 섭취합니다. 이는 요로 결석 환자에게 가장 중요한 생활 수칙입니다. 하루 소변량이 2L 이상 되도록 하는 것이 좋습니다. 이를 위해 적어도 하루 10잔 이상의 수분 섭취를 권장합니다. 구체적으로, 하루 3회 식사 중 2잔의 물을 마시고, 매 식간에 1~2잔의 물을 마시며, 취침 전에 물 1잔을 마시는 것이 좋습니다. 특히 운동이나 땀을 많이 흘린 다음에는 추가로 충분한 수분을 섭취해야 합니다.\\n
② 일반적으로 칼슘 섭취를 제한할 필요는 없습니다. 하루 3잔 정도의 우유는 전혀 문제가 되지 않습니다. 오히려 칼슘 섭취를 지나치게 제한하면 요석의 발생을 촉진할 수도 있습니다.\\n
③ 저염 식이는 매우 중요합니다. 즉, 짜지 않게 음식을 드셔야 합니다.\\n
④ 과다한 육류 섭취를 자제합니다. 육류는 소변 내 칼슘, 수산, 요산을 증가시키고, 결석의 생성을 막는 구연산을 감소시킵니다.\\n
⑤ 수산이 풍부한 음식들(시금치, 초콜릿, 아몬드, 땅콩, 브로콜리, 딸기, 콜라, 코코아, 커피, 술 등)을 자주, 과량 섭취하는 것을 자제합니다. 그러나 수산을 소량 섭취하는 것은 결석의 위험성을 크게 증가시키지 않습니다.\\n
⑥ 고단백, 고지방 식이를 자제합니다.\\n
⑦ 하루 2g 이상의 고용량 비타민 C 섭취는 고수산뇨증을 일으켜 결석 환자에게 좋지 않다는 보고가 있었습니다. 그러나 통상적인 용량(500~1000mg)의 비타민 섭취는 큰 문제가 되지 않습니다.\\n
⑧ 구연산이 풍부하게 함유된 과일(귤, 레몬, 오렌지, 자몽, 매실, 토마토 등)과 채소를 충분히 섭취합니다.\\n
⑨ 일반적인 식이 지침에 따라 생활해도 결석이 자주 재발하는 경우, 결석 원인에 따라 구연산이 함유된 약제나 이뇨제 등을 규칙적으로 복용함으로써 재발을 줄일 수 있습니다. 이러한 약제를 처방받으려면 전문의와 상담해야 합니다.\\n',
'비뇨기과','2020-10-17 (15:00)','17');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','고나트륨혈증',
'우리 몸은 체중의 60%가 물로 이루어져 있고, 이 중 1/3은 세포 외에, 2/3는 세포 내에 존재합니다. 세포벽을 사이에 두고 세포 안과 밖을 오고 가는 물의 이동은 혈액의 삼투질 농도에 의하여 결정되며, 삼투질 농도가 낮은 쪽에서 높은 쪽으로 물이 이동하게 됩니다. 사람 혈액 내의 정상 삼투질 농도는 체중 1kg당 280~295mOsm 범위이고, 대부분 삼투질 농도는 혈액의 나트륨 농도에 의하여 결정됩니다. 나트륨의 혈중농도가 여러가지 이유로 정상수준보다 높은 것을 고나트륨혈증이라고 하는데, 보통 혈중농도가 145mEq/L 이상인 경우입니다. 고나륨혈증이 급성인 경우에 증상이 매우 심하게 나타나며, 특히 고령자와 영아의 고나트륨증은 이병률 및 사망률이 매우 높습니다.\\n\\n
고나트륨혈증은 치료받지 않은 요붕증, 당뇨병, 신장질환이나 금식, 연하곤란, 갈증 중추의 기능이 저하되어 수분 섭취를 제대로 하지 못하는 경우(영아, 노인에서 주로 발생), 발열, 구토, 설사로 과다한 수분이 소실되거나, 충분한 수분 공급이 안 되는 경우, 나트륨을 과다 섭취한 경우에 발생할 수 있습니다.\\n\\n
가장 흔한 증상은 탈수로 인한 심한 갈증이며, 오심, 구토, 식욕부진, 빈호흡, 피부 긴장도 저하 등이 동반됩니다. 급성기의 증상은 혈중나트륨이 158mEq/L 이상일 때 나타나고, 두통, 안절부절 못함, 운동실조, 의식 혼미, 섬망, 경련, 혼수 등의 신경학적 증상이 나타나고 185mEq/L 이상이면 사망을 초래합니다. 그리고 고나트륨증이 발생하면 세포 내의 수분이 세포 외로 이동하게 되는데, 특히 뇌세포에 이러한 병태가 진행되면 의식장애, 쇠약감, 혼수, 경련 등의 증상이 나타나게 됩니다.\\n\\n
고나트륨혈증 치료는 수분 손실을 막고, 수액을 투여하여 혈장 나트륨 농도를 낮추는 것 입니다. 이때 빠른 교정을 위해 급속히 혈청 삼투질 농도를 감소시키면 뇌세포내로 물이 빨려 들어가 뇌부종, 경련, 영구적인 신경학적 손상 및 사망을 초래할 수 있으므로, 급성 고나트륨혈증인 경우 목표 수치(145mmol/L)에 도달할 때까지 시간당 1mEq/L 이상 감소시키지 않는 것을 원칙으로 합니다. 또한, 만성 고나트륨혈증이거나 증상이 없는 경우에는 치료시 시간당 0.5mEq/L 이상 감소시키지 않아야 합니다(하루에 10mEq/L 이상 감소하지 않아야 함).\\n
경증의 의식이 명료한 환자는 0.9% 생리식염수 투여와 경구 투여로 치료하고, 중증인 경우 혈압이 안정될 때까지 생리식염수를 투여하며, 혈압이 안정된 다음에는 소변량을 유지시키면서 5% 포도당이나 0.45% 생리식염수를 투여합니다. 신장질환이 있는 경우 일일 나트륨 섭취량을 500~2,000mg으로 제한하고, 요붕증이 원인인 경우 염분 섭취를 제한하고 이뇨가 서서히 일어나도록 바소프레신을 투여합니다.\\n',
'비뇨기과','2020-10-17 (15:00)','42');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','신장 결석',
'신장은 혈액 속의 여러 성분을 걸러서 소변으로 내보낸다. 그 중 무기물은 많은 양이 재흡수 되지만 일부 소변으로 배출된다. 이러한 무기물들이 어떤 조건이 만족될 때 응고가 되어 굳는다. 이와 같은 것을 신장결석이라 한다. 크기는 모래 한 알 정도에서 포도알 만한 크기로 다양하다. 작은 결석은 대부분 소변을 통해 배출되지만, 결석이 배출되기 전에 크기가 커지면 수뇨관을 막는 등 여러 문제를 일으킨다. 댄트 질환(Dents disease), 신세뇨관성산증(renal tubular acidosis), 수질성해면신(medullary sponge kidney)과 같은 기초적인 대사 상태에 이상이 생길 때 주로 발생한다. 신장결석이 계속해서 재발하는 환자에게서 이런 질환을 쉽게 볼 수 있다. 재발율은 일년에 10% 정도이다.\\n\\n
- 종류\\n
가장 일반적인 결석은 소변의 성분 중 수산염(oxalate)과 칼슘(calcium)이 결합하여 형성된 옥살산칼슘석(calcium oxalate stone)이다. 지나친 칼슘의 섭취가 신장결석을 일으킨다는 것이 오랫동안 일반적인 상식이었다. 그러나 근래의 연구결과는 오히려 낮은 칼슘의 섭취가 신장결석 발생을 증가시킴을 보여주었다. 칼슘이 부족하면 섭취한 수산염 중 흡수되는 양이 증가하여 혈중 수산염의 농도가 올라간다. 높은 혈중 수산염 농도는 소변의 수산염 농도를 증가시키고 결석 형성을 촉진한다. 수산염은 옥살산칼슘 결정을 형성하는 능력이 매우 강하며, 칼슘의 15배나 된다.\\n
녹각석(struvite stone)은 요소분해균(urea-splitting bacteria)이 요소(urea)를 암모니아(ammonia)로 분해하여 소변이 알칼리화될 때 발생한다. 주로 요소분해균 중에서도 기괴변형균(proteus mirabilis)이 가장 일반적인 원인이다.\\n
요산석(uric acid stone)은 혈중 요산(uric acid) 농도가 높은 경우 발생한다. 통풍(gout), 백혈병(leukemia), 림프종(lymphoma) 환자가 화학요법을 받으면, 혈중 요산 농도가 높아지는데 이 때 요산석이 발생할 수 있다. 또한 산, 염기 대사에 이상이 있는 경우에도 발생한다.\\n
인산칼슘석(calcium phosphate stone)은 부갑상선기능항진증(hyperparathyroidism), 신세뇨관성산증(renal tubular acidosis)이 있는 경우 발생한다.\\n
시스틴석(Cystine Stone)은 시스틴뇨(cystinuria) 증세가 있는 경우 발생한다.\\n\\n
- 증상\\n
일반적으로 주기적인 통증을 느끼게 된다. 특히 허리 부근에 통증이 오는 경우가 많으며, 실신할 정도로 심한 경우도 있다. 결석이 수뇨관 내벽에 상처를 낼 경우, 소변에 피가 섞여 나오는 혈뇨증 증세가 나타난다. 또한 결석이 수뇨관을 막으면 신장이 팽창되는 수신증(hydronephrosis), 배뇨곤란, 핍뇨(oliguria)가 나타나며, 메스꺼움과 구토가 나기도 한다.\\n\\n
- 치료\\n
지름 4mm 이하의 작은 결석은 90%가 자연배출되지만 6mm 이상의 결석은 조치가 필요하다. 만약 환자가 특별한 증상을 보이지 않는다면 최대 30일 동안 자연적으로 없어지기를 기다린 후, 없어지지 않는 경우 추가적인 문제가 발생할 수 있으므로 수술이나 적절한 치료를 한다. 이와는 달리 곧바로 수술을 해야하는 경우는 환자가 신장을 하나만 가지고 있는 경우, 심한 고통이 있는 경우, 신장이 감염되었을 경우이다.\\n
최근 치료 기술로는 수뇨관 스텐트(stent)를 사용한 방법이 있다. 스텐트란 금속이나 플라스틱으로 되어있는 튜브로서 막힌 곳을 뚫을 때 사용한다. 이것을 사용하면 결석으로 수뇨관이 막혀 신장이 팽창되는 것을 막을 수 있다.\\n
결석에 의한 고통을 다스리는 방법은 나라뿐 아니라 의사에 따라서도 다르다. 그러나 보통 급성 통증이 있는 경우에는 진통소염제나 마취 성분이 있는 약을 정맥을 통해 주사한다. 통증이 덜한 경우에는 비슷한 종류의 약을 쓰되 주사를 하지 않고 복용한다. 케토로락(ketorolac)은 진통소염제의 하나로 마취 성분이 없으면서도 급성 통증에 매우 효과적이다. 대부분의 급성 통증은 24시간 내에 사라지며, 입원할 필요는 없다.\\n\\n
- 예방\\n
결석 발생을 예방하는 방법은 크게 음식을 조절하는 것과 결석을 막는 약을 먹는 두 가지가 있다.\\n
음식
(1) 충분한 물을 마셔 소변량이 하루에 2-2.5리터가 되게 한다.
(2) 수산염, 질소, 나트륨, 단백질의 섭취량을 조절한다.
(3) 칼슘의 적절한 섭취를 유지한다.\\n
시금치, 초콜릿, 땅콩, 코코아, 토마토 주스, 자몽 주스, 사과 주스와 같은 음식은 수산염이 많이 들어 있다. 반대로 레모네이드, 오렌지 주스와 같은 음식에는 구연산(citrate)이 많이 들어 있는데 구연산은 결석 형성을 억제하는 물질이다. 카페인을 섭취하면 소변에 칼슘의 농도가 올라가지만 몇몇 역학조사에서는 전반적으로 결석 형성을 막는다는 결과가 나왔다.\\n\\n\\n
[네이버 지식백과] 신장결석 [nephrolithiasis/renal calculus, 腎臟結石] (두산백과)',
'비뇨기과','2020-10-17 (15:00)','31');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','방광암',
'방광암은 방광에 발생하는 악성종양으로, 60~70대에서 주로 발생하고 남성이 여성보다 발병 위험도가 3~4배 높다. 흡연이 가장 위험한 원인이고, 직업적으로 발암물질에 노출되는 것도 발병과 연관이 있다. 진단 시 방광에만 한정된 암이 전체 방광암의 3/4을 차지한다.\\n\\n
방광암의 가장 주된 원인은 흡연이며, 각종 화학 약품에 직업적으로 노출되거나, 커피, 진통제, 인공감미료, 감염, 결석, 방사선조사, 항암제 등도 발병 요인으로 생각되고 있다. 흡연한 담배의 개수, 흡연 기간 모두 방광암의 위험성과 비례관계가 있고, 흡연을 시작한 연령이 어릴수록 위험성이 증가한다. 과거 염료공장, 고무, 직물, 화학 공장에서 근무한 경험이 있는 근로자에서 방광암의 위험이 증가한다는 연구가 보고된 바 있다.\\n
또한 페나세틴(phenacetin)과 같은 진통제와 사이클로포스파마이드(cyclophosphamide), 클로나파진(chlornaphazine)과 같은 항암제와 방광암의 연관성이 연구된 바 있다. 유전적 요인도 방광암의 잘 알려진 원인 중 하나이다.\\n\\n
방광암의 가장 주된 증상은 통증 없이 소변에 피가 섞여 나오는 것이다. 혈뇨의 정도는 방광암의 정도와 반드시 일치하는 것이 아니므로, 어떤 종류의 혈뇨라도 방광암을 의심해야 한다. 방광암이 괴사를 일으키거나 결석이 동반된 경우, 혹은 상피내암이 동반된 경우에는 급뇨(갑작스러운 배뇨감), 배뇨 시 통증, 빈뇨와 같은 방광 자극 증상을 보일 수도 있다. 방광암에 의해 요관폐색(소변길이 막힘)이 발생하였을 경우 측복부 통증, 하지 부종이 발생할 수 있고, 방광암이 진행된 경우 골반에서 덩어리가 만져지기도 한다.\\n\\n
혈뇨를 주 증상으로 내원한 환자에서 요세포 검사와 방광경검사를 통해 방광암을 확진하고, 병의 진행 단계를 결정하기 위한 방사선검사 순으로 진행하게 된다.\\n
1) 병력청취 및 신체검사
병력청취를 통해 흡연 여부, 직업, 약물 복용 여부 등 위험 인자에 대한 노출 여부를 확인하게 된다. 혈뇨를 주 증상으로 내원한 환자에서 직장수지검사(손가락을 직장에 삽입하여 비정상적인 부분을 감지하는 검사)를 포함한 신체검사를 시행하지만, 방광암의 대부분은 점막에만 나타나는 표재성이므로 신체검사의 진단적 유용성은 제한적이다.\\n
2) 요세포를 검사한 요검사
요세포 검사는 주변 조직에 손상을 가하지 않는 비침습적 검사이며 초기 검사로 중요하다. 가격이 저렴하다는 장점도 있다. 그러나 정확도가 떨어지므로 요세포 검사에서 정상이라고 해서 방광암이 아니라고 확신할 수 없다. 이를 보완하기 위해 환자의 소변에서 종양표지자 검사(암세포의 존재를 나타내는 물질에 대한 검사)를 시행하지만, 아직까지 표준적인 검사 방법은 없다.\\n
3) 방광경 검사
방광경검사는 방광암 검사에서 가장 중요한 검사 중 하나인데, 이는 방광 전체의 내부와 전립선, 요도 등을 모두 눈으로 직접 관찰할 수 있기 때문이다. 그러나 초기에는 방광경 검사를 통해 이상 징후가 발견되지 않을 수 있으므로 최근에는 형광물질을 이용한 방광경 검사가 시행되기도 한다.\\n
4) 방사선 검사
방사선검사는 방광암 진단 후 암이 얼마나 진행되었는지를 결정하기 위해 시행한다. 배설성 요로 조영술은 방광 내에 불규칙적인 음영결손을 보여주는 데 발병 초기인 경우 정상으로 해석되는 경우도 있다. 또한 상부 요로암이 동반된 경우나 신우에 소변이 정체하는 수신증 여부도 알 수 있다.\\n
신기능이 좋지 않거나 조영제 알레르기가 있는 경우 초음파검사를 시행하기도 하며, 방광암 진단에 배설성 요로 조영술보다 유용하다는 의견도 있다. 전산화 단층촬영(CT)은 방광암의 진행 단계를 결정하는 데 가장 중요한 검사이며, 방광암이 인접한 조직이나 세포에 침입하는 침윤 정도와 다른 장기로의 전이를 평가하는 데에도 도움이 된다. 그 외에 자기공명영상, 골주사, 흉부 촬영 등도 선택적으로 시행된다.\\n\\n
표재성 방광암의 치료는 경요도 절제술이 기본이다. 절제술 후 조직학적 징후나 종양의 개수, 크기, 재발 기간 등을 고려하여 방광 내 BCG나 항암제 등을 주입하는 치료를 고려한다. 표재성 방광암이라도 경요도 절제술로 완전 절제가 불가능하거나 보존적 치료에 반응하지 않는 경우에는 방광 적출술 등의 침습적인 치료를 고려할 수 있다. 방광암은 재발이 흔하기 때문에 주기적인 추적 검사가 필수적이다.\\n
침윤성 방광암의 경우에는 방광 적출술을 포함한 침습적인 치료가 고려된다. 그러나 방광 적출술은 수술 자체의 이환율과 사망률이 높으므로 환자의 건강 상태 등을 충분히 고려하여 시행 여부를 결정하게 된다. 방광 적출술 전후로 항암 치료를 병행하기도 한다. 침윤성 방광암에서도 방광을 보존하는 치료를 시도할 수 있으며, 이런 경우 부분방광절제술, 방사선조사, 항암 치료 등을 병행한다. 방광암이 다른 장기로 전이한 경우에는 항암 치료를 시행하게 된다.\\n\\n
방광암의 예방을 위해서는 금연이 필수적이다. 그 외에 충분한 수분 섭취도 방광암 발생을 억제하는 데 도움을 줄 수 있다. 비타민A와 그 전구물질인 베타카로틴이 방광암을 예방하는 효과가 있음이 입증되었다. 비타민C도 실험적으로는 예방 효과가 알려졌지만 임상에서는 밝혀진 바가 없다.\\n\\n
흡연은 방광암의 가장 주된 요인이므로 금연해야 하고, 수분 섭취는 방광암의 발생 위험성을 낮출 수 있다. 비타민제제에 대한 연구는 논란이 있는데, 단일 비타민 제제는 방광암에 효과가 없지만 종합 비타민제는 방광암의 발생을 낮추는 효과가 있다고 알려져 있다. 콩 대사물도 방광암 억제에 효과가 있음이 실험을 통해 입증된 바 있다. 최근에는 소염제인 COX-2 억제제의 항암효과에 대한 연구가 활발히 진행되고 있다.\\n\\n\\n
[네이버 지식백과] 방광암 [bladder cancer] (서울대학교병원 의학정보, 서울대학교병원)',
'비뇨기과','2020-10-17 (15:00)','20');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','편도선염',
'편도선염은 여러 가지 원인으로 인해 전신의 저항력이 감소하였을 때 편도 내 세균으로 인해 급성 감염이 일어나는 질환을 말합니다.\\n\\n
편도선염은 몸의 저항력이 떨어졌을 때 세균이나 바이러스에 감염되어 발생합니다. 편도선염을 일으키는 가장 흔한 원인균으로는 β 용혈성 연쇄상구균이 있습니다. 이 외에도 포도상구균, 폐렴구균, 헤모필루스(Haemophilus) 및 다양한 혐기성 균주들도 편도선염의 원인균이 될 수 있습니다.\\n
편도선염을 일으키는 바이러스로는 인플루엔자 바이러스(influenza virus), 파라인플루엔자 바이러스(parainfluenza virus), 단순 헤르페스 바이러스(herpes simplex virus), 콕사키 바이러스(coxsackievirus), 에코 바이러스(echovirus), 리노 바이러스(rhinovirus), 호흡기세포융합 바이러스(respiratory syncytial virus) 등이 있습니다.\\n
미취학 아이들은 바이러스 때문에 편도선염에 걸리는 경우가 많습니다. 이보다 나이가 많은 아이들은 세균 때문에 편도선염에 걸리는 경우가 많습니다. 급성 편도염은 청년기 또는 젊은 성인에게 잘 발생합니다. 다른 연령층의 발생률은 상대적으로 낮습니다.\\n\\n
편도선염에 걸리면 고열, 오한, 인후통이 나타납니다. 인두 근육에 염증이 생기면 연하(삼킴) 곤란이 나타납니다. 두통, 전신 쇠약감, 관절통 등 신체 전반에 걸쳐 증상이 나타납니다. 혀 표면이나 구강 내에 두껍고 끈적끈적한 점액이 생길 수 있습니다. 경부임파선 비대도 흔하게 나타납니다. 이러한 증상은 4~6일 정도 지속되고, 합병증이 없으면 점차 사라집니다.\\n\\n
편도선염은 대부분 충분한 휴식, 수분 섭취, 증상 조절을 위한 소염진통제 복용 등 보존적인 치료를 시행하면 치료됩니다. 그러나 합병증이 의심되거나 세균 감염이 의심되는 경우 항생제 치료를 고려할 수 있습니다.\\n
재발성 편도염이라면 편도 절제술을 시행하는 경우가 많습니다. 이 경우 치료 효과가 좋습니다. 다른 치료법을 충분히 시도했음에도 불구하고 일 년에 3~4회 이상 편도염이 재발한다면 편도 절제술을 시행할 수 있습니다. 편도 비대로 인하여 치아 부정 교합이 생기거나 안면골 발달의 장애가 생길 때도 수술을 권할 수 있습니다. 항생제에 잘 반응하지 않는 편도 주위 농양은 배농술로 치료합니다.\\n',
'이비인후과','2020-10-17 (15:00)','29');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','이명',
'이명이란 특정한 질환이 아니라 귀에서 들리는 소음에 대한 주관적 느낌을 말합니다. 즉, 외부로부터의 청각적인 자극이 없는 상황에서 소리가 들린다고 느끼는 상태입니다. 이러한 이명은 다시 타각적 이명과 자각적 이명으로 나뉩니다. 타각적 이명은 혈류 소리나 근육의 경련 소리와 같은 체내의 소리가 몸을 통해 귀에 전달되어 외부로부터 청각 자극이 없는데도 소리가 들리는 것으로 검사자도 그러한 소리를 들을 수 있는 경우가 있습니다.\\n
자각적 이명이란 어떠한 방법으로도 다른 사람들은 듣지 못하고 본인만이 주관적으로 호소하는 소리가 있는 경우를 말합니다. 그러나 자각적 이명도 환청과는 다릅니다. 이명은 -삐- 소리나 -윙- 소리와 같이 아무런 의미가 없는 소리가 들리는데 반해서 환청의 경우에는 음악이나 목소리와 같은 의미가 있는 소리가 들립니다. 환청은 흔하지는 않지만 정신분열증과 같은 정신질환에서 나타날 수 있는 것에 비해 이명은 매우 흔해서 완전히 방음된 조용한 방에서는 모든 사람의 약 95%가 20dB 이하의 이명을 느낀다는 보고도 있습니다. 그러나 대개 이런 소리는 임상적으로 이명이라고 하지 않고, 자신을 괴롭히는 정도의 잡음이 들리는 경우 이명이라고 합니다.\\n
난청, 현기증과 더불어 이비인후과 영역의 중요한 증상 중 하나인 이명은 기원전 400년 경에 이미 기술되기 시작하였으나, 많은 학자들의 연구에도 불구하고 뚜렷한 원인과 발병 기전에 대해 완전히 밝혀지지 않아 정확한 진단은 물론이고 적절한 치료가 쉽지 않습니다. 외국의 경우 통계에 따르면 성인의 30% 이상이 이명을 호소하고 있으며, 6~8% 정도가 수면에 방해가 될 정도의 이명이 있고, 0.5% 정도에서는 이명으로 인해 일상생활에 지장을 받고 있다는 보고도 있습니다.\\n\\n
위에서 기술한 것처럼 이명은 크게 자각적 이명과 타각적 이명으로 나눌 수 있습니다. 자각적 이명의 원인을 확실하게 확인하는 것은 경우에 따라 어려울 수도 있지만, 일반적으로 자각적 이명의 원인으로 추정해볼 수 있는 종류로는 내이질환, 소음, 두경부 외상, 중이염, 외이도염, 약물, 상기도염, 스트레스나 피로, 청신경 종양 등이 있습니다. 이런 여러가지 원인에 의해 달팽이관 안의 유모세포가 손상되는데, 이 때 비정상적인 자극이 반복적으로 일어나게 됩니다. 이 자극은 중추의 청각신경전도로에 자극을 주어 환자는 실제로 소리가 나는 것처럼 들립니다. 그 외에 청신경의 이상감각, 달팽이관이나 속귀신경으로 혈액을 공급하는 혈관의 이상과 그로 인한 자율신경계의 부조화, 중이 내 근육의 과도한 긴장, 내이구조물의 부종 등도 여러 가지 원인 중 하나일 것으로 생각하고 있습니다.\\n
타각적 이명의 경우에는 다른 사람도 소리를 들을 수 있는 경우로 혈관 기형을 포함한 혈관의 이상, 귓속뼈나 귀인두관을 움직이는 근육의 경련, 입천장을 움직이는 근육의 경련, 턱관절 이상 등이 체내 소리의 원인으로 알려져 있습니다.\\n\\n
이명은 돌발적으로 발생하는 경우와 점진적으로 발생하는 비율이 비슷합니다. 또한 지속적인 이명이 단속적인 이명보다 빈도가 높습니다. 전체적으로는 점진적으로 시작하여 지속적인 것이 가장 많고 다음으로 갑자기 발병하여 지속적인 것이 많습니다.\\n
환자들은 이명 증상을 단순음으로 표현하는 경우가 복합음으로 표현하는 경우보다 훨씬 많습니다. 단순음 중에는 윙~, 쐬~ 하는 소리, 매미 우는 소리, 바람 소리 등이 많으며, 복합음은 매미 소리와 윙~ 소리의 혼합이 가장 많습니다.\\n
이명은 피로하거나 신경을 쓸 때 가장 많이 나타나며 조용할 때 증상이 심해지지만, 오히려 긴장이 풀려있을 때 악화되는 경우도 있습니다.\\n
이명을 호소하는 환자에게 청력검사를 시행한 경우 난청을 동반한 경우가 월등하게 많습니다. 이중 감각신경성 난청이 혼합성 난청, 전음성 난청을 동반한 경우보다 많아 이명이 내이와 청각신경로에 이상이 생겨 발생하는 경우가 많다는 것을 알 수 있습니다.\\n
또한, 대부분의 이명환자에서 이명의 주파수는 청력장애가 가장 심한 주파수나 갑자기 청력이 감소되는 주파수와 일치합니다.\\n\\n
이명의 치료는 원인 질환에 따라 달라집니다. 먼저 이비인후과를 방문하여 진찰과 검사를 받고 원인을 찾습니다. 귓속의 염증, 돌발성 난청, 메니에르병과 같은 원인 질환이 있는 경우에는 해당 질병에 맞는 약물을 처방받습니다. 뇌혈관의 이상이나 전정신경 초종과 같은 종양은 별도의 검사와 치료가 필요합니다.\\n
이명은 대부분 청각 기관의 손상 때문에 발생합니다. 청력 손실의 정도에 따라 다르기는 하지만, 본인은 청력 저하를 모르고 지나치는 경우가 많습니다. 따라서 청력이 저하되었더라도 보통은 청력이 더 손상되는 것이 아니며, 더욱이 생명에 지장이 있는 것도 아닙니다. 그러므로 이비인후과 의사와 상담하여 심리적인 불안감을 덜어내는 것이 중요합니다.\\n
이명 치료에 가장 큰 효과가 있다고 인정받는 치료 방법은 이명 재훈련 치료 입니다. 이 기법은 환자의 이명 정도와 청력 상태에 맞추어 일정 기간 꾸준한 상담하면서, 필요시 소리발생기나 보청기와 같은 보조적인 도구를 사용하여 이명을 습관화하고 점차 인식하지 못하도록 하는 방법입니다. 또한 환자의 증상에 따라 적절한 약제를 선택하여 장기간 또는 단기간 약물 치료를 병행하기도 합니다.\\n\\n
이명은 불편한 것일 뿐 이라는 사실을 받아들이도록 노력하고, 이명을 무시하도록 노력합니다. 청각 기관에 스트레스를 줄 수 있는 소음은 가능한 피합니다. 적절한 운동과 안정을 취하고, 과로를 피합니다. 신경 자극 약물은 피하고, 과도한 커피(카페인) 섭취나 흡연(니코틴)을 삼갑니다. 이와 아울러 너무 짜지 않게 식사를 하는 것이 좋습니다.\\n
이명은 보통 조용한 장소나 상황에서 크게 느껴집니다. 그러므로 적막을 피하고, 주변에 적당한 정도의 환경음을 유지하는 것이 좋습니다. 잠자리에 들면 최대한 빨리 잠이 드는 것이 좋습니다. 집 안에 있는 시계나 라디오의 소음을 줄여 놓으면 수면에 도움이 되기도 합니다.\\n',
'이비인후과','2020-10-17 (15:00)','44');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','부비동염',
'얼굴의 뼛속에는 몇 개의 빈 공간이 있습니다. 이러한 빈 공간을 코 옆에 있는 동굴들 이라는 의미에서 부비동이라 합니다. 이 공간은 머리 뼛속에 있는 뇌를 외부의 충격으로부터 보호해 주는 역할을 합니다.\\n
부비동염은 이러한 부비동이라는 빈 공간에 세균, 바이러스가 침투하여 염증이 발생한 질환을 의미합니다. 부비동염은 흔히 -축농증-이라고 불립니다. 부비동염은 증상과 기간에 따라 급성 부비동염 과 만성 부비동염 으로 구분됩니다\\n\\n
부비동(코 주위의 얼굴 뼛속에 있는 빈 공간)은 숨 쉬는 공기의 온도와 습도를 조절하고, 외부의 충격으로부터 뇌를 보호합니다. 부비동은 작은 구멍을 통해 콧속과 연결됩니다. 이를 통해 콧속이 환기되고 부비동 내의 분비물이 자연스럽게 콧속으로 배출됩니다. 부비동염은 이 부비동에 염증이 발생하여 콧물이 배출되지 못하고 고여 있는 상태를 말합니다.\\n\\n
급성기에는 권태감, 두통, 미열과 함께 코 막힘, 콧물과 안면 통증 등의 증상이 나타납니다. 만성기에는 코막힘, 지속적인 누런 콧물, 코 뒤로 넘어가는 콧물 등의 증상이 나타납니다. 질환이 더 진행되면, 후각 감퇴, 두통, 집중력 감퇴 등의 증상이 발생합니다.\\n
어린이에게 발생하는 부비동염의 증상은 다음과 같습니다. 
① 10~14일 이상 지속되는 감기(때로는 열이 동반됨)
② 끈적끈적한 황록색의 비강 분비물
③ 코가 목뒤로 넘어감, 인후통, 기침, 구역, 구토
④ 두통(6세 이하에서는 드문 증상임)
⑤ 보채거나 축 늘어짐
⑥ 눈 주변에 나타나는 부종\\n\\n
만성 부비동염의 치료 방법은 내과적인 치료와 외과적인 치료(수술)로 구분됩니다.\\n
① 내과적 치료
약물 치료에는 주로 경구용 항생제를 사용합니다. 부가적으로 비강 점막의 부종을 감소시키는 혈관수축제를 사용합니다. 혈관수축제는 만성 부비동염으로 인해 좁아진 부비동 자연공을 넓혀서 부비동의 환기와 배액을 용이하게 해 줍니다. 스테로이드제제는 부비동 자연공의 염증 반응을 억제하여 부종을 감소시킴으로써 그 입구를 넓힙니다. 보조 치료 방법으로 생리 식염수를 이용한 비강 세척법이 있습니다. 이는 분비물에 의한 가피 형성을 억제해 줍니다.\\n
② 외과적 치료(수술)
내과적 치료에 반응하지 않는 만성 부비동염의 경우 수술 치료가 필요합니다. 수술 치료의 원칙은 다음과 같습니다. 첫째, 자연공을 통한 부비동의 배액과 환기 유지입니다. 둘째, 발병의 선행 요인인 비강 내 구조적 이상을 제거하거나 교정하는 것입니다. 셋째, 부비동 점막의 병변이 비가역적이라면, 부비동 점막을 제거하는 것입니다. 일반적으로 부비동 내시경 수술을 시행합니다. 일부 환자에게는 풍선카테터 부비동 수술을 시행합니다. 수술 전에 부비동의 염증을 치료함으로써 분비물의 배액을 막는 자연공의 점막 부종을 줄이고, 부비동에 저류된 분비물의 배액을 촉진합니다. 섬모의 기능을 촉진하고 치료 중이나 치료 후에 자연공의 소통을 유지시킬 수 있는 내과적인 치료를 선행해야 합니다.\\n',
'이비인후과','2020-10-17 (15:00)','51');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','알레르기 비염',
'알레르기 비염은 어떤 물질(원인 항원)에 대하여 코의 속살이 과민 반응을 일으켜 발작적이고 반복적인 재채기, 맑은 콧물, 코막힘, 코 가려움증 등의 증상이 나타나는 질환입니다. 최근 환경 오염, 공해의 증가 등에 따라 세계적으로 알레르기 비염이 증가하는 추세입니다. 전 인구의 5~20% 정도가 이 병을 앓고 있을 정도로 흔한 병입니다.\\n\\n
- 원인\\n
1. 실내에 존재하는 흡입성 알레르겐
우리가 숨 쉴 때, 공기를 통해 흡입되어 알레르기 비염, 기관지 천식 같은 호흡기 알레르기 질환을 일으키는 물질을 흡입성 알레르겐이라 합니다. 알레르겐은 실내에 존재하는 것도 있고 실외에 존재하는 것도 있으며, 일 년 내내 공기 중에 존재하는 것도 있고 특정 계절에만 공기 중에 존재하는 것도 있습니다.\\n
이 중에서 일 년 내내 알레르기 증상을 일으키는 것으로는 집먼지진드기, 실내에서 기르는 동물의 비듬, 바퀴벌레 분비물 등이 있습니다.\\n
1) 집먼지진드기
집먼지진드기는 우리나라뿐만 아니라 전 세계적으로 알레르기 질환을 일으키는 가장 중요한 원인이 되는 알레르겐입니다. 집먼지진드기는 거미류에 속하는 작은 벌레로, 주로 습기가 많고 따뜻한 곳에 서식합니다. 우리나라 아파트 실내는 겨울에도 집먼지진드기가 서식하기에 적합한 환경을 제공합니다. 집먼지진드기는 사람 몸에서 떨어져 나온 비듬을 먹고 살기 때문에, 주로 침구, 거실의 천 소파, 카펫 같은 곳에 집중적으로 분포합니다.\\n
집먼지진드기에 과민한 환자는 여기에 최소한으로 노출되어야 합니다. 집안의 습도를 50% 이하로 줄이는 것이 중요합니다. 카펫이나 천 소파는 가능한 한 사용하지 않는 것이 좋습니다. 침구는 집먼지진드기 알레르겐이 통과하지 못하도록 특수 제작된 천으로 만든 커버를 사용하여 침대 매트리스나 침구, 베개를 덮는 것이 좋습니다. 이불은 일주일에 한 번씩 60℃ 이상의 뜨거운 물로 세탁하고 잘 말린 후 사용하는 것이 좋습니다. 실내 청소는 일반 진공청소기를 이용하면 오히려 원인 알레르겐을 공기 중으로 비산시키므로 좋지 않고, 특수한 필터인 HEPA 필터가 장착된 청소기를 쓰거나 물걸레로 닦는 것이 좋습니다. 공기청정기는 일반적인 자극 물질을 제거해 주는 효과가 있으나 집먼지진드기를 제거해 주지는 않습니다. 그 외에도 집먼지진드기를 없애는 살충제 같은 것들이 시중에 나와 있으나 살충제만으로 집먼지진드기를 효과적으로 제거할 수는 없습니다.\\n
2) 반려동물의 비듬
개와 고양이 같은 동물의 몸에서 떨어져 나온 비듬은 아주 작은 입자로 공기 중에 떠다니다가 코를 통해 폐로 유입되어 알레르기 증상을 유발합니다. 우리나라에서도 집 안에서 개나 고양이를 키우는 경우가 늘어나고 있으며, 이런 동물에 의한 알레르기 질환이 급증하고 있습니다. 가장 좋은 치료는 역시 동물과의 접촉을 피하는 것입니다.\\n
3) 바퀴벌레 분비물
바퀴벌레는 심한 기관지 천식을 일으킬 수 있는 알레르겐으로 알려져 있습니다. 바퀴벌레는 벽, 바닥의 갈라진 틈을 이용해서 집 안으로 들어오고, 음식물 찌꺼기를 먹고 삽니다. 습하고 청결하지 않은 곳에 주로 서식하며 깨끗합니다. 바퀴벌레는 건조한 곳을 좋아하지 않으므로, 바퀴벌레 퇴치를 위해서는 무엇보다 집안, 특히 부엌의 청결이 중요합니다. 또한 집 안 전체에 구충제를 뿌리는 것이 도움이 됩니다.\\n
2. 실외에 존재하는 흡입성 알레르겐
계절성 알레르기 비염을 일으키는 가장 중요한 원인 물질은 계절성 알레르겐, 즉 꽃가루입니다. 이는 특히 봄과 가을에 심한 알레르기 비염 증상을 유발합니다.\\n
1) 꽃가루
꽃가루(화분)는 꽃을 피우는 식물의 정세포와 같은 것입니다. 이 아주 작은 꽃가루는 식물의 번식에 중요합니다. 꽃가루 입자의 평균 크기는 사람 털의 평균 폭보다 더 좁아서 눈에 보이지 않습니다. 흔히 관상용으로 쓰는 화려한 식물은 꽃가루가 곤충에 의해 옮겨지는 충매화로서, 보통 알레르기를 유발하지 않습니다. 알레르기를 일으키는 식물은 나무, 잔디, 잡초 등 꽃가루가 바람에 의해 옮겨지는 풍매화입니다. 이 작고 가벼우며 건조된 꽃가루들이 알레르기를 잘 유발합니다.\\n
우리나라에서는 초봄에 주로 오리나무, 참나무, 자작나무, 느릅나무, 측백나무, 소나무, 개암나무, 버드나무 등의 나무 꽃가루가 날립니다. 이것이 알레르기를 일으키는 주요한 알레르겐이 됩니다. 늦은 봄이나 초여름에는 각종 잔디, 목초의 꽃가루들이 일부 날아다닙니다. 그러나 공기 중의 농도가 그리 높지 않고, 우리나라에서는 이 꽃가루가 알레르기를 일으키는 주요 원인이 되는 경우가 많지 않습니다. 가을에 알레르기 비염을 유발하는 가장 흔한 꽃가루는 돼지풀, 쑥과 같은 잡초의 꽃가루이며, 우리나라에서 가을철의 심한 알레르기기 비염을 일으키는 중요한 원인이 됩니다.\\n
2) 날씨
날씨도 꽃가루 알레르기의 증상에 영향을 미칠 수 있습니다. 보통 비 오는 날이나 바람 없는 날에는 꽃가루가 공기 중에 잘 날아다니지 못하므로 증상이 경감됩니다. 건조하고 바람이 많은 날씨는 꽃가루 알레르기 증상을 가장 많이 일으키는 조건이 됩니다.\\n
꽃가루 알레르기가 있는 환자들은 꽃가루에 최소한으로 노출되어야 합니다. 그러나 공기 중에 분포하는 꽃가루를 완전히 회피하기는 불가능합니다. 특히 알레르기를 일으키는 풍매화의 꽃가루는 바람을 타고 수십 수백 Km씩 날아다니므로, 거의 우리나라 전역에 분포합니다. 종종 우리나라에서 심한 꽃가루 알레르기가 있는 환자가 외국을 여행할 때 증상이 많이 경감되는 경우가 있습니다. 이는 외국에 존재하는 꽃가루 종류가 다르고, 환자가 그 지역의 꽃가루에 대해서는 알레르기 반응을 일으키지 않기 때문입니다. 그러나 다른 비슷한 식물들도 같은 증상을 유발할 수 있으며, 많은 경우 1~2년 내에 새로운 지역에 존재하는 많은 새로운 알레르겐에 대해 알레르기를 가지게 됩니다. 따라서 알레르기를 피하기 위해 다른 지역으로 이사하는 것은 그리 효과적이지 못하며, 추천하지 않습니다.\\n
꽃가루가 많이 날아다니는 계절에는 외출을 삼가고 실내에 머무르는 것이 다소 도움이 될 수 있습니다. 하루 중에서도 주로 오전에 꽃가루가 많이 날리는 것으로 알려져 있으므로, 가능하면 오전 활동을 줄이는 것이 도움이 됩니다.\\n\\n
알레르기 비염의 증상으로는 재채기, 코막힘, 콧물, 코나 입천장, 목, 눈, 귀의 가려움, 코막힘, 후각 감소 등이 있습니다. 보통은 20세 전 청소년기에 증상이 나타나는 경우가 많습니다. 그러나 유아나 성인이 된 이후에 증상이 처음 나타나는 경우도 있습니다.\\n\\n
알레르기 비염의 치료에서 가장 중요한 것은 알레르겐을 피하는 것입니다. 그 외에는 약물 요법, 면역 요법, 수술 요법 등을 사용할 수 있습니다.\\n
1. 약물 요법
1) 항히스타민제 알약과 항히스타민 코 분무기
히스타민은 알레르기 반응의 가장 중요한 매개체 중 하나입니다. 알레르기 반응이 일어나는 동안 히스타민이 분비되어 코 가려움, 재채기, 수양성 콧물을 포함하는 여러 알레르기 비염의 증상이 나타납니다. 따라서 이런 증상에는 항히스타민 제제가 유용합니다. 그러나 항히스타민 제제는 코막힘에 효과가 없습니다.\\n
2) 류코트리엔 수용체 길항제
알레르기 증상과 염증반의 또 다른 중요한 매개체인 류코트리엔의 작용을 억제하는 약입니다. 알레르기 비염의 증상을 줄이는데 도움이 됩니다.\\n
3) 스테로이드 코 분무기
코에 염증 반응을 유발할 수 있는 여러 종류의 매개체들의 작용을 억제합니다. 따라서 코 가려움, 재채기, 콧물, 코막힘과 같은 알레르기 비염의 모든 증상을 개선할 수 있습니다. 이 약물은 알레르기 비염의 치료에 사용할 수 있는 가장 강력한 약제입니다.\\n
4) 비점막 수축제
알레르기 비염 환자의 코막힘 증상이 다른 약물에 의해 호전되지 않을 때 도움이 됩니다. 코 분무기 형태의 비점막 수축제는 부작용이 있기 때문에 오랜 기간 사용하면 안 됩니다. 항콜린성 약물이 코 분무기 형태로 콧물이 흐르는 것을 줄이기 위해 사용하기도 합니다.\\n
2. 알레르기 면역 요법
알레르기 비염의 증상이 지속되면 알레르기 면역 요법을 고려해 볼 수 있습니다. 면역 요법은 원인이 되는 알레르기 항원을 최소량부터 시작하여 점차 농도를 올려 가며 피하로 주사하는 치료법입니다. 보통 약 3~5년가량 주기적으로 주사를 맞아야 합니다. 면역계는 이 과정을 통해 알레르기 비염을 유발하는 알레르기 항원에 대한 관용을 획득합니다. 면역 요법은 알레르기 전문가가 적절하게 선별된 환자에게 시행해야 합니다. 이 경우, 증상 개선뿐 아니라 알레르기 비염과 동반되어 발생할 수 있는 천식을 예방하는 효과도 기대할 수 있습니다.\\n
3. 수술 요법
일정 기간 약물 치료를 시도해도 반응이 없거나 좋지 않은 경우 수술적인 치료를 고려합니다. 수술 요법은 약물에 반응하지 않는 만성적인 하비갑개의 비후에 대하여 비갑개의 부피 감소를 위해 여러 방법을 사용합니다. 상피세포를 파괴하는 데 일부의 화학제, 부식제, 전기 소작술을 사용하였지만, 이는 일시적으로 효과가 있을지 몰라도 상처 반흔과 점액 섬모수송의 장애를 초래므로 부적절한 방법으로 생각됩니다.\\n',
'이비인후과','2020-10-17 (15:00)','55');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','치핵',
'치핵은 일반적으로 치질이라고 불리는 질환입니다. 치핵은 항문 및 직장에 존재하는 치핵 조직이 항문 밖으로 빠져나오는 내치핵과 항문 밖의 치핵 조직이 부풀어 올라 덩어리처럼 만져지는 외치핵으로 구분됩니다.\\n\\n
치핵의 원인은 명확하게 밝혀지지 않았습니다. 유전적 소인, 잘못된 배변 습관 등이 영향을 준다고 보고되고 있습니다. 일반적으로 배변 시에 과도하게 힘을 주거나 장기간 변기에 앉아 있는 습관, 변비, 음주 등이 치핵을 악화시키는 요인입니다. 여성은 임신 및 출산 시에 골반 혈액 순환이 원활하지 못하거나, 항문 주위 혈관의 울혈이 발생하기 쉽습니다. 이로 인해 치핵이 생기거나 악화하는 경우가 많습니다. 일부는 출산 이후에도 증상이 지속되기도 합니다.\\n\\n
치핵의 가장 흔한 증상은 출혈과 탈항입니다. 대부분의 경우 배변 시 선혈이 묻어 나옵니다. 치핵이 진행될수록 항문의 치핵 조직이 밖으로 빠져나옵니다. 이로 인해 치핵 조직이 만져지기도 하며, 아주 심한 경우에는 평소에도 항문 밖으로 나와 있습니다. 항문이 빠지는 듯한 불편감 및 통증이 나타나기도 합니다.\\n\\n
치핵은 적합한 치료 방식으로 치료하면 100% 완치할 수 있습니다. 증상과 정도에 따라 치료 방법이 달라집니다. 경도의 치핵은 보존 치료나 비수술적 요법 등으로 증상을 경감시킬 수 있습니다. 충분한 휴식을 취하고, 변비나 설사가 생기지 않도록 섬유질을 풍부히 섭취합니다. 온수 좌욕으로 혈액의 순환을 촉진시킵니다.\\n
보존적 치료 또는 증상 치료에도 차도가 없고 치핵의 심한 탈항으로 인해 손으로 밀어 넣어야 할 정도로 치핵이 진행한 경우, 일상생활에 지장을 주는 경우에는 외과적 수술을 시행해야 합니다. 경도의 치핵은 경화제 주입 요법, 고무밴드 결찰술, 레이저 치료술 등으로 치료할 수 있습니다. 중증도의 치핵은 대부분 외과적 치핵 절제술이 필요합니다.\\n',
'외과','2020-10-17 (15:00)','1');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','기흉',
'공기가슴증, 즉 기흉은 폐에 생긴 구멍으로 공기가 새면서 늑막강 안에 공기가 차는 질환을 의미합니다. 새는 공기의 양이 증가할수록 폐가 정상 기능을 하지 못합니다. 흉강 안으로 유입되는 공기가 배출되지 않는 경우 양쪽 폐와 심장 사이의 공간과 심장이 한쪽으로 쏠려 응급상황이 발생할 수 있습니다.\\n\\n
기흉은 자발성 기흉과 외상성 기흉으로 구분되며, 원인도 이에 따라 살펴보아야 합니다.\\n
자발성 기흉은 일차성 기흉과 이차성 기흉으로 구분됩니다. 일차성 기흉은 건강한 사람에게 발생하며, 폐의 가장 윗부분 흉막에 있는 작은 공기주머니에 의해 발생합니다. 일차성 기흉의 원인은 분명하지 않지만, 환자의 대부분이 키가 크고 말랐으며 흡연자인 것으로 보아 흡연과 관련이 있다고 여겨집니다. 이차성 기흉은 원래 폐 질환을 앓고 있던 사람에게 발생합니다. 그러한 폐질환의 종류로는 결핵, 악성 종양, 폐섬유증, 만성 폐쇄성 폐 질환, 폐기종 등이 있습니다.\\n
외상성 기흉은 교통사고나 뾰족한 물건에 찔린 상처 등으로 인해 가슴이 다쳐 폐 실질이 손상되어 발생합니다. 폐 조직검사를 시행한 이후 발생하기도 하며, 중환자실에서 인공호흡기 등과 같은 기계에 의해 긴장성 기흉이 발생하기도 합니다. 여성의 경우 월경과 관련하여 발생하기도 합니다.\\n\\n
기흉의 흔한 증상으로는 흉통과 호흡곤란이 있습니다. 흉통은 대체로 갑자기 시작되며 24시간 정도가 지나면 사라집니다. 사람마다 흉통을 호소하는 방식이 다릅니다. 대개 ‘등 쪽으로 담이 결린다.’라고 하거나 ‘숨 쉴 때마다 가슴이 찌르는 듯이 아프다.’라고 호소합니다.\\n
호흡곤란은 환자의 상태에 따라 양상이 달라집니다. 기존에 앓고 있는 폐 질환이 없는 젊은 환자는 대체로 호흡곤란이 그다지 심하지 않습니다. 기흉이 심한 환자는 호흡이 불편할 정도의 호흡곤란을 느끼기도 하며, 청색증이 동반될 수 있습니다. 소수의 환자는 갑자기 눕거나 누웠다가 앉을 때 흉부에서 ‘덜컹’하면서 무언가가 움직이는 느낌을 호소하기도 합니다.
기흉을 가장 손쉽게 진단하는 방법은 흉부 X-선 사진입니다. 위에 언급한 증상을 보이는 환자를 흉부 X-선 사진으로 촬영하면, 대부분 쉽게 기흉을 진단할 수 있습니다. 환자에 대한 진찰 소견으로 진단하는 방법도 있습니다. 병변 부위의 타진상, 공명과도(hyperresonance) 소견, 청진상 호흡음의 감소 소견 등으로 기흉을 의심할 수 있습니다. 흉부 X-선 촬영을 진행하고 전문가가 판독하여 기흉을 확진합니다.\\n
최근에는 흉부 전산화 폐단층촬영(HRCT)등을 시행하여 진단, 치료 방침의 설정에 이용합니다. 그 목적은 선택적인 기흉 환자에게 수술 치료가 필요한지 확인하는 것입니다. 하지만 이 검사는 모든 환자에게 필요하지 않으므로, 전문가와 상의해야 합니다.\\n\\n
기흉 치료의 원칙은 흉강 내에 있는 폐에서 누출된 공기를 제거하여 폐의 재팽창을 유도하고, 흉강을 효과적으로 폐쇄하여 재발을 방지하는 것입니다. 기흉의 치료 방법은 환자의 상태 및 재발 여부 등을 바탕으로 결정합니다.
기흉의 치료 기간은 예측하기 어렵습니다. 환자 대부분은 일주일 정도 치료해야 합니다. 일부 환자는 자발성 기흉이더라도 긴 치료 기간이 걸릴 수 있습니다. 일반적으로 이차성 기흉의 치료 기간이 자발성 기흉보다 상당히 길며, 치료 방법을 선택하는 데도 어려움이 많아 반드시 전문가에게 진료를 받아야 합니다.\\n',
'외과','2020-10-17 (15:00)','82');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','다한증',
'다한증은 땀이 병적으로 많이 나는 질환을 의미하며, 국소 다한증은 손발바닥, 얼굴, 겨드랑이와 같은 특정 부위에 다한증이 발생하는 질환을 의미합니다. 대부분의 사람들은 정서적 자극에 의해 땀이 납니다. 이러한 증상은 일반적으로 별다른 문제가 되지 않지만, 사회 생활에 지장을 줄 정도로 증상이 심하다면 적극적으로 치료해야 합니다. 남녀 관계없이 소아기, 사춘기 전후에 증상이 발생하며, 약 25세 이후에 증상이 저절로 호전되는 경향이 있습니다.\\n\\n
다한증의 원인으로는 땀샘의 변화, 땀 분비 물질의 활성화, 교감 신경의 항진, 정서적 영향 등이 있습니다. 손발바닥의 다한증은 감정적, 정신적 활동으로 인해 발생합니다. 이러한 부위에서 나는 땀은 뇌 피질에서 비롯되므로 정서적인 영향과 관련이 있습니다.\\n\\n
땀 분비 증가 외에 다른 증상이 동반되지 않는 경우가 많습니다. 그러나 습해진 피부로 인해 기구 등에 포함된 화학 물질이 땀에 용해되며 접촉성 피부염이 동반될 수 있습니다. 세균 감염이 동반되면 심한 악취가 날 수 있습니다.\\n\\n
다한증을 치료하기 위해서는 우선 전신 질환의 유무를 확인해야 합니다. 전신 질환으로 인한 다한증일 경우 전신 질환을 치료하면 다한증이 함께 호전되기 때문입니다. 국한성 다한증의 경우 국소 치료를 시행하는데, 1%의 포르말린, 10%의 글루타알데하이드, 20%의 알루미늄 클로라이드 용액를 다한증 부위에 도포하거나, 이온영동 요법 등을 사용할 수 있습니다. 또한 보톡스 주사를 이용하여 주사 부위의 땀 분비를 억제할 수 있습니다.\\n
다한증이 정서적 요인과 현저하게 관련되는 경우 진정제, 신경안정제가 도움이 될 수 있습니다.\\n
다한증을 치료하기 위해 수술적 치료를 진행하기도 합니다. 특정 부위의 피부를 제거하거나 병변 부위의 교감 신경을 절제하여 과도한 땀 분비를 억제합니다. 하지만 이러한 수술적 치료는 발한이 완전히 중지되거나 다른 부위에 발한이 증가하는 부작용을 초래할 위험성이 있습니다. 따라서 수술적 치료는 손과 겨드랑이 다한증이 심한 환자에 국한하여 사용합니다.\\n',
'외과','2020-10-17 (15:00)','47');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','담석증',
'우리 몸의 간에서는 매일 큰 맥주병 2병 정도(750mL)의 담즙을 생산합니다. 이 담즙은 담관과 담낭을 통해 십이지장으로 분비되며, 지방 음식 소화, 콜레스테롤 대사, 독성 물질 배출 등의 생리적 기능을 합니다.\\n
담즙의 성분은 콜레스테롤, 지방산, 담즙산염 3가지로 이루어져 있으며, 이들의 구성 비율은 생체 내에서 정확하게 조절됩니다. 이러한 성분 비율에 변화가 생기면 찌꺼기가 생기고, 이 찌꺼기가 뭉쳐져서 돌처럼 단단하게 응고되는데 이를 담석이라고 합니다.\\n\\n
- 원인\\n
① 콜레스테롤 담석
콜레스테롤 담석은 담즙에 콜레스테롤이 과다하게 포함되어 점차 결정화되고, 아울러 담낭이 잘 수축하지 않게 됨으로써 조그만 결절이 담관을 통해 장으로 빠져나가지 못해서 생깁니다. 콜레스테롤 담석은 여성, 다출산, 비만한 사람에게 좀 더 잘 생기는 것으로 알려져 있습니다. 여성에게 많이 생기는 이유는 여성호르몬이 담즙 내 콜레스테롤 수치를 높이는 기능을 하기 때문이며, 다출산 여성에게 많이 생기는 이유는 임신 중 담낭의 기능이 떨어지기 때문입니다. 비만인 사람은 혈중 콜레스테롤 수치가 높기 때문에 담석의 위험이 높습니다. 장기간 금식, 다이어트, 비경구 영양 요법을 하는 경우나, 위 절제 수술 환자, 척수 손상 환자의 경우 담낭 기능이 떨어져 담석이 잘 생길 수 있습니다. 이 밖에 당뇨나 이상지질혈증 같은 대사성 질환, 여성호르몬을 포함한 경구 피임제 등의 약제, 유전 등도 원인이 됩니다.\\n
② 색소성 담석
- 갈색 담석
간디스토마(간흡충) 등의 기생충이나 담관의 세균 감염이 있는 사람에게 많이 생깁니다. 영양이나 위생 상태가 좋지 않은 사람에게 잘 발생할 수 있습니다. 담낭과 담관 어느 부위에서나 생길 수 있습니다.\\n
- 흑색 담석
염증이 없는 무균의 담즙에서 발생합니다. 간경변증이나 용혈성 황달 환자, 크론씨병 등으로 회장을 절제한 환자에게 많이 생기는 것으로 알려져 있습니다.\\n
우리나라의 경우, 과거에는 색소성 담석이 많았지만 최근에 식이 생활이 서구화되고 비만 환자가 증가하면서 콜레스테롤 담석이 증가하고 있습니다.\\n\\n
담석의 60~80%는 증상이 없습니다. 증상이 있는 경우 가장 특징적인 것은 담관 산통입니다. 담관 산통의 특징은 명치와 오른쪽 위쪽 배에 발생하는 지속적이고 심한 통증 또는 중압감이며, 우측 견갑 하부(날개뼈 아래)나 어깨 쪽으로 통증이 퍼져 나갈 수 있습니다.\\n
대개 통증은 갑자기 시작되고 1~6시간 동안 지속되며, 서서히 또는 갑자기 소실됩니다. 오심과 구토가 흔히 동반됩니다. 발열이나 오한 등이 동반되는 경우에는 담석증의 합병증으로 담낭염이나 담관염 등의 발생 가능성을 염두에 두어야 합니다.\\n\\n
담석 진단을 위한 일차적 검사는 복부 초음파 검사입니다. 초음파 검사는 담낭 담석에 대한 민감도 및 특이도가 가장 높은 검사로, 담낭염과 같은 담낭 담석의 합병증 진단에도 도움이 됩니다. 내시경적 초음파 검사는 복부 초음파에서 확인되지 않는 미세한 담석이 의심되거나 동반된 담관 담석을 진단할 때 도움이 됩니다. 담석증 외에 다른 질환이 의심될 때에는 복부 전산화 단층촬영(CT)을 시행합니다.\\n\\n
증상이 없는 담석은 진행성 질환이 동반된 특별한 경우를 제외하고 증상이 나타날 때 치료를 하는 것이 원칙입니다. 증상이 있는 담석은 통증이 재발할 확률이 높고 합병증이 발생할 가능성이 높으므로 치료해야 합니다.\\n
① 수술 치료
수술 치료에는 개복 담낭 절제술과 복강경 담낭 절제술이 있습니다. 복강경 담낭 절제술은 수술 후 통증이 적고, 입원 기간을 단축할 수 있으며, 수술 상처가 경미하고 회복이 빠릅니다. 그러나 과거에 상복부에 개복 수술을 한 적이 있으면 장기의 유착이 심해 개복 수술을 해야 하는 경우가 많습니다. 그리고 복강경 담낭 절제술을 시행하다가 합병증이 생긴 경우에 개복 수술로 전환하는 경우도 있습니다.\\n
② 내과적 치료
내과적인 치료 방법에는 경구 용해 요법과 약물 치료 방법이 있습니다. 경구 용해 요법은 UDCA나 CDCA와 같은 경구용 담즙산을 투여하는 치료입니다. 주로 콜레스테롤 담석으로 크기가 10mm 이하인 경우에 효과가 있습니다. 약물로 치료하는 경우, 담석 크기가 10mm 미만이면 이것이 완전하게 녹을 확률은 30% 정도이며, 평균적으로 1달에 1mm 정도 크기가 작아집니다. 그러나 우리나라의 경우 색소성 담석의 비율이 높아 치료 성공률은 이보다 낮습니다. 담석이 녹은 후에도 재발할 위험성이 있습니다.\\n
경피적 담낭 담석 제거술은 초음파를 보면서 피부를 통해 담낭에 구멍을 낸 후 담관 내시경을 이용하여 담낭 담석을 제거하는 방법입니다. 성공률이 높지 않고 합병증의 위험성이 있어 제한된 경우에만 이용됩니다.\\n',
'외과','2020-10-17 (15:00)','26');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','파킨슨병',
'파킨슨병은 뇌간의 중앙에 존재하는 뇌흑질의 도파민계 신경이 파괴됨으로써 움직임에 장애가 나타나는 질환을 말합니다. 도파민은 뇌의 기저핵에 작용하여 우리가 원하는 대로 몸을 정교하게 움직일 수 있도록 하는 중요한 신경전달계 물질입니다.\\n
파킨슨병의 증상은 뇌흑질 치밀부의 도파민계 신경이 60~80% 정도 소실된 후에 명확하게 나타납니다. 병리 검사를 시행하면 뇌와 말초신경의 여러 부위에 발병성 알파시누클레인 단백질이 침착되어 생긴 루이소체를 확인할 수 있습니다. 파킨슨병은 알츠하이머병 다음으로 흔한 퇴행성 뇌 질환입니다. 60세 이상에서 1%의 유병률을 보입니다. 나이가 들수록 발병률이 증가합니다.\\n\\n
파킨슨병은 전체 환자의 5~10%만 유전에 의해 발생합니다. 그 외 대부분은 특발성입니다. 파킨슨병의 환경적 요인에 대한 연구에서는 1-methyl-4-phenyl-1,2,3,6-tetrahydropyridine(MPTP), 살충제(로테논, 파라콰트), 중금속(망간, 납, 구리), 일산화탄소, 유기 용매, 미량 금속 원소 등의 독소 노출, 두부 손상 등의 요인을 파킨슨병의 발병 원인으로 지적하였습니다.\\n
뇌흑질의 도파민계 신경이 파괴되는 원인은 아직 정확하게 알려지지 않았습니다. 환경 독소, 미토콘드리아 기능 장애, 불필요한 단백질 처리 기능 이상 등이 이를 유발한다는 가설이 있습니다.\\n\\n
파킨슨병에 걸리면 운동 증상과 비운동 증상이 모두 나타날 수 있습니다. 다양한 증상이 나타납니다.\\n
1. 운동 증상
1) 떨림(진전)
몸이 떨리는 증상은 가장 눈에 잘 띄는 증상입니다. 떨림은 주로 편한 자세로 앉아 있거나 누워 있을 때 나타납니다. 손이나 다리를 움직이면 사라집니다. 이 때문에 파킨슨병 환자에게 나타나는 떨림을 안정 시 진전 이라고 합니다.\\n
2) 경직
파킨슨병 초기에는 근육이 뻣뻣해지는 경직 증상이 나타납니다. 근육이나 관절의 문제로 오인되기도 합니다. 파킨슨병이 진행됨에 따라 근육이 조이거나 당기는 느낌, 근육 통증이 느껴지기도 합니다. 부위에 따라, 환자에 따라 허리 통증, 두통, 다리 통증, 다리 저림 증상을 호소하는 경우도 있습니다.\\n
3) 서동
행동이 느려집니다. 단추를 끼우거나 글씨를 쓰는 작업과 같이 미세한 움직임이 점점 둔해집니다. 눈 깜박임, 얼굴 표정, 걸을 때 팔 움직임, 자세 변경 등의 동작 횟수와 크기가 감소합니다. 많은 경우에 환자 본인은 잘 알지 못합니다. 주위 사람에게 지적을 받아야 비로소 알게 되는 경우도 있습니다.\\n
4) 자세 불안정
몸의 자세를 유지하지 못하고 넘어집니다. 파킨슨병의 초기에는 드물지만, 병이 진행되면 많은 환자들에게 나타납니다.\\n
5) 구부정한 자세
목, 허리, 팔꿈치, 무릎 관절이 구부정하게 구부러진 자세가 됩니다.\\n
6) 보행 동결
걷기 시작할 때, 걷는 도중, 걷다가 돌 때 발이 땅에서 떨어지지 않아서 발걸음을 옮기지 못합니다. 많은 환자들이 무척 괴로워합니다. 파킨승병이 많이 진행된 환자에게 관찰됩니다.\\n
2. 비운동 증상
1) 신경 정신 증상
우울, 불안, 무감동, 충동 조절 장애, 환시, 정신증 등의 신경 정신 증상이 나타날 수 있습니다. 50% 정도의 파킨슨병 환자가 우울증을 겪습니다. 이로 인해 약에 대한 순응도나 치료 의욕이 떨어져 삶의 질이 악화될 수 있습니다.\\n
2) 인지 기능 저하
전체 환자의 40% 정도에서 인지 기능 저하가 동반됩니다. 파킨슨병 환자가 겪는 치매 증상은 알츠하이머병에서 나타나는 치매와 양상이 다릅니다. 환시를 겪기도 하고, 인지 기능 증상의 기복이 심할 수 있습니다. 약에 대해 과민 반응을 보이는 경우도 있습니다. 현실적으로 인지 기능을 완치할 수 있는 치료는 없습니다. 그러나 적절한 약물 요법으로 도움을 받을 수 있습니다.\\n
3) 자율신경계 이상
기립성 저혈압, 변비, 소변 장애, 성 기능 장애, 후각 이상, 장운동 이상 등의 자율신경계 이상이 발생할 수 있습니다.\\n
4) 수면 장애
많은 파킨슨병 환자가 불면증을 호소합니다. 이 외에도 기면, 주간 과다 졸림증, 하지 불안 증후군, 렘수면 행동 장애, 주기성 사지 운동 장애 등의 수면 장애가 동반될 수 있습니다. 렘수면 행동 장애는 수면 중에 심한 잠꼬대를 하거나 헛손질과 헛발질을 하는 것입니다. 파킨슨병 운동 증상 발생 이전부터 관찰되기도 합니다.\\n
5) 배뇨 장애 
소변을 자주 보는 빈뇨가 흔하게 나타납니다. 야간에 빈뇨가 나타나면 수면을 방해합니다.\\n
6) 기타
통증, 무감각, 피로, 후각 저하 등의 감각 이상이 동반됩니다.\\n\\n
파킨슨병을 확진할 수 있는 검사는 따로 없습니다. 전문의의 진찰 소견이 가장 중요한 진단법입니다. 뇌 자기공명영상(MRI)이나 뇌 PET 촬영 등이 진단에 도움이 됩니다.\\n
파킨슨 증후군이나 이차성 파킨슨증은 파킨슨병의 사촌으로도 불립니다. 파킨슨병은 이 질병들과 구별해야 합니다. 파킨슨 증후군은 진행성 핵상 마비, 다발성 신경계 위축, 피질기저핵 변성, 루이소체 치매의 증상을 보입니다. 이차성 파킨슨증은 약물 유발성 파킨슨증, 혈관성 파킨슨증, 정상압 뇌수두증, 뇌종양, 독성 물질의 원인에 의해 부차적으로 발생한 것입니다.\\n\\n
파킨슨병의 치료 원칙은 약물 치료 및 운동 치료입니다.\\n
1. 약물 치료
항파킨슨 제제에는 레보도파, 도파민 효현제, 모노아민산화효소억제제, 아만타딘 등의 약제가 있습니다. 레보도파 제제가 가장 효과적입니다. 그러나 장기간 도파민 제제를 사용하면 몸이나 얼굴을 불수의적으로 흔드는 이상 운동증 등의 후기 운동 합병증이 발생할 수 있습니다. 이 경우 뇌심부 자극술이라는 수술적 치료 방법을 고려할 수 있습니다.\\n
2. 운동 치료
파킨슨병은 활동력을 떨어뜨리고 자세 변형을 유발합니다. 고개가 앞으로 쏠리고 어깨와 등이 둥글게 구부러집니다. 이 때문에 몸을 곧게 펴는 뻗기 운동이 도움이 됩니다. 근력 운동을 강화하면 몸이 느려지고 뻣뻣해지더라도 이동성 및 기능을 유지하는 데 많은 도움을 줍니다. 파킨슨병 환자는 진행성 장애와 상관없이 신체 활동 기능을 유지하기 위해 운동이 매우 중요합니다. 운동을 지속적으로 해야 합니다.\\n\\n
파킨슨병 환자는 다음과 같은 약물을 꼭 피해야 합니다.\\n
1. 소화제
1) 맥소롱(Metoclopramide) : 맥페란(Macperan), 레글란(Reglan)
2) 레보프라이드 : 레보설피아이드, 설피라이드, 레보프랜 등\\n
레보프라이드는 위장관 운동을 항진시키는 약물입니다. 우리나라에서 아주 흔하게 처방되는 약물이므로, 각별히 주의해야 합니다. 특히 소화불량이나 관절염에는 신경과가 아닌 다른 과에서 이 약물을 처방하는 경우가 매우 많습니다. 따라서 파킨슨병 환자가 파킨슨병 이외의 증상(소화기 계통, 관절염, 요통 등)으로 병원을 찾을 때는 레보설피라이드를 함유한 약물은 절대 금기라고 미리 말해야 합니다.\\n
2. 안정제 : 할로페리돌(Haloperidol), 퍼페나진(Perphenazine)\\n\\n',
'신경외과','2020-10-17 (15:00)','33');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','뇌종양',
'뇌종양이란 뇌 조직이나 뇌를 싸고 있는 막에서 발생한 종양과, 머리뼈나 주변 구조물로부터 멀리 떨어진 부위에서 뇌 조직이나 뇌막으로 전이된 종양을 의미합니다.\\n
뇌종양은 양성과 악성으로 나눌 수 있습니다. 양성 뇌종양은 성장 속도가 느리며 주위 조직과의 경계가 뚜렷합니다. 양성 뇌종양은 수술 이외의 다른 치료 없이 완치되는 경우가 흔하며, 대부분 천천히 자라기 때문에 수술하지 않고 경과를 관찰하기도 합니다. 그러나 양성 뇌종양도 완치될 수 없는 경우가 있습니다. 뇌간이나 척수와 같은 특정 부위에 생긴 종양은 수술로 제거할 수 없습니다. 또 크기가 작더라도 생명에 중요한 기능을 담당하는 뇌와 척수에 심각한 손상을 입힐 수 있습니다. 이 경우 조직학적으로는 양성이지만, 임상적으로는 악성과 같습니다.\\n
악성 뇌종양은 뇌암이라고도 하며, 성장 속도가 빠르며 주위 조직으로의 침투 능력이 강합니다. 이에 따라 정상 뇌 조직으로 침윤되고 정상 뇌 조직과의 경계가 불분명하여 치료가 어려운 편입니다. 악성 뇌종양은 주변의 정상 뇌 조직을 빠른 속도로 파괴합니다\\n\\n
뇌종양의 발생 원인은 아직 완전하게 밝혀지지 않았습니다. 유전학적인 요소가 관여한다는 연구 결과가 있지만, 가족력 등으로 인한 뇌종양은 매우 드뭅니다.\\n\\n
뇌종양의 가장 흔한 증상은 두통입니다. 간질 발작이 나타나거나 점진적인 운동 및 감각 능력이 소실됩니다. 오심, 구토가 나타날 수 있습니다. 시력이 손실되거나 복시가 나타날 수 있습니다. 또한, 뇌종양의 크기와 위치에 따라 다양한 증상이 나타날 수 있습니다.\\n
뇌종양이 의심되는 증상은 다음과 같습니다.\\n
(1) 자고 일어난 아침에 머리가 자주 아플 때
(2) 오심과 구토를 동반한 두통
(3) 소아의 오심, 구토
(4) 불안감(특히 두통과 관련됨)
(5) 한쪽 또는 양쪽 눈의 시력 손실
(6) 복시(특히 두통과 관련됨)
(7) 시력 저하, 시력 장애 
(8) 말하기 능력의 점진적 손실
(9) 언어 장애, 운동 장애, 보행 장애, 감각 이상
(10) 현기증을 동반하거나 그렇지 않은 청력 손실
(11) 귀울림, 청력 저하
(12) 성인에게 처음으로 나타나는 간질 발작
(13) 팔다리의 점진적 운동 및 감각 능력 소실
(14) 경기를 일으킴
(15) 사고 능력이나 학습 능력의 저하
(16) 성격 변화
(17) 무월경, 성기능 저하\\n
위와 같은 증상이 나타나면 조기에 전문의의 검진을 받는 것이 중요합니다.\\n\\n
- 진단\\n
① 신경학적 검사
신경학적 검사를 통해 뇌종양이 의심되면 추가 검사를 시행합니다.\\n
② 자기공명영상(MRI, Magnetic Resonance Imaging)
자장을 발생하는 커다란 자석통 속에 검사 대상자를 들어가게 하고, 라디오파와 컴퓨터를 이용하여 뇌와 척수 신경의 섬세한 영상을 얻는 시술입니다. 환자의 정맥을 통해 조영제를 투여하기도 합니다. 이 조영제는 종양 주위에 축적되어 더 밝은 영상을 볼 수 있게 하여 진단의 정확성을 높입니다.\\n
③ 전산화 단층촬영(CT, Computerized Tomography )
단순 X-ray 촬영에 비해 구조물이 적게 겹쳐지도록 하는 검사 방법입니다. 따라서 구조물과 병변을 좀 더 명확히 볼 수 있습니다. 몸속의 구조물들을 여러 장의 섬세한 사진으로, 여러 각도로 보여 줍니다. 좀 더 명확한 영상을 얻기 위해 정맥 내 주사로 조영제를 투여하기도 합니다.\\n
④ 양성자 방출 단층촬영 검사(PET scan, Positron-emission Tomography Scan)
우리 몸의 기초 신진대사에 이용되는 포도당 등의 물질에 방사선을 결합한 물질을 몸에 주입하여 촬영합니다. 이는 암세포가 정상 세포보다 더 많이 당을 소비하는 것을 이용한 방법입니다. 이 검사는 의심되는 종양이 뇌에 어떤 영향을 끼쳤는지 평가하는 데 도움을 줄 수 있습니다.\\n
⑤ 자기뇌파 영상 검사(MEG, Magnetoencephalography)
신경 전달 과정에서 신경세포에 의해 발생하는 조그만 전기적 흐름을 측정하는 검사 방법입니다. 신호를 기록하는 데 물리적인 접촉이 필요하지 않습니다. 뇌의 특정 부위의 기능을 알아볼 수 있습니다.\\n
⑥ 요추 천자
의사가 환자의 허리뼈 부근에 침을 넣어 뇌척수액을 뽑아 검사하는 방법입니다. 뇌척수액을 분석하여 암세포 여부, 혈액 여부, 종양 표지자를 검색할 수 있습니다.\\n
⑦ 혈액 검사
뇌하수체 종양을 의심할 만한 여러 표지자를 검색하는 데 사용합니다.\\n
⑧ 뇌파 검사(EEG, Electroencephalography)
머리에 모니터를 붙이는 비침습적인 검사 방법입니다. 뇌의 전기적 활동성을 알아봅니다.\\n
⑨ 정위적 뇌 수술 또는 생검(Stereotactic Neurosurgery or Biopsy)
뇌종양은 수술을 통해 진단하거나 제거할 수 있습니다. 만약 뇌종양이 의심되면 두개골의 일정 부분을 제거하거나 바늘(침)로 뇌 조직의 일부를 떼어 내어 생검을 시행할 수 있습니다. 병리 의사가 현미경을 통해 이렇게 얻은 조직의 세포를 검색합니다. 만약 암세포가 보이면 같은 수술을 하는 동안 가능한 많은 종양을 제거할 수 있으며, 수술 후 종양이 남아있는지도 볼 수 있습니다. 종양의 등급을 정하기 위해 검사할 수도 있습니다.\\n\\n
- 치료\\n
① 약물 치료
약물 치료는 화학 요법(항암제 투여)과 호르몬 요법을 제외하면 주로 뇌종양에 의해 발생하는 증상에 대한 대증 치료로 시행됩니다. 임상에서 가장 흔하게 발생하는 문제는 종양으로 인한 뇌압 상승과 마비 등 신경학적 결손입니다.\\n
뇌압은 종양 자체, 종양 주위의 뇌부종, 종양으로 인한 수두증, 정맥 울혈로 인한 용적의 증가 등이 제한된 두개강 내 공간에서 압력을 증가시킴으로써 상승합니다.\\n
뇌압이 상승한 경우와 종양 때문에 뇌 조직이 국소적으로 압박되어 마비 증상이 나타난 경우에는 뇌부종을 줄이고 뇌의 용적을 줄임으로써 뇌압을 떨어뜨립니다. 이때 사용하는 약제는 스테로이드 제제, 만니톨, 글리세롤 등의 삼투압제, 이뇨제 등입니다. 이러한 약제로 뇌압이 조절되지 않으면 과호흡 요법이나 마취 약제에 의한 혼수 요법 등을 사용합니다.\\n
혈중 전해질 농도가 급격하게 변동하거나 세포 내 체액에 저삼투압 현상이 나타나면 뇌부종이 생길 수 있습니다. 따라서 이를 자주 검사하여 교정해야 합니다.
간질 발작 증상이 동반되는 경우가 흔하므로, 대뇌부 종양이 있으면 수술 전후 예방을 위해 필수적으로 항경련제를 투여합니다.\\n
② 수술적 치료
뇌종양 환자에게 시행하는 수술로는 진단 목적의 뇌 조직 생검술, 종양 자체를 제거하기 위한 개두술, 종양으로 인한 수두증 등의 합병증을 치료하기 위한 수술이 있습니다. 뇌종양 치료의 첫 번째 단계는 종양의 크기를 가능한 한 작게 하는 수술입니다. 수술 후 남아 있는 종양의 크기가 작을수록 향후 치료가 효과적입니다.\\n
감마나이프 방사선 수술은 전신 마취가 필요 없고, 피부 절개를 하지 않아도 되는 등 치료 과정이 비침습적입니다. 이에 따라 후유증이나 합병증이 적다는 장점이 있습니다. 뇌의 중요 부위나 깊은 부위의 병소도 비교적 안전하게 치료할 수 있습니다. 그러나 치료 효과가 병소의 크기에 반비례하기 때문에, 병소가 큰 경우(지름이 3cm 이상)에는 치료 효과가 적어집니다. 따라서 병소가 적은 경우에 이 방법을 이용합니다. 특히 주변 조직에 침윤하지 않은 종양을 치료하는 데 좋습니다.\\n
③ 진단적 수술
뇌 조직 생검술은 진단을 목적으로 시행하는 수술입니다. 뇌의 심부에 위치한 종양을 진단하기 위하여 국소 마취하에 정위적 방법에 의하여 소량의 조직을 얻는 방법이 있고, 두개골을 열고 종양을 노출시켜서 조직을 얻는 방법이 있습니다. 진단만을 목적으로 하는 이 수술은 종양이 치료 목적의 수술을 하기에 부적당한 위치(수술적 제거가 불가능한 부위)에 있으며, 영상의학 검사만으로 신뢰할 만한 진단을 얻을 수 없을 때 시행합니다. 또 영상의학적 소견상 수술이 최종적인 치료 결과에 크게 영향을 주지 않는다면 진단 목적의 조직 생검만 시행합니다.\\n
④ 개두술
아직까지 대부분의 뇌종양에서 가장 신속하고 효과적인 치료 방법은 수술을 통해 종양을 제거하는 것입니다. 가장 일반적인 방법은 전신 마취하에 종양 부위의 두피, 두개골 및 뇌막(경막)을 절개하고 종양을 직접 노출시키면서 제거하는 것입니다. 수술의 목적은 종양을 제거하는 것(치료 목적)과 수술 시 얻어진 종양 조직을 병리조직학적으로 확인하는 것(진단 확정)입니다.\\n
악성 종양의 경우 수술만으로는 재발을 방지할 수 없으므로 수술 후 방사선 치료, 정위적 방사선 수술, 화학 요법 등을 병행합니다. 따라서 악성 종양이 있는 경우 수술의 목표는 신경학적 증상을 호전시키고 종양의 크기를 줄여 향후 방사선 치료, 정위적 방사선 수술, 화학 요법에 잘 반응할 수 있도록 하는 것입니다. 궁극적인 목적은 환자의 수명을 연장하는 것입니다.\\n
최근에는 수술 기법이 많이 발전하여 종양의 위치와 성격에 따라 수술 현미경, 내시경, 수술 중 유발전위 생리학적 감시, 컴퓨터 시스템을 이용한 수술 부위 확인 등 다양한 방법을 시도할 수 있습니다. 이러한 방법은 수술 후 신경학적 결손을 줄이고, 건강한 조직을 손상시키지 않으면서 종양만 정확하게 제거하는 데 도움을 줍니다. 초음파 흡입기는 높은 주파수의 음파를 내어 종양을 진동시켜 부순 다음 흡입기로 빨아들입니다. 레이저를 이용하여 종양 조직을 파괴하기도 합니다.\\n
⑤ 종양으로 인한 수두증 치료
종양으로 인해 수두증이 발생한 경우에는 주로 뇌척수액 배출을 위한 뇌실외 배액술, 뇌실-복막강 단락술을 시행합니다. 최근에는 내시경을 이용하여 뇌실을 열어주는 수술을 하기도 합니다. 단락은 뇌척수액이 다시 흐르게 하는 데 사용하는 유연한 관입니다. 뇌척수액 흐름을 재개통하면 두통, 오심 등 두개내압 증가에 의한 여러 가지 증상을 완화시킬 수 있습니다.\\n
⑥ 방사선 치료
악성 뇌종양의 경우 수술적 절제가 중요합니다. 그러나 수술로 종양을 완전히 절제하기 어려운 경우가 많으므로, 수술 후 보조적 치료로 방사선 치료를 시행합니다. 또 침범 범위가 넓어 수술적 절제가 어려운 악성 뇌종양의 경우에도 방사선 치료를 시행하여 증상 완화 및 생존율 향상을 기대할 수 있습니다. 한편 양성 종양으로 방사선 치료를 시행하는 경우도 있습니다. 양성 종양의 위치가 수술로 절제되기 어려운 위치에 있으면 방사선 치료를 통해 종양의 증식을 억제할 수 있습니다. 이처럼 방사선 치료는 뇌종양의 다양한 임상 상황에서 중요한 역할을 담당하고 있는 치료법입니다.\\n
⑦ 화학 요법
화학 요법은 종양세포가 성장에 필요한 유전 정보를 받아들이지 못하도록 하여 종양의 정상적인 성장을 방해하게 하는 치료 방법입니다. 화학 요법은 분열 중인 세포를 목표로 하기 때문에 특히 악성 조직에 독성이 강합니다.\\n
⑧ 다른 치료법
다른 치료법들은 정상세포가 종양세포로 변하는 생물학적 과정에 역점을 둡니다. 표준적인 치료법에 잘 반응하지 않는 종양을 치료하는 데 사용됩니다.\\n
⑨ 혈관 신생 억제제
종양 연관 혈관의 성장을 방해하여 종양에 필수적인 영양분과 산소의 공급을 억제하는 약제입니다. 현재 개발 중인 혈관 신생 억제제로는 thalidomide, TNP-470, platelet factor 4(PF4), interferon, angiostatin 등이 있습니다.\\n
⑩ 분화제
분열 중인 미성숙 종양세포를 성숙세포로 전환시켜 종양의 성장을 멈추게 하는 약제입니다. retinoic acid, phenylacetate, bryostatin 등이 있습니다.\\n
⑪ 면역 요법
면역 요법은 면역계를 활성화시켜 악성세포를 효과적으로 찾아내어 파괴하도록 하는 약제입니다. 인터페론은 많은 종양세포를 살해하는 면역계에 의해 생산되는 자연 단백질입니다. 림프구는 암과 싸우는 특별한 능력이 있습니다. 이것은 세포 이식 기술을 통해 실험실에서 배양, 활성화될 수 있습니다. 또한 직접 종양에 주입하여 면역계를 활성화할 수 있습니다. 이러한 목적으로 가장 흔하게 쓰이는 세포를 림포카인 활성화 살해 세포(LAK)라고 합니다.\\n
⑫ 유전자 치료
유전 물질을 종양세포에 이식시켜 세포를 파괴하거나 세포 성장을 멈추게 하는 치료 방법입니다. 종양세포가 자기 파괴에 이르도록 하는 유전자, 세포를 성숙하게 하여 성장을 멈추게 하는 유전자, 종양에 대한 면역계의 공격을 강화하게 하는 유전자, 항암제에 대한 반응성을 증가시키는 유전자 등의 수많은 형태의 유전자가 개발 중입니다.\\n',
'신경외과','2020-10-17 (15:00)','40');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','수두증',
'수두증은 뇌척수액의 생산과 흡수 기전의 불균형, 뇌척수액 순환 통로의 폐쇄로 인해 뇌실 내 또는 두개강 내에 뇌척수액이 과잉 축적되어 뇌압이 올라간 상태를 의미합니다.\\n\\n
수두증의 원인은 선천성 요인과 후천성 요인으로 나눌 수 있습니다.\\n
① 선천적 원인
뇌척수액 순환 통로의 폐쇄\\n
② 후천적 원인
- 종양으로 발생한 내적, 외적 압박이 뇌척수액의 이동 통로를 막는 경우
- 염증
- 출혈
- 뇌척수액의 과잉 생산
- 뇌 정맥동 압력의 증가
- 흡수 부위의 막힘 등\\n\\n
- 증상\\n
① 선천성 수두증
수두증으로 인하여 두개강 내압이 빠르게 상승합니다. 두통, 구토, 유두 부종 등의 증상과 징후가 나타날 수 있습니다.\\n
② 후천성 수두증
두개강 내압 상승이 서서히 사라지면서 정상압이 되지만 뇌실 확장은 그대로 남아 있는 상태입니다. 이를 정지된 수두증이라고 합니다. 의사 표현을 하지 못하는 신생아기, 영아기, 유아기에는 머리둘레의 확장, 대천문 팽윤, 눈동자가 아래로 가라앉는 증상, 안구가 안쪽으로 몰리는 동안신경 마비, 잠이 늘면서 잘 먹지 않고 늘어짐 등 다양한 증상이 나타납니다. 2세 이상 소아의 두위는 정상 범위에 있지만, 두통, 구토, 시력 장애, 행동 장애, 기억력 장애, 지능 발육 저하, 시신경 마비 등의 증상이 나타납니다. 주로 하지를 침범하는 강직성 마비가 나타날 수 있습니다. 심할 경우 보행 장애가 발생하기도 합니다.\\n\\n
수두증은 병력, 임상 증상, 영상의학적 검사를 통해 진단합니다. 영아기에 영아의 머리가 비정상적으로 크다면 수두증을 의심할 수 있습니다. CT는 뇌실과 뇌 실질의 변화 등을 쉽게 관찰할 수 있는 검사입니다. 뇌실의 확대 모양에 따라 뇌척수액 순환 부위의 막힌 곳을 알 수 있습니다.\\n
MRI는 CT보다 뇌실의 크기나 원인이 될 수 있는 병변에 관하여 더 정확한 정보를 제공합니다. 특히 MRI를 찍어 보면 확장된 뇌실 주변 뇌 조직의 신호 증강이 특징적으로 나타납니다. 방사성 동위원소 검사를 통해 뇌척수액의 흐름을 분석할 수 있습니다.\\n
대천문이 열려 있는 신생아라면 두부 초음파 검사를 통해 뇌실 확장을 확인할 수 있습니다.\\n\\n
수두증이 진행되거나 지속되면 수술로 치료해야 합니다.\\n
① 내시경적 제3뇌실 조루술
종양 등에 의해 뇌척수액이 막혔다면, 내시경을 사용하여 우회로를 만들어줍니다. 모든 수두증 환자에게 시행할 수 있는 수술 방법은 아닙니다. 막힘에 의한 수두증에 대해서는 적절하지 않습니다.\\n
② 단락술
뇌실에서 신체의 다른 공간(주로 복강)으로 뇌척수액을 배액하여 뇌척수액이 흡수되도록 우회로를 만드는 수술입니다. 외래 추적 관찰을 하면서 적절한 뇌압을 찾아 조절합니다. 기능 부전, 감염 등의 문제가 초래될 수 있습니다.\\n',
'신경외과','2020-10-17 (15:00)','30');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','모야모야병',
'모야모야병은 양측 뇌혈관의 내벽이 두꺼워지면서 일정한 부위가 막히는 특수한 뇌혈관 질환을 의미합니다. 이 질환은 일본의 스즈키 교수에 의해 명명되었습니다. 뇌동맥 조영 영상이 아지랑이처럼 흐물흐물해지면서 뿌연 담배 연기 모양과 비슷하다고 해서 -모야모야-라고 명명되었습니다. 이 질환은 주로 한국인과 일본인에게서 발생합니다. 모야모야병은 특이하게 소아에게는 주로 뇌허혈, 뇌경색으로 나타나고, 성인에게는 뇌출혈로 발병됩니다. 이 때문에 소아와 성인에게 뇌졸중이 발병한 경우 반드시 이 질환을 감별 진단에 포함해야 합니다.\\n\\n
모야모야병의 발병 원리나 원인은 밝혀지지 않았습니다. 감염이 자가 면역 반응을 유발하여 혈관염을 유발한다고 하는데, 아직까지 명확한 증거는 없습니다. 환경적 요인도 이 병의 원인으로 제시되고 있습니다. 그러나 역학적 조사 결과에 따르면, 환경 요인보다 유전적 요인이 더 관련이 있습니다. 특히 일본의 조사에 따르면, 모야모야병은 직업, 생활양식, 지역과 무관합니다.\\n\\n
아이들의 뇌는 활발한 뇌 활동으로 인해 많은 피를 필요로 하므로, 뇌혈관이 막히면 다양한 허혈성 증상이 나타날 수 있습니다. 정상적으로 뇌에 피를 공급하던 큰 혈관이 서서히 막히고, 작은 혈관에 의한 측부 순환이 충분히 이루어지지 않으면 피의 공급량이 적어지기 때문입니다. 이 질환의 특징적인 초기 증상은 뜨거운 음식물이나 물을 식히기 위해 입으로 바람을 불거나 심하게 울고 난 후에 팔다리의 힘이 일시적으로 빠지는 마비 증세가 나타나는 것입니다. 증상은 피 공급이 부족한 부위에 따라서 달라집니다. 간질 발작, 두통, 불수의적 운동, 지능 저하, 시야 장애, 언어 장애 등과 같은 증상이 나타납니다.\\n\\n
모야모야병의 진단에는 CT, MRI, 혈관 조영술, MR을 이용한 혈관 조영술, SPECT 등을 이용합니다. 각각의 진단 방법은 단순히 모야모야병을 진단하기 위해서만이 아니라 수술의 필요성, 수술 시기, 병의 진행 양상을 확인하기 위해서 필요합니다.\\n\\n
모야모야병 치료 방법으로는 보존적 치료와 수술적 치료가 있습니다. 수술적 치료에는 혈관과 혈관을 직접 연결하여 혈류량을 늘리는 직접 혈관 문합술과, 시간이 필요하지만 다른 부분의 혈관이 자라나서 보조적으로 혈류량을 늘리도록 하는 간접 혈관 문합술이 있습니다. 발작에 대한 항경련제 투약 이외에는 대부분 수술적 치료법을 추천합니다.
수술적 치료 중 가장 많이 시행되며 위험석이 적은 방법은 간접 혈관 문합술입니다. 이 방법은 두피, 근육, 경막 등으로 가는 혈관을 뇌 표면에 얹어 신생혈관이 안으로 자랄 수 있도록 해 주는 것입니다. 성인의 경우 직접 혈관 문합술과 간접 혈관 문합술을 함께 시행합니다. 최근에 더 자주, 더 심한 증상이 나타나는 쪽을 먼저 수술합니다.
모야모야병은 뇌 양쪽에서 진행되는 병이므로, 보통 4~6주 간격으로 양쪽 모두 수술합니다. 예외적으로 모야모야병이 한쪽에만 발생한 경우에는는 1차 수술 이후 경과와 진행 정도를 보면서 향후의 치료를 결정합니다. 간접 혈관 문합술은 혈관을 직접 이어주는 수술이 아니므로 혈관이 자라는 시간이 필요합니다.\\n\\n
모야모야병은 불치병입니다. 현대 의학으로도 모야모야병 자체를 치료할 수 없습니다. 다만 모야모야병으로 인해 발생하는 증상을 완화하는 치료는 가능합니다. 뇌로 가는 피가 부족하여 여러 임상적 증상이 생기므로, 수술적 치료를 통해 혈관을 만들어 적절하게 뇌에 피를 공급해 줌으로써 장애를 예방할 수 있습니다.\\n',
'신경외과','2020-10-17 (15:00)','39');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','조현병',
'조현병(정신분열병)은 10대 후반에서 20대의 나이에 시작하여 만성적 경과를 보이는 정신적으로 혼란된 상태, 현실과 현실이 아닌 것을 구별하는 능력의 약화를 유발하는 뇌 질환입니다. 이 질환은 100명 중 1명이 걸리는 흔한 질환입니다. 모든 계층의 사람이 걸릴 수 있습니다. 남녀의 발병 빈도는 비슷합니다. 원인은 아직 정확히 밝혀지지 않았습니다. 최근 학계에서는 뇌의 기질적 이상을 그 원인으로 보고 있습니다. 흔히 생각하듯이 약한 정신력, 부모의 잘못된 양육, 악령 및 귀신으로 인해 발병하는 것이 아니라는 것은 분명합니다.\\n\\n
조현병(정신분열병)의 원인은 명확히 밝혀지지 않았으며, 생물학적 소인과 환경의 상호 작용에 의해 발병된다고 추정됩니다. 과거에는 조현병을 심리적 질환으로 보는 견해가 컸지만, 현재에는 뇌의 생화학적 이상과 연관된다고 보는 견해가 지배적입니다.\\n
뇌에서는 사고, 감정, 행동을 조절하는 수많은 신경전달 물질이 분비되어 세포 간에 정보를 전달합니다. 조현병(정신분열병) 환자는 뇌의 특정 부위에서 도파민이라는 물질의 신경전달 과정에 이상이 생기면서 증상이 나타납니다. 도파민이 활성화되면, 망상, 환청, 혼란된 사고가 나타납니다.\\n
최근에는 도파민 외에 세로토닌 등 여러 신경 생화학적 변화가 상호 작용을 일으켜 복합적으로 조현병(정신분열병)과 관련된다고 추정합니다. 생물학적 소인의 상당 부분은 유전적 영향을 받을 것으로 생각됩니다.\\n
조현병(정신분열병)은 가족력이 있는 경우가 있습니다. 여러 연구 결과를 종합해 볼 때 조현병에 유전적 경향이 있을 것으로 생각됩니다. 일반인이 조현병에 걸릴 가능성이 1%에 불과하지만, 부모나 형제 중 한 사람이 조현병 환자일 경우에는 발병률이 5~10% 정도로 높아집니다. 부모 모두가 조현병(정신분열병) 환자일 경우에 자녀가 조현병(정신분열병)에 걸릴 가능성은 40% 정도에 이를 정도로 매우 높습니다.\\n
중요한 사실은 가족 중에 조현병(정신분열병) 환자가 있다는 사실이 일반인보다 발병할 가능성이 높다는 것을 의미할 뿐이라는 점입니다. 100% 조현병이 유전되는 것은 아닙니다. 부모가 환자인 경우라도 자녀는 조현병에 걸리지 않을 수 있습니다. 도리어 가족 중에 조현병 환자가 없더라도 발병할 수 있습니다. 조현병(정신분열병) 자체가 유전된다기보다는 쉽게 병에 걸릴 수 있는 소인이 유전되는 것으로 생각됩니다. 여기에 환경적 요인이 더해지면서 조현병이 발병한다고 생각됩니다.\\n\\n
조현병(정신분열병)의 발병은 서서히 진행합니다. 주된 증상은 환청, 망상, 이상 행동, 횡설수설 등입니다. 감정이 메마르고 말수가 적어지며 흥미나 의욕이 없고 대인관계가 없어지는 등과 같은 증상이 나타나기도 합니다.\\n
조현병(정신분열병) 환자는 흔히 환각을 경험합니다. 누군가 말하는 목소리가 끊임없이 들리거나 실제 존재하지 않는 대상이 보이기도 합니다. 질병 초기에 환자들은 놀라고 당황하지만, 시간이 지나면 이런 환각 현상을 사실로 받아들입니다. 환청이 가장 흔한 증상입니다. 환자는 다른 사람이 듣지 못하는 목소리를 듣습니다. 그 내용은 환자의 행동을 지시하거나 간섭하고 비평하는 내용 또는 사람끼리 주고받는 소리입니다. 어떤 환자는 이런 환청과 대화를 하기도 합니다. 환자가 혼잣말을 중얼거리는 것처럼 보이기도 합니다.\\n
전혀 근거가 없는 엉뚱한 믿음을 갖고 있는 것을 망상이라고 합니다. 망상은 환각과 함께 조현병의 가장 특징적인 증상입니다. 주위에서 일어나는 일을 자신과 연관시켜 개인적인 특별한 의미를 부여하는 관계 망상, 나를 감시하고 있다거나 누군가가 나를 조종한다고 느끼는 피해 망상, 과대망상, 내가 구세주이거나 하나님의 계시를 받았다고 하는 종교 망상이 자주 나타납니다. 망상은 합리적인 설득이나 논쟁으로 쉽게 교정되지 않습니다.\\n
조현병(정신분열병) 환자는 혼자만의 생각에 사로잡혀 있어서 다른 사람의 말에 귀를 기울이지 못하는 경향이 있습니다. 대화를 나누면서 상황에 적절한 것과 적절치 못한 것을 가려내지 못하고, 타인의 의향을 제대로 파악하지 못하며, 엉뚱한 이야기를 불쑥 꺼내거나 쉽게 산만해지고 집중을 잘하지 못합니다. 사고가 조직화되어 있지 않고 모호하며 사고가 적절하게 연결되지 않으므로 이야기의 핵심을 파악하기 어렵습니다. 대화 중에 주제가 갑자기 다른 것으로 바뀌기도 합니다.\\n
조현병(정신분열병) 환자는 상황에 맞지 않게 심각하거나, 슬픈 말을 하는 상황에서 웃는 등과 같이 부적절한 감정 표현을 하기도 합니다. 감정이 메말라 감정 표현이 없거나 기쁘거나 슬프다는 정상적인 감정 표현을 잘하지 못하고 무표정해집니다.\\n\\n
진단은 자세한 병력을 듣고 환자의 정신 상태를 검사하여 이루어집니다. 정확한 진단을 내리기 위해서는 가족이 그동안 일어난 일을 자세히 설명해 주어야 합니다. 첫 발병일 경우 다른 신체 질환, 뇌 질환으로 인해 조현병(정신분열병)과 유사한 증상이 나타날 수 있습니다. 이것을 감별하기 위해 혈액 검사, 뇌컴퓨터단층촬영(CT), 뇌자기공명영상(MRI), 단일광자방출단층촬영(SPECT), 뇌파 검사 등을 시행합니다. 환자의 심리 상태를 파악하기 위하여 심리 검사를 합니다. 진단에서 무엇보다 중요한 것은 정신과 전문의와 환자의 면담, 가족으로부터 얻게 되는 병력과 증상에 관한 정보입니다.\\n\\n
조현병(정신분열병)의 치료는 크게 약물 치료와 정신 치료로 구분됩니다. 급성기에는 약물 치료가 가장 중요하며, 이를 통해 증상의 상당 부분을 호전시킬 수 있습니다. 약물 치료는 스트레스에 민감한 조현병 환자를 스트레스의 영향을 덜 받도록 보호하는 작용을 합니다. 이는 재발을 방지하는 데 중요한 역할을 합니다.\\n
일반적으로 사람들이 항정신병 약물에 대해 잘못 이해하는 부분이 많습니다. 의존성이 생기는 것은 아닌가, 단지 진정시키거나 잠을 자게 하는 약이 아닌가, 약을 복용하면 바보가 되는 것은 아닌가 등과 같은 의문을 품는 경우가 많습니다. 항정신병 약물은 의존성이 없는 약물입니다. 단순한 수면제나 안정제는 망상, 환청과 같은 조현병(정신분열병) 증상에는 효과가 없습니다. 항정신병 약물은 조현병(정신분열병) 증상을 목표로 하여 사용되는 치료제입니다.\\n
약을 복용할 경우 초기 부작용으로 어눌한 동작과 발음이 나타날 수 있습니다. 하지만 이는 일시적인 현상일 뿐이며, 결코 바보가 되는 것은 아닙니다. 최근에는 음성 증상에도 효과가 있으며 동작이 둔해지는 것과 같은 부작용이 적은 우수한 약물이 개발되고 있습니다. 국내에서도 이러한 약물의 사용이 증가하고 있습니다.\\n
조현병(정신분열병)은 약물 치료만이 아니라 다각적 치료를 시행해야 합니다. 치료 방법은 다음과 같습니다.\\n
① 개인 정신 치료
개인 정신 치료는 환자의 전반적인 문제를 정신과 전문의와 상담하면서 현재 부딪히고 있는 여러 문제를 해결하는 치료를 말합니다. 정신과 전문의는 환자의 경험, 생각, 느낌을 이해하고 공감적인 관계를 바탕으로 환자의 왜곡된 생각을 교정하는 데 도움을 줍니다.\\n
② 가족 치료
가족 치료는 조현병(정신분열병) 환자의 가족이 겪는 고통과 어려움을 상담하는 것입니다. 가족 구성원에게 조현병에 대한 이해를 높임으로써 환자에게 지지적이고 협조적인 환경을 만들어주어 조현병의 재발률을 줄일 수 있습니다. 위기 상황에 처했을 때 적절한 대처 방안을 찾아 위험한 상황을 슬기롭게 해결할 수 있게 해줍니다.\\n
③ 집단정신 치료
집단정신 치료는 대개 적은 수의 환자들(보통 6~12명)과 한두 명의 치료자가 참여하여 이루어집니다. 치료의 초점은 다른 사람과의 대인관계를 경험하면서, 또는 자신의 말과 행동에 대한 다른 사람의 반응을 보면서 이전까지 왜곡되고 비 적응적이었던 대인관계 및 행동을 고치는 것에 있습니다.\\n
④ 지역 사회의 정신사회 재활 프로그램
조현병(정신분열병) 환자의 궁극적인 치료 목적은 정상적인 생활을 할 수 있도록 해주는 것입니다. 한 인간으로서의 기능을 회복시켜주는 것입니다. 조현병(정신분열병) 환자를 위해서는 정신과 외래, 입원 기관만이 아니라 다양한 사회 보건 복지시설이 필요합니다. 정신사회 재활 프로그램으로는 돌봐 줄 가족이 없는 환자에게 가족 대신 주거와 관리를 대행해 주는 주거 시설, 정신사회 재활 훈련을 전문적으로 담당하는 정신과 낮병원, 환자의 능력 수준에 맞게 일할 기회를 주는 보호고용 제도, 직업이 없는 환자를 위해 직업 훈련을 시키는 직업 훈련 프로그램 등이 있습니다.\\n
⑤ 입원 치료
입원은 정확한 진단, 일관성 있는 약물 치료, 환자의 자해 및 타인에 대한 난폭 행동으로부터의 보호, 기본 생활적 욕구에 대한 제공을 위해 필요합니다. 최근 경향은 무의미한 장기 입원을 피하고, 가능한 한 빨리 지역사회로 복귀하는 것입니다.\\n\\n
환자는 환청이 있을 때 환청에서 들리는 목소리와 대화를 주고받거나 환청에서 시키는 대로 행동합니다. 환자는 주위에 사람이 없는 데도 혼자서 중얼거리거나, 뚜렷한 이유 없이 혼자서 웃고 울거나, 주의가 산만하고 어떤 생각에 몰두하여 말을 걸어도 즉시 대답하지 못합니다.\\n
환자가 환청을 느낄 때는 다음과 같이 대처해야 합니다. -지금 무슨 소리가 들리니?- 하고 환청에 대해 구체적으로 물어봅니다. -지금 네 말은 상식적으로 말이 안 돼.- 라며 환자의 행동에 대해 따지지 않습니다. 음악을 듣거나 TV를 보도록 하여 주의를 다른 곳에 집중시킵니다. 응급 상황일 때는 약을 추가로 먹게 하거나 주치의에게 도움을 요청합니다. 비웃거나 놀리는 말투, 설득하거나 위협하는 말투를 사용하지 않아야 합니다.\\n',
'정신과','2020-10-17 (15:00)','22');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','우울증',
'우울증은 생각의 내용, 사고 과정, 동기, 의욕, 관심, 행동, 수면, 신체 활동 등 전반적인 정신 기능이 지속적으로 저하되어 일상생활에도 악영향을 미치는 상태를 의미합니다. 정신의학에서 말하는 우울한 상태란 이러한 과정에서 일시적으로 기분이 저하되는 상태를 뜻하는 것이 아닙니다. 즐거운 일이 있을 때 즐겁고, 슬픈 일이 있을 때 슬퍼하는 것은 자연스럽고 건강한 것입니다.\\n\\n
우울증의 확실한 원인은 아직 명확하게 밝혀지지 않았습니다. 다만 다른 정신 질환과 마찬가지로 다양한 생화학적, 유전적, 환경적 요인이 우울증을 일으킨다고 합니다.\\n
① 생화학적 요인
뇌 안에 있는 신경전달물질(노르에피네프린, 세로토닌, GABA 등)과 호르몬(갑상선, 성장 호르몬, 시상하부-뇌하수체-부신피질 축) 이상, 생체 리듬의 변화와 관련이 있다고 합니다.\\n
② 유전적 요인
일란성 쌍둥이의 경우, 한 명이 주요 우울증을 앓고 있으면 다른 한 명도 우울증이 걸릴 확률이 50% 정도 된다고 합니다. 따라서 주요 우울증 발병에 유전적 요소가 작용하는 것은 명확합니다. 그러나 유전적 요소로 설명되지 않는 요인도 우울증 발병에 영향을 끼친다고 합니다. 현재까지 주요 우울 장애와 관련하여 일관성 있게 보고된 유전자 이상은 없습니다.\\n
③ 환경적 요인
스트레스만으로 주요 우울증이 생기는 것은 아닙니다. 그러나 스트레스는 우울증 증상 발현에 영향을 준다고 합니다. 살아가면서 대처하기 어려운 상황이 우울증 유발의 환경적 요인이 됩니다. 사랑하는 사람을 잃는 것, 경제적 문제, 강한 스트레스 등을 예로 들 수 있습니다.\\n\\n
치료가 필요한 병적 우울증의 특징은 다음과 같습니다. 이러한 우울증은 정상적인 우울증과는 다릅니다.\\n
① 우울 증상이 2주 이상 오래간다.
일시적인 우울 상태라면 대개 며칠 안에 괜찮아지기 마련입니다. 하지만 이런 상태가 2주 이상 장기화된다면 치료가 필요합니다.\\n
② 식욕과 수면 문제가 심각하다.
입맛이 없어서 전혀 식사를 못 합니다. 잠을 거의 못 잡니다. 이처럼 식욕과 수면 문제가 심하다는 것은 약물 치료가 필요한 상태임을 의미하는 중요한 증거입니다.\\n
③ 주관적 고통이 심하다.
우울증 환자들은 스스로 우울증으로 인한 정신적 고통을 견디기가 매우 힘들다고 느낍니다. 이러한 상태가 낫지 않고 계속될 것이라는 비관적인 예상이 들면 자살 기도를 합니다. 이럴 때는 더 이상 혼자 힘으로 회복하려고 하지 말고, 정신과 의사의 도움을 받아야 합니다.\\n
④ 사회적, 직업적 역할 수행에 심각한 지장이 있다.
우울증 상태에서는 여러 가지 일이 잘 안될까 봐 많이 걱정하지만 정작 그 일을 해결하기 위한 실행 능력은 매우 떨어집니다. 가정주부가 살림을 전혀 못 하거나, 학생이 공부를 할 수 없을 정도면 치료가 필요한 상태로 보아야 합니다.\\n
⑤ 환각과 망상이 동반되는 경우
우울증 중에는 정신병적 증상인 환각이나 망상이 동반되는 경우가 있습니다. 이런 경우 자타해 위험성이 높으므로, 우울 증상의 심각도와 상관없이 치료를 받는 것이 좋습니다.\\n
⑥ 자살 사고가 지속되는 경우\\n\\n
주요 우울증은 정신건강의학과 의사와 면담하여 병력을 청취하고 환자의 상태가 진단 기준에 부합하는지 확인한 후 진단합니다. 이 과정에서 심리 검사를 통해 다른 정신 질환의 공존 여부, 지능 등 필요한 정보를 보충할 수 있습니다. 다른 신체 질환에 의한 이차적 우울증을 감별하기 위해 혈액학적 검사 및 뇌영상 검사 등을 시행할 수 있습니다.\\n
주요 우울증의 진단 기준(DSM-IV)은 다음과 같습니다.\\n
① 2주 이상, 거의 매일 지속되는 우울한 기분
② 일상 대부분의 일에서 관심 및 흥미 감소
③ 식욕 감소 또는 증가(체중 감소 또는 증가, 한 달에 5% 초과)
④ 불면 또는 과다 수면
⑤ 정신운동 지연 또는 정신운동 초조
⑥ 피곤 또는 에너지의 감소
⑦ 무가치감, 부적절한 죄책감
⑧ 집중력 저하, 우유부단
⑨ 반복적인 자살 생각\\n
위에서 언급한 증상 중 5개 이상(1, 2번 중에 하나 이상 포함)이 있고, 이러한 증상이 일상생활을 심각하게 저해하면 우울증으로 진단할 수 있습니다.\\n\\n
우울증의 치료 방법에는 크게 약물 치료와 정신 치료가 있습니다.\\n
① 약물 치료
현재 사용되는 항우울제는 대부분 비슷한 효능을 보입니다. 약물 투여 2~3주 후에 효과를 보이기 시작하며, 대개 4~6주 정도 지나면 충분한 효과가 나타납니다. 약물을 충분한 용량으로 충분한 기간 동안 사용한다면 전체 환자의 2/3에서 효과가 나타납니다.\\n
약물 치료로 우울증 증상이 호전되더라도, 6개월 정도는 약물 치료를 계속해야 재발을 예방할 수 있습니다. 이렇게 약물을 장기간 사용해도 신체에 특별한 위험성은 없습니다. 중독성도 거의 없습니다.\\n
② 정신 치료(심리 요법)
우울증을 유발한 스트레스에 대처하는 능력을 향상시킴으로써 현재의 증상을 조절하는 치료 방법입니다. 이뿐만 아니라 우울증이 재발하지 않도록 개입하는 효과가 있습니다. 정신 치료를 효과적으로 받으면 우울증이 치료될 뿐만 아니라 전반적인 정신 건강도 향상되어서, 치료 전보다 만족스러운 삶을 살게 되기도 합니다.\\n
③ 전기 경련 요법(Electroconvulsive therapy)
우울증의 가장 효과적인 치료법 중 하나입니다. 다른 치료에 비해 효과가 아주 빨라서 수일 내지 1~2주면 치료 효과를 기대할 수 있습니다. 합병증이 발생할 확률도 적습니다. 자살 위험성이 높은 경우, 신체 쇠약이 심해서 빠른 치료가 필요한 경우, 항우울제에 반응이 없는 경우에 사용합니다.\\n
④ 반복적 경두개 자기자극법(Repetitive transcranial magnetic stimulation; rTMS)
경두개 자기자극으로 뇌가 자극되면 일련의 복잡한 과정을 거쳐 흥분성 또는 억제성 효과가 나타납니다. 경두개 자기자극의 기술적 원리는 코일에 짧고 강한 전류를 흘려 급격히 변화하는 자기장을 유발하고, 이 자기장이 다시 전기장을 유발해 사람의 두피 위를 자극할 때 대뇌의 신경세포를 흥분시키는 것입니다. 다양한 정신-신경계 질환이 있는 환자에게 치료용 목적으로 사용합니다. 우울증에 효과가 있다고 알려져 있습니다.\\n',
'정신과','2020-10-17 (15:00)','19');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','불면증',
'불면증은 적절한 환경과 잠잘 수 있는 조건이 구비되었으나 2주 이상 잠을 이루지 못하는 것을 의미합니다. 불면증 환자는 잠들기 힘들거나, 야간에 자주 깨거나, 새벽녘에 일어나 잠을 설칩니다. 불면증에는 3가지 형태가 있습니다.\\n
① 일시적 불면증
불면증이 며칠간 지속되는 것입니다. 보통 수면 주기의 변화, 스트레스, 단기 질병에 의해 발생합니다.\\n
② 단기 불면증
불면증이 2주에서 3주까지 지속되는 것입니다. 스트레스나 신체적, 정신적 질병과 관련되어 있습니다.\\n
③ 장기 혹은 만성 불면증
불면증이 몇 주 이상 지속되는 것입니다. 매일 밤, 대부분의 야간 시간대 혹은 한 달에 여러 번 밤에 잠을 이루지 못합니다. 신체적, 정신적 문제를 포함하여 많은 원인이 있을 수 있습니다.\\n\\n
- 원인\\n
① 생활습관 요인
많은 약물과 습관들이 수면 문제를 악화시키거나 불면증을 초래할 수 있습니다. 흡연과 음주, 카페인 성분이 포함된 음료가 대표적인 예입니다. 잘 시간이 다 되어서 술을 마시면 잠을 잘 이루지 못합니다. 불면증을 초래하는 대표적인 약물로는 항암제, 갑상선 치료제, 항경련제, 항우울제, 경구용 피임제 등이 있습니다. 심지어는 수면제를 장기간(30일 이상) 복용해도 수면 장애를 호소합니다. 잠자는 시간이 날마다 바뀌는 것과 하던 일이 변하는 것도 좋은 수면을 파괴하는 생활습관 요인입니다.\\n
② 환경적 요인
자동차 소리, 비행기 지나가는 소리, 이웃의 텔레비전 소리와 같은 소음도 수면을 방해할 수 있습니다. 방이 너무 밝거나 방안의 온도가 너무 낮거나 높아도 수면을 방해할 수 있습니다.\\n
③ 신체적 요인
미국 수면질환학회에서 8,000명의 사람을 조사한 결과에 따르면, 모든 만성 불면증의 원인 중 절반은 호흡 관련 질환(수면 무호흡증)이나 자는 동안의 주기적 근육 경축과 같은 일차적인 수면 관련 질환입니다. 다른 신체적 요인들, 예를 들면 관절염, 속 쓰림, 월경, 두통, 얼굴이 화끈거리는 열감 등이 잠을 못 이루는 원인이 될 수 있습니다.\\n
④ 심리적 요인
일반적으로 불면증은 우울증의 대표적인 증상으로 알려져 있습니다. 미미한 심리적 요인들도 불면증과 관련되어 있다고 합니다. 예를 들면 스트레스나 환경 변화에 의해 불면증을 쉽게 겪습니다. 이와 비슷하게 가정 문제나 직업 문제와 같은 것을 걱정할 때 잠을 설치고, 마침내 잠자는 것에 대해 걱정하게 되면 그 걱정 자체가 수면을 방해합니다.\\n\\n
쉽게 잠을 들지 못하거나, 잠이 들어도 자주 깨거나, 이른 새벽에 잠을 깨어 다시 잠을 이루지 못하는 등 다양한 양상으로 나타날 수 있습니다. 불면증이 지속되면 정신적, 신체적 질환에 취약할 수 있습니다. 동물 실험에서 잠을 못 자도록 수면을 박탈하면 쇠약한 모습, 음식 섭취의 이상, 체중 감소, 체온 저하, 피부 장애, 심한 경우 사망까지 초래한다는 연구 보고가 있습니다.\\n\\n
- 치료\\n
불면증의 원인을 밝히고 원인을 제거합니다. 특히 오래 누워있다고 좋은 게 아니라 짧더라도 깊은 잠을 자는 것이 중요하다고 생각하는 것이 좋습니다. 쾌적한 수면을 위해서는 올바른 수면 습관이 필요합니다. 이 밖에도 약물 치료, 인지행동 치료, 이완 요법, 자극 조절법 등이 있습니다. 한편, 수면 일지를 적어보면 수면의 문제점을 발견하는 데 도움이 됩니다. 수면 일지에는 잠자리에 드는 시간, 일어나는 시간, 카페인이 함유된 음료를 마신 횟수, 하루 동안의 운동량 등을 기록합니다.\\n\\n
- 주의사항\\n
① 잠자리에 들기 6시간 전부터는 커피나 홍차 등 카페인이 함유된 음식을 피합니다.
② 잠자리에 들기 2시간 전부터는 술을 마시거나 담배를 피우지 않아야 합니다.
③ 규칙적으로 적당한 운동을 하면 수면에 도움이 됩니다. 그러나 자기 전 격렬한 운동은 오히려 수면을 방해할 수 있습니다.
④ 낮잠을 자지 않습니다. 만약 낮잠을 자는 습관이 있다면 매일 같은 시간에 자도록 합니다.
⑤ 잠자리에 들기 전에 온수 목욕이나 독서를 하는 등과 같은 규칙적인 습관을 만들면 도움이 됩니다.
⑥ 졸음이 오기 시작할 때만 잠자리에 듭니다. 잠자리에서 일을 하거나 텔레비전을 보지 않습니다. 침대는 오직 잠을 자기 위한 것으로만 사용해야 합니다.
⑦ 언제 잠들었는지에 상관없이 매일 일정한 시간에 일어나야 합니다.
⑧ 되도록 수면제를 피합니다.\\n',
'정신과','2020-10-17 (15:00)','61');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','거식증',
'섭식 장애는 정신적인 문제로 인해 음식 섭취에 장애가 생기는 질환을 의미합니다. 대표적인 질환으로 거식증(신경성 식욕부진증)과 폭식증(신경성 대식증)이 있습니다. 두 질환은 서로 긴밀하게 연결되어 있습니다. 거식증의 특징은 체중 감소입니다. 거식증 환자는 살이 찌는 것에 대하여 걱정과 공포를 느끼고 비만이 아님에도 자신이 비만이라고 생각합니다. 환자는 체중을 줄이기 위해 식사를 제한하거나, 먹은 뒤 인위적으로 구토하는 등의 행동을 합니다. 폭식증은 단순히 일시적인 과식이나 식탐을 의미하는 것이 아닙니다. 폭식증은 음식에 대한 자제력을 잃고 비상식적으로 많은 양의 음식을 미친 듯이 먹고, 폭식 후에 의도적으로 구토와 설사를 일으키는 상태를 의미합니다. 거식증과 폭식증의 증상이 복합적으로 발생하는 경우도 있으며, 일부 증상만 나타나는 경우도 있습니다.\\n\\n
섭식 장애는 여러 생물학적 원인과 심리적 원인이 상호작용하여 발생합니다. 생물학적 원인에는 유전적 원인, 신경전달물질의 변화, 식욕과 포만감에 관여하는 물질의 변화, 에너지 대사 과정의 변화 등이 있습니다. 심리적 원인에는 날씬함을 강조하는 사회적 압력, 여성의 사회적 역할 변화로 인한 갈등, 의학 기술의 발달, 신체는 노력만으로 얼마든지 변화될 수 있다는 대중매체에 의해 주입된 정보 등이 있습니다. 통제 가능한 음식과 체중이라는 외적인 방법으로 낮은 자존감과 자신에 대한 불확실성을 해결하려는 태도도 원인입니다.\\n\\n
- 증상\\n
① 체중 변화 
섭식 장애 환자는 체중이 평균 체중보다 낮더라도 더 말라야 한다고 생각합니다. 폭식과 인위적인 음식 섭취 억제, 구토, 설사제 복용, 과도한 운동으로 인해 체중의 균형이 쉽게 깨집니다.\\n
② 음식 섭취 억제     
음식의 섭취를 억제하는 가장 흔한 이유는 체중 감량에 대한 욕망입니다. 이외에 자기 체벌, 신체 정화와 같은 종교상의 이유도 있습니다. 섭식 장애 환자의 식습관은 매우 다양합니다. 일반적으로 음식 섭취를 정해진 시간에 정해진 방법으로만 행해야 하는 일종의 의식이 됩니다.\\n
③ 폭식
폭식은 짧은 시간 동안 자제력을 잃고 다량의 음식을 먹어 치우는 것입니다. 환자는 폭식한 이후 종종 기분이 엉망이 되고 자신에게 환멸을 느낍니다.\\n
④ 자제력 상실에 대한 두려움
섭식 장애 환자는 폭식을 두려워하지만, 실제로는 살이 찌는 것에 대한 공포가 더 큽니다. 자제력 상실에 대한 두려움이 극대화되면, 한 번의 실수로 모든 것이 망쳐질 것이라는 생각에 사로잡힙니다. 살찌게 하는 음식이라고 생각되는 식품을 조금이라도 먹으면 바로 비만이 될 것이라고 믿습니다.\\n
⑤ 왜곡된 신체상          
실제 몸무게와는 별개로 자신이 뚱뚱하다거나 뚱뚱해질 것이라고 생각합니다.\\n
⑥ 비정상적인 방법을 통한 체중 조절
음식 섭취를 제한하여 체중을 조절합니다. 이외에 자가 구토를 하거나, 설사제와 이뇨제를 복용합니다. 어떤 사람은 구토를 피하기 위해 음식을 씹은 후 삼키지 않고 뱉어 버립니다.\\n
⑦ 과도한 운동
체벌에 가까운 수준으로 스스로를 닦달하면서 운동을 합니다. 대개 혼자서 운동합니다.\\n
⑧ 무월경과 호르몬 변화
여성은 너무 마르면 대뇌에서 호르몬 분비가 차단되면서 월경이 없어집니다. 초경을 시작하지 않은 어린아이라면 초경이 늦어집니다. 호르몬 변화로 인해 뼈가 약해지고, 갑상샘 호르몬과 성장 호르몬도 영향을 받습니다.\\n
⑨ 심리적 변화
환자는 쉽게 초조해하고 우울감을 느끼며 자살 및 자해 충동을 느낍니다. 어떤 사람은 확인하는 버릇에 집착하는 강박 장애의 증상을 보입니다.\\n
⑩ 뇌 손상
영양이 오랫동안 부족해지면 뇌의 위축이 일어납니다. 이는 기분 조절의 이상, 집중력 저하, 기억력 저하 등과 같은 증상을 유발합니다.\\n\\n
각 질환에 대한 진단 기준에 따라 진단합니다.\\n
① 신경성 식욕 부진 등의 진단 기준(미국 정신과학협회)
- 연령과 키에 맞는 최소한의 정상 체중을 유지하기를 거부합니다.(정상 체중의 85% 이하)
- 표준 체중보다 체중이 적은데도 체중의 증가나 비만에 대해 지나친 두려움을 느낍니다. 
- 자신의 체중, 신체 크기, 외모를 왜곡하여 생각합니다.
- 초경을 한 여성의 경우, 적어도 3회 이상 연속적으로 월경을 하지 않습니다.\\n
② 신경성 폭식증의 진단 기준
- 반복되는 폭식 : 한 번에 많은 양의 음식을 빨리 섭취합니다. 폭식 행위에 대한 통제력이 부족합니다.
- 체중 증가를 예방하기 위해 반복하는 부적절한 행동 : 스스로 구토를 유도합니다. 완화제, 이뇨제, 기타 약물을 사용합니다. 굶거나 운동을 지나치게 합니다. 
- 최소한 3개월 동안 1주에 평균 두 차례 폭식하거나 부적절한 보상 행동을 합니다. 
- 신체형과 체중에 관한 관심이 지나치게 많습니다.
- 신경성 식욕 부진 삽화 동안 신경성 폭식증이 발생하지 않아야 합니다.\\n\\n
영양 상태에 문제가 있거나, 내과적인 합병증이 심하거나, 심각한 정신 장애가 동반되었다면 입원 치료해야 합니다. 천천히 체중을 증가시키기 위해 영양을 공급하고, 일정한 일과 활동을 확실히 정해주며, 매일 같은 시간에 식사하도록 합니다. 이를 통해 구조화되고 지지적인 환경을 조성합니다. 행동 수정 프로그램을 진행하여, 적어도 2시간 동안 환자를 관찰하며 식사 후 구토 여부를 확인합니다. 욕실 사용도 관찰합니다. 식사를 포함한 인지 치료, 자조 모임에 참여하도록 하여 사회적 활동을 격려합니다. 필요할 경우, 항우울제나 항불안 약물 등을 투여합니다.\\n',
'정신과','2020-10-17 (15:00)','60');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','유산',
'유산은 태아가 생존할 수 있는 단계인 임신 20주 이전에 죽는 현상을 말합니다. 유산은 전체 임신의 약 20~30%에 달합니다. 이 중에서 80% 이상이 처음 3개월 이전에 발생합니다. 그 이후에는 유산의 빈도가 급격히 감소합니다.\\n\\n
유산의 원인은 매우 다양할 수 있습니다. 태아에게 유전적 결함이 있거나, 태아가 외상을 입거나 탯줄에 묶여서 질식하면 유산될 수 있습니다. 산모의 급성 감염성 질환, 고혈압, 당뇨병, 전신성 홍반성 낭창, 갑상선 질환, 흡연, 습관성 음주, 영양실조, 자궁의 선천적 기형, 자궁근종, 골반염, 자궁 유착, 자궁경관무력증은 유산을 유발할 수 있습니다. 또한 인공 유산에 따른 후유증으로 자궁이나 자궁 경부에 이상이 있는 경우, 산모가 물리적 외상을 입은 경우, 심리적 요인으로 정신적 충격을 받거나 스트레스가 너무 심한 경우에도 유산이 발생할 수 있습니다. 분명한 원인 없이 유산이 일어나는 경우도 있습니다.\\n\\n
유산의 뚜렷한 증상은 자궁 출혈과 하복통입니다. 자궁 출혈은 붉은 빛깔이며 양이 많을 수 있습니다. 찌르는 듯한 하복통이 점차 강해지는 증상이 나타납니다. 배가 뻣뻣한 느낌이 지속되거나 간헐적으로 통증이 반복될 수 있습니다. 이러한 증상이 나타나면 병원을 방문하여 초음파 검사를 통해 태아의 건강 상태를 살펴보아야 합니다.\\n\\n
유산을 진단하기 위해서는 출혈 부위, 출혈량, 자궁 입구의 상태에 대해 진찰받아야 합니다. 또한 초음파 검사를 통해 임신낭, 난황, 태아 심박동 등을 정확히 확인하여 태아가 정상적으로 발육하는지 확인해야 합니다.\\n\\n
유산되면 자궁 내용물을 제거하는 소파술을 실시합니다. 자궁 속에 태반이나 다른 찌꺼기가 남아 있으면 자궁내막염이나 출혈의 위험성이 높아지므로, 수술을 통해 이를 배출합니다.\\n\\n
유산 후 자궁 속에 태반이나 다른 찌꺼기가 남아 있으면 자궁내막염이나 출혈의 위험성이 높아집니다. 따라서 빠른 시일 내에 소파술을 시행해야 합니다. 유산 후 몸 관리가 잘 안되면 향후 임신에도 지장을 줄 수 있으니 전문의와 상의하는 것이 바람직합니다.\\n',
'산부인과','2020-10-17 (15:00)','64');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','여성 불임증',
'불임은 부부가 피임하지 않고 1년 이상 정상적인 성관계를 하는데도 임신이 안 되는 경우를 말합니다. 불임 발생 빈도는 전체 가임 여성의 10~15% 정도입니다. 일반적으로 여성과 남성의 연령이 증가할수록 불임 가능성이 커집니다. 한 번도 정상적인 임신을 못한 경우를 원발성 불임이라고 하고, 이전에 한 번이라도 임신했던 경우를 속발성 불임이라고 합니다.\\n\\n
여성 불임의 가장 흔한 원인은 배란 장애입니다. 또한 난관, 복막이 원인이 될 수 있습니다. 예를 들어 난관이 막히거나 수종이 생겨 소통이 되지 않을 수 있습니다. 그 외에도 염증, 자궁경관의 점액 부족 등 자궁경관에 생긴 문제가 원인이 될 수도 있습니다. 마지막으로 여러 검사를 모두 마쳤는데도 원인을 찾지 못하는 경우, 즉 원인 불명인 경우도 있습니다.\\n\\n
부부가 피임하지 않고 1년 이상 성관계를 가졌는데도 임신이 되지 않으면 불임일 가능성이 큽니다. 이 경우에는 전문의를 찾아 원인을 알아내고 그에 맞는 치료 계획을 세우는 것이 바람직합니다. 기본적인 불임 검사로는 혈중 호르몬 검사, 난관 조영술, 초음파 검사, 배우자의 정액 검사 등이 있습니다.\\n\\n
- 치료\\n
특별한 치료 없이 임신을 기다려 볼 수 있습니다. 그러나 불임의 원인이 되는 일부 질환은 건강상의 다른 문제를 유발할 수 있습니다. 따라서 불임 부부가 당장 임신을 원하지 않는다고 하더라도 치료가 필요할 수 있습니다. 배란을 유도할 수 있고, 인공수정이나 시험관아기 시술 등을 시행할 수도 있습니다. 외과적 수술로 자궁내막증, 유착, 자궁근종, 자궁 기형 등을 치료하여 불임의 원인을 제거하고 임신을 시도하기도 합니다.\\n\\n
최근 환경 오염과 스트레스 등에 의해 불임 환자의 수가 점점 증가하는 추세입니다. 비만도 불임을 증가시키는 요인이 될 수 있습니다. 그러므로 각종 스트레스와 공해, 비만을 피하는 것이 좋습니다.\\n
불임 치료는 다른 치료에 비하여 힘들고 기약 없이 느껴지는 경우가 많습니다. 끈기와 희망을 갖고 전문의와 상의해야 합니다.\\n',
'산부인과','2020-10-17 (15:00)','58');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','자궁내막증',
'자궁내막증은 자궁내막 조직(자궁선과 기질)이 자궁 밖에 존재하여 질환을 유발하는 상태를 의미합니다. 자궁 밖에 위치한 이소성 자궁내막 세포는 각종 성호르몬에 대한 수용체를 가지고 있습니다. 월경 주기에 따라 병변에 국소적인 출혈, 염증 반응이 생겨 결국 섬유화, 유착 등이 발생하고, 이로 인한 통증과 불임증 등이 생깁니다.\\n\\n
자궁내막증을 유발하는 여러 가지 원인이 제시되었습니다. 그중에서 월경 시 난관으로 역행성 월경이 일어나고, 이에 따라 월경혈에 포함된 자궁내막 세포가 골반 내로 이동하여 이 질환이 발생한다는 가설이 가장 유력합니다.\\n\\n
자궁내막증에서 보이는 골반 통증의 특징은 월경 전에 시작되어 월경 기간 중 지속되는 월경통입니다. 평상시에도 요통과 복통이 있을 수 있으며, 성교통이 심할 수도 있습니다. 월경 전후 배변 이상, 설사, 배뇨 곤란, 광범위한 골반 통증 등의 비특이적 증상이 있을 수도 있습니다. 불임증이 발생할 수도 있습니다.\\n\\n
자궁내막증은 증상과 내진으로 의심할 수 있습니다. 확진을 위해서는 병변을 직접 육안으로 관찰하거나 조직 병변에 대한 조직학적 검사를 시행해야 합니다. 내진상 자궁은 직장 쪽으로 전위되며, 고정되어 있습니다. 자궁 천골 인대나 후질원개에 압통이 있는 결절이 촉진되기도 합니다.\\n
영상 검사로는 초음파 검사, 전산화 단층촬영(CT), 자기공명영상(MRI) 같은 검사들이 진단에 도움을 줄 수 있습니다. 혈액 검사로는 CA –125가 있습니다. 선별 검사로는 적절하지 않으나, 추적 검사로는 도움이 됩니다.\\n\\n
자궁내막증을 치료하기 전에 반드시 복강경으로 확진해야 합니다. 치료 방법은 내과적, 외과적 치료로 나눌 수 있습니다.\\n
① 내과적 치료
내과적 치료에는 진통제, 경구피임제, 황체호르몬, 다나졸, 성선자극호르몬 분비호르몬을 투여하는 방법이 있습니다.\\n
② 외과적 치료
외과적 치료법으로는 임신 및 가임력을 보존하기 위해 복강경 또는 개복술로 자궁내막증의 병소만을 제거하는 방법이 있습니다. 또한 근치적 수술(자궁 절제술 및 양측 난소난관 절제술)이 있습니다. 불임이 문제인 경우 보조 생식술을 시행해야 하는 경우도 있습니다.\\n
치료 방법은 환자의 상황에 따라 다양할 수 있으므로, 전문의와 상담 후 개개인에 맞는 치료 방침을 세워야 합니다.\\n',
'산부인과','2020-10-17 (15:00)','44');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','자궁경부암',
'자궁은 크게 두 부분으로 나뉘는데, 자궁의 약 4분의 3을 차지하는 몸 부분(체부)과 질로 연결되는 목 부분(경부)이 있습니다. 자궁경부암은 자궁의 목 부분인 자궁경부에 발생하는 암을 의미합니다.\\n\\n
자궁경부암의 원인으로 바이러스 감염, 특히 인유두종 바이러스(HPV : Human Papilloma Virus), 인간 면역 결핍 바이러스, 헤르페스 바이러스 감염 등이 거론됩니다. 이 중에서 인유두종 바이러스가 가장 유력한 요인으로 알려져 있습니다. 일찍 성관계를 시작한 경우, 성관계를 가진 사람이 여럿인 경우, 사회, 경제적 상태가 낮은 경우에 위험성이 증가합니다. 분만 횟수, 감염, 본인 및 배우자의 위생 상태, 흡연 등도 원인 인자로 작용합니다.\\n\\n
자궁경부암에 걸렸더라도 초기에는 아무런 증상이 없으므로, 정기적인 검진이 매우 중요합니다. 암이 진행되면 성관계 후 출혈, 월경 이외의 비정상적 출혈, 악취가 나는 분비물 또는 출혈성 분비물, 배뇨 곤란, 아랫배와 다리의 통증 등이 나타날 수 있습니다. 자궁경부암의 첫 증상은 주로 출혈이며, 이는 경미한 경우가 많습니다. 그러나 암이 상당히 진행된 경우에도 출혈이 없을 수 있습니다. 질 분비물 이상은 담홍색 피가 묻는 정도이며, 병이 진행되면 분비물에서 악취가 납니다. 또 암이 자궁경부의 앞뒤로 퍼지게 되면 방광과 직장에 불쾌한 느낌을 줄 수도 있습니다. 통증은 자궁경부암 말기에 나타나는 증상입니다.\\n\\n
자궁경부암이 의심되면 질확대경 검사를 통한 생검, 자궁경관 내 소파술, 자궁경부 원추생검 등을 시행하여 암세포의 존재 여부와 암세포의 침범 정도를 확인합니다. 배설성 요로 조영술, 방광경 검사, 복부와 골반의 자기공명영상(MRI) 검사를 시행하여 병기를 결정합니다. 경우에 따라서는 복부와 골반의 양전자 단층촬영(PET)이 필요하기도 합니다.\\n\\n
자궁경부 상피 내 암은 원추 절제술만 시행하고 자궁을 보존하기도 합니다. 자궁경부암 병기가  I,  IIA인 경우, 근치적 자궁 절제술, 골반 림프절 절제술을 시행하거나 방사선 치료를 시행합니다. IIB, III, IV 병기의 경우 방사선 치료와 항암제 치료를 시행합니다. 최근에는 가임력을 보존하기 위해 근치적 자궁경부 절제술을 하는 경우도 있습니다.\\n',
'산부인과','2020-10-17 (15:00)','35');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','성인병',
'대사 증후군은 여러 가지 신진대사(대사)와 관련된 질환이 동반된다(증후군)는 의미입니다. 고중성지방혈증, 낮은 고밀도콜레스테롤, 고혈압 및 당뇨병을 비롯한 당대사 이상 등 각종 성인병이 복부 비만과 함께 발생하는 질환을 의미합니다.\\n\\n
대사 증후군의 발병 원인은 명확하지 않습니다. 인슐린 저항성(insulin resistance)이 근본적인 문제라고 추정됩니다. 인슐린 저항성은 혈당을 낮추는 호르몬인 인슐린에 대한 신체의 반응이 감소함으로써, 근육 및 지방세포가 포도당을 잘 섭취하지 못하게 되고, 이를 해결하고자 더욱 많은 인슐린이 분비되어 여러 문제를 유발하는 것을 의미합니다.\\n
복강 내의 내장지방은 대사적으로 매우 활발하게 활동하며 여러 물질을 분비합니다. 이러한 물질은 혈압을 올리고 혈당 조절 호르몬인 인슐린의 역할을 방해합니다. 이는 고인슐린혈증, 인슐린 저항성, 혈당 상승을 초래합니다. 당뇨병과 심혈관 질환의 발생 위험성을 높이고, 혈관 내 염증과 응고를 유도하여 동맥경화를 유발합니다. 이렇게 유발된 고혈압, 당뇨병, 고인슐린혈증은 심혈관 질환이 발생할 위험성을 높입니다.\\n\\n
대상 증후군의 주요 증상으로는 복부 비만이 있습니다. 이외에는 별다른 증상이 나타나지 않지만, 그 구성 요소나 합병증으로 인한 증상이 나타나기도 합니다.\\n\\n
아래의 기준 중 세 가지 이상에 해당하는 경우에 대사 증후군으로 진단합니다.\\n
① 허리둘레 : 남자 90cm, 여자 80cm 이상
② 중성지방 : 150mg/dL 이상
③ 고밀도 지방 : 남자 40mg/dL 미만, 여자 50 mg/dL 미만
④ 혈압 : 130/85 mmHg 이상, 혹은 고혈압약 투약 중
⑤ 공복 혈당 : 100mg/L 이상, 혹은 혈당조절약 투약 중\\n\\n
대사 증후군을 치료하기 위해서는 체지방, 특히 내장지방을 줄이는 것이 가장 중요합니다. 이를 위해서는 적절한 식사 조절과 규칙적이고 꾸준한 운동이 필요합니다. 대사 증후군을 구성하는 질환은 생활습관병입니다. 균형 잡힌 식사, 규칙적인 운동과 금연, 절주 등으로 건강한 생활습관을 유지한다면, 대사 증후군을 치료하고 이로 인한 합병증을 예방하여 건강한 삶을 유지할 수 있습니다.\\n\\n
대사 증후군이 있는 환자의 고지혈증, 고혈압, 혈당 상태가 생활습관을 개선한 후에도 목표치에 도달하지 않는 경우, 치료 원칙에 따라 각 질환에 대한 적절한 투약을 시행해야 합니다. 많은 환자가 투약을 받는다는 것에 거부감을 느낍니다. 하지만 충분하게 생활습관이 개선되었음에도 건강 상태가 바람직해지지 않는다면, 마땅히 현대 의학에서 검증을 거친 약물치료를 받아야 합니다.\\n',
'생활건강','2020-10-17 (15:00)','63');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','고혈압',
'고혈압은 혈압이 여러 원인으로 인해 높아진 상태를 의미합니다. 혈압은 동맥혈관 벽에 대항한 혈액의 압력을 말합니다. 혈액의 압력은 심장이 수축하여 동맥혈관으로 혈액을 보낼 때 가장 높은데, 이때의 혈압을 수축기 혈압이라고 합니다. 또한 심장이 늘어나서 혈액을 받아들일 때 가장 낮은데, 이때의 혈압을 이완기 혈압이라고 합니다. 우리나라 성인 인구의 약 30%가 이러한 혈압이 높아진 증상인 고혈압이 있는 것으로 추정됩니다.\\n
다음은 대한고혈압학회와 미국심장학회의 혈압의 기준입니다.\\n
① 정상 혈압 : 수축기 혈압 120mmHg 미만, 확장기 혈압 80mmHg 미만
② 고혈압 전 단계 : 수축기 혈압 120~139mmHg이거나, 확장기 혈압 80~89mmHg
③ 1기 고혈압(경도 고혈압) : 수축기 혈압 140~159mmHg이거나, 확장기 혈압 90~99mmHg
④ 2기 고혈압(중등도 이상 고혈압) : 수축기 혈압 160mmHg 이상이거나, 확장기 혈압 100mmHg 이상\\n\\n
고혈압은 교감 신경에 의한 신경성 요인 및 레닌-안지오텐신 기전에 의한 체액성 요인에 의해 발생합니다. 그러나 유전, 흡연, 남성, 노령화는 고혈압의 유발을 촉진하는 요인입니다.\\n
고혈압의 90% 이상은 본태성으로 원인을 알 수 없는 경우가 대부분입니다. 나머지 5~10%는 원인이 명확한 이차성 고혈압에 해당합니다. 고혈압의 대부분을 차지하는 본태성 고혈압은 한 가지 원인에 의해 유발되지 않습니다. 여러 가지 요인이 모여서 고혈압을 일으키는데, 이 중에는 유전적인 요인(가족력)이 가장 흔하며, 그 외에 노화, 비만, 짜게 먹는 습관, 운동 부족, 스트레스 등이 있습니다.\\n
고혈압을 유발하는 요인을 정리하면 다음과 같습니다.\\n
① 심혈관 질환의 가족력(유전)
② 흡연
③ 고지혈증
④ 당뇨병
⑤ 60세 이후 노년층
⑥ 성별(남성과 폐경 이후 여성)
⑦ 식사성 요인 : Na, 지방 및 알코올의 과잉 섭취, K, Mg, Ca의 섭취 부족
⑧ 약물 요인 : 경구 피임약, 제산제, 항염제, 식욕억제제\\n\\n
고혈압은 뚜렷한 증상이 없어 신체검사나 진찰 중에 우연히 발견되는 경우가 적지 않습니다. 고혈압은 ‘소리 없는 죽음의 악마’라고 할 정도로 증상이 없는 경우가 대부분입니다. 간혹 증상이 있어서 병원을 찾는 경우는 두통이나 어지러움, 심계항진, 피로감 등의 혈압 상승에 의한 증상을 호소합니다. 코피나 혈뇨, 시력 저하, 뇌혈관 장애 증상, 협심증 등 고혈압성 혈관 질환에 의한 증상을 호소하기도 합니다. 이차성 고혈압의 경우 종종 원인 질환의 증상을 호소합니다.\\n
두통이 있는 경우에도 혈압이 올라갈 수 있습니다. 그런데 대부분의 경우 혈압 때문에 두통이 생기지 않고 두통 때문에 혈압이 올라갑니다. 따라서 두통이 있으면 혈압보다 두통을 먼저 조절해야 합니다.\\n
흔히 목덜미가 뻣뻣하면 혈압이 높다고 생각하는 경우가 많습니다. 그러나 과도한 스트레스로 인해 목이 뻣뻣해지고 그로 인해 혈압이 올라갈 수 있습니다. 따라서 목이 뻣뻣할 때는 다른 이유를 먼저 고려해야 합니다.\\n\\n
혈압을 1회만 측정하여 고혈압을 진단하는 것은 바람직하지 않습니다. 처음 측정한 혈압이 높은 경우에는 1일 간격을 두고 최소한 두 번 더 측정합니다. 그 결과 이완기 혈압 90mmHg 이상 또는 수축기 혈압 140mmHg 이상이면 고혈압으로 진단합니다.\\n
혈압을 측정할 때는 앉은 자세에서 5분 이상 안정을 취한 후 왼쪽 팔을 걷고 심장 높이에 두고 측정해야 합니다. 측정 전 30분 이내에 담배나 카페인 섭취를 피해야 합니다. 혈압은 2분 간격으로 2회 이상 측정하여 평균치를 구하는데, 2회의 기록이 5mmHg 이상 차이가 나면 한 번 더 측정합니다. 고혈압을 진단하는 가장 정확한 방법은 24시간 보행 혈압 감시 검사를 시행하는 것입니다. 24시간 평균 수축기 혈압이 수축기 135mmHg 이상이거나, 24시간 평균 이완기 혈압이 95mmHg 이상이면 고혈압으로 진단합니다.\\n
젊은 나이에 고혈압으로 진단받는다면 이차성 고혈압을 배제하는 것이 중요합니다. 갑상선 기능 항진증, 쿠싱병, 갈색세포종과 같은 내분비 질환을 확인하기 위해 특수 혈액 검사가 필요합니다. 또한 신혈관 이상, 부신 종양, 부신 비대 등을 감별하기 위해 부신 CT 검사나 복부 초음파를 시행하는 것이 중요합니다. 이차성 고혈압의 경우 원인 질환을 치료하면 완치될 수 있으므로 반드시 원인 질환을 감별해야 합니다.\\n
고혈압 환자로 의심되면 소변검사, 혈색소 검사(hematocrit), 혈당치, 혈청 전해질(Ca, K), 요산, 콜레스테롤, 중성지방, 심전도, 흉부 X-선 검사를 기본적으로 시행합니다. 또한 부종 여부를 알아내기 위해 신장 기능을 검사하고 몸무게를 측정합니다. 고혈압의 정도 및 예후를 평가하기 위해 안저 검사가 중요합니다.\\n\\n
최근에는 고혈압을 치료하기 위해 비약물적 요법과 약물적 요법을 함께 실시합니다. 고혈압 전 단계에서는 체중 조절, 식사 요법, 행동 수정, 규칙적인 운동 실시 등의 비약물적 요법을 먼저 시행하는 것을 권장합니다. 그러나 고혈압으로 진단받으면 반드시 약물을 이용해 혈압을 정상으로 조절해야 합니다. 흡연은 심혈관계 질환의 주요 위험 인자이므로, 금연을 권장합니다.\\n\\n
고혈압은 합병증이 생기기 전에는 별 증상이 나타나지 않는 경우가 대부분입니다. 다만 머리가 무겁거나 숨이 차는 증상, 두통, 이명, 현기증 등의 증상이 나타날 수 있습니다.\\n
고혈압이 지속되면 인체 기관에 손상을 일으키거나 관상동맥 및 뇌의 혈관 등에 죽상경화를 유발하여 합병증이 일어날 수 있습니다. 고혈압의 합병증으로는 심부전, 협심증, 심근경색 등의 심장 증세, 신경화, 신부전, 요독증 등의 신장 증세, 시력 저하, 뇌출혈, 뇌졸중, 혼수 등의 뇌신경 증상 등이 있습니다.\\n
① 뇌혈관 질환
고혈압의 가장 심각한 합병증은 뇌출혈입니다. 이는 고혈압으로 인해 미세한 뇌 동맥이 파열됨으로써 피가 뇌 조직을 손상시켜 일어나는 현상입니다. 뇌출혈이 발생하면 심한 두통과 함께 의식의 혼미해지는 증상이 나타납니다.
고혈압이 뇌출혈을 유발하여 뇌졸중이 발생하면 반신불수, 언어 장애, 기억력 상실, 치매 등이 나타납니다. 뇌졸중 환자의 약 80%에게서 고혈압이 나타나므로, 뇌졸중을 예방하기 위해서는 고혈압 치료가 매우 중요합니다.\\n
② 심부전증
고혈압이 지속되면 심장 근육이 비대해지고 기능이 저하됩니다. 그 결과 운동할 때 호흡 곤란을 느끼고, 심지어는 휴식할 때에도 숨쉬기가 어려워지며 부정맥이 나타나기도 합니다. 또한 발이나 폐에 부종이 생기기도 합니다.\\n
③ 관상동맥 질환
고혈압은 흡연, 고지혈증과 함께 동맥경화증의 3대 발생 위험 인자로 꼽힙니다. 혈관이 고혈압 때문에 손상되면, 백혈구 및 혈소판 등이 손상 부위를 치료하기 위해 반응하여 동맥경화를 유발합니다.\\n
④ 신장 질환
고혈압을 치료하지 않고 방치하면 초기에는 단백뇨 등의 증상이 나타납니다. 점차 악화되면 신경화증, 신부전증, 요독증 등의 만성 신부전이 발생합니다.\\n
⑤ 기타
고혈압은 그 외에도 흉부 또는 복부에 동맥류를 유발하거나 말초동맥 질환 및 망막병을 유발할 수 있습니다.\\n\\n
고혈압 환자는 대부분 복합적인 위험 요소를 지니고 있으므로, 고혈압에서 식사의 역할에는 아직 논란이 있습니다. 그러나 식사 요법은 고혈압 관리에 매우 중요합니다.\\n
고혈압 환자는 우선 체중 조절, 염분 섭취 제한, 알코올 섭취 제한 등 생활습관을 교정하도록 노력해야 합니다. 특히 체중 조절이 가장 중요합니다. 과체중이나 비만 환자의 경우에는 저열량식을 시행하여 체중을 감량해야 합니다. 이로써 심혈관계 위험 인자를 줄이고 약물 요법의 강압 효과를 증가시킬 수 있습니다. 다만 섭취 열량을 제한하면 단백질 섭취가 제한될 수 있습니다. 신장 기능이 정상으로 유지되는 한 체중 kg당 1~1.5g의 양질의 단백질을 충분히 공급해야 합니다.\\n
과도한 알코올 섭취는 고혈압 및 뇌졸중의 중요한 위험 인자이며, 약물 요법의 효과를 약화시키므로 피해야 합니다. 또한 칼슘 섭취량을 증가시키고, 섬유소와 불포화지방산의 섭취 비율을 증가시키며, 카페인을 적절히 제한하도록 권장합니다.\\n',
'생활건강','2020-10-17 (15:00)','6');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','거북목 증후군',
'거북목 증후군은 잘못된 자세로 인해 목, 어깨의 근육과 인대가 늘어나 통증이 생기는 증상을 의미합니다. 평소 컴퓨터 모니터를 많이 보는 사람, 특히 낮은 위치에 있는 모니터를 내려다보는 사람에게 많이 발생합니다. 거북이가 목을 뺀 상태와 비슷하다 하여 거북목 증후군이라는 이름이 붙여졌습니다.\\n\\n
거북목 증후군의 가장 큰 원인은 눈높이보다 낮은 컴퓨터 모니터를 장시간 같은 자세로 내려다보는 것입니다. 처음에는 모니터를 똑바로 쳐다보다가도 점차 고개가 숙여지면서 목이 길어집니다. 이렇게 머리가 앞으로, 또 아래로 향하는 자세가 계속되면, 목과 어깨의 근육뿐만 아니라 척추에도 무리가 생겨 통증이 발생합니다. 그리고 허리가 구부러지고 눈은 위로 치켜뜬 상태가 됩니다. 이런 자세가 반복되면 근육이나 뼈가 자동으로 굳어지고 통증이 생깁니다. 책을 보는 자세에서도 유발될 수 있으니 유의해야 합니다.\\n\\n
대표적인 증상은 목덜미와 어깨가 뻐근하고 아픈 것입니다. 또 어깨 근육이 많이 뭉치고 두통이 생기며 쉽게 피곤해집니다. 작업 능률과 학습 능률이 떨어지고, 신경질이 나고 과민해집니다. 팔의 저림도 나타날 수 있습니다. 드물지만 불면증이나 어지럼증이 나타나기도 합니다.\\n\\n
거북목 증후군의 자가 체크리스트\\n
① 어깨와 목 주위가 자주 뻐근하다.
② 옆에서 보면 고개가 어깨보다 앞으로 빠져나와 있다.
③ 등이 굽어 있다.
④ 쉽게 피로하고 두통이 있으며 어지럼증을 느낀다.
⑤ 잠을 자도 피곤하고 목덜미가 불편하다\\n\\n
증상이 심한 경우 전문 기관에서 전문가와 상의한 후 전문 장비와 기구를 이용해 교정 운동을 해야 합니다. 보통 3개월 이상 치료해야 자세가 교정됩니다. 거북목 증후군의 원인을 바로 알고 일상생활에서 자세를 바르게 하려고 노력해야 합니다.\\n\\n
거북목 증후군은 거북등 증후군으로 발전할 가능성이 큽니다. 거북등 증후군은 등이 거북이처럼 구부정하게 딱딱하게 굳어져 통증이 발생하는 증상을 말합니다. 컴퓨터로 작업할 때 구부정하게 앉는 자세는 S자형의 척추를 일자형으로 만들어 여러 가지 문제를 일으킬 수 있습니다.\\n\\n
장시간 동안 같은 자세로 컴퓨터 작업을 하면 목과 어깨 근육이 뭉쳐 통증이 생기기 쉽습니다. 이를 방지하기 위해서 어깨와 가슴을 바르게 펴고 모니터를 눈높이까지 올려 맞춥니다. 그러면 고개를 숙이지 않아도 되어서 훨씬 편하게 모니터를 볼 수 있습니다. 이는 목과 어깨의 긴장을 이완하는 데 많이 도움이 됩니다.\\n
또한 한 시간에 한 번씩 5~10분 정도 서 있거나 가볍게 걸으면서 목과 어깨 스트레칭을 해야 합니다. 이는 거북목 증후군뿐만 아니라 VDT 증후군(영상표시 단말기 증후군, 컴퓨터 단말기 증후군)을 예방하는 중요한 방법입니다. VDT 증후군은 장기간 모니터 작업을 하면서 모니터에서 발생하는 전자파나 방사선 등에 노출되어 눈의 피로, 어깨와 목의 결림, 구토 등 육체적, 정신적 장애가 발생하는 것을 말합니다.\\n
거북목 증후군을 예방하기 위해서는 평소 생활에서 올바른 자세를 유지하는 것이 중요합니다.\\n',
'생활건강','2020-10-17 (15:00)','68');
INSERT INTO `health_info` (`id`,`subject`,`content`,`category`,`regist_day`,`hit`) VALUES ('admin','손목 터널 증후군',
'손목 부위에는 손가락을 움직이는 힘줄과 신경이 지나가며, 이를 둘러싸고 보호하는 일종의 관(터널)이 있습니다. 손목 수근관 증후군은 손으로 들어가는 신경(정중신경)이 손가락을 움직이는 힘줄인 수근관(손목 터널)에 눌려 압박을 받아 손 저림, 감각 저하 등의 증상이 나타나는 질환을 의미합니다.\\n\\n
이론적으로는 수근관의 단면을 감소시킬 수 있는 모든 것이 원인이 됩니다. 하지만 손목 수근관 증후군의 정확한 원인은 확인되지 않았습니다. 이 증후군은 중년 이후의 여성, 비만인 사람, 노인, 당뇨병 환자에게 흔하게 발생합니다. 임신 중에 이 증후군이 일시적으로 나타나기도 합니다. 만성 신부전으로 투석을 받는 환자에게서도 흔하게 발생합니다. 최근에는 손을 많이 사용하는 주부, 미용사, 피부관리사, 스마트폰이나 컴퓨터를 자주 사용하는 직장인에게 많이 발생합니다.\\n\\n
손목 수근관 증후군의 증상은 다음과 같습니다. 근육이 마를 정도로 마비가 진행되면 수술 후에도 완전히 회복하기 어려울 수도 있습니다.\\n
① 엄지와 2, 3, 4 손가락 일부가 저립니다.
② 새끼손가락에는 저린 증상이 없습니다.
③ 주로 야간에 증상이 심하게 나타납니다.
④ 손가락이 화끈거리는 느낌이 듭니다.
⑤ 물건을 들다가 자주 떨어뜨립니다.
⑥ 아침에 일어났을 때 손이 굳거나 경련이 있습니다.
⑦ 팔을 올렸을 때 팔목에서 통증이 발생합니다.
⑧ 팔, 어깨, 목까지 통증이 발생하기도 합니다.\\n\\n
손목 수근관 증후군 환자는 이 증상을 대부분 혈액 순환 장애 등과 같은 다른 문제로 생각하기 때문에 치료 시기가 지연되는 경우가 많습니다. 손목 수근관 증후군은 비슷한 증상을 호소하는 여러 질환과 감별해야 하므로 전문의의 진단이 필요합니다. 신경 검사를 시행하여 더욱 확실하게 진단을 내릴 수 있습니다. 목 디스크 등의 다른 질환과 감별하기 위하여 방사선 검사를 시행할 수도 있습니다. 그러한 검사로는 신경 타진 검사, 수근 굴곡 검사, 전기적 검사 등이 있습니다.\\n
① 신경 타진 검사
정중 신경이 지나가는 손목의 신경을 손가락으로 눌렀을 때, 정중 신경의 지배 영역에 이상 감각이나 통증이 유발되는지 검사합니다.\\n
② 수근 굴곡 검사
손바닥을 안쪽으로 향하여 손목을 약 1분 동안 심하게 꺾었을 때, 정중 신경의 지배 영역에 통증과 이상 감각이 나타나거나 심해지는지 검사합니다.\\n
③ 전기적 검사
무지구 근육(엄지손가락 밑부분의 불룩한 부분)에서 근전도의 이상이 있는지, 손목에서 신경 전달 속도의 지연이 있는지를 검사합니다.\\n\\n
손목 수근관 증후군의 치료는 비수술적 치료와 수술적 치료로 구분됩니다.\\n
① 비수술적 치료
증상이 가볍고 근육 위축이 없는 일부 환자에게 가능한 치료입니다. 그 종류는 다음과 같습니다.
- 소염진통제 등을 이용한 약물 치료
- 보조기나 부목을 이용한 고정 치료
- 수근관 내 스테로이드 주사 치료\\n
② 수술적 치료
정중 신경을 압박하는 인대를 잘라 줍니다. 수술의 소요 시간은 대개 30분 이내입니다. 과거에는 손목 전체의 피부를 절개하는 방법을 주로 사용했지만, 최근에는 관절경이나 특수 기구 등을 이용하여 아주 작은 피부 절개만으로도 수술이 가능해졌습니다. 수술 후 통증의 발생 빈도가 감소하였습니다.\\n
③ 수술 적용 대상
- 증상이 일상생활을 방해하거나 보존적 치료에 반응하지 않는 환자
- 지속적이거나 점진적인 신경 장애, 운동 기능의 악화를 경험하는 환자
- 통증이 심해지거나 약해지는 증상이 동반되는 환자
- 다른 원인에 의한 압박(류마티스 관절염 등)을 겪는 환자
- 손목 손상 후 발생한 급성 증상(즉각 적용 대상 등)이 있는 환자\\n\\n
수술 치료를 받으면, 저린 감각과 야간에 잠에서 깨던 일은 곧 사라집니다. 다만 회복 속도는 환자에 따라 다르며, 점진적으로 회복이 이루어집니다. 수근관 증후군을 오랫동안 앓아 왔거나 근육의 위축이 심하다면 회복이 더욱 느려집니다. 때로는 일부 증상이 남기도 합니다. 하지만 증상이 아무리 심하더라도 어느 정도 회복되는 것이 일반적입니다. 수술을 받은 환자의 95% 이상이 만족할 만한 결과를 얻습니다.\\n',
'생활건강','2020-10-17 (15:00)','55');
              END";
            break;

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
