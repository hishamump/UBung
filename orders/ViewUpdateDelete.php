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
	$query2 = "SELECT orderdetails.OrderId AS Id, product.Name, orderdetails.Quantity, orderdetails.Price AS total FROM orders JOIN orderdetails ON orders.Id = orderdetails.OrderId JOIN product ON orderdetails.ProductId = product.Id WHERE UserId = '$userID' AND Status = '0'";
	$result2 = $conn->query($query2);
	if (mysqli_num_rows($result2)) {
		while ($row = mysqli_fetch_assoc($result2)){
			$str = "";
		    $str = "<tr>";
		    $str = "<form action=delete.php method='POST'>";
		    $str .= "<td style='display:none;'><input name='oID' value='" . $row['Id'] . "'/>";
		    $str .= "<td>" . $row['Id'] . "</td>";
		    $str .= "<td>" . $row['Name'] . "</td>";
		    $str .= "<td>" . $row['Quantity'] . "</td>";
		    $str .= "<td>" . $row['total'] . "</td>";
		    $str .= "<td><input type='submit' value='DELETE'/>";
		    $str .= "</form>";
		    $str .= "</tr>";
		    echo $str;
		}
		echo "</table>";
		echo "<br>";
		echo "<form action='selection.php' method='POST'>";
		echo "<button class='payment' type='submit'>Select Dispatcher</button>";
		echo "</form>";
	}
	else{
		echo "</table>";
		echo "<br>";
		echo "<form action='selection.php' method='POST'>";
		echo "<button class='payment' type='submit' disabled>Select Dispatcher</button>";
		echo "</form>";
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