<?php include '../header.php'; ?>
<?php
			$OrderId = $_POST['oID'];

  			$query1 = "DELETE FROM orderdetails WHERE OrderId = '$OrderId'";
  			$query2 = "DELETE FROM orders WHERE Id = '$OrderId' AND Status = '0'";
			$result1 = mysqli_query($link,$query1);
			$result2 = mysqli_query($link,$query2);

	  if($result1 && $result2)
	  {

	  echo "<script>alert('Deleted')</script>";
	  echo "<script>window.location.href='ViewUpdateDelete.php'</script>";
	  }
	  else
	  {
		echo "<script>alert('Failed to delete')</script>";
		echo "<script>window.location.href='ViewUpdateDelete.php'</script>";
	  }
?>
<?php include '../footer.php'; ?>