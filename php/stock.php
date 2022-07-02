<?php
require_once "databaseConnection.php";


if (isset($_GET["addStock"])) {
    $name = $_GET["name"];
    $price = $_GET["price"];
    $quantity = $_GET["quantity"];
    $date = date("d/m/Y, H:i a");

    //Check if name already exists
    $check_query = "SELECT * FROM stocks WHERE name = '$name'";
    $results = $conn->query($check_query);
    if ($results->num_rows > 0) {
        echo "Medicine is already in stocks";
    } else {
        //add
        $insert_query = "INSERT INTO stocks (name, price, quantity, date) VALUES ('$name', '$price', '$quantity', '$date')";
        if ($conn->query($insert_query)) {
            echo "Stock added";
        }
    }
}


if (isset($_GET["editStock"])) {
    $id = $_GET["id"];
    $name = $_GET["name"];
    $price = $_GET["price"];
    $quantity = $_GET["quantity"];
    $date = date("d/m/Y, H:i a");

    //Update
    $update_name = "UPDATE stocks SET name = '$name' WHERE id = '$id'";
    $update_price = "UPDATE stocks SET price = '$price' WHERE id = '$id'";
    $update_quantity = "UPDATE stocks SET quantity = '$quantity' WHERE id = '$id'";
    $update_date = "UPDATE stocks SET date = '$date' WHERE id = '$id'";

    $conn->query($update_name);
    $conn->query($update_price);
    $conn->query($update_quantity);
    $conn->query($update_date);

    echo "Stock updated";
}


//Fetch Current Stocks
if (isset($_GET["getStocks"]) && isset($_GET["searchKey"])) {

    //Arrays
    $id = array();
    $name = array();
    $price = array();
    $quantity = array();
    $date = array();

    $searchKey = $_GET["searchKey"];

    //search db
    if($searchKey == "none") {
    $search_query = "SELECT * FROM stocks ORDER BY name";
    } else {
    $search_query = "SELECT * FROM stocks WHERE name like '%$searchKey%' ORDER BY name";
    }
    $results = $conn->query($search_query);
    if ($results->num_rows > 0) {
        while ($stock = $results->fetch_assoc()) {
            $id[] = $stock["id"];
            $name[] = $stock["name"];
            $price[] = number_format($stock["price"], 2, ".", ",");
            $quantity[] = $stock["quantity"];
            $date[] = $stock["date"];
        }
    }

    if (count($id) > 0) {
        for ($i = 0; $i < count($id); $i++) {
            echo <<<STOCK
        <div class="table-data">
        <div class="databox">{$name[$i]}</div>
        <div class="databox">GH¢{$price[$i]}</div>
        <div class="databox">{$quantity[$i]}</div>
        <div class="databox">{$date[$i]}</div>
        <div class="databox" id="last">
            <div class="edit-btn" onclick="window.location='editStock.php?id={$id[$i]}'"><i class="fas fa-edit"></i></div>
            <div class="remove-btn" onclick="deleteStock('{$name[$i]}')"><i class="fas fa-trash"></i></div>
        </div>
    </div>
STOCK;
        }
    } else {
        echo "<div class='empty'>No stocks added</div>";
    }
}


//Fetch Closing Stocks
if (isset($_GET["getClosingStocks"])) {

    //Arrays
    $id = array();
    $name = array();
    $price = array();
    $quantity = array();
    $date = array();
    $today_date = date("d/m/Y");

    //search db
    $search_query = "SELECT * FROM closingStocks WHERE set_date = '$today_date' ORDER BY name";
    $results = $conn->query($search_query);
    if ($results->num_rows > 0) {
        while ($stock = $results->fetch_assoc()) {
            $id[] = $stock["id"];
            $name[] = $stock["name"];
            $price[] = number_format($stock["price"], 2, ".", ",");
            $quantity[] = $stock["quantity"];
            $date[] = $stock["date"];
        }
    }

    if (count($id) > 0) {
        for ($i = 0; $i < count($id); $i++) {
            echo <<<STOCK
        <div class="table-data">
        <div class="databox {$id[$i]}" onclick="selectClosingStock($id[$i])" id="selectable">{$name[$i]}</div>
        <div class="databox">GH¢{$price[$i]}</div>
        <div class="databox">{$quantity[$i]}</div>
        <div class="databox">{$date[$i]}</div>
        </div>
STOCK;
        }
    } else {
        echo "<div class='empty'> No Stocks Available</div>";
    }
}


//Search Closing Stocks
if (isset($_GET["searchClosingStocks"])) {

    $searchKey = $_GET["searchKey"];

    //Arrays
    $id = array();
    $name = array();
    $price = array();
    $quantity = array();
    $date = array();
    $today_date = date("d/m/Y");

    //search db
    $search_query = "SELECT * FROM closingStocks WHERE name like '%$searchKey%' AND set_date = '$today_date' ORDER BY name";
    $results = $conn->query($search_query);
    if ($results->num_rows > 0) {
        while ($stock = $results->fetch_assoc()) {
            $id[] = $stock["id"];
            $name[] = $stock["name"];
            $price[] = number_format($stock["price"], 2, ".", ",");
            $quantity[] = $stock["quantity"];
            $date[] = $stock["date"];
        }
    }

    if (count($id) > 0) {
        for ($i = 0; $i < count($id); $i++) {
            echo <<<STOCK
        <div class="table-data">
        <div class="databox {$id[$i]}" id="selectable" onclick="selectClosingStock($id[$i])">{$name[$i]}</div>
        <div class="databox">GH¢{$price[$i]}</div>
        <div class="databox">{$quantity[$i]}</div>
        <div class="databox">{$date[$i]}</div>
        </div>
STOCK;
        }
    } else {
        echo "<div class='empty'>No results found</div>";
    }
}



if (isset($_GET["deleteStock"])) {
    $stockName = $_GET["stockName"];

    //delete
    $delete_query = "DELETE FROM stocks WHERE name = '$stockName'";
    if ($conn->query($delete_query)) {
        echo $stockName . " deleted";
    }
}


if (isset($_GET["sell"])) {
    $name = $_GET["name"];
    $quantity = $_GET["quantity"];
    $date = date("d/m/Y");


    //Check if medicine and quantity is valid
    $check_query = "SELECT * FROM closingStocks WHERE name = '$name' AND set_date = '$date'";
    $results = $conn->query($check_query);
    if ($results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            $quantity_db = $data["quantity"];
            $unit_price = $data["price"];
        }

        if ($quantity > $quantity_db) {
            echo "Out of stock";
        } else {
            //make transaction
            $total = $quantity * $unit_price;
            $insert_transaction = "INSERT INTO transactions (name, unit_price, quantity, total, date) VALUES ('$name', '$unit_price', '$quantity', '$total', '$date')";
            $conn->query($insert_transaction);

            //update quantity in current stock and closing stock

            $remaining = $quantity_db - $quantity;

            $update_current_stocks = "UPDATE stocks SET quantity = '$remaining' WHERE name = '$name'";
            $conn->query($update_current_stocks);

            $update_closing_stocks = "UPDATE closingStocks SET quantity = '$remaining' WHERE name = '$name' AND set_date = '$date'";
            $conn->query($update_closing_stocks);

            echo "Transaction successful";
        }
    } else {
        echo "Medicine not in stock";
    }
}
