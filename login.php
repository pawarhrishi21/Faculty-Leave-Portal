<?php

if(isset($_POST["submit"])){
    $id = $_POST["userid"];
    $query = "SELECT * FROM USERS WHERE id=$id";
}
?>

<?php include "static/header.php"; ?>

<form class="mx-auto mt-5 border border-dark py-5" action="login.php" method="POST" style="width:700px">
    <div class="form-group col-md-6 mx-auto">
    <label for="login-userid"> User ID</label>
    <input class="form-control" type="text" name="userid" id="login-userid" placeholder="Enter user id">
    </div>

    <div class="form-group col-md-6 mx-auto">
    <label for="login-password"> Password</label>
    <input class="form-control" type="password" name="password" id="login-password" placeholder="Enter password">
    </div>
    <div class="text-center">
    <button class="btn btn-dark" name="submit" type="submit">Login</button>
    </div>
</form>

<?php include "static/footer.php"; ?>
