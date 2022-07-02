<?php
session_start();

if($_SESSION["userType"] != "Teller") {
    header("location: ../index.php");
}


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transactions</title>
        <link rel="stylesheet" href="../styles/totalSales.css">
        <link rel="stylesheet" href="../styles/navbar.css">
        <link rel="stylesheet" href="../styles/transactions.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css">
        <script defer src="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/js/all.js"></script>
    </head>
    <body>
        <div class="navbar">
            <div class="page-name">Teller Dashboard</div>
            <a href="changePassword.php"> <i class="fas fa-key"></i> Change Password</a>
        <a href="logOut.php"> <i class="fas fa-user-alt"></i> Log Out</a>
        </div>

        <div class="main">
            <div class="inner-main">
                <div class="header"> Choose Medicine to sell </div>
                <div class="medicine-field">
                    <input type="text" onkeyup="searchClosingStocks()" id="search-field" placeholder="Enter medicine to search...">
                </div>
                <div class="header2"> Available Stock </div>
                <div class="table">
                    <div class="table-head">
                        <div class="headbox">Drug</div>
                        <div class="headbox">Unit Price</div>
                        <div class="headbox">Remaining</div>
                        <div class="headbox">Date</div>
                    </div>

                    <div class="closing-stocks-data">

                    </div>

                    
                    <div class="header3">Quantity</div>

                    <div class="quantity-div">
                        <div class="minus" onclick="decreaseQuantity()"><i class="fas fa-minus"></i></div>
                        <div class="quantity">1</div>
                        <div class="plus" onclick="increaseQuantity()"><i class="fas fa-plus"></i></div>
                    </div>

                    <div class="sell-btn-div">
                        <button type="button" onclick="sell()"> Sell </button>
                    </div>
                    

                </div>
            </div>


        </div>
    
<script src="../js/stock.js"></script>
</body>
</html>