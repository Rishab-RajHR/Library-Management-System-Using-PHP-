<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "librarydb";
$conn = new mysqli($server, $user, $pass, $dbname);
if(!$conn){
    echo "Oops! : {$conn->connect_error}";
}


?>