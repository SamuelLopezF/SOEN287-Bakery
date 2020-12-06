<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbName = "bakery_db";

$connect = mysqli_connect($dbServername, $dbUsername, "", $dbName);

if(!$connect){
    die("Connection failed: ".mysqli_connect_error());
}
?>