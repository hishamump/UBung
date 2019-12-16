<?php include '../header.php'; ?>
<?php $roles=array(ADMIN,DESPATCHER);
      CheckRole($roles) ?>
<h2>Despatcher Earn</h2>
<?php
    $query = "SELECT `Id`, `UserName`, `Password`, `Address`, `Phone`, `Email`, `Role`, `Status` 
              FROM `user` WHERE Role ='" . DESPATCHER . "'" or die(mysqli_connect_error());
    $result = mysqli_query($link, $query);
?>

<div class="row">
    <div class="col-lg-8">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-chart-bar"></i>
          Bar Chart Example</div>
        <div class="card-body">
          <canvas id="myBarChart" width="100%" height="50"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
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


  <!-- Page level plugin JavaScript-->
  <script src="../vendor/chart.js/Chart.min.js"></script>


  <script src="../js/demo/chart-bar-demo.js"></script>
