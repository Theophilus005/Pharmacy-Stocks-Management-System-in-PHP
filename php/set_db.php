<?php
//Connection to database
$hostname = "localhost";
$username = "root";
$password = "";

$conn2 = new mysqli($hostname, $username, $password);
if(mysqli_connect_error()) {
    die("Error Connecting to database: ".mysqli_connect_error());
} 

//Create db
$create_db = "CREATE DATABASE IF NOT EXISTS pms";
$conn2->query($create_db);


?>