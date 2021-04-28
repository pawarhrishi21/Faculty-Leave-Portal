<?php include "static/header.php"?>
<?php
// Temporary section for mongo conn
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->facultyProfileDB->profile;

$document = $collection->findOne(['userid' => 'abhinav']);

echo $document['Researches'][0]["Title"];

?>

<div class="mt-3 ml-3">
    <img id="profile-pic" src="img/profile_picture.jfif" alt="Profile Picture">
</div>

<div class="container border border-dark mt-5 p-4 bg-dark text-white w-25">
    <div class="row">
        <div class="col">Name</div>
        <div class="col">Abhinav</div>
        <div class="w-100"></div>
        <div class="col">Email</div>
        <div class="col">abhinav@email.com</div>
        <div class="w-100"></div>
        <div class="col">Position</div>
        <div class="col">Faculty</div>
        <div class="w-100"></div>
        <div class="col">Department</div>
        <div class="col">Computer Science</div>
    </div>
</div>



<div class="container mt-5 p-3 w-75"> 
    <!-- <div class="jumbotron jumbotron-fluid bg-dark text-white">  bg-dark text-white-->
        <h3>Research interests</h3>
        <ul>
            <li>Deep learning</li>
            <li>CV</li>
            <li>AI</li>
        </ul>
    <!-- </div> -->
</div>





<?php 

// $updateResult = $collection->updateOne(
//     ['userid' => 'abhinav'],
//     ['$set' => ['$dsadas' => 'us']]
// );

include "static/footer.php" ?>