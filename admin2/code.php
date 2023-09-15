<?php

include("secuirty.php");

if (isset($_POST['registerbtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    if ($password === $cpassword) {
        $query = "INSERT INTO register(username, email, password, usertype) VALUES ('$username', '$email', '$password', '$usertype')";
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            $_SESSION['success'] = "Admin Profile Added";
            header('Location: register.php');
        } else {
            $_SESSION['status'] = "Admin Profile Not Added";
            header('Location: register.php');
        }
    } else {
        $_SESSION['status'] = "password and confirm password Does Not Match";
        header('Location: register.php');
    }
}



// Update data

if (isset($_POST['updatebtn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $usertypeupdate = $_POST['usertype'];

    $query = "UPDATE register SET username= '$username', email = '$email', password = '$password', usertype = '$usertypeupdate' WHERE id = '$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your data is Updated Successfully";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Your data is not Updated";
        header('Location: register.php');
    }
}




if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM register WHERE id = '$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your data is Deleted";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "Your data is not Deleted";
        header('Location: register.php');
    }
}



// About Us Page Update

if (isset($_POST['about_save'])) {
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $description = $_POST['description'];
    $links = $_POST['links'];

    $query = "INSERT INTO abouts (title, subtitle, description, links) VALUES('$title', 'subtitle', '$description', '$links')";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "About Us Added";
        header("Location: aboutus.php");
    } else {
        $_SESSION['status'] = "About Us Not Added";
        header("Location: aboutus.php");
    }
}




// Update About US Data

if (isset($_POST['update_btn'])) {
    $id = $_POST['edit_id'];
    $title = $_POST['edit_title'];
    $subtitle = $_POST['edit_subtitle'];
    $description = $_POST['edit_description'];
    $links = $_POST['edit_links'];

    $query = "UPDATE abouts SET title= '$title', subtitle = '$subtitle', description = '$description', links = '$links' WHERE id = '$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your data is Updated Successfully";
        header('Location: aboutus.php');
    } else {
        $_SESSION['status'] = "Your data is not Updated";
        header('Location: aboutus.php');
    }
}


// Delete About Us data

if (isset($_POST['about_delete_btn'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM abouts WHERE id = '$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your data is Deleted";
        header('Location: aboutus.php');
    } else {
        $_SESSION['status'] = "Your data is not Deleted";
        header('Location: aboutus.php');
    }
}


// faculty php

if (isset($_POST['save_faculty'])) {
    $name = $_POST['faculty_name'];
    $design = $_POST['faculty_designation'];
    $description = $_POST['faculty_description'];
    $images = $_FILES['faculty_image']["name"];

    // $validate_img_extension = $_FILES['faculty_image']["type"] == "image/jpg" ||
    // $_FILES['faculty_image']["type"] == "image/png" ||
    // $_FILES['faculty_image']["type"] == "image/jpeg";


    $img_types = array('image/jpg', 'image/png', 'image/jpeg');

    $validate_img_extension = in_array($_FILES['faculty_image']["type"], $img_types);



    if ($validate_img_extension) {
        if (file_exists("upload/" . $_FILES["faculty_image"]["name"])) {
            $store = $_FILES["faculty_image"]['name'];
            $_SESSION['status'] = "Image Already Exists. '.$store.'";
            header("Location: faculties.php");
        } else {

            $query = "INSERT INTO faculty (name, design, descrip, images) VALUES ('$name', '$design', '$description','$images')";

            $query_run = mysqli_query($connection, $query);



            if ($query_run) {
                move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/" . $_FILES["faculty_image"]["name"]);
                $_SESSION['success'] = "Faculty Added";
                header("Location: faculties.php");
            } else {
                $_SESSION['status'] = "Faculty Not Added";
                header("Location: faculties.php");
            }
        }
    } else {
        $_SESSION['status'] = "Only JPG PNG and JPEG files are allowed";
        header("Location: faculties.php");
    }
}

// Faculty Update button Edit

if (isset($_POST['faculty_update_btn'])) {
    $edit_id = $_POST['edit_id'];
    $edit_name = $_POST['edit_name'];
    $edit_designation = $_POST['edit_designation'];
    $edit_description = $_POST['edit_description'];
    $edit_faculty_image = $_FILES['faculty_image']["name"];

    $img_types = array('image/jpg', 'image/png', 'image/jpeg');

    $validate_img_extension = in_array($_FILES['faculty_image']["type"], $img_types);



    if ($validate_img_extension) {
        $query  = "UPDATE faculty SET name = '$edit_name', design = '$edit_designation', descrip = '$edit_description', images = '$edit_faculty_image' WHERE id = '$edit_id'";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/" . $_FILES["faculty_image"]["name"]);
            $_SESSION['success'] = "Faculty Updated";
            header("Location: faculties.php");
        } else {
            $_SESSION['status'] = "Faculty Not Updated";
            header("Location: faculties.php");
        }
    } else {
        $_SESSION['status'] = "Only JPG PNG and JPEG files are allowed";
        header("Location: faculties.php");
    }
}


// Delete Faculty data php code


if (isset($_POST['faculty_delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM faculty WHERE id = '$id' ";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Faculty data Deleted";
        header("Location: faculties.php");
    } else {
        $_SESSION['status'] = "Faculty data Not Deleted";
        header("Location: faculties.php");
    }
}


// Insert Departments data


if (isset($_POST['dept_save'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['dept_image']['name'];

    if (file_exists("upload/departments" . $_FILES["dept_image"]["name"])) {
        $store = $_FILES["dept_image"]['name'];
        $_SESSION['status'] = "Image Already Exists. '.$store.'";
        header("Location: departments.php");
    } else {

        $query = "INSERT INTO dept_category (name, description, image) VALUES ('$name', '$description','$image')";

        $query_run = mysqli_query($connection, $query);



        if ($query_run) {
            move_uploaded_file($_FILES["dept_image"]["tmp_name"], "upload/departments" . $_FILES["dept_image"]["name"]);
            $_SESSION['success'] = "Department Added";
            header("Location: departments.php");
        } else {
            $_SESSION['status'] = "Department Not Added";
            header("Location: departments.php");
        }
    }
}


// Update department

if (isset($_POST['dept_update_btn'])) {
    $edit_dept_id = $_POST['edit_dept_id'];
    $edit_dept_name = $_POST['edit_dept_name'];
    $edit_dept_description = $_POST['edit_dept_description'];
    $edit_dept_image = $_FILES['edit_dept_image']["name"];

    $img_types = array('image/jpg', 'image/png', 'image/jpeg');

    $validate_img_extension = in_array($_FILES['edit_dept_image']["type"], $img_types);



    if ($validate_img_extension) {
        $query  = "UPDATE dept_category SET name = '$edit_dept_name' , description = '$edit_dept_description', image = '$edit_dept_image' WHERE id = '$edit_dept_id'";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            move_uploaded_file($_FILES["edit_dept_image"]["tmp_name"], "upload/" . $_FILES["edit_dept_image"]["name"]);
            $_SESSION['success'] = "Department Updated";
            header("Location: departments.php");
        } else {
            $_SESSION['status'] = "Department Not Updated";
            header("Location: departments.php");
        }
    } else {
        $_SESSION['status'] = "Only JPG PNG and JPEG files are allowed";
        header("Location: departments.php");
    }
}

// Delete Department data php code


if (isset($_POST['dept_cate_deletebtn'])) {

    $id = $_POST['delete_id'];

    $query = "DELETE FROM dept_category WHERE id = '$id' ";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Department data Deleted";
        header("Location: departments.php");
    } else {
        $_SESSION['status'] = "Department data Not Deleted";
        header("Location: departments.php");
    }
}

// department list Part

if (isset($_POST['dept_catlist_save'])) {
    $dept_cate_id =  $_POST['dept_cate_id'];
    $name =  $_POST['name'];
    $description =  $_POST['description'];
    $section =  $_POST['section'];

    $query = "INSERT INTO dept_category_list (dept_cate_id, name, descrip, section) VALUES('$dept_cate_id', '$name', '$description', '$section')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Department Category List is Added";
        header("Location: departments-list.php");
    } else {
        $_SESSION['status'] = "Department Category List is not Added";
        header("Location: departments-list.php");
    }
}

// Department list Edit Part

if (isset($_POST['dept_cate_listupdate_btn'])) {
    $updating_id = $_POST['updating_id'];
    $dept_cate_id = $_POST['dept_cate_id'];
    $edit_deptlist_name = $_POST['edit_deptlist_name'];
    $edit_dept_description = $_POST['edit_dept_description'];
    $edit_section = $_POST['edit_section'];

    $query = "UPDATE dept_category_list SET dept_cate_id = '$dept_cate_id', name= '$edit_deptlist_name', descrip = '$edit_dept_description', section = '$edit_section' WHERE id = '$updating_id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Your data is Updated Successfully";
        header('Location: departments-list.php');
    } else {
        $_SESSION['status'] = "Your data is not Updated";
        header('Location: departments-list.php');
    }
}


// Delete Department categroy list 

if (isset($_POST['dept_catelist_deletebtn'])) {

    $id = $_POST['delete_id'];

    $query = "DELETE FROM dept_category_list WHERE id = '$id' ";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "Department List Deleted";
        header("Location: departments-list.php");
    } else {
        $_SESSION['status'] = "Department List not Deleted";
        header("Location: departments-list.php");
    }
}

?>

<?php

include("includes/scripts.php");

?>