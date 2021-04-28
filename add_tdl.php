<?php include "static/header.php"?>
<?php

require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->facultyProfileDB->profile;
session_start();

if(isset($_POST["confirm"])){
    //update DB
    // $user_id = $_SESSION['id'];
    $user_id = 'abhinav';
    $updateResult = $collection->updateOne(
        ['userid' => 'abhinav'],
        ['$set' => ['Biography' => $updated_bio]]
    );
}

if(!isset($_POST["add"])){
    header('Location: profile.php');
}
$to_update = $_POST["add"];

//$user_id = $_SESSION["id"];
$user_id = 'abhinav';

?>

<form class="mx-auto mt-5 border border-dark py-5" action="add_tdl.php" method="POST" style="width:700px">
    <div class="form-group col-md-6 mx-auto">
        <label for="title">Title</label>
        <textarea maxlength="1000" class="form-control" id="title" name="title" rows="2"></textarea>
    </div>

    <div class="form-group col-md-6 mx-auto">
        <label for="description">Description</label>
        <textarea maxlength="1000" class="form-control" id="description" name="description" rows="5"></textarea>
    </div>
    <div class="text-center">
        <button class="btn btn-dark" name="confirm" type="submit" value="<?php echo $to_update ?>">Login</button>
    </div>
</form>
