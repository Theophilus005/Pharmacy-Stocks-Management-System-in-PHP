<?php
require_once "databaseConnection.php";

$today_date = date("d/m/Y");

//Create tables
$create_users_table = "CREATE TABLE IF NOT EXISTS users (
    name VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255),
    userType VARCHAR(255),
    default_password VARCHAR(255),
    is_password_default VARCHAR(255),
    level VARCHAR(255),
    date VARCHAR(255)
    )";

$conn->query($create_users_table);

$create_stocks_table = "CREATE TABLE IF NOT EXISTS stocks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    price VARCHAR(255),
    quantity VARCHAR(255),
    date VARCHAR(255)
    )";

$conn->query($create_stocks_table);

$create_opening_stocks_table = "CREATE TABLE IF NOT EXISTS openingStocks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    price VARCHAR(255),
    quantity VARCHAR(255),
    date VARCHAR(255),
    set_date VARCHAR(255)
    )";

$conn->query($create_opening_stocks_table);

$create_closing_stocks_table = "CREATE TABLE IF NOT EXISTS closingStocks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    price VARCHAR(255),
    quantity VARCHAR(255),
    date VARCHAR(255),
    set_date VARCHAR(255)
    )";

$conn->query($create_closing_stocks_table);

$create_transactions_table = "CREATE TABLE IF NOT EXISTS transactions(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    unit_price VARCHAR(255),
    quantity VARCHAR(255),
    total VARCHAR(255),
    date VARCHAR(255)
    )"; 

$conn->query($create_transactions_table);

$create_table_stock_states = "CREATE TABLE IF NOT EXISTS stockStates (
    date VARCHAR(255) PRIMARY KEY,
    stocks VARCHAR(255)
    )";

$conn->query($create_table_stock_states);


//Insert Administrator
$insert_admin = "INSERT INTO users VALUES ('Administrator', 'e3afed0047b08059d0fada10f400c1e5', 'Admin', 'Admin', 'N', 'super', '$today_date')";
$conn->query($insert_admin);



?>