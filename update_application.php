<?php #UD
include "static/header.php";

$process = "action_to_be_taken";
if(!isset($_POST["submit"])){
    header("Location: user.php");
    exit;  
}

$process = $_POST["submit"];
if($process=="accept"){
    $query_to_accept_application = "SELECT updateApplicationStatus($application_id,'$position','accept')";
}
elseif($process=="reject"){
    $query_to_accept_application = "SELECT updateApplicationStatus($application_id,'$position','reject')";
}
elseif($process=="return"){
    $query_to_accept_application = "SELECT updateApplicationStatus($application_id,'$position','return')";
}


?>