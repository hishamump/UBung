<?php include '../header.php'; ?>
<title>Food Menu</title>

<div align="center">[<a href="orderMain.php">Previous Page</a>]
<h1 align="center">Food Menu</h1>

<html>
<body>
<center>
<table border="0" align="center">
<tr>
	<th>Name</th>
	<th>Description</th>
	<th>Restaurant Name</th>
	<th>Price</th>
	<th>Quantity</th>
	<th>Add to Cart</th>
</tr>
<tr>
	<?php
	//$link = mysqli_connect("localhost","root","","ubung");
	$link = mysqli_connect("localhost","ca17100","ca17100","ca17100");

	$select = "select * FROM product JOIN restaurant ON product.RestaurantId=restaurant.Id";
	$run = mysqli_query($link, $select);

	while($row = mysqli_fetch_array($run)){
		$ProductId		= $row['Id'];
		$Name    		= $row['Name'];
		$Description	= $row['Description'];
		$RName		   	= $row['RName'];
		$Price		   	= $row['Price'];
	?>
	<td align="center"><?php echo $Name;?></td>
	<td align="center"><?php echo $Description;?></td>
	<td align="center"><?php echo $RName;?></td>
	<td align="center"><?php echo $Price;?></td>
	<form action="addtocart.php" method="post">
	<td align="center"><input type="number" name="qty" ></td>
	<input type="hidden" name="ProductId" value=<?php echo $ProductId; ?> >
	<input type="hidden" name="price" value=<?php echo $Price; ?> >
	<td align="center"><input type="submit" name = "cart" value="Add to Cart">
	</form>
	<td></td>
</tr>
	<?php }  ?>
</table>
<br>
<form action="ViewUpdateDelete.php" method="post">
<button class="cart" type="submit">View Cart</button>
</form>

<br>
<form action="orderMain.php" method="post">
<button class="v_btn" type="submit">Go to Main Page</button>
</form>
</center>
</body>
</html>
<?php include '../footer.php'; ?>