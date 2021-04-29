<?php include "static/header.php"?>
<?php

require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->facultyProfileDB->profile;

if(isset($_POST["Academics"])){
    $to_update = 'Academics';
    $title = $_POST["Academics"];
}
else{
    header("Location: profile.php");
}

session_start();
$user_id = $_SESSION['id'];

$collection->updateOne( 
    ["userid" => $user_id],
    ['$pull' => 
        [ $to_update => ["Title" => $title] ]
    ]
);

header("Location: profile.php");
exit;

?>