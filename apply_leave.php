<?php
// Post request after selecting leave dates
    if(isset($_POST["submit"])){
        $dateFrom = $_POST["dateFrom"];
        $dateTo = $_POST["dateTo"];
        $fromdate = date_create($dateFrom);
        $todate = date_create($dateTo);
        $no_of_days=date_diff($fromdate,$todate);
        $no_of_days = intval($no_of_days->format("%a")) + 1; #integer conversion
    }
?>

<?php include("static/header.php"); ?>


<?php 
# Display before clicking Submit
if(!isset($_POST["submit"]))
{
?>
<form name="Filter" method="POST" action="apply_leave.php">
    From:
    <input type="date" name="dateFrom" value="<?php echo date('Y-m-d'); ?>" />
    <br/>
    To:
    <input type="date" name="dateTo" value="<?php echo date('Y-m-d'); ?>" />
    <input type="submit" name="submit" value="Apply"/>
</form>

<?php
# Display after user submits 
}else
{
    if($fromdate > $todate) #Invalid dates entered
    {
?>
        <div class="alert alert-danger" role="alert">
        Invalid dates entered. Please apply again.
        </div>
<?php
    }
    else{
        #SESSION to access userid
        session_start();
        $id = $_SESSION['id'];
        $query = "SELECT leaves FROM leaves WHERE userid='$id'";
        $result = pg_query($db_connection, $query);
        $row = pg_fetch_row($result);
        $leaves_left = $row[0];
?>
        <p>Leaves Left: <?php echo "$leaves_left"; ?></p>
        <p>You are applying for a leave of <?php echo "$no_of_days"; ?> day(s)</p>
<?php
        if($leaves_left < $no_of_days) #Not enough leaves
        {
?>
            <div class="alert alert-danger" role="alert">
            You do not have enough leaves left.
            </div>
<?php
        }
        else #Confirm Leaves
        {
?>
            <form action="process_leaves.php" method="post">
            <button type="submit" class="btn btn-dark" name="confirm">Confirm</button>
            </form>
<?php
        }
    }
}
?>

<?php include("static/footer.php"); ?>