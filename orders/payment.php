<?php include '../header.php'; ?>
<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: center;
}

#totalcol {  
  border: 1px solid #ddd;
  text-align: right;
}

#dispatch {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 80%;
}

th, td {
  padding: 15px;
}
</style>
<title>Receipt</title>

<div align="center">[<a href="orderMain.php">Previous Page</a>]
<h1 align="center">Receipt</h1>

<html>
<body>
<center>
<form onunload="updateDB()">
<table>
<tr>
	<th>Food Name</th>
	<th>Quantity</th>
	<th>Price(RM)</th>
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
	$query2 = "SELECT orders.Id AS orderID, orders.UserId, orders.Status, orders.DespatcherId AS dispatcherID, product.Id AS productID, product.Name AS foodName, orderdetails.Quantity AS quantity, orderdetails.Price AS price FROM orders JOIN orderdetails ON orders.Id = orderdetails.OrderId JOIN product ON orderdetails.ProductId = product.Id WHERE UserId = '$userID' AND Status = '1'";
	$result2 = $conn->query($query2);
	if($result2){
		if (mysqli_num_rows($result2) > 0){
			$totalprice = 0;
			while($row = mysqli_fetch_assoc($result2)){
				$str = "";
			    $str = "<tr>";
			    $str .= "<td>" . $row['foodName'] . "</td>";
			    $str .= "<td>" . $row['quantity'] . "</td>";
			    $str .= "<td>" . $row['price'] . "</td>";
			    $str .= "</tr>";
			    echo $str;
			    $totalprice += $row['price'];
				$disID = $row['dispatcherID'];
			}
			$query3 = "SELECT * FROM user WHERE Id = '$disID'";
			$result3 = $conn->query($query3);
			if($result3){
				$fetchName = mysqli_fetch_array($result3);
				$disName = $fetchName['UserName'];
			}
			echo "<tr>";
			echo "<th colspan='2' id='totalcol'>Total</th>";
			echo "<td>" . $totalprice . "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>Dispatcher</th>";
			echo "<td colspan='2' id='dispatch'>" . $disName . "</td>";
			echo "</tr>";
		}
	}
	else{
		echo "fail";
	}
?>
</table>
</form>
<br>
<form action="orderMain.php" method="post">
<button class="v_btn" type="submit">Go to Main Page</button>
</form>
</center>
</body>
</html>
<?php include '../footer.php'; ?>
<script type="text/javascript">
	function updateDB(){
		<?php 
			$query4 = "UPDATE orders SET Status = '2' WHERE UserId = '$userID' AND Status = '1'";
			$result4 = $conn->query($query4);
		?>
	}
</script>
