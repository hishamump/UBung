<?php include '../header.php'; ?>
<?php CheckRole(ADMIN) ?>
<h2>Registered Despatchers</h2>
<?php
    $query = "SELECT `Id`, `UserName`, `Password`, `Address`, `Phone`, `Email`, `Role`, `Status` 
              FROM `user` WHERE Role ='" . DESPATCHER . "'" or die(mysqli_connect_error());
    $result = mysqli_query($link, $query);
?>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Despatchers</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $row["UserName"]?></td>
                        <td><?php echo $row["Email"]?></td>
                        <td><?php echo $row["Address"]?></td>
                        <td><?php echo $row["Phone"]?></td>                        
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

<?php 
    //Check whether the insert was successful or not
    if (!$result) {
        ErrorMessage("Query failed" . mysqli_error($link));
    }
    //Close the database connection
    mysqli_close($link);
?>

<?php include '../footer.php';?>