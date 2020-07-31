<?php include '../header.php'; ?>
<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: center;
}

table {
  border-collapse: collapse;
  width: 80%;
}

th, td {
  padding: 15px;
}
</style>
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
	<?php
	$conn = mysqli_connect("localhost", "root", "", "ubung");

	$query = "SELECT product.Id AS Id, restaurant.Id AS RestaurantId, product.Name AS Name, product.Description, product.Price AS Price, restaurant.RName AS RName FROM product JOIN restaurant ON product.RestaurantId=restaurant.Id";
	$result = $conn->query($query);
	if (mysqli_num_rows($result)) {
		while($row = mysqli_fetch_assoc($result)){
			/*$ProductId		= $row['Id'];
			$Name    		= $row['Name'];
			$Description	= $row['Description'];
			$RName		   	= $row['RName'];
			$Price		   	= $row['Price']; */
			echo "<tr>";
			echo "<form action='addtocart.php' method='POST'>";
			echo "<td>" . $row['Name'] . "</td>";
			echo "<td>" . $row['Description'] . "</td>";
			echo "<td>" . $row['RName'] . "</td>";
			echo "<td>" . $row['Price'] . "</td>";
			echo "<td><input type='number' name='qty'></td>";
			echo "<td style='display: none;'><input type='hidden' name='ResId' value='" . $row['RestaurantId'] . "'></td>";
			echo "<td style='display: none;'><input type='hidden' name='ProductId' value='" . $row['Id'] . "'></td>";
			echo "<td style='display: none;'><input type='hidden' name='price' value='" . $row['Price'] . "'></td>";
			echo "<td><input type='submit' name='submit' value='Add to Cart'></td>";
			echo "</form>";
			echo "</tr>";
	?>
	<!--<td align="center"><?php //echo $Name;?></td>
	<td align="center"><?php //echo $Description;?></td>
	<td align="center"><?php //echo $RName;?></td>
	<td align="center"><?php //echo $Price;?></td> 
	<form action="addtocart.php" method="POST">
	<td align="center"><input type="number" name="qty" ></td>
	<input type="hidden" name="ProductId" value=<?php //echo $ProductId; ?> >
	<input type="hidden" name="price" value=<?php //echo $Price; ?> >
	<td align="center"><input type="submit" name="cart" value="Add to Cart"> -->
	
<?php 
		}
	}

	  ?>
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