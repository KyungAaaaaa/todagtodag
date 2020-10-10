<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";

// GET방식으로 가져오는 값
if (isset($_GET["mode"])) $mode = $_GET["mode"];
else $mode = "";
if (isset($_GET["delete_id"])) $delete_id = $_GET["delete_id"];
else $delete_id = "";

// POST방식으로 가져오는 값
if (isset($_POST["id"])) $id = $_POST["id"];
else $id = "";
if (isset($_POST["name"])) $name = $_POST["name"];
else $name = "";
if (isset($_POST["addr"])) $addr = $_POST["addr"];
else $addr = "";
if (isset($_POST["tel"])) $tel = $_POST["tel"];
else $tel = "";
if (isset($_POST["department"])) $department = $_POST["department"];
else $department = "";
if (isset($_POST["mon"])) $mon = $_POST["mon"];
else $mon = "";
if (isset($_POST["tue"])) $tue = $_POST["tue"];
else $tue = "";
if (isset($_POST["wed"])) $wed = $_POST["wed"];
else $wed = "";
if (isset($_POST["thu"])) $thu = $_POST["thu"];
else $thu = "";
if (isset($_POST["fri"])) $fri = $_POST["fri"];
else $fri = "";
if (isset($_POST["sat"])) $sat = $_POST["sat"];
else $sat = "";
if (isset($_POST["sun"])) $sun = $_POST["sun"];
else $sun = "";
if (isset($_POST["holiday"])) $holiday = $_POST["holiday"];
else $holiday = "";

//파일명이 POST로 넘어오면 true실행
if (!empty($_FILES['upfile']['name'])) {
    //파일업로드기능
    //1. $_FILES['upfile']로부터 5가지 배열명을 가져와서 저장한다.
    $upfile = $_FILES['upfile']; //한개파일업로드정보(5가지정보배열로들어있음)
    $upfile_name = $_FILES['upfile']['name']; //f03.jpg
    $upfile_type = $_FILES['upfile']['type']; //image/gif  file/txt
    $upfile_tmp_name = $_FILES['upfile']['tmp_name'];
    $upfile_error = $_FILES['upfile']['error'];
    $upfile_size = $_FILES['upfile']['size'];

    //2. 파일명과 확장자를 구분해서 저장한다.
    $file = explode(".", $upfile_name); //파일명과 확장자구분에서 배열저장
    $file_name = $file[0];              //파일명
    $file_extension = $file[1];         //확장자

    //3.업로드될 폴더를 지정한다.
    $upload_dir = "../data/"; //업로드된파일을 저장하는장소지정

    //4.파일업로드가성공되었는지 점검한다. 성공:0 실패:1
    //파일명이 중복되지 않도록 임의파일명을 정한다.
    if (!$upfile_error) {
        $new_file_name = date("Y_m_d_H_i_s");
        $new_file_name = $new_file_name . "_" . "0";
        $copied_file_name = $new_file_name . "." . $file_extension;
        $uploaded_file = $upload_dir . $copied_file_name;
        // $uploaded_file = "./data/2019_04_22_15_09_30_0.jpg";
    }

    //5 업로드된 파일확장자를 체크한다.  "image/gif"
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

    //7. 임시저장소에 있는 파일을 서버에 지정한 위치로 이동한다.
    if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
        alert_back('4. 서버 전송에러!!');
    }
} else {
    $upfile_name = "";
    $copied_file_name = "";
    $upfile_type = "";
}

//병원정보입력함수인데 안써서 비워놈.
// function program_insert(
//     $con,
//     $shop,
//     $type,
//     $subject,
//     $content,
//     $phone_number,
//     $end_day,
//     $choose,
//     $price,
//     $location,
//     $upfile_name,
//     $upfile_type,
//     $copied_file_name,
//     $regist_day
// ) {
//     $sql = "insert into program (shop , type, subject, content, phone_number, end_day, choose, price, location, file_name, file_type, file_copied, regist_day) ";
//     $sql .= "values('$shop', '$type', '$subject', '$content', $phone_number,'$end_day','$choose', $price,'$location', ";
//     $sql .= "'$upfile_name', '$upfile_type', '$copied_file_name','$regist_day')";

//     mysqli_query($con, $sql);
//     mysqli_close($con);
// }

// 병원정보삭제함수
function user_delete($con, $delete_id)
{
    $sql = "DELETE from `hospital` where id = '$delete_id';";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

// 병원정보수정함수
function user_modify($con, $id, $name, $addr, $tel, $department, $mon, $tue, $wed, $thu, $fri, $sat, $sun, $holiday, $upfile_name, $copied_file_name, $upfile_type)
{
    //삭제할 게시물의 이미지파일명을 가져와서 삭제한다.
    $sql = "SELECT `file_copied_0` from `hospital` where id ='$id';";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        alert_back('Error: 6' . mysqli_error($con));
        // die('Error: ' . mysqli_error($conn));
    }
    $row = mysqli_fetch_array($result);
    $file_copied_0 = $row['file_copied_0'];
    if (!empty($file_copied_0)) {
        unlink("../data/" . $file_copied_0);
    }

    $type = explode("/", $upfile_type);
    $sql = "UPDATE `hospital` set name ='$name', addr ='$addr', tel ='$tel', department ='$department', mon ='$mon', tue ='$tue', wed ='$wed', thu ='$thu', fri ='$fri', sat ='$sat', sun ='$sun', holiday ='$holiday', file_name_0 ='$upfile_name', file_copied_0 ='$copied_file_name', file_type_0 ='$type[0]' where id = '$id'";
    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    if ($result) {
        echo "수정 완료";
    } else {
        echo "수정 실패";
    }
}

//mode에 따라 함수가 실행됨.
switch ($mode) {
    case 'delete':
        user_delete($con, $delete_id);
        echo "
         <script>
          alert('탈퇴되었습니다.');
          location.href = 'admin_hospital.php';
         </script>
        ";
        break;
    case 'modify':
        user_modify($con, $id, $name, $addr, $tel, $department, $mon, $tue, $wed, $thu, $fri, $sat, $sun, $holiday, $upfile_name, $copied_file_name, $upfile_type);
        // echo "
        //    <script>
        //        location.href = 'admin_hospital.php';
        //    </script>
        //  ";
        break;
    // case 'insert':
    //     program_insert($con, $shop, $type, $subject, $content, $phone_number, $end_day, $choose, $price, $location, $upfile_name, $upfile_type, $copied_file_name, $regist_day);
    //     echo "
   	//     <script>
   	//      location.href = 'admin_page.php';
   	//     </script>
   	//     ";
    //     break;
    default: break;
}
?>