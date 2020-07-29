<?php include '../header.php'; ?>
<?php
$uid = $_SESSION['UserId'];
$query = "SELECT * FROM service WHERE DispatcherId=$uid" or die(mysqli_connect_error());
$result = mysqli_query($link, $query);
?>

<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Your Services</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="width: 25%">Name</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th>
            <th></th>
            <th></th>
          </tr>
        </tfoot>
        <tbody>
          <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
              <td><?php echo $row["Name"] ?></td>
              <td><button class="btn btn-primary" onclick="window.location.href = 'updateservice.php?id=<?php echo $row["Id"] ?>';">Edit</button></td>
              <td><button class="btn btn-danger" id="btn-confirm" onclick="window.location.href = 'deleteservice.php?id=<?php echo $row["Id"] ?>';">Delete</button></td>
            </tr>
          <?php } ?>
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

<?php include '../footer.php'; ?>