<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->facultyProfileDB->profile;


$profile_data1 = [
    "userid" => "abhinav",
    "Email" => "abhinav@email.com",
    "Position" => "Faculty",
    "Department" => "Computer Science",
    "Academics" => [
        [
            "Title" => "Btech, Computer Science, ",
            "Description" => "DAV Institute of Engineering and Technology (DAVIET)",
            "Date" => "20 Feb 2006"
        ],
        [
            "Title" => "Computer Science, Doctor of Philosophy",
            "Description" => "Australian National University",
            "Date" => " 8 Aug 2014"
        ]
    ],
    "Biography" => "I am a Lecturer at the Faculty of Information Technology and I co-direct the Human-Centred Artificial Intelligence lab in the Department of Human Centered Computing. 
    My research area is mainly in the broad domain of automatic human behaviour understanding.",
    "Researches" =>[
        [
            "Title" => "A survey on automatic multimodal emotion recognition in the wild",
            "Description" => "Sharma, G. & Dhall, A., 2021, Advances in Data Science: Methodologies and Applications. Phillips-Wren, G., Esposito, A. & C. Jain, L. (eds.). Cham Switzerland: Springer, p. 35-64 30 p. (Intelligent Systems Reference Library; vol. 189)",
            "Link" => "https://research.monash.edu/en/publications/a-survey-on-automatic-multimodal-emotion-recognition-in-the-wild"
        ],
        [
            "Title" => "Automatic prediction of group cohesiveness in images",
            "Description" => "Ghosh, S., Dhall, A., Sebe, N. & Gedeon, T., 23 Sep 2020, (Accepted/In press) In : IEEE Transactions on Affective Computing. 13 p",
            "Link" => "https://research.monash.edu/en/publications/automatic-prediction-of-group-cohesiveness-in-images" 
        ],
    ],
    "Achievements" =>[
        [
            "Title" => "Best Paper Nomination, IEEE International Conference on Multimedia & Expo 2012",
            "Description" => "Dhall, Abhinav (Recipient), 2012
            Prize: Prize (including medals and awards)",
            "Link" => "https://research.monash.edu/en/publications/a-survey-on-automatic-multimodal-emotion-recognition-in-the-wild"
        ],
        [
            "Title" => "Outstanding reviewer award, IEEE International Conference on Automatic Faces & Gesture Recognition 2018",
            "Description" => "Dhall, Abhinav (Recipient), 2018
            Prize: Prize (including medals and awards)",
            "Link" => "https://research.monash.edu/en/publications/automatic-prediction-of-group-cohesiveness-in-images" 
        ],
    ],
    "CoursesTaught" => ["CS901 - Image Processing in May-Dec 2018", "CS802 - Computer Vision in Feb-May 2019"]
];

$result = $collection->insertOne($profile_data1);
echo "Inserted with Object ID '{$result->getInsertedId()}'";

$document = $collection->findOne(['userid' => 'abhinav']);

var_dump($document);


?>