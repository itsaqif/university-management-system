
<?php
include("../config.php");
// User Profile Insert data php

if (isset($_POST['userdata_btn'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $image = $_FILES['user_image']['name'];

    if (file_exists("userprofile/" . $_FILES["user_image"]["name"])) {
        $store = $_FILES["user_image"]['name'];
        $_SESSION['status'] = "Image Already Exists. '.$store.'";
        header("Location: userprofile.php");
    } else {

        $query = "INSERT INTO users (fname, lname, username, email, password ,image) VALUES ('$fname', '$lname','$username', '$email', '$password', '$image')";

        $query_run = mysqli_query($dbc, $query);



        if ($query_run) {
            move_uploaded_file($_FILES["user_image"]["tmp_name"], "userprofile/" . $_FILES["user_image"]["name"]);
            $_SESSION['success'] = "User Profile Added";
            header("Location: userprofile.php");
        } else {
            $_SESSION['status'] = "User Profile Not Added";
            header("Location: userprofile.php");
        }
    }
}


// update User profile data

if (isset($_POST['userprofile_update_btn'])) {
    $edit_id = $_POST['edit_id'];
    $edit_fname = $_POST['edit_fname'];
    $edit_lname = $_POST['edit_lname'];
    $edit_username = $_POST['edit_username'];
    $edit_email = $_POST['edit_email'];
    $edit_password = $_POST['edit_password'];
    $edit_user_image = $_FILES['edit_user_image']["name"];

    $img_types = array('image/jpg', 'image/png', 'image/jpeg');

    $validate_img_extension = in_array($_FILES['edit_user_image']["type"], $img_types);



    if ($validate_img_extension) {
        $query  = "UPDATE users SET fname = '$edit_fname' , lname = '$edit_lname', username = '$edit_username', email = '$edit_email', password = '$edit_password'  , image = '$edit_user_image' WHERE id = '$edit_id'";

        $query_run = mysqli_query($dbc, $query);

        if ($query_run) {
            move_uploaded_file($_FILES["edit_user_image"]["tmp_name"], "userprofile/" . $_FILES["edit_user_image"]["name"]);
            $_SESSION['success'] = "User Profile Updated";
            header("Location: userprofile.php");
        } else {
            $_SESSION['status'] = "User Profile Not Updated";
            header("Location: userprofile.php");
        }
    } else {
        $_SESSION['status'] = "Only JPG PNG and JPEG files are allowed";
        header("Location: userprofile.php");
    }
}


// Delete User Profile

if (isset($_POST['userprofile_delete_btn'])) {

    $id = $_POST['delete_id'];

    $query = "DELETE FROM users WHERE id = '$id' ";

    $query_run = mysqli_query($dbc, $query);

    if ($query_run) {
        $_SESSION['success'] = "User Profile Deleted";
        header("Location: userprofile.php");
    } else {
        $_SESSION['status'] = "User Profile Not Deleted";
        header("Location: userprofile.php");
    }
}
?>