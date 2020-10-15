<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
    if (isset($_POST['ripple_num_array'])) $ripple_num_array = $_POST['ripple_num_array'];
    else return;

    foreach ($ripple_num_array as $i) {
        $query = "delete from free_ripple where num=$i";
        $result = $con->query($query);
    }

?>
