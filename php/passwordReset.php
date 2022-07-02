<?php
session_start();
require_once "databaseConnection.php";

$name = $_SESSION["username"];
$userType = $_SESSION["userType"];

if(isset($_GET["old_password"])) {
    $old_password = md5($_GET["old_password"]);
    $new_password = md5($_GET["new_password"]);

    //Check if old password is correct
    $check_old = "SELECT * FROM users WHERE name = '$name' AND userType = '$userType' AND password = '$old_password'";
    $results = $conn->query($check_old);
    if($results->num_rows > 0) {
        //update password
        $update_query = "UPDATE users SET password = '$new_password' WHERE name = '$name' AND userType = '$userType' AND password = '$old_password'";
        if($conn->query($update_query)) {
            echo "Password changed successfully";
        }

    } else {
        echo "Old password is incorrect";
    }

}


?>