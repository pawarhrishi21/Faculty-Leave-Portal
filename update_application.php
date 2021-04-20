<?php #UD
include "static/header.php";


if(isset($_POST["submit"])){
    $process = $_POST["submit"];
}
else{
    header("Location: user.php");
    exit;
}

if(process=="accept"){

}
elseif(process=="reject"){


}
elseif(process=="return"){

}







?>