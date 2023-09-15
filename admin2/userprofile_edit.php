<?php
include("../config.php");
include("includes/header.php");
include("includes/navbar.php");


?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit User Profile</h6>
        </div>
    </div>
    <div class="card-body">
        <?php
        if (isset($_POST['user_edit_btn'])) {
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM users WHERE id = '$id' ";

            $query_run = mysqli_query($dbc, $query);

            foreach ($query_run as $row) {

        ?>

                <form action="userprofilecode.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="edit_fname" value="<?php echo $row['fname'] ?>" class="form-control" placeholder="Enter First Name">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="edit_lname" value="<?php echo $row['lname'] ?>" class="form-control" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" name="edit_user_image" id="edit_user_image" value="<?php echo $row['image'] ?>" class="form-control" placeholder="Upload Image">
                    </div>
                    <a href="userprofile.php" class="btn btn-danger">CANCEL</a>
                    <button type="submit" name="userprofile_update_btn" class="btn btn-primary">Update</button>
                </form>

        <?php
            }
        }
        ?>

    </div>
</div>

<?php

include("includes/scripts.php");
include("includes/footer.php");


?>