<?php
include("secuirty.php");
include("includes/header.php");
include("includes/navbar.php");


?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Faculty Edits</h6>
        </div>
    </div>
    <div class="card-body">
        <?php
        if(isset($_POST['edit_data_btn'])){
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM faculty WHERE id = '$id' ";

            $query_run = mysqli_query($connection, $query);

            foreach($query_run as $row){

                ?>

        <form action="code.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="edit_id" value="<?php echo $row['id']?>">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="edit_name" value="<?php echo $row['name']?>" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label>Designation</label>
              <input type="text" name="edit_designation" value="<?php echo $row['design']?>" class="form-control" placeholder="Enter Designation">
            </div>
            <div class="form-group">
              <label>Description</label>
              <input type="text" name="edit_description" value="<?php echo $row['descrip']?>" class="form-control" placeholder="Enter Description">
            </div>
            <div class="form-group">
              <label>Upload Image</label>
              <input type="file" name="faculty_image" id="faculty_image" value="<?php echo $row['images']?>" class="form-control" placeholder="Enter Description">
            </div>
            <a href="faculties.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="faculty_update_btn" class="btn btn-primary">Update</button>
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