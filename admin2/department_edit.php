<?php
include("secuirty.php");
include("includes/header.php");
include("includes/navbar.php");


?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Department Category Edit</h6>
        </div>
    </div>
    <div class="card-body">
        <?php
        if (isset($_POST['dept_cate_editbtn'])) {
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM dept_category WHERE id = '$id' ";

            $query_run = mysqli_query($connection, $query);

            foreach ($query_run as $row) {

        ?>

                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="edit_dept_id" value="<?php echo $row['id'] ?>">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="edit_dept_name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="edit_dept_description" value="<?php echo $row['description'] ?>" class="form-control" placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" name="edit_dept_image" id="faculty_image" value="<?php echo $row['image'] ?>" class="form-control" placeholder="Enter Description">
                    </div>
                    <a href="departments.php" class="btn btn-danger">CANCEL</a>
                    <button type="submit" name="dept_update_btn" class="btn btn-primary">Update</button>
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