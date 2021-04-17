<?php include("static/header.php"); ?>

<?php
// Post request after confirming leave application

if(isset($_POST["confirm"])){
    session_start();
    $from_date = $_SESSION["from_date"];
    $to_date = $_SESSION["to_date"];
    $id = $_SESSION["id"];
    $no_of_days = $_SESSION["no_of_days"];
}
else{
    header("Location: apply_leave.php");
    exit;
}

$query_to_create_application = "INSERT INTO applications(applicantid,status,startdate,enddate,time) VALUES ('$id','HOD','$from_date','$to_date',NOW())";

$result = pg_query($db_connection, $query_to_create_application);
if(!$result)
{
    echo "COULD NOT PROCESS, DATABASE ERROR";
}
else
{

?>
    <div class="alert alert-success" role="alert">
    Application has been submitted. Check the Applications section for status.
    </div>

<?php
}


?>