<?php
session_start();
$dbHost = 'localhost';
$dbName = 'uni_manage';
$dbUsername = 'root';
$dbPassword = '';
$dbc= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
