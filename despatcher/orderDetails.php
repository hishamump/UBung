
<?php include '../header.php';?>
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
	
    <li class="breadcrumb-item active">Profile</li>
  </ol>
  <?php
   //SQL query
    $query = "SELECT * FROM orderdetails ; " or die(mysqli_connect_error());

    $result = mysqli_query($link, $query);

    //Loop the recordset $rs
    echo "<table border='1'>";

    while ($row = mysqli_fetch_array($result)) {
        echo '
  
  	<h2>Details:</h2>
    <table border="1">
        <tr>
            <td>Order ID:</td>
            <td>'
               
           . $row["OrderId"].
                
            '</td>
        </tr>
		<tr>
            <td>Product Id:</td>
            <td>'
               
           . $row["ProductId"].
                
            '</td>
        </tr>
        <tr>
            <td>Quantity of product:</td>
            <td>'
               
           . $row["Quantity"].
                
            '</td>
        </tr>
		<tr>
            <td>Total price of product :</td>
            <td>'
               
           . $row["Price"].
                
            '</td>
        </tr>
		
		 <tr>
            <td style="background-color:black">
                <button onclick="window.location.href = \'updateOrder.php?id=' . $row["Id"] . '\';">Update Order</button>
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
  




	
	

