<?php
require_once "../php/databaseConnection.php";

session_start();

if (!isset($_SESSION["userType"])) {
    header("location: ../index.php");
}

if($_SESSION["userType"] == "Admin") {
    $heading = "Administrator";
} else {
    $heading = "Teller";
}

//Get total Sales
$id = array();
$name = array();
$unit_price = array();
$quantity = array();
$total = array();
$date = array();

$today_date = date("d/m/Y");
$total_sales = 0;

$get_sales_query = "SELECT * FROM transactions WHERE date = '$today_date'";
$results = $conn->query($get_sales_query);
if ($results->num_rows > 0) {
    while ($transaction = $results->fetch_assoc()) {
        $id[] = $transaction["id"];
        $name[] = $transaction["name"];
        $unit_price[] = number_format($transaction["unit_price"], 2, ".", ",");
        $quantity[] = $transaction["quantity"];
        $total[] = number_format($transaction["total"], 2, ".", ",");
        $date[] = $transaction["date"];
    }
}

for ($i = 0; $i < count($total); $i++) {
    $total_sales = $total_sales + $total[$i];
}

$total_sales = number_format($total_sales, 2, ".", ",");




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Sales</title>
    <link rel="stylesheet" href="../styles/totalSales.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css">
    <script defer src="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/js/all.js"></script>
</head>

<body>
    <div class="navbar">
        <div class="page-name"><?php echo $heading ?> Dashboard</div>
        <a href="changePassword.php"> <i class="fas fa-key"></i> Change Password</a>
        <a href="logOut.php"> <i class="fas fa-user-alt"></i> Log Out</a>
    </div>

    <div class="main">
        <div class="inner-main">
            <div class="header"> Sales Report </div>
            <div class="table">
                <div class="table-head">
                    <div class="headbox">Drug</div>
                    <div class="headbox">Unit Price</div>
                    <div class="headbox">Quantity</div>
                    <div class="headbox">Total</div>
                </div>

                <?php
                if (count($id) > 0) {
                    for ($i = 0; $i < count($id); $i++) {
                        echo <<<TRANSACTION
                        <div class="table-data">
                        <div class="databox">{$name[$i]}</div>
                        <div class="databox">GH¢{$unit_price[$i]}</div>
                        <div class="databox">{$quantity[$i]}</div>
                        <div class="databox">GH¢{$total[$i]}</div>
                    </div>
TRANSACTION;
                    }
                } else {
                    echo "<div class='empty'>No Sales Yet</div>";
                }

                ?>

                <div class="table-total">
                    <div class="databox">Total: GH¢<?php echo $total_sales ?></div>
                </div>

            </div>
        </div>


    </div>

</body>

</html>