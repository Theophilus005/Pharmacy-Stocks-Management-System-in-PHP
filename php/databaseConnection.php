<?php
//Connection to database
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "pms";

$conn = new mysqli($hostname, $username, $password, $dbname);
if(mysqli_connect_error()) {
    die("Error Connecting to database: ".mysqli_connect_error());
} 
?>