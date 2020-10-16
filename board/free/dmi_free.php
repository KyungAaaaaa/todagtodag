<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";

create_table($con, 'free');
create_table($con, 'free_ripple');

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
    $hit = 0;
    // $subject = htmlspecialchars($subject, ENT_QUOTES);
    // $content = htmlspecialchars($content, ENT_QUOTES);
    $subject = test_input($subject);
    $content = test_input($content);

    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    $upload_dir = "./data/";
    $upfile = $_FILES['upfile'];
    $upfile_name     = $_FILES["upfile"]["name"];
    $upfile_tmp_name = $_FILES["upfile"]["tmp_name"]; // 임시파일명
    $upfile_type     = $_FILES["upfile"]["type"];
    $upfile_size     = $_FILES["upfile"]["size"];  // 안되면 php init 에서 최대 크기 수정!
    $upfile_error    = $_FILES["upfile"]["error"];
  
    if ($upfile_name && !$upfile_error) { // 업로드가 잘되었는지 판단
        $file = explode(".", $upfile_name); // trim과 같다. (memo.sql)
        // $file_name = iconv("utf-8", "CP949", $file_name);
        $file_name = $file[0]; //(memo)
        $file_ext  = $file[1]; //(sql)

        $new_file_name = date("Y_m_d_H_i_s");
        $new_file_name = $new_file_name . "_" . $file_name;
        $copied_file_name = $new_file_name . "." . $file_ext; // 2020_09_23_11_10_20_memo.sql
        $uploaded_file = $upload_dir . $copied_file_name; // ./data/2020_09_23_11_10_20_memo.sql 다 합친것

        $type = explode("/", $upfile_type);
    
            if ($type[0] == 'image') {
                switch ($type[1]) {
                    case 'gif':
                    case 'jpg':
                    case 'png':
                    case 'jpeg':
                    case 'pjpeg':
                        break;
                    default:
                        alert_back('3. gif jpg png 확장자가아닙니다.');
                }
                //6 업로드된 파일사이즈(2mb)를 체크해서 넘어버리면 돌려보낸다.
                if ($upfile_size > 2000000) {
                    alert_back('2. 이미지파일사이즈가 2MB이상입니다.');
                }
            } else {
                //5 업로드된 파일사이즈(500kb)를 체크해서 넘어버리면 돌려보낸다.
                if ($upfile_size > 500000) {
                    alert_back('2. 파일사이즈가 500KB이상입니다.');
                }
            }
            if(!move_uploaded_file($upfile_tmp_name, $uploaded_file)){
                alert_back('4. 서버 전송에러!!');
              }
              $upfile_type = $type[0];
    } else {
        $upfile_name      = "";
        $upfile_type      = "";
        $copied_file_name = "";
    }

    // $upfile_name = iconv("utf-8","cp949",$upfile_name);
    // $upfile_name = iconv("utf-8","euc-kr",$upfile_name);

    $sql = "insert into free (id, name, subject, content, regist_day, hit,  file_name_0, file_type_0, file_copied_0) ";
    $sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day', 0, ";
    $sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

    // echo "<script>alert('{$upfile_name}');</script>";
    mysqli_close($con);                // DB 연결 끊기

    echo "
	   <script>
	    location.href = 'free_list.php?hit=$hit';
	   </script>
	";
} else if (isset($_GET["mode"]) && $_GET["mode"] === "modify") {
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];

    if (isset($_FILES["upfile"])) {
        $upload_dir = "./data/";

        $upfile_name     = $_FILES["upfile"]["name"];
        $upfile_tmp_name = $_FILES["upfile"]["tmp_name"]; // 임시파일명
        $upfile_type     = $_FILES["upfile"]["type"];
        $upfile_size     = $_FILES["upfile"]["size"];  // 안되면 php init 에서 최대 크기 수정!
        $upfile_error    = $_FILES["upfile"]["error"];

        if ($upfile_name && !$upfile_error) { // 업로드가 잘되었는지 판단
            $file = explode(".", $upfile_name); // trim과 같다. (memo.sql)
            $file_name = $file[0]; //(memo)
            $file_ext  = $file[1]; //(sql)

            $new_file_name = date("Y_m_d_H_i_s");
            $new_file_name = $new_file_name . "_" . $file_name;
            $copied_file_name = $new_file_name . "." . $file_ext; // 2020_09_23_11_10_20_memo.sql
            $uploaded_file = $upload_dir . $copied_file_name; // ./data/2020_09_23_11_10_20_memo.sql 다 합친것

            $type = explode("/", $upfile_type);

        if ($type[0] == 'image') {
            switch ($type[1]) {
                case 'gif':
                case 'jpg':
                case 'png':
                case 'jpeg':
                case 'pjpeg':
                    break;
                default:
                    alert_back('3. gif jpg png 확장자가아닙니다.');
            }
            //6 업로드된 파일사이즈(2mb)를 체크해서 넘어버리면 돌려보낸다.
            if ($upfile_size > 2000000) {
                alert_back('2. 이미지파일사이즈가 2MB이상입니다.');
            }
        } else {
            //5 업로드된 파일사이즈(500kb)를 체크해서 넘어버리면 돌려보낸다.
            if ($upfile_size > 500000) {
                alert_back('2. 파일사이즈가 500KB이상입니다.');
            }
        }

            if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) { // 파일복사, 붙여넣기를 프로그램으로 구현
                echo ("
                    <script>
                    alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
                    history.go(-1)
                    </script>
                ");
                exit;
            }
            $sql = "update free set subject='$subject', content='$content', file_name_0='$upfile_name', file_type_0='$upfile_type', file_copied_0='$copied_file_name' ";
            $sql .= " where num=$num";
            mysqli_query($con, $sql);
        } else {
            $sql = "select * from free where num = $num";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            $copied_name = $row["file_copied_0"];

            if ($copied_name) {
                $file_path = "./data/" . $copied_name;
                unlink($file_path);
            }

            $upfile_name      = "";
            $upfile_type      = "";
            $copied_file_name = "";

            $sql = "update free set subject='$subject', content='$content', file_name_0='$upfile_name', file_type_0='$upfile_type', file_copied_0='$copied_file_name' ";
            $sql .= " where num=$num";
            mysqli_query($con, $sql);
        }
    } else {
        $sql = "update free set subject='$subject', content='$content' ";
        $sql .= " where num=$num";
        mysqli_query($con, $sql);
    }

    mysqli_close($con);

    echo "
	      <script>
	          location.href = 'free_list.php?page=$page';
	      </script>
      ";
} else if (isset($_GET["mode"]) && $_GET["mode"] === "delete") {
    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $sql = "select * from free where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied_0"];

    if ($copied_name) {
        $file_path = "./data/" . $copied_name;
        unlink($file_path);
    }

    $sql = "delete from free where num = $num";

    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'free_list.php?page=$page';
	     </script>
	   ";
}else if(isset($_GET["mode"])&&$_GET["mode"]=="insert_ripple"){
    if(empty($_POST["ripple_content"])){
      echo "<script>alert('내용입력요망!');history.go(-1);</script>";
      exit;
    }
    //"덧글을 다는사람은 로그인을 해야한다." 말한것이다.
    $userid=$_SESSION['user_id'];
    $q_userid = mysqli_real_escape_string($con, $userid);
    $sql="select * from members where id = '$q_userid'";
    $result = mysqli_query($con,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($con));
    }
    $rowcount=mysqli_num_rows($result);

    if(!$rowcount){
      echo "<script>alert('로그인 후 이용하세요.');history.go(-1);</script>";
      exit;
    }else{
      $content = test_input($_POST["ripple_content"]);
      $page = test_input($_POST["page"]);
      $parent = test_input($_POST["parent"]);
      $hit = test_input($_POST["hit"]);
      $q_username = mysqli_real_escape_string($con, $_SESSION['user_name']);
      $q_content = mysqli_real_escape_string($con, $content);
      $q_parent = mysqli_real_escape_string($con, $parent);
      $regist_day=date("Y-m-d (H:i)");

      $sql="INSERT INTO `free_ripple` VALUES (null,'$q_parent','$q_userid','$q_username', '$q_content','$regist_day')";
      $result = mysqli_query($con,$sql);
      if (!$result) {
        die('Error: ' . mysqli_error($con));
      }
      mysqli_close($con);
      echo "<script>location.href='./free_view.php?num=$parent&page=$page&hit=$hit';</script>";
    }//end of if rowcount
  }else if(isset($_GET["mode"])&&$_GET["mode"]=="delete_ripple"){
    $page= test_input($_GET["page"]);
    $hit= test_input($_GET["hit"]);
    $num = test_input($_POST["num"]);
    $parent = test_input($_POST["parent"]);
    $q_num = mysqli_real_escape_string($con, $num);

    $sql ="DELETE FROM `free_ripple` WHERE num=$q_num";
    $result = mysqli_query($con,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($con));
    }
    mysqli_close($con);
    echo "<script>location.href='./free_view.php?num=$parent&page=$page&hit=$hit';</script>";

  }//end of if insert

?>

