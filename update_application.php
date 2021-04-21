<?php #UD
include "static/header.php";

if(!isset($_POST["submit"])){
    header("Location: user.php");
    exit;  
}

$process = $_POST["submit"];
if($process=="accept"){
    $query_to_update_application = "SELECT updateApplicationStatus($application_id,'$position','accept')";
}
elseif($process=="reject"){
    $query_to_update_application = "SELECT updateApplicationStatus($application_id,'$position','reject')";
}
elseif($process=="return"){
    $query_to_update_application = "SELECT updateApplicationStatus($application_id,'$position','return')";
}

$results = pg_query($db_connection,$query_for_comments);

header("Location: manage_applications.php");
exit;

?>