<?php
include 'dataConnection.php';
?>

<?php
			
	$Quantity = $_POST['qty'];
	if ($Quantity<=0)
	{
	  echo "<script>alert('Pleased enter positive quantity!')</script>";
	  echo "<script>window.location.href='ViewUpdateDelete.php'</script>";
	}
	else
	{
		$OldQuantity = $_POST['Quantity'];
			$OldPrice = $_POST['Price'];
			$PerUnit = $OldPrice/$OldQuantity;
			$OrderId = $_POST['OrderId'];
			$Quantity = $_POST['qty'];
			$total = $Quantity*$PerUnit;

  			$query = "UPDATE orderdetails SET Quantity = '$Quantity',Price='$total' WHERE OrderId = '$OrderId'";
			$result = mysqli_query($link,$query);

	}


	  if($result)
	  {
	  echo "<script>alert('Updated')</script>";
	  echo "<script>window.location.href='ViewUpdateDelete.php'</script>";
	  }
	  else
	  {
		echo"failed";
	  }
?>