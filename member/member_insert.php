<?php
  include $_SERVER['DOCUMENT_ROOT']."/todagtodag/db/db_connector.php";

  if(isset($_GET["type"])) {
    $type = $_GET["type"];
  } else {
    $type = "insert";
  }

  if($type === "insert") {
    $id   = $_POST["id"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $phone_one = $_POST["phone_one"];
    $phone_two = $_POST["phone_two"];
    $phone_three = $_POST["phone_three"];
    $email_one = $_POST["email_one"];
    $email_two = $_POST["email_two"];
    $address_one = $_POST["address_one"];
    $address_two =  $_POST["address_two"];
    $address_three = $_POST["address_three"];

    $phone = $phone_one."-".$phone_two."-".$phone_three;
    $email = $email_one."@".$email_two;
    $address = $address_one."$".$address_two."$".$address_three;

    $id = mysqli_real_escape_string($con, $id);
    $password = mysqli_real_escape_string($con, $password);
    $name = mysqli_real_escape_string($con, $name);
    $phone = mysqli_real_escape_string($con, $phone);
    $email = mysqli_real_escape_string($con, $email);
    $address = mysqli_real_escape_string($con, $address);

    $sql = "insert into members (id, password, name, phone, email, address, level) ";
    $sql .= "values('$id', '$password', '$name', '$phone', '$email', '$address', 2)";

    mysqli_query($con, $sql) or die("삽입 ERROR". mysqli_error($con));  // $sql 에 저장된 명령 실행

    mysqli_close($con);

    echo "
      <script>
        alert('가입되셨습니다.');
        location.href = '../index.php';
      </script>
    ";
  } else {
    $id   = $_POST["id"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $phone_one = $_POST["phone_one"];
    $phone_two = $_POST["phone_two"];
    $phone_three = $_POST["phone_three"];
    $email_one = $_POST["email_one"];
    $email_two = $_POST["email_two"];
    $address_one = $_POST["address_one"];
    $address_two =  $_POST["address_two"];
    $address_three = $_POST["address_three"];

    $phone = $phone_one."-".$phone_two."-".$phone_three;
    $email = $email_one."@".$email_two;
    $address = $address_one."$".$address_two."$".$address_three;

    $id = mysqli_real_escape_string($con, $id);
    $password = mysqli_real_escape_string($con, $password);
    $name = mysqli_real_escape_string($con, $name);
    $phone = mysqli_real_escape_string($con, $phone);
    $email = mysqli_real_escape_string($con, $email);
    $address = mysqli_real_escape_string($con, $address);

    $sql = "update members set password='$password', name='$name' , phone='$phone', email='$email', address='$address'";
    $sql .= " where id='$id'";

    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

    mysqli_close($con);

    echo "
      <script>
        alert('정보가 변경되셨습니다.');
        location.href = '../index.php';
      </script>
    ";
  }
?>
