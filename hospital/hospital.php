<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>토닥토닥</title>
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/hospital/css/hospital.css">
		<script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/hospital/js/hospital.js" defer></script>
	</head>

	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
		</header>
		<section>
						<form method="post">
							<input type="submit" name="load_data" value="데이터 받아오기">
						</form>
            <?php
                include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
                if (isset($_POST['keyword'])) $keyword = $_POST['keyword'];
                else $keyword = null;

                // ==================api 데이터 받아오기=====================================관리자 페이지로 옮기기
                if (isset($_POST['load_data'])) api_load($con);
                function api_load($con)
                {
                    @set_time_limit(0);
                    $ch = curl_init();
                    $url = 'http://apis.data.go.kr/B552657/HsptlAsembySearchService/getHsptlMdcncListInfoInqire'; /*URL*/
                    $queryParams = '?' . urlencode('ServiceKey') . '=r5SONxjKf67vRjWSB5VkCHjhlvpWtAAcXV8IEJumquZL3SfuS9eazbphf2%2BSprq0iO6PVT1MVcC70enAwCeLOA%3D%3D'; /*Service Key*/
                    //                $queryParams .= '&' . urlencode('Q0') . '=' . urlencode('서울특별시'); /**/
                    //                $queryParams .= '&' . urlencode('Q1') . '=' . urlencode('강남구'); /**/
                    $queryParams .= '&' . urlencode('QZ') . '=' . urlencode('B'); /**/
                    //                $queryParams .= '&' . urlencode('QD') . '=' . urlencode('D001'); /**/
                    //                $queryParams .= '&' . urlencode('QT') . '=' . urlencode('1'); /**/
                    //                $queryParams .= '&' . urlencode('QN') . '=' . urlencode('삼성병원'); /**/
                    //                $queryParams .= '&' . urlencode('ORD') . '=' . urlencode('NAME'); /**/
                    //                $queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
                    $queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('1'); /**/


                    curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

                    $response = curl_exec($ch);
                    curl_close($ch);


                    $object = simplexml_load_string($response);
                    $total_count = $object->body->totalCount;

                    $ch = curl_init();
                    $url = 'http://apis.data.go.kr/B552657/HsptlAsembySearchService/getHsptlMdcncListInfoInqire'; /*URL*/
                    $queryParams = '?' . urlencode('ServiceKey') . '=r5SONxjKf67vRjWSB5VkCHjhlvpWtAAcXV8IEJumquZL3SfuS9eazbphf2%2BSprq0iO6PVT1MVcC70enAwCeLOA%3D%3D'; /*Service Key*/
                    $queryParams .= '&' . urlencode('QZ') . '=' . urlencode('B'); /**/
                    $queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode($total_count); /**/
                    curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    $response = curl_exec($ch);
                    curl_close($ch);

                    $object = simplexml_load_string($response);
                    $items = $object->body->items->item;
                    //                var_dump($items);

                    foreach ($items as $item) {
                        $query = "select EXISTS (select * from hospital where id='$item->hpid') as success;";

                        $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        $row = mysqli_fetch_row($result);
                        if ($row[0] !== '1') {
                            $query = "insert into hospital (id,name,addr,tel,mon,tue,wed,thu,fri,sat,sun,holiday,mapx,mapy,map_description) ";
                            $query .= "values('$item->hpid','$item->dutyName','$item->dutyAddr','$item->dutyTel1',";
                            $query .= "'$item->dutyTime1s~$item->dutyTime1c','$item->dutyTime2s~$item->dutyTime2c',";
                            $query .= "'$item->dutyTime3s~$item->dutyTime3c','$item->dutyTime4s~$item->dutyTime4c',";
                            $query .= "'$item->dutyTime5s~$item->dutyTime5c','$item->dutyTime6s~$item->dutyTime6c',";
                            $query .= "'$item->dutyTime7s~$item->dutyTime7c','$item->dutyTime8s~$item->dutyTime8c',";
                            $query .= "'$item->wgs84Lon','$item->wgs84Lat','$item->dutyMapimg');";
                            $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        }
                    }
                    $hpid = $con->query("select id from hospital;");
                    while ($row = mysqli_fetch_row($hpid)) {
                        $query = "select EXISTS (select department from hospital where id='$item->hpid') as success;";

                        $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        $row = mysqli_fetch_row($result);
                        if ($row[0] !== '1') {
                            $ch = curl_init();
                            $url = 'http://apis.data.go.kr/B552657/HsptlAsembySearchService/getHsptlBassInfoInqire'; /*URL*/
                            $queryParams = '?' . urlencode('ServiceKey') . '=r5SONxjKf67vRjWSB5VkCHjhlvpWtAAcXV8IEJumquZL3SfuS9eazbphf2%2BSprq0iO6PVT1MVcC70enAwCeLOA%3D%3D'; /*Service Key*/
                            $queryParams .= '&' . urlencode('HPID') . '=' . urlencode($row[0]);
                            curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                            $response = curl_exec($ch);
                            curl_close($ch);

                            $object = simplexml_load_string($response);
                            $items = $object->body->items->item;

                            $query = "update hospital set department='$items->dgidIdName' where id='{$row[0]}'; ";
                            $result = mysqli_query($con, $query) or die(mysqli_error($con));
                        }
                    }
                }

            ?>
			<div class="container">
				<h1>병원 찾기</h1>
				<div class="menu">
					<div>위치별</div>
				</div>
				<div class="select_box">
					<select id="h_area1" name="h_area1" onChange="cat1_change(this.value,h_area2)">
						<option value="none">전체</option>
<!--                        --><?php
//                            if (isset($keyword)) { ?>
<!--								<option value='1' value2='서울특별시'>서울특별시</option>;-->
<!--                                --><?php
//                            } else {
//                                ?>
<!--								<option value='1' value2='서울특별시' selected>서울특별시</option>-->
<!--                            --><?php //} ?>
						<option value='1' value2='서울특별시'>서울특별시</option>;
						<option value='2' value2="부산광역시">부산광역시</option>
						<option value='3' value2="대구광역시">대구광역시</option>
						<option value='4' value2="인천광역시">인천광역시</option>
						<option value='5' value2="광주광역시">광주광역시</option>
						<option value='6' value2="대전광역시">대전광역시</option>
						<option value='7' value2="울산광역시">울산광역시</option>
						<option value='8' value2="강원도">강원도</option>
						<option value='9' value2="경기도">경기도</option>
						<option value='10' value2="경상남도">경상남도</option>
						<option value='11' value2="경상북도">경상북도</option>
						<option value='12' value2="전라남도">전라남도</option>
						<option value='13' value2="전라북도">전라북도</option>
						<option value='14' value2="제주특별자치도">제주특별자치도</option>
						<option value='15' value2="충청남도">충청남도</option>
						<option value='16' value2="충청북도">충청북도</option>
					</select>
					<select id="h_area2" name="h_area2">
						<option value="" selected>전체</option>
						<option value="강남구">강남구</option>
						<option value="강동구">강동구</option>
						<option value="강북구">강북구</option>
						<option value="강서구">강서구</option>
						<option value="관악구">관악구</option>
						<option value="광진구">광진구</option>
						<option value="구로구">구로구</option>
						<option value="금천구">금천구</option>
						<option value="노원구">노원구</option>
						<option value="도봉구">도봉구</option>
						<option value="동대문">동대문구</option>
						<option value="동작구">동작구</option>
						<option value="마포구">마포구</option>
						<option value="서대문구">서대문구</option>
						<option value="서초구">서초구</option>
						<option value="성동구">성동구</option>
						<option value="성북구">성북구</option>
						<option value="송파구">송파구</option>
						<option value="양천구">양천구</option>
						<option value="영등포구">영등포구</option>
						<option value="용산구">용산구</option>
						<option value="은평구">은평구</option>
						<option value="종로구">종로구</option>
						<option value="중구">중구</option>
						<option value="중랑구">중랑구</option>
					</select>
                    <?php
                        if (isset($keyword)) { ?>
							<input type='text' value='<?=$keyword?>' name='search' id='search'>
                            <?php
                        } else {
                            ?>
							<input type='text' placeholder='검색어를 입력하세요' name='search' id='search'>
                        <?php } ?>
					<span id="btn">확인</span>
				</div>

				<div class="hospital_list">
					<ul>
                        <?php
                            if (isset($keyword)) include "hospital_list.php";?>
					</ul>
				</div>
			</div>
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
		</footer>
	</body>

</html>