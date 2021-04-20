<?php include "static/header.php"?>
<?php

    if(isset($_GET["apply"])) #if user clicked on Initiate/Apply
    {
        header("Location: apply_leave.php");
        exit;
    }
    elseif(isset($_GET["view"])) #if user clicked on View
    {
        header("Location: applications.php");
        exit;
    }

    session_start();
    if(array_key_exists('userid',$_SESSION)){
        session_destroy();
        session_unset();
        header("Location: login.php");
        exit;
    }
    $id = $_SESSION["id"];
    $query = "SELECT name,email,position,dept FROM users WHERE userid='$id' ";
    $result = pg_query($db_connection, $query);

    if($row = pg_fetch_row($result))
    {
?>
    <div class="container border border-dark mt-5 p-4">
        <div class="row">
            <div class="col">Name</div>
            <div class="col"><?php echo $row[0];?></div>
            <div class="w-100"></div>
            <div class="col">Email</div>
            <div class="col"><?php echo $row[1];?></div>
            <div class="w-100"></div>
            <div class="col">Position</div>
            <div class="col"><?php echo $row[2];?></div>
            <div class="w-100"></div>
            <div class="col">Department</div>
            <div class="col"><?php echo $row[3];?></div>
        </div>
    </div>

    <div class="container mt-5 border border-dark p-4">
        <h3 class="mb-4">My Leave Applications</h3>
        <div class="btn-group" role="group">
        <form action="user.php" method="get">
        <button type="submit" class="btn btn-dark border border-white mx-auto" name="view">View Previous Applications</button>
        </form>
        <form action="user.php" method="get">
        <button type="submit" class="btn btn-dark border border-white mx-auto" name="apply">Initiate Leave Application
        </div>
    </div>
<?php
    }
?>

<?php include "static/footer.php"?>