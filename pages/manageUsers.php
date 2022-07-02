<?php
require_once "../php/databaseConnection.php";

session_start();

if($_SESSION["userType"] != "Admin") {
    header("location: ../index.php");
}

//Get Tellers
$teller_name = array();
$teller_date = array();
$teller_default_password = array();
$teller_level = array();

$get_tellers = "SELECT * FROM users WHERE userType = 'Teller' ";
$results = $conn->query($get_tellers);
if($results->num_rows > 0) {
    while($teller = $results->fetch_assoc()) {
        $teller_name[] = $teller["name"];
        $teller_date[] = $teller["date"];
        $teller_default_password[] = $teller["default_password"];
        $teller_level[] = $teller["level"];
    }
}


//Get Administrators
$admin_name = array();
$admin_date = array();
$admin_password = array();
$admin_level = array();

$get_admins = "SELECT * FROM users WHERE userType = 'Admin' ";
$results2 = $conn->query($get_admins);
if($results2->num_rows > 0) {
    while($admin = $results2->fetch_assoc()) {
        $admin_name[] = $admin["name"];
        $admin_date[] = $admin["date"];
        $admin_default_password[] = $admin["default_password"];
        $admin_level[] = $admin["level"];
    }
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Users</title>
        <link rel="stylesheet" href="../styles/manageUsers.css">
        <link rel="stylesheet" href="../styles/navbar.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css">
        <script defer src="../fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/js/all.js"></script>
        <script src="../js/manageUsers.js"></script>
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
                    <div class="stockText"> <i class="fas fa-user-alt"></i> Tellers </div>                    
                </div>

                <!-- Tellers table -->
                <div class="table">
                    <div class="table-head">
                        <div class="headbox">Name</div>
                        <div class="headbox">Date Added</div>
                        <div class="headbox">Default Password</div>
                        <div class="headbox" id="last">Remove</div>
                    </div>

                    <?php
                        if(count($teller_name) > 0) {
                        for($i=0; $i<count($teller_name); $i++) {
                           echo<<<TELLER
                            <div class="table-data">
                        <div class="databox">{$teller_name[$i]}</div>
                        <div class="databox">{$teller_date[$i]}</div>
                        <div class="databox">{$teller_default_password[$i]}</div>
                        <div class="databox" id="last">   
                        <div class="remove-btn" onclick="removeUser('{$teller_name[$i]}', 'Teller')" ><i class="fas fa-user-alt-slash"></i></div>
                        </div>
                        </div>
TELLER;
                            }
                            
                    } else {
                        echo "<div class='empty'>No Tellers Added</div>";
                    }


                    ?>                  
                </div>


                <!-- Administrators table -->

                <div class="header"> 
                    <div class="stockText"> <i class="fas fa-user-shield"> </i> Administrators </div>                    
                </div>
                

                <div class="table">
                    <div class="table-head">
                        <div class="headbox">Name</div>
                        <div class="headbox">Date Added</div>
                        <div class="headbox">Default Password</div>
                        <div class="headbox" id="last">Remove</div>
                    </div>

                    <?php
                    
                        for($i=0; $i<count($admin_name); $i++) {
                           $admin1 = <<<ADMIN1
                            <div class="table-data">
                        <div class="databox">{$admin_name[$i]}</div>
                        <div class="databox">{$admin_date[$i]}</div>
                        <div class="databox">{$admin_default_password[$i]}</div>
                        <div class="databox" id="last">
ADMIN1;                
                            if($admin_level[$i] == "super") {
                                $admin2 = <<<ADMIN2
                            <div class="remove-btn" onclick="alert('Can't remove this user')" ><i class="fas fa-user-alt-slash not"></i></div>
                            </div>
                            </div>
ADMIN2;
                            } else {
                                $admin2 = <<<ADMIN2
                            <div class="remove-btn" onclick="removeUser('{$admin_name[$i]}', 'Admin')" ><i class="fas fa-user-alt-slash"></i></div>
                            </div>
                            </div>
ADMIN2;
                            }
                            
                    $admin = $admin1.$admin2;
                    echo $admin;
                            
                        }
                    


                    ?> 
                </div>

                <button type="button" class="add-user-btn" onclick="window.location='addUser.php'"> <i class="fas fa-plus"></i> Add new users</button>


            </div>


        </div>
    
</body>
</html>