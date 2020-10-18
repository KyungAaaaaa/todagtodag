<?php
function hospital_create_procedure($con, $procedure_name, $num){
  $flag="NO";
  $sql = "SHOW PROCEDURE STATUS WHERE db = 'todagtodag';";
  $result=mysqli_query($con,$sql) or die('Error: '.mysqli_error($con));

  while ($row=mysqli_fetch_row($result)) {
    if($row[1] === "$procedure_name"){//문자열로 넘어오므로 ""으로 처리 ''은 문자열뿐아니라 속성도 반영
      $flag="OK";
      break;
    }
  }//end of while

  if($flag==="NO"){
    $sql="CREATE PROCEDURE `{$procedure_name}`()
    BEGIN
        UPDATE `appointment` set appointment_status = 'success' where num = {$num};
    END";
    mysqli_query($con,$sql) or die('Error: '.mysqli_error($con));
  }//end of if flag

}//end of function
?>
