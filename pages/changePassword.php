<?php
session_start();

if(!isset($_SESSION["userType"])) {
    header("location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Password</title>
        <link rel="stylesheet" href="../styles/changePassword.css">
        <link rel="stylesheet" href="../styles/navbar.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css">
        <script defer src="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/js/all.js"></script>
        <script src="../js/stock.js"></script>
        <script src="../js/passwordReset.js" ></script>
    </head>
    <body>
        <div class="navbar">
            <div class="page-name">Password Reset</div>
            <a href="changePassword.php"> <i class="fas fa-key"></i> Change Password</a>
        <a href="logOut.php"> <i class="fas fa-user-alt"></i> Log Out</a>
        </div>

        <div class="main">
            <div class="inner-main">
                <div class="header"> 
                    <div class="stockText"> Password Reset Form </div>                    
                </div>
                <div class="form">
                    
                    <input type="password" class="name" id="old" placeholder="Old Password">
                    <input type="password" class="price" id="new" placeholder="New Password">
                    
                    <button type="button" onclick="changePassword()" class="add-btn"> Change Password </button>

                </div>
            </div>


        </div>
    
</body>
</html>