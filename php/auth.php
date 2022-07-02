<?php
require_once "databaseConnection.php";
session_start();

if(isset($_GET["username"])) {

    $name = $_GET["username"];
    $password = md5($_GET["password"]);
    $userType = $_GET["authType"];


    //Check db
    $check_query = "SELECT * FROM users WHERE name='$name' AND password='$password' AND userType = '$userType'"; 
    $results = $conn->query($check_query);
 
    if($results->num_rows > 0) {
        while($user = $results->fetch_assoc()) {
            $default = $user["is_password_default"];
        }

        $_SESSION["username"] = $name;
        $_SESSION["userType"] = $userType;

        echo "success";
    } else {
        echo "Invalid username/password";
    }

}


?>