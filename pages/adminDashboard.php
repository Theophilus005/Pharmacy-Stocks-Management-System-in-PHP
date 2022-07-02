<?php
session_start();

if($_SESSION["userType"] != "Admin") {
    header("location: ../index.php");
}

$today_date = date("d/m/Y");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../styles/tellerDashboard.css">
    <link rel="stylesheet" href="../styles/navbar.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css">
    <script defer src="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/js/all.js"></script>
    <script src="../js/adminDashboard.js"></script>
</head>
<body onunload="" > 
<script>
    window.onload = function() {
        call();
    }
</script>
    <div class="navbar">
        <div class="page-name">Administrator Dashboard</div>
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
                        <div class="panelName">Sales Today</div>
                        <div class="panelIcon"><i class="fas fa-money-bill"></i></div>
                    </div>
                    <div class="rowTwo">
                        <div class="panelType">Report</div>
                        <div class="panelStat" id="amount">GH¢ <span id="todaySales"></span></div>
                    </div>
                </div>

                <div class="panel" id="transactions" onclick="window.location='dailyReport.php'">
                    <div class="rowOne">
                        <div class="panelName">Daily Report</div>
                        <div class="panelIcon"><i class="fas fa-book-medical"></i></div>
                    </div>
                    <div class="rowTwo">
                        <div class="panelType">Report</div>
                        <div class="panelStat" id="amount">Transactions Today: <span id="transToday"></span></div>
                    </div>
                </div>

                <div class="panel" id="openingStock" onclick="window.location='adminStock.php'">
                    <div class="rowOne">
                        <div class="panelName">Stocks</div>
                        <div class="panelIcon"><i class="fas fa-arrow-up"></i></div>
                    </div>
                    <div class="rowTwo">
                        <div class="panelType">Edit</div>
                        <div class="panelStat" id="amount">Total Stock: <span id="stockTotal"></span></div>
                    </div>
                </div>

                <div class="panel" id="closingStock" onclick="window.location='manageUsers.php'">
                    <div class="rowOne">
                        <div class="panelName">Manage Users</div>
                        <div class="panelIcon"><i class="fas fa-arrow-down"></i></div>
                    </div>
                    <div class="rowTwo">
                        <div class="panelType">Manage</div>
                        <div class="panelStat" id="amount">Total Users: <span id="userTotal"></span></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>