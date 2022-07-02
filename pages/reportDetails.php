<?php
require_once "../php/databaseConnection.php";
session_start();

if($_SESSION["userType"] != "Admin") {
    header("location: ../index.php");
}

if(!isset($_GET["date"])) {
    header("location: dailyReport.php");
} else  {
    $date = $_GET["date"];
}


//Get total Sales
$id = array();
$name = array();
$unit_price = array();
$quantity = array();
$total = array();

$today_date = date("d/m/Y");
$total_sales = 0;

$get_sales_query = "SELECT * FROM transactions WHERE date = '$date'";
$results = $conn->query($get_sales_query);
if($results->num_rows > 0) {
    while($transaction = $results->fetch_assoc()) {
        $id[] = $transaction["id"];
        $name[] = $transaction["name"];
        $unit_price[] = number_format($transaction["unit_price"], 2, ".", ",");
        $quantity[] = $transaction["quantity"];
        $total[] = number_format($transaction["total"], 2, ".", ",");
       
    }
}

for($i=0; $i<count($total); $i++) {
    $total_sales = $total_sales + $total[$i];
}

$total_sales = number_format($total_sales, 2, ".", ",");


//Get Total opening Stocks
$quantity3 = array();
$totalOpeningStock = 0;

//search db
$search_query = "SELECT * FROM openingStocks WHERE set_date = '$date'";
$results = $conn->query($search_query);
if ($results->num_rows > 0) {
    while ($stock = $results->fetch_assoc()) {
        $quantity3[] = $stock["quantity"];
    }
}

for ($i = 0; $i < count($quantity3); $i++) {
    $totalOpeningStock = $totalOpeningStock + $quantity3[$i];
}


//Get Total closing Stocks
$quantity2 = array();
$totalClosingStock = 0;

//search db
$search_query2 = "SELECT * FROM closingStocks WHERE set_date = '$date'";
$results2 = $conn->query($search_query2);
if ($results2->num_rows > 0) {
    while ($stock2 = $results2->fetch_assoc()) {
        $quantity2[] = $stock2["quantity"];
    }
}

for ($i = 0; $i < count($quantity2); $i++) {
    $totalClosingStock = $totalClosingStock + $quantity2[$i];
}





?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Report Details</title>
        <link rel="stylesheet" href="../styles/reportDetails.css">
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

                <div class="datePanel" onclick="window.location='reportDetails.html'">
                    <div class="row1">
                        <div class="date"> Report for <?php echo $date ?> </div>
                        <div class="icon"> <i class="fas fa-bookmark"></i>  </div>
                    </div>
                </div>

                <div class="header"> Sales Report </div>
                <div class="table">
                    <div class="table-head">
                        <div class="headbox">Drug</div>
                        <div class="headbox">Unit Price</div>
                        <div class="headbox">Quantity</div>
                        <div class="headbox">Total</div>
                    </div>

                    <?php
                        for($i=0; $i<count($id); $i++) {
                            echo <<<TRANSACTION
                        <div class="table-data">
                        <div class="databox">{$name[$i]}</div>
                        <div class="databox">GH¢{$unit_price[$i]}</div>
                        <div class="databox">{$quantity[$i]}</div>
                        <div class="databox">GH¢{$total[$i]}</div>
                        </div>
TRANSACTION;
                        }

?>
                    
                    <div class="table-total">
                        <div class="databox">Total: GH¢ <?php echo $total_sales ?></div>
                    </div>

                </div>

                <div class="header"> Stock Report </div>

                <div class="panels">

                <div class="panel" id="openingStock" onclick="window.location='tellerStock.php?type=opening&date=<?php echo $date ?>'">
                    <div class="rowOne">
                        <div class="panelName">Opening Stock</div>
                        <div class="panelIcon"><i class="fas fa-arrow-up"></i></div>
                    </div>
                    <div class="rowTwo">
                        <div class="panelType">Drugs</div>
                        <div class="panelStat" id="amount">Total Stock: <?php echo $totalOpeningStock  ?> </div>
                    </div>
                </div>

                <div class="panel" id="closingStock" onclick="window.location='tellerStock.php?type=closing&date=<?php echo $date ?>'">
                    <div class="rowOne">
                        <div class="panelName">Closing Stock</div>
                        <div class="panelIcon"><i class="fas fa-arrow-down"></i></div>
                    </div>
                    <div class="rowTwo">
                        <div class="panelType">Drugs</div>
                        <div class="panelStat" id="amount">Total Stock: <?php echo $totalClosingStock ?> </div>
                    </div>
                </div>

            </div>

            </div>


        </div>
    
</body>
</html>