<?php include "static/header.php"?>

<?php

if(isset($_POST["sumbit"]))
{
    $comment_text = $_POST["comment"];
    session_start();
    $commentor_position = $_SESSION["commentor_position"];
    $commentor_id = $_SESSION["id"];
    $application_id = $_SESSION["application_id"];

    $query_to_add_comment = "SELECT insertComment($application_id,'$commentor_id','$commentor_position','$comment_text')";
    pg_query($db_connection,$query_to_get_application_status);

    header("Location: applications.php");
    exit;
}
else
{
    header("Location: applications.php");
    exit;
}

?>

