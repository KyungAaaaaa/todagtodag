<?php
function drop_procedure_scheduler($con) {
    $sql = "SELECT num from appointment where appointment_status = 'success';";
    $result = mysqli_query($con, $sql) or die('Error: ' . mysqli_error($con));

    while ($row = mysqli_fetch_array($result)) {
        $procedure_name = "hospital_procedure" . "$row[0]";
        $sql = "drop procedure `$procedure_name`;";
        mysqli_query($con, $sql);

        $scheduler_name = "hospital_scheduler" . "$row[0]";
        $sql = "drop event `$scheduler_name`;";
        mysqli_query($con, $sql);

        echo "<script>console.log('$row[0]');</script>";
        echo "<script>console.log('$procedure_name');</script>";
        echo "<script>console.log('$scheduler_name');</script>";
    }
}//end of function
?>