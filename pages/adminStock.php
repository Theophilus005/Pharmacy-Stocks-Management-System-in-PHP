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
        <title>Stocks</title>
        <link rel="stylesheet" href="../styles/adminStock.css">
        <link rel="stylesheet" href="../styles/navbar.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css">
        <script defer src="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/js/all.js"></script>
    </head>
    <body>
        <div class="navbar">
            <div class="page-name">Administrator Dashboard</div>
            <a href="changePassword.php"> <i class="fas fa-key"></i> Change Password</a>
        <a href="logOut.php"> <i class="fas fa-user-alt"></i> Log Out</a>
        </div>

        <div class="main">
            <div class="inner-main">
            <div class="medicine-field">
                    <input type="text" id="search-field" placeholder="Search stocks...">
                </div>
                <div class="header"> 
                    <div class="stockText"> My Stocks </div> 
                    <button type="button" class="add-stock-btn" onclick="window.location='addStock.php'"> <i class="fas fa-plus"></i> Add Stock </button> 
                </div>
                <div class="table">
                    <div class="table-head">
                        <div class="headbox">Drug</div>
                        <div class="headbox">Unit Price</div>
                        <div class="headbox">Quantity</div>
                        <div class="headbox">Date</div>
                        <div class="headbox" id="last">Edit / Delete</div>
                    </div>

                    <div class="stocks-data">

                    </div>
                    

                </div>
            </div>


        </div>
    
<script src="../js/stock.js"></script>
</body>
</html>