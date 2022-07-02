<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["userType"]);
session_destroy();
header("location: ../index.php");

?>