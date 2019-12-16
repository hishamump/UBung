<?php include '../header.php'; ?>
<?php
			$OrderId = $_POST['OrderId'];

  			$query = "DELETE FROM orderdetails WHERE OrderId = '$OrderId'";
			$result = mysqli_query($link,$query);

	  if($result)
	  {
	  echo "<script>alert('Deleted')</script>";
	  echo "<script>window.location.href='ViewUpdateDelete.php'</script>";
	  }
	  else
	  {
		echo"failed";
	  }
?>
<?php include '../footer.php'; ?>