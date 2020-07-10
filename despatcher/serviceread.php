
<?php include '../header.php';
$ll = $_SESSION['username'];?>
<?php 
  $query = "SELECT * FROM user WHERE username = '$ll'; " or die(mysqli_connect_error());
  $result = mysqli_query($link, $query);
  
  while ($row = mysqli_fetch_array($result)) {
    $a = $row["Id"];
    foreach ($_POST['services'] as $selection =>$value) {
			$services[]=$value;
		}

    $column= implode(", ", $services);	

    $sql = "INSERT INTO service (Id,Name) VALUES ('','$column')";
    // to run sql query in database
	  $result = mysqli_query($link, $sql);
}
?>
 
<!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Services</li>
  </ol>
  
<?php 
  $query = "SELECT * FROM user WHERE username = '$ll'; " or die(mysqli_connect_error());
  $result = mysqli_query($link, $query);
  
  while ($row = mysqli_fetch_array($result)) {
       $a = $row["Id"];
  }

  $query = "SELECT Id FROM service ORDER BY Id DESC LIMIT 1;" or die(mysqli_connect_error());
  $result = mysqli_query($link, $query);
  
  while ($row = mysqli_fetch_assoc($result)) {
      $b = $row["Id"];
  }

  $sql = "INSERT INTO dispatcherservice (DispatcherId,ServiceId) VALUES ($a,'$b')";
  $result = mysqli_query($link, $sql);
  if($result) 
  {
    echo("Data inserted successfully");
  }
  else 
  {
    die("Insert failed");
  }
?>
  <?php include '../footer.php';?>