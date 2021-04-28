<?php include "static/header.php"?>
<?php

require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->facultyProfileDB->profile;
session_start();
//$user_id = $_SESSION["id"];
$user_id = 'abhinav';

if(isset($_POST["confirm"])){

    $updated_bio = $_POST["biography"];
    $updateResult = $collection->updateOne(
        ['userid' => 'abhinav'],
        ['$set' => ['Biography' => $updated_bio]]
    );
    header('Location: profile.php');
}

if(!isset($_POST["submit"])){
    echo "notset";
}



$document_bio = $collection->findOne(
    ['userid' => $user_id],
    ['projection' => ['Biography' => 1]]
);

?>
<div class="container border border-dark mt-5 px-5 py-5">
    <form action="update_bio.php" method="post">
        <div class="form-group">
            <label for="text-area"><strong>Update your biography</strong></label>
            <textarea maxlength="1000" class="form-control" id="text-area" name="biography" rows="10"><?php echo $document_bio['Biography'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-dark" name="confirm">Confirm</button>
    </form>
</div>
