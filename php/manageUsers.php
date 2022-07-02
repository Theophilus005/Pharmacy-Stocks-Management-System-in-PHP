<?php
require_once "databaseConnection.php";

if(isset($_GET["addUser"])) {
    $name = $_GET["name"];
    $userType = $_GET["userType"];

    $password = rand(0,999999);
    $date = date("d/m/Y");
    $is_password_default = "Y";
    $level = "normal";

    $hash = md5($password);

    //Add user
    $insert_query = "INSERT INTO users VALUES ('$name', '$hash', '$userType', '$password', '$is_password_default', '$level', '$date')";
    if($conn->query($insert_query)) {
        echo "User added";
    }
}


if(isset($_GET["deleteUser"])) {
    $name = $_GET["name"];
    $userType = $_GET["userType"];

    //delete User
    $delete_query = "DELETE FROM users WHERE name = '$name' AND userType = '$userType'";
    if($conn->query($delete_query)) {
        echo "User removed";
    }

}


?>