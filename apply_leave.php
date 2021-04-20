<?php
// Post request after selecting leave dates
    if(isset($_POST["submit"])){
        $dateFrom = $_POST["dateFrom"];
        $dateTo = $_POST["dateTo"];
        $from_date = date_create($dateFrom);
        $to_date = date_create($dateTo);
        $no_of_days=date_diff($from_date,$to_date);
        $no_of_days = intval($no_of_days->format("%a")) + 1; #integer conversion
    }
?>

<?php include("static/header.php"); ?>


<?php 
# Display before clicking Submit
if(!isset($_POST["submit"]))
{
?>
<div class="container mx-auto mt-5 border border-dark pb-5">

    <div class="alert alert-dark" role="alert">
    Fill the dates for the start and the end of leave days (Both inclusive).
    </div>

    <form name="Filter" method="POST" action="apply_leave.php">
    
        <div class="form-group col-md-6 mx-auto">
            <label for="dateFrom">From</label>
            <input class="form-control" id="dateFrom" type="date" name="dateFrom" value="<?php echo date('Y-m-d'); ?>" >
        </div>

        <div class="form-group col-md-6 mx-auto">
            <label for="dateTo"> To   </label>
            <input class="form-control" id="dateTo" type="date" name="dateTo" value="<?php echo date('Y-m-d'); ?>" >
        </div>

        <div class="text-center">
            <button class="btn btn-dark" type="submit" name="submit" value="Apply"> Apply </button>
        </div>
    </form>

</div>
<?php
# Display after user submits 
}else
{
    if($from_date > $to_date) #Invalid dates entered
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
<div class="container border border-dark mt-5 px-5 pb-5">
    <div class="alert alert-info">
        <p>The number of leaves you have left : <?php echo "$leaves_left"; ?></p>
    </div>

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
            $_SESSION["from_date"] = $dateFrom;
            $_SESSION["to_date"] = $dateTo;
            $_SESSION["no_of_days"] = $no_of_days;

?>

            <form action="process_leaves.php" method="post">
            <div class="form-group">
                <label for="comment">Enter comments to support your leave application [< 1000 words]</label>
                <textarea maxlength="1000" class="form-control" id="comment" name="comment" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-dark" name="confirm">Confirm</button>
            </form>

</div>

<?php
        }
    }
}
?>

<?php include("static/footer.php"); ?>