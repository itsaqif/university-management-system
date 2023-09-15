<?php
session_start();
include("includes/header.php");
include("includes/navbar.php");

?>
<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add About US Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title">
          </div>
          <div class="form-group">
            <label>Sub Title</label>
            <input type="text" name="subtitle" class="form-control" placeholder="Enter Sub title">
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" class="form-control" placeholder="Enter Description">
          </div>
          <div class="form-group">
            <label>Links</label>
            <input type="text" name="links" class="form-control" placeholder="Enter Links">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="about_save" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">ABOUT US
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
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
        $query = "SELECT * FROM abouts";
        $query_run = mysqli_query($connection, $query);


        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Sub Title</th>
              <th>Description</th>
              <th>Links</th>
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
                  <td> <?php echo $row['blog_title']; ?></td>
                  <td> <?php echo $row['blog_subtitle']; ?></td>
                  <td> <?php echo $row['blog_descrip']; ?></td>
                  <td> <?php echo $row['links']; ?></td>
                  <td>
                    <form action="about_edit.php" method="POST">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                    </form>
                  </td>
                  <td>
                    <form action="code.php" method="POST">
                      <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                      <button type="submit" class="btn btn-danger" name="about_delete_btn">DELETE</button>
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