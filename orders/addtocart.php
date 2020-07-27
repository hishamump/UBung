<?php include '../header.php'; ?>
<?php
if (isset($_POST['submit'])){
	$ProductId = $_POST['ProductId'];
	$Quantity = $_POST['qty'];
	$Price = $_POST['price'];
	$total = $Quantity * $Price;
	$username = $_SESSION['username'];
	$resId = $_POST['ResId'];
	//echo $ProductId . " " . $Quantity . " " . $Price . " " . $total;
	$conn = mysqli_connect("localhost", "root", "", "ubung");
	$query = "SELECT * FROM user WHERE UserName = '$username'";
	$result = $conn->query($query);
	if($result){
		$row = mysqli_fetch_assoc($result);
		$userID = $row['Id'];
	}
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	// Status = 0 is for Cart entries
	$query2 = "INSERT INTO orders (UserId,RestaurantId,DespatcherId,Status,OrderDate,DeliveryDate) VALUES ('$userID', '$resId', '', '0', '', '')";
	$result2 = $conn->query($query2);
	if($result2)
	{
		$query3 = "SELECT * FROM orders where UserId = '$userID' AND Status = '0'";
		$result3 = $conn->query($query3);
		if (mysqli_num_rows($result3)){
			while($row = mysqli_fetch_assoc($result3)){
				$orderID = $row['Id'];
				$query4 = "INSERT INTO orderdetails (OrderId, ProductId, Quantity, Price) VALUES ('$orderID', '$ProductId', '$Quantity', '$total')";
				$result4 = $conn->query($query4);
				if ($result4){
					echo "<script>alert('added to cart')</script>";
	  				echo "<script>window.location.href='foodMenu.php'</script>";
				}
			}
		}

	}
}
?>
<?php include '../footer.php'; ?>