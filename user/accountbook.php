<?php

include("database/config.php");
include("includes/header.php");
include("includes/navbar.php");

?>
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
        $connection = mysqli_connect("localhost", "root", "", "userpanel");
        $query = "SELECT * FROM accountbook";
        $query_run = mysqli_query($connection, $query);


        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Challan No</th>
                    <th>Challan Type</th>
                    <th>Payable</th>
                    <th>Paid</th>
                    <th>Balance</th>
                    <th>Date</th>
                    <th>Paymentmode</th>
                    <th>Cancelled</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (mysqli_num_rows($query_run) > 0) {
                    $count = 6085564;
                    while ($row = mysqli_fetch_assoc($query_run)) {
                ?>

                        <tr>
                            <td> <?php echo $count; ?></td>
                            <td> <?php echo $row['challantype']; ?></td>
                            <td> <?php echo $row['payable']; ?></td>
                            <td> <?php echo $row['paid']; ?></td>
                            <td> <?php echo $row['balance']; ?></td>
                            <td> <?php echo $row['date']; ?></td>
                            <td> <?php echo $row['paymentmode']; ?></td>
                            <td> <?php echo $row['cancel']; ?></td>
                            <td>
                                <form action="accountbook_edit.php" method="POST">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="print" name="print_btn" class="btn btn-success"><i class="fa-solid fa-print"></i></button>
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="upload_btn" class="btn btn-success"><i class="fa-solid fa-upload"></i></button>
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="pay_btn" class="btn btn-success"><i class="fa-brands fa-cc-amazon-pay"></i></button>
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