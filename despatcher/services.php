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
              <td><button class="btn btn-danger btn-confirm" data-id="<?php echo $row["Id"] ?>" onclick="">Delete</button></td>
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

<div class="modal fade" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" tabindex="-1" id="myModalLabel">Confirm Delete!</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="modal-btn-si">Yes</button>
        <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
      </div>
    </div>
  </div>
</div>

<?php include '../footer.php'; ?>

<script>
  var modalConfirm = function(callback) {
    $(".btn-confirm").on("click", function() {
      $("#mi-modal").modal('show');

      var id = $(this).data('id');

      $("#modal-btn-si").on("click", function() {
        callback(true, id);
        $("#mi-modal").modal('hide');
      });

      $("#modal-btn-no").on("click", function() {
        callback(false);
        $("#mi-modal").modal('hide');
      });
    });
  };

  modalConfirm(function(confirm, id) {
    if (confirm) {
      window.location.href = 'deleteservice.php?id=' + id;
    } else {

    }
  });
</script>
