<?php

$server_name = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "adminpanel";

$connection = mysqli_connect($server_name, $db_username, $db_password, $db_name);
// $dbconfig = mysqli_select_db($connection, $db_name);

if ($connection) {
    // echo "database Connected Successfully";
} else {
    echo '


?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<center>
<div class="container-9" >
    <div class="row">
        <div class="col-md-6 mr-auto ml-auto text-center py-5 mt-5">
            <div class="card">
                <div class="card-body" >
                    <h1 class="card-title bg-danger text-white">Database Connection Failed</h1>
                    <h2 class="card-title">Database Failure</h2>
                    <p class="card-text">Please Check your database connection </p>
                    <a href="index.php" class="btn btn-primary">Go Back to Home Page</a>
                </div>
            </div>
        </div>
    </div>
</div>
</center>
';
}
