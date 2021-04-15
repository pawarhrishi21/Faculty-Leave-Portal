<?php include "static/header.php"?>
<?php
    session_start();
    $id = $_SESSION["id"];
    $query = "SELECT name,email,position,dept FROM users WHERE userid='$id' ";
    $result = pg_query($db_connection, $query);

    if($row = pg_fetch_row($result)){
        echo "Name " . $row[0];
        echo "\nEmail " . $row[1];
        echo "\nPosition " . $row[2];
        echo "\nDepartment " . $row[3];
    } 
?>
<?php include "static/footer.php"?>