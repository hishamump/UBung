

<?php include '../header.php';
$a = $_SESSION['username'];?>
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
	
    <li class="breadcrumb-item active">Profile</li>
  </ol>
  <?php
   //SQL query
     $querya = "SELECT * FROM user WHERE UserName = '$a' ; " or die(mysqli_connect_error());

    $result = mysqli_query($link, $querya);
	while ($row = mysqli_fetch_array($result)) {
	$b = $row["Id"];
	}
    $query = "SELECT * FROM orders WHERE DespatcherId = '$b'; " or die(mysqli_connect_error());

    $result = mysqli_query($link, $query);

    //Loop the recordset $rs
    echo "<table border='1'>";

    while ($row = mysqli_fetch_array($result)) {
        echo '
  
  	<h2>Your Order:</h2>
    <table border="1">
	<tr>
            <td>Id:</td>
            <td>'
               
           . $row["Id"].
                
            '</td>
        </tr>
        <tr>
            <td>User Id:</td>
            <td>'
               
           . $row["UserId"].
                
            '</td>
        </tr>
		<tr>
            <td>Restaurant Id:</td>
            <td>'
               
           . $row["RestaurantId"].
                
            '</td>
        </tr>
        <tr>
            <td>Despatcher Id:</td>
            <td>'
               
           . $row["DespatcherId"].
                
            '</td>
        </tr>
		<tr>
            <td>Status :</td>
            <td>'
               
           . $row["Status"].
                
            '</td>
        </tr>
		<tr>
            <td>Order Date:</td>
            <td>'
               
           . $row["OrderDate"].
                
            '</td>
        </tr>
		<tr>
            <td>Delivery Date:</td>
            <td>'
               
           . $row["DeliveryDate"].
                
            '</td>
        </tr>
		 <tr>
            <td style="background-color:black">
                <button onclick="window.location.href = \'orderDetails.php?id=' . $row["Id"] . '\';">More Details</button>
            </td>
           
        </tr>                 
        <tr>
            <td colspan = "2" style="background-color:white">&nbsp;</td>
        </tr>           
        ';   
     }
    echo "</table>";
	?>
	<?php include '../footer.php';?>
  




	
	

