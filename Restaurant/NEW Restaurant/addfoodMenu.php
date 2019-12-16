<?php
include 'dataConnection.php';
?>

<title>Add Food Menu</title>

<h1 align="center">Add Food Menu</h1>

<html>
<body>
<center>
<table border="0" align="center">
<tr>
	<th>Food Name</th>
	<th>Description</th>
	<th>Price</th>
</tr>
<tr>
	<?php
	$link = mysqli_connect("localhost","root","","ubung");
	$select = "select * FROM restaurant";
	$run = mysqli_query($link, $select);
	$row = mysqli_fetch_array($run);
	$RestaurantId	= $row['Id'];
	?>
<form action="readaddfoodMenu.php" method="post">
	<td align="center"><input type="text" name="Name" ></td>
	<input type="hidden" name="RestaurantId" value="<?php echo $RestaurantId;?>" >
	<td align="center"><input type="text" name="Description" ></td>
	<td align="center"><input type="number" name="Price" ></td>
</tr>
</table>
<br>

<button class="add" type="submit">Add</button>
</form>

<br>
<form action="orderMain.php" method="post">
<button class="v_btn" type="submit">Go to Main Page</button>
</form>
</center>
</body>
</html>