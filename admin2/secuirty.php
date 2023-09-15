<?php
session_start();

include("database/dbconfig.php");

$connection = mysqli_connect("localhost", "root", "", "adminpanel");

if(!$_SESSION['username']){
    header("Location: login.php");
}
?>

