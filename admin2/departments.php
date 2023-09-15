<?php
include("secuirty.php");
include("includes/header.php");
include("includes/navbar.php");

?>
<!-- Modal -->
<div class="modal fade" id="deptmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Dept Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Department">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="dept_image" class="form-control" placeholder="Enter Links">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="dept_save" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Academics - Departments (Category)
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#deptmodal">
                    ADD
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
                $connection = mysqli_connect("localhost", "root", "", "adminpanel");
                $query = "SELECT * FROM dept_category";
                $query_run = mysqli_query($connection, $query);


                ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Dept Name</th>
                            <th>Description</th>
                            <th>Images</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
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
                                    <td> <?php echo $row['name']; ?></td>
                                    <td> <?php echo $row['description']; ?></td>
                                    <td><img src="upload/departments<?php echo $row['image']  ?>" alt="" width="200px" height="120px">
                                    </td>
                                    <td>
                                        <form action="department_edit.php" method="POST">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" name="dept_cate_editbtn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-danger" name="dept_cate_deletebtn">DELETE</button>
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