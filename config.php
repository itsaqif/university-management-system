<?php
session_start();
$dbHost = 'localhost';
$dbName = 'university';
$dbUsername = 'root';
$dbPassword = '';
$dbc= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
