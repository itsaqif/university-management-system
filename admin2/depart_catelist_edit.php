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
        if (isset($_POST['dept_catelist_editbtn'])) {
            $id = $_POST['edit_id'];

            $query = "SELECT * FROM dept_category_list WHERE id = '$id' ";

            $query_run = mysqli_query($connection, $query);

            foreach ($query_run as $rowediting) {

        ?>

                <form action="code.php" method="POST">


                    <input type="hidden" name="updating_id" value="<?php echo $rowediting['id'] ?>">

                    <?php

                    $department = "SELECT * FROM dept_category";
                    $dept_run = mysqli_query($connection, $department);

                    if (mysqli_num_rows($dept_run) > 0) {
                    ?>
                        <div class="form-group">
                            <label>Dept cate ID/Name</label>
                            <select name="dept_cate_id" id="" class="form-control">
                                <option value="">Choose Your Department Category</option>
                                <?php
                                foreach ($dept_run as $row) {
                                ?>
                                    <option value="<?php echo $row['id'];  ?>"><?php echo $row['name'];  ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                    <?php

                    } else {
                        echo "No data Available";
                    }


                    ?>

                    <div class="form-group">
                        <label>Dept List Name</label>
                        <input type="text" name="edit_deptlist_name" class="form-control" value="<?php echo $rowediting['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="edit_dept_description" class="form-control" value="<?php echo $rowediting['descrip'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Section</label>
                        <input type="text" name="edit_section" class="form-control" value="<?php echo $rowediting['section'] ?>" required>
                    </div>
                    </div>
                       <a href="departments-list.php" class="btn btn-danger">CANCEL</a>
                       <button type="submit" name="dept_cate_listupdate_btn" class="btn btn-primary">Update</button>
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