<?php include "static/header.php"?>
<?php

require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->facultyProfileDB->profile;
session_start();

if(isset($_POST["confirm"])){
    //update DB
    $user_id = $_SESSION['id'];

    $tdl_to_insert = [
        "Title" => $_POST["title"],
        "Description" => $_POST["description"],
        "Link" => $_POST["link"]
    ];
    
    $to_update = $_POST["confirm"];

    $updateResult = $collection->updateOne(
        ['userid' => $user_id],
        ['$push' => [$to_update => $tdl_to_insert]],
        ['upsert' => true]
    );
    header('Location: profile.php');
}

if(!isset($_POST["add"])){
    header('Location: profile.php');
}

$to_update = $_POST["add"];

$user_id = $_SESSION["id"];

?>
<div class="jumbotron">
    <h4><?php echo "Insert ".$to_update ?></h4>
</div>

<form class="mx-auto mt-5 border border-dark py-5" action="insert_tdl.php" method="POST" style="width:700px">
    <div class="form-group col-md-8 mx-auto">
        <label for="title">Title</label>
        <textarea maxlength="1000" class="form-control" id="title" name="title" rows="2"></textarea>
    </div>

    <div class="form-group col-md-8 mx-auto">
        <label for="description">Description</label>
        <textarea maxlength="1000" class="form-control" id="description" name="description" rows="5"></textarea>
    </div>

    <div class="form-group col-md-8 mx-auto">
        <label for="link">Link</label>
        <textarea maxlength="1000" class="form-control" id="link" name="link" rows="1"></textarea>
    </div>
    <div class="text-center">
        <button class="btn btn-dark" name="confirm" type="submit" value="<?php echo $to_update ?>">Confirm</button>
    </div>
</form>

<?php include "static/footer.php"?>