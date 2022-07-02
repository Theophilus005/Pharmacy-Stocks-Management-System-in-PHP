<?php
session_start();

if($_SESSION["userType"] != "Admin") {
    header("location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add User</title>
        <link rel="stylesheet" href="../styles/addUser.css">
        <link rel="stylesheet" href="../styles/navbar.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css">
        <script defer src="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/js/all.js"></script>
        <script src="../js/manageUsers.js"></script>
    </head>
    <body>
        <div class="navbar">
            <div class="page-name">Administrator Dashboard</div>
            <a href="changePassword.php"> <i class="fas fa-key"></i> Change Password</a>
        <a href="logOut.php"> <i class="fas fa-user-alt"></i> Log Out</a>
        </div>

        <div class="main">
            <div class="inner-main">
                <div class="header"> 
                    <div class="stockText"> Add User </div>                    
                </div>
                <div class="form">
                    
                    <input type="text" id="name" placeholder="Name">
                    
                    <select name="userType" id="dropdown" placeholder="User Type">
                        <option value="Teller"> Teller </option>
                        <option value="Admin"> Administrator </option>
                      
                    </select>
                    
                    <button type="button" class="add-btn" onclick="addUser()"> Add User </button>

                </div>
            </div>


        </div>
    
</body>
</html>