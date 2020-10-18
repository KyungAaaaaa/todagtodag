<?php
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_procedure.php";
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_trigger.php";
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/drop_procedure_scheduler.php";

create_table($con, "members");
create_table($con, "deleted_members");
create_table($con, "hospital");
create_table($con, "deleted_hospital");
create_table($con, "notice");
create_table($con, "review");
create_table($con, "health_info");
create_table($con, "interest");
create_table($con, "media");
create_table($con, "appointment");
create_table($con, "faq");
create_table($con, "free");
create_table($con, "free_ripple");
create_table($con, "question");
create_table($con, "question_ripple");

create_procedure($con, 'members_procedure');
create_procedure($con, 'appointment_procedure');
create_procedure($con, 'media_procedure');
create_procedure($con, 'notice_procedure');
create_procedure($con, 'faq_procedure');
create_procedure($con, 'question_procedure');
create_procedure($con, 'free_procedure');
//create_procedure($con, 'health_info_procedure');

create_trigger($con, 'deleted_members');
create_trigger($con, 'deleted_hospital');
create_trigger($con, 'canceled_appointment');
drop_procedure_scheduler($con);
?>