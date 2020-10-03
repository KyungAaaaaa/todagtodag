<?php
function create_table($con, $table_name)
{
    $flag = false;
    $sql = "show tables from todagtodag";
    $result = mysqli_query($con, $sql) or die('Error' . mysqli_error($con));

    //반복문을 통해서 레코드셋에서 한 레코드씩 가져와서 첫번째 필드내용을 조사해서 해당된 테이블명이 있는지 확인한다.
    while ($row = mysqli_fetch_row($result)) {
        if ($row[0] === "$table_name") {
            $flag = true;
            break;
        }
    }

    //해당된 테이블이 없으면 해당 테이블명을 찾아서 테이블 쿼리문을 작성한다.
    if ($flag === false) {
        switch ($table_name) {
            case 'members':
                $sql = "CREATE TABLE `members` (
                    `num` int(11) NOT NULL AUTO_INCREMENT,
                    `id` char(15) NOT NULL,
                    `pass` char(15) NOT NULL,
                    `name` char(10) NOT NULL,
                    `phone` char(13) NOT NULL,
                    `email` char(80) DEFAULT NULL,
                    `regist_day` char(20) DEFAULT NULL,
                    `level` int(11) DEFAULT NULL,
                    PRIMARY KEY (`num`)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                break;

            case 'notice':
                $sql = "CREATE TABLE `notice` (
                                `num` int NOT NULL AUTO_INCREMENT,
                                `id` char(15) NOT NULL,
                                `name` char(10) NOT NULL,
                                `subject` char(200) NOT NULL,
                                `content` text NOT NULL,
                                `regist_day` char(20) NOT NULL,
                                `hit` int NOT NULL,
                                PRIMARY KEY (`num`)
                              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
                            ";
                break;
            default:
                echo "<script>alert('해당테이블명이 없습니다. 점검요망!');</script>";
                break;
        } //end of switch

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('{$table_name} 테이블이 생성되었습니다.');</script>";
        } else {
            echo "테이블 생성 실패원인" . mysqli_error($con);
        }
    } //end of if($flag)
}
