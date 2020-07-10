<?php include '../header.php'; ?>
<title>Cart</title>

<div align="center">[<a href="foodMenu.php">Previous Page</a>]
<h1 align="center">Cart</h1>

<html>
<body>
<center>
<table border="1" align="center">
<tr>
	<th>OrderId</th>
	<th>Food Name</th>
	<th>Quantity</th>
	<th>Price(RM)</th>
	<th></th>
	<th></th>
</tr>
<tr>
	<?php
	//$link = mysqli_connect("localhost","root","","ubung");
	//$link = mysqli_connect("localhost","ca17100","ca17100","ca17100");
	$link = mysqli_connect("localhost", "root", "", "", "3306");
	$select = "select orderdetails.OrderId, product.Name, orderdetails.Quantity, orderdetails.Price FROM orderdetails JOIN product ON orderdetails.ProductId=product.Id";
	$run = mysqli_query($link, $select);

	while($row = mysqli_fetch_array($run)){
		$OrderId	= $row['OrderId'];
		$Name    	= $row['Name'];
		$Quantity	= $row['Quantity'];
		$Price		= $row['Price'];
	?>
	<td align="center"><?php echo $OrderId;?></td>
	<td align="center"><?php echo $Name;?></td>
	<td align="center"><?php echo $Quantity;?></td>
	<td align="center"><?php echo $Price;?></td>
	<form action="update.php" method="post">
	<td align="center">
		<input type="hidden" name="OrderId" value=<?php echo $OrderId; ?> >
		<input type="hidden" name="Price" value=<?php echo $Price; ?> >
		<input type="hidden" name="Quantity" value=<?php echo $Quantity; ?> >
		<input type="number" name = "qty" placeholder="0">
		<input type="submit" value="Update"></td>
	</form>
		<form action="delete.php" method="post">
			<input type="hidden" name="OrderId" value=<?php echo $OrderId; ?> >
	<td align="center"><input type="submit" name = "Delete" value="Delete"></td>
	</form>
</tr>
	<?php }  ?>
</table>
 <br>
<form action="selection.php" method="post">
<button class="payment" type="submit">Select Despatcher</button>
</form>
<br>
<form action="orderMain.php" method="post">
<button class="v_btn" type="submit">Go to Main Page</button>
</form>
</center>
</body>
</html>
<?php include '../footer.php'; ?>