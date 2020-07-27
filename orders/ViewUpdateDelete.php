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
<title>Cart</title>

<div align="center">[<a href="foodMenu.php">Previous Page</a>]
<h1 align="center">Cart</h1>

<html>
<body>
<center>
<table border="1" align="center">
<form action="update.php" method="POST">
<tr>
	<th>OrderId</th>
	<th>Food Name</th>
	<th>Quantity</th>
	<th>Price(RM)</th>
	<th>Action</th>
</tr>
<?php
	$username = $_SESSION['username'];

	$conn = mysqli_connect("localhost", "root", "", "ubung");
	$query = "SELECT * FROM user WHERE UserName = '$username'";
	$result = $conn->query($query);
	if($result){
		$row = mysqli_fetch_assoc($result);
		$userID = $row['Id'];
	}
	$query2 = "SELECT orderdetails.OrderId AS Id, product.Name, orderdetails.Quantity, orderdetails.Price AS total FROM orders JOIN orderdetails ON orders.Id = orderdetails.OrderId JOIN product ON orderdetails.ProductId = product.Id WHERE UserId = '$userID'";
	$result2 = $conn->query($query2);
	if (mysqli_num_rows($result2)) {
		while ($row = mysqli_fetch_assoc($result2)){
			echo "<tr>";
			echo "<td>" . $row['Id'] . "</td>";
			echo "<td>" . $row['Name'] . "</td>";
			echo "<td>" . $row['Quantity'] . "</td>";
			echo "<td>" . $row['total'] . "</td>";
			echo "<td><button>Delete</button></td>";
			echo "</tr>";
		}
	}
	else{
		echo "FAil";
	}
?>
</form>
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