<?php
include 'dataConnection.php';
?>

<?php	
	$DespactherId = $_POST['Id'];

  	$query = "INSERT INTO orders VALUES ('','', '', '$DespactherId','','','')";
	$result = mysqli_query($link,$query);

	  if($result)
	  {
	  echo "<script>alert('Selected')</script>";
	  echo "<script>window.location.href='payment.php'</script>";
	  }
	  else
	  {
		echo"failed";
	  }
?>