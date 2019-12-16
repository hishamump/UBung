<?php include '../header.php'; ?>
<?php CheckRole(ADMIN) ?>
<h2>All orders in the system </h2>
<?php
    $query = "SELECT o.Id oid, `UserId`, `RestaurantId`, `DespatcherId`, o.`Status`, `OrderDate`, `DeliveryDate`,
              r.Id rid, RName,
              d.Id did, u.UserName DName,
              u.Id uid, u.UserName UName
              FROM `orders` o 
              LEFT JOIN restaurant r ON o.RestaurantId = r.Id
              LEFT JOIN user d ON o.DespatcherId = d.Id AND d.Role = 'Despatcher'
              LEFT JOIN user u ON o.UserId = u.Id
              " or die(mysqli_connect_error());
    $result = mysqli_query($link, $query);
?>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Orders</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Restaurant</th>
                        <th>Despatcher</th>
                        <th>OrderDate</th>
                        <th>DeliveryDate</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Customer</th>
                        <th>Restaurant</th>
                        <th>Despatcher</th>
                        <th>OrderDate</th>
                        <th>DeliveryDate</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $row["UName"]?></td>
                        <td><?php echo $row["RName"]?></td>
                        <td><?php echo $row["DName"]?></td>
                        <td><?php echo $row["OrderDate"]?></td>
                        <td><?php echo $row["OrderDate"]?></td>
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