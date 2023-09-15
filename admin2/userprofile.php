<?php
include("../config.php");
include("includes/header.php");
include("includes/navbar.php");

?>
<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="userprofilecode.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                    </div>
                    <div class="form-group">
                        <label>last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                        <label>username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group">
                        <label>password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="user_image" class="form-control" placeholder="Upload Image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="userdata_btn" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Profile
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                    Add User Data
                </button>
            </h6>
        </div>
        <div class="card-body">
            <?php

            if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                echo '<h2 class="bg-primary text-white">' . $_SESSION['success'] . '</h2>';
                unset($_SESSION['success']);
            }
            if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                echo '<h2 class="bg-danger text-white">' . $_SESSION['status'] . '</h2>';
                unset($_SESSION['status']);
            }



            ?>
            <div class="table-responsive">
                <?php
                $dbc = mysqli_connect("localhost", "root", "", "university");

                $query = "SELECT * FROM users";
                $query_run = mysqli_query($dbc, $query);


                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (mysqli_num_rows($query_run) > 0) {
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>

                                <tr>
                                    <td> <?php echo $count; ?></td>
                                    <td> <?php echo $row['fname']; ?></td>
                                    <td> <?php echo $row['lname']; ?></td>
                                    <td> <?php echo $row['username']; ?></td>
                                    <td> <?php echo $row['email']; ?></td>
                                    <td> <?php echo $row['password']; ?></td>
                                    <td><img src="userprofile/<?php echo $row['image']  ?>" alt="" width="100px" height="120px">
                                    </td>
                                    <td>
                                        <form action="userprofile_edit.php" method="POST">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="user_edit_btn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="userprofilecode.php" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-danger" name="userprofile_delete_btn">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                        
                        $count = $count + 1;

                         }
                        } else {
                            echo "No Record Found";
                        }


                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php

include("includes/scripts.php");
include("includes/footer.php");


?>