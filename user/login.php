<!DOCTYPE html>
<?php require_once("database/config.php");

if (!empty($_SESSION['autheticator'])) {
    header("location:index.php");
}

?>
<html>

<head><br>
    <title> Login - ACTIV UNIVERSITY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="login_form">

                    <form class="text-left" method="post">
                        <div class="form">

                            <div id="username-field" class="field-wrapper input">
                                <label for="username">USERNAME</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <input id="username" name="user_name" type="text" class="form-control" placeholder="e.g John_Doe" required>
                            </div>

                            <div id="password-field" class="field-wrapper input mb-2">
                                <div class="d-flex justify-content-between">
                                    <label for="password">PASSWORD</label>
                                    <a href="password_reset.php" class="forgot-pass-link">Forgot Password?</a>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input id="password" name="password" type="password" class="form-control" placeholder="Password" required="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </div>
                            <form method="post" action="verify.php">

                            </form>

                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">Log In</button>
                                </div>
                            </div>


                        </div>

                </div>
                </form>
                <?php

                if ($_POST) {

                    $date = date("Y-m-d h:i:s");
                    // $ip_address = get_client_ip();
                    $user_name = strtolower(mysqli_real_escape_string($dbc, $_POST['user_name']));
                    $password = mysqli_real_escape_string($dbc, $_POST['password']);


                    $select = "select * from user_registration where user_name='$user_name' and password='$password'";
                    $res = mysqli_query($dbc, $select);
                    $data = mysqli_fetch_array($res);


                    if ($data['user_name'] != $user_name or $data['password'] != $password or $data['login_status'] == 'Block') {
                        $_SESSION['no'] = 'ok';
                ?> <script type="text/javascript">
                            window.location.href = "login.php"
                        </script> <?php
                                } elseif ($data['user_name'] == $user_name and $data['password'] == $password) {
                                    //   $_SESSION['last_login'] = $data['last_login'];           
                                    //   $_SESSION['last_ip'] = $data['last_ip'];           
                                    //   $_SESSION['user_name']=$user_name; 
                                    //   $_SESSION['du_user']=$data['user_name']; 
                                    //   $_SESSION['user_email']=$data['email'];  
                                    //   $_SESSION['user_id']=$data['id'];

                                    // $update_login=mysqli_query($dbc,"update user_registration set last_login = '$date', last_ip = '$ip_address', pop_up_status = 1 where user_name = '$user_name'");


                                    if ($data['two_factors'] == "enable") {
                                    } else {
                                        $_SESSION['autheticator'] = "ok";
                                    ?>
                            <script type="text/javascript">
                                window.location.href = "index.php"
                            </script> <?php
                                    }
                                }
                            } ?>
            </div>
        </div>
    </div>
    </div>
    </div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-2.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/canvas.js"></script>
    <script src="assets/js/polygonizr.min.js"></script>

</body>
<script>
    $('#emp_name').click(function() {
        if ($('#username').val() == '') {
            alert('please enter your name');
        }
    });

    $('#username').keypress(function(e) {
        var regex = new RegExp("^[a-zA-Z0-9@&]*$");
        var strigChar = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(strigChar)) {
            return true;
        }
        return false
    });



    $('#emp_name').click(function() {
        if ($('#password').val() == '') {
            alert('please enter your name');
        }
    });

    $('#password').keypress(function(e) {
        var regex = new RegExp("^[a-zA-Z0-9@!#$%^&*()]*$");
        var strigChar = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(strigChar)) {
            return true;
        }
        return false
    });
</script>

</html>