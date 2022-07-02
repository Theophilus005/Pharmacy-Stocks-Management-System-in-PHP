<?php
require_once "php/set_db.php";
require_once "php/set_db_tables.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mariam Adam License Chemical Pharmacy</title>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css">
    <script defer src="fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/js/all.js"></script>
</head>
<body>

    <div class="main">

        <div class="content">
            <div class="header">Mariam Adam License Chemical Pharmacy</div>
        <div class="image">
            <img src="images/pharmacy.svg" alt="">
        </div>

        <div class="buttons">
            <button type="button" class="teller-btn" onclick="window.location='pages/tellerAuth.php'"> <i class="fas fa-user"></i> Teller</button>
            <button type="button" class="admin-btn" onclick="window.location='pages/adminAuth.php'"><i class="fas fa-user-shield"></i>Administrator</button>
        </div>
    </div>
    </div>
    
</body>
</html>