<?php include '../header.php'; ?>
<?php

if (isset($_POST["cart"]) ) {
	$ProductId = $_POST['ProductId'];
	$Quantity = $_POST['qty'];
	$Price = $_POST['price'];
	$total = $Quantity*$Price;

  	$query = "INSERT INTO orderdetails VALUES ('','$ProductId', '$Quantity', '$total')";
	$result = mysqli_query($link,$query);

}
	  if($result)
	  {
	  echo "<script>alert('added to cart')</script>";
	  echo "<script>window.location.href='foodMenu.php'</script>";
	  }
	  else
	  {
		echo"failed";
	  }
?>
<?php include '../footer.php'; ?>