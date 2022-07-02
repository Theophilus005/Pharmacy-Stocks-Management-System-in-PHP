<?php
require_once "../php/databaseConnection.php";

session_start();

if(!isset($_SESSION["userType"])) {
    header("location: ../index.php");
}

if($_SESSION["userType"] == "Admin") {
    $heading2 = "Administrator";
} else {
    $heading2 = "Teller";
}

$today_date = date("d/m/Y");

if(isset($_GET["date"])) {
    $today_date = $_GET["date"];
}

//Get stock type
if (isset($_GET["type"])) {
    $type = $_GET["type"] . "Stocks";
    if($_GET["type"] == "opening") {
        $heading = "Opening Stocks";
    } else {
        $heading = "Closing Stocks";
    }
} else {
    header("location: tellerDashboard.php");
}

//Get stocks
$stock_id = array();
$stock_name = array();
$stock_price = array();
$stock_quantity = array();
$stock_date = array();

$get_stocks = "SELECT * FROM $type WHERE set_date = '$today_date' ORDER BY name";
$results2 = $conn->query($get_stocks);
if ($results2->num_rows > 0) {
    while ($currentStock = $results2->fetch_assoc()) {
        $stock_id[] = $currentStock["id"];
        $stock_name[] = $currentStock["name"];
        $stock_price[] = $currentStock["price"];
        $stock_quantity[] = $currentStock["quantity"];
        $stock_date[] = $currentStock["date"];
    }
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $heading ?></title>
    <link rel="stylesheet" href="../styles/totalSales.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css">
    <script defer src="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/js/all.js"></script>
</head>

<body>
    <div class="navbar">
        <div class="page-name"><?php echo $heading2 ?> Dashboard</div>
        <a href="changePassword.php"> <i class="fas fa-key"></i> Change Password</a>
        <a href="logOut.php"> <i class="fas fa-user-alt"></i> Log Out</a>
    </div>

    <div class="main">
        <div class="inner-main">
            <div class="header"> <?php echo $heading ?> </div>
            <div class="table">
                <div class="table-head">
                    <div class="headbox">Drug</div>
                    <div class="headbox">Unit Price</div>
                    <div class="headbox">Quantity</div>
                    <div class="headbox">Date</div>
                </div>

                <?php
                if(count($stock_id) > 0) {
                for ($i = 0; $i < count($stock_id); $i++) {
                    echo <<<STOCK
                    <div class="table-data">
                    <div class="databox">{$stock_name[$i]}</div>
                    <div class="databox">GH¢{$stock_price[$i]}</div>
                    <div class="databox">{$stock_quantity[$i]}</div>
                    <div class="databox">{$stock_date[$i]}</div>
                    </div>

STOCK;
                }
            } else {
                echo "<div class='empty'> No Stock Available </div>";
            }


                ?>

            </div>
        </div>


    </div>

</body>

</html>