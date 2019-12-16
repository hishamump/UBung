<?php include '../header.php';?>
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
	
    <li class="breadcrumb-item active">Voucher collected</li>
  </ol>
  <?php
   //SQL query
    $query = "SELECT * FROM voucher; " or die(mysqli_connect_error());

    $result = mysqli_query($link, $query);

    //Loop the recordset $rs
    echo "<table border='1'>";

    while ($row = mysqli_fetch_array($result)) {
        echo '
  
  	<h2>Voucher:</h2>
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
            <td>Order Id:</td>
            <td>'
               
           . $row["OrderId"].
                
            '</td>
        </tr>
        ';   
     }
    echo "</table>";
	?>
	<?php include '../footer.php';?>
  




	
	

