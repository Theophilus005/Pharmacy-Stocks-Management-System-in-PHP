<?php
require_once "../php/databaseConnection.php";
session_start();

if($_SESSION["userType"] != "Admin") {
    header("location: ../index.php");
}

//Get dates

$dates = array();

$get_dates_query = "SELECT * FROM stockStates";
$results = $conn->query($get_dates_query);
if($results->num_rows > 0) {
    while($data = $results->fetch_assoc()) {
        $dates[] = $data["date"];
    }
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daily Report</title>
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
                <div class="header"> 
                    <div class="stockText"> Select Report Date </div> 
                </div>
                <div class="dates">
                                
                <?php
                    if(count($dates) > 0) {
                    for($i=0; $i<count($dates); $i++) {
                        echo <<<DATEPANEL
                        <div class="datePanel" onclick="window.location='reportDetails.php?date={$dates[$i]}'">
                        <div class="row1">
                            <div class="date"> {$dates[$i]} </div>
                            <div class="icon"> <i class="fas fa-bookmark"></i>  </div>
                        </div>
                    </div>
DATEPANEL;
                    }
                } else {
                    echo "<div class='empty'>No Reports Yet</div>";
                }

?>
                                 

                </div>
            </div>


        </div>
    
</body>
</html>