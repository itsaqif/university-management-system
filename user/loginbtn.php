<?php

// include("secuirty.php");
include("database/dbconfig.php");
if(isset($_POST['login_btn'])){
    $id_login = $_POST['id'];
    $_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email = '$email_login' AND password = '$password_login'";
    
    $query_run = mysqli_query($connection, $query);
    $usertypes = mysqli_fetch_array($query_run);
    if($email_login == $usertypes['email']  OR $password_login == $usertypes['password']){
        if($usertypes['usertype'] == "admin")
        {
            $_SESSION['username'] = $email_login;
            header('Location: index.php');
        }
        else{
            $_SESSION['username'] = $email_login;
            header('Location: ../index.php');
        }
    }

    else {
        $_SESSION['status'] = "Email Id / password is Invalid";
        header('Location: login.php');
    }
}

?>