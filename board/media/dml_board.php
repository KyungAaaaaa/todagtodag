<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";

create_table($con, 'media');

if (isset($_GET["mode"]) && $_GET["mode"] === "insert") {
    $userid = $_GET["id"];
    $username = $_GET["name"];

    if (!$userid) {
        echo ("
      <script>
      alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
      history.go(-1)
      </script>    
      ");
        exit;
    }
    
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    // $subject = htmlspecialchars($subject, ENT_QUOTES);
    // $content = htmlspecialchars($content, ENT_QUOTES);
    $subject = test_input($subject);
    $content = test_input($content);

    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
    $video_name=$_POST["video_name"];
    // $video_name = substr($video_name, -11);
    $video_name=explode("=", $video_name);
    $video_name[1] = explode("&", $video_name[1]);
    // echo "<script>alert('{$video_name[1][0]}');</script>";
    
    $sql = "INSERT INTO `media` VALUES (null, '$userid', '$username', '$subject', '$content', '$regist_day', 0, '{$video_name[1]['0']}');";
    $result = mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }

    mysqli_close($con);                // DB 연결 끊기

    echo "
	   <script>
	    location.href = 'media_list.php';
	   </script>
	";
} else if (isset($_GET["mode"]) && $_GET["mode"] === "modify") {
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];

    $sql = "update media set subject='$subject', content='$content' ";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);
    
    mysqli_close($con);

    echo "
	      <script>
	          location.href = 'media_list.php?page=$page';
	      </script>
      ";
} else if (isset($_GET["mode"]) && $_GET["mode"] === "delete") {
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $sql = "select * from media where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $sql = "delete from media where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'media_list.php?page=$page';
	     </script>
	   ";
}
