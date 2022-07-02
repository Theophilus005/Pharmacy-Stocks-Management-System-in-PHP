<?php
require_once "../php/databaseConnection.php";

session_start();

if($_SESSION["userType"] != "Admin") {
    header("location: ../index.php");
}

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $date = date("d/m/Y, H:i a");

    //Check if name already exists
    $check_query = "SELECT * FROM stocks WHERE id = '$id'";
    $results = $conn->query($check_query);
    if($results->num_rows > 0) {
        while($stock = $results->fetch_assoc()) {
            $name = $stock["name"];
            $price = $stock["price"];
            $quantity = $stock["quantity"];
        }
    } else {
        $name = "";
        $price = "";
        $quantity = "";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Stock</title>
        <link rel="stylesheet" href="../styles/addStock.css">
        <link rel="stylesheet" href="../styles/navbar.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css">
        <script defer src="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/js/all.js"></script>
        <script src="../js/stock.js"></script>
    </head>
    <body>
        <div class="navbar">
            <div class="page-name">Administrator Dashboard</div>
            <a href="changePassword.php"> <i class="fas fa-key"></i> Change Password</a>
        <a href="logOut.php"> <i class="fas fa-user-alt"></i> Log Out</a>
        </div>

        <div class="main">
            <div class="inner-main">
                <div class="header"> 
                    <div class="stockText"> Stock Form </div>                    
                </div>
                <div class="form">
                    
                    <input type="text" class="name" placeholder="Name" value="<?php echo $name ?>">
                    <input type="text" class="price" placeholder="Unit Price" value="<?php echo $price ?>">
                    <input type="text" class="quantity" placeholder="Quantity" value="<?php echo $quantity ?>">
                    
                    <button type="button" onclick="editStock('<?php echo $id ?>')" class="add-btn"> Edit Stock </button>

                </div>
            </div>


        </div>
    
</body>
</html>