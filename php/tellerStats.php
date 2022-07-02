<?php
require_once "databaseConnection.php";

if (isset($_GET["getTotal"])) {

    //Get total Sales
    $total = array();
    $today_date = date("d/m/Y");
    $total_sales = 0;

    $get_sales_query = "SELECT * FROM transactions WHERE date = '$today_date'";
    $results = $conn->query($get_sales_query);
    if ($results->num_rows > 0) {
        while ($transaction = $results->fetch_assoc()) {
            $total[] = number_format($transaction["total"], 2, ".", ",");
        }
    }

    for ($i = 0; $i < count($total); $i++) {
        $total_sales = $total_sales + $total[$i];
    }

    echo number_format($total_sales, 2, ".", ",");
}


if (isset($_GET["getOpeningStocksTotal"])) {
    //Arrays
    $quantity = array();
    $total = 0;
    $today_date = date("d/m/Y");

    //search db
    $search_query = "SELECT * FROM openingStocks WHERE set_date = '$today_date'";
    $results = $conn->query($search_query);
    if ($results->num_rows > 0) {
        while ($stock = $results->fetch_assoc()) {
            $quantity[] = $stock["quantity"];
        }
    }

    for ($i = 0; $i < count($quantity); $i++) {
        $total = $total + $quantity[$i];
    }

    echo $total;
}

if (isset($_GET["getClosingStocksTotal"])) {
    //Arrays
    $quantity = array();
    $total = 0;
    $today_date = date("d/m/Y");

    //search db
    $search_query = "SELECT * FROM closingStocks WHERE set_date = '$today_date'";
    $results = $conn->query($search_query);
    if ($results->num_rows > 0) {
        while ($stock = $results->fetch_assoc()) {
            $quantity[] = $stock["quantity"];
        }
    }

    for ($i = 0; $i < count($quantity); $i++) {
        $total = $total + $quantity[$i];
    }

    echo $total;
}



if (isset($_GET["getTransactionsTotal"])) {
    //Get total Sales
    $today_date = date("d/m/Y");

    $get_sales_query = "SELECT * FROM transactions WHERE date = '$today_date'";
    $results = $conn->query($get_sales_query);
    $total = $results->num_rows;

    echo $total;
}

