<?php include '../header.php'; ?>
<?php CheckRole(ADMIN) ?>
<h2>Registered Restaurants/Cafeterias</h2>
<?php
    $query = "SELECT r.`Id`, `RName`, `OwnerId`, u.UserName UName
              FROM `restaurant` r
              LEFT JOIN `user` u ON r.OwnerId = u.Id" or die(mysqli_connect_error());
    $result = mysqli_query($link, $query);
?>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Restaurants & Cafeterias</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <th>Restaurent Name</th>
                      <th>Owner</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                      <th>Restaurent Name</th>
                      <th>Owner</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $row["RName"]?></td>
                        <td><?php echo $row["UName"]?></td>                       
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