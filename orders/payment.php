<?php include '../header.php'; ?>
<title>Receipt</title>

<div align="center">[<a href="orderMain.php">Previous Page</a>]
<h1 align="center">Receipt</h1>

<html>
<body>
<center>
<table border="1" align="center">
<tr>
	<th>Food Name</th>
	<th>Quantity</th>
	<th>Price(RM)</th>
</tr>
<tr>
	<?php
	//$link = mysqli_connect("localhost","root","","ubung");
	//$link = mysqli_connect("localhost","ca17100","ca17100","ca17100");
	$link = mysqli_connect("localhost", "root", "", "", "3306");
	
	$select = "select orderdetails.OrderId, product.Name, orderdetails.Quantity, orderdetails.Price FROM orderdetails JOIN product ON orderdetails.ProductId=product.Id";
	$run = mysqli_query($link, $select);

	$FinalPrice=0;
	while($row = mysqli_fetch_array($run)){
		$OrderId	= $row['OrderId'];
		$Name    	= $row['Name'];
		$Quantity	= $row['Quantity'];
		$Price		= $row['Price'];
		$FinalPrice = $FinalPrice + $Price;
	?>
	<td align="center"><?php echo $Name;?></td>
	<td align="center"><?php echo $Quantity;?></td>
	<td align="center"><?php echo $Price;?></td>

</tr>
	<?php }  ?>
<tr>
	<th></th>
	<th>Total Payment:</th>
	<th><?php echo $FinalPrice;?></th>
</tr>
</table>
<?php
	if($FinalPrice>35)
	{
		for ($i=0; $i < 2; $i++) {
		$insert = "INSERT INTO voucher VALUES ('','','')";
		$result = mysqli_query($link,$insert); 
		}
	if($result)
	  {
	  echo "<script>alert('Get 2 free Voucher!')</script>";
	  }
	  else
	  {
		echo"failed";
	  }
		
		
		
		
	}
	  
?>
<br>
<form action="orderMain.php" method="post">
<button class="v_btn" type="submit">Go to Main Page</button>
</form>
</center>
</body>
</html>
<?php include '../footer.php'; ?>