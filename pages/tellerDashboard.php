<?php
require_once "../php/databaseConnection.php";
session_start();

if($_SESSION["userType"] != "Teller") {
    header("location: ../index.php");
}


//Check if stocks are set today
$today_date = date("d/m/Y");
$checkStocks_query = "SELECT * FROM stockStates WHERE date = '$today_date' AND stocks = 'SET'";
$results = $conn->query($checkStocks_query);
if($results->num_rows > 0) {
    //Stocks set
} else {
    //Set opening and closing stocks today

    //Get current stocks
    $stock_id = array();
    $stock_name = array();
    $stock_price = array();
    $stock_quantity = array();
    $stock_date = array();

    $get_stocks = "SELECT * FROM stocks";
    $results2 = $conn->query($get_stocks);
    if($results2->num_rows > 0) {
        while($currentStock = $results2->fetch_assoc()) {
            $stock_id[] = $currentStock["id"];
            $stock_name[] = $currentStock["name"];
            $stock_price[] = $currentStock["price"];
            $stock_quantity[] = $currentStock["quantity"];
            $stock_date[] = $currentStock["date"];
        }

    //Insert opening stocks
    for($i=0; $i<count($stock_id); $i++) {
        $insert_opening_stock = "INSERT INTO openingStocks (name, price, quantity, date, set_date) VALUES ('$stock_name[$i]', '$stock_price[$i]', '$stock_quantity[$i]', '$stock_date[$i]', '$today_date')";
        $conn->query($insert_opening_stock);
    }

    //Insert closing stocks
    for($i=0; $i<count($stock_id); $i++) {
        $insert_closing_stock = "INSERT INTO closingStocks (name, price, quantity, date, set_date) VALUES ('$stock_name[$i]', '$stock_price[$i]', '$stock_quantity[$i]', '$stock_date[$i]', '$today_date')";
        $conn->query($insert_closing_stock);
    }

    //Insert into stock states
    $insert_stock_states = "INSERT INTO stockStates VALUES ('$today_date', 'SET')";
    $conn->query($insert_stock_states);


    }



}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teller Dashboard</title>
    <link rel="stylesheet" href="../styles/tellerDashboard.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css">
    <script defer src="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/js/all.js"></script>
    <script src="../js/tellerDashboard.js"></script>
</head>
<body onunload="call()">

    <div class="navbar">
        <div class="page-name">Teller Dashboard</div>
        <a href="changePassword.php"> <i class="fas fa-key"></i> Change Password</a>
        <a href="logOut.php"> <i class="fas fa-user-alt"></i> Log Out</a>
    </div>

    <div class="main">
        <div class="inner-main">
            <div class="header">
                <div> <i class="fas fa-calendar-check"></i> Today</div>
                <div><?php echo $today_date ?></div>
            </div>

            <div class="panels">
                <div class="panel" id="totalSales" onclick="window.location='totalSales.php'">
                    <div class="rowOne">
                        <div class="panelName">Total Sales</div>
                        <div class="panelIcon"><i class="fas fa-money-bill"></i></div>
                    </div>
                    <div class="rowTwo">
                        <div class="panelType">Report</div>
                        <div class="panelStat" id="amount">GH¢ <span id="todaySales"></span></div>
                    </div>
                </div>

                <div class="panel" id="transactions" onclick="window.location='transactions.php'">
                    <div class="rowOne">
                        <div class="panelName">Transactions</div>
                        <div class="panelIcon"><i class="fas fa-book-medical"></i></div>
                    </div>
                    <div class="rowTwo">
                        <div class="panelType">Sell</div>
                        <div class="panelStat" id="amount">Count: <span id="transToday"></span></div>
                    </div>
                </div>

                <div class="panel" id="openingStock" onclick="window.location='tellerStock.php?type=opening'">
                    <div class="rowOne">
                        <div class="panelName">Opening Stock</div>
                        <div class="panelIcon"><i class="fas fa-arrow-up"></i></div>
                    </div>
                    <div class="rowTwo">
                        <div class="panelType">Drugs</div>
                        <div class="panelStat" id="amount">Total Stock: <span id="openingTotal"></span></div>
                    </div>
                </div>

                <div class="panel" id="closingStock" onclick="window.location='tellerStock.php?type=closing'">
                    <div class="rowOne">
                        <div class="panelName">Closing Stock</div>
                        <div class="panelIcon"><i class="fas fa-arrow-down"></i></div>
                    </div>
                    <div class="rowTwo">
                        <div class="panelType">Drugs</div>
                        <div class="panelStat" id="amount">Total Stock: <span id="closingTotal"></span></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>