<?php include '../header.php'; ?>
<?php $roles=array(ADMIN,DESPATCHER);
      CheckRole($roles) ?>
<h2>Despatcher Earn</h2>
<?php

$did = 0;
if (isset($_GET['id'])) {
    $did = $_GET["id"];
}
    $query = "SELECT o.Id oid, `UserId`, `RestaurantId`, `DespatcherId`, o.`Status`, `OrderDate`, `DeliveryDate`,
              r.Id rid, RName,
              d.Id did, u.UserName DName,
              u.Id uid, u.UserName UName,
              SUM(od.Price) Total
              FROM `orders` o 
              LEFT JOIN restaurant r ON o.RestaurantId = r.Id
              LEFT JOIN user d ON o.DespatcherId = d.Id AND d.Role = 'Despatcher'
              LEFT JOIN user u ON o.UserId = u.Id
              LEFT JOIN OrderDetails od ON od.OrderId = o.Id
              WHERE DespatcherId = $did
              Group BY o.Id, DeliveryDate" or die(mysqli_connect_error());
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


<?php include '../footer.php';?>


  <!-- Page level plugin JavaScript-->
  <script src="../vendor/chart.js/Chart.min.js"></script>


  <script>
  // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["January", "February", "March", "April", "May", "June"],
            //TODO: Publish data here from server side
            //     <php while ($row = mysqli_fetch_array($result)) { 
            //     echo $row["DeliveryDate"] . ",";
            // }],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [4215, 5312, 6251, 7841, 9821, 14984]
            //TODO: Publish data here from server side
            //       <php while ($row = mysqli_fetch_array($result)) { 
            //     echo $row["Total"] . ",";
            // }]
      ,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15000,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

  </script>
<?php 
    //Check whether the insert was successful or not
    if (!$result) {
        ErrorMessage("Query failed" . mysqli_error($link));
    }
    //Close the database connection
    mysqli_close($link);
?>