<?php
include 'dataConnection.php';
?>

<?php
	$Name = $_POST['Name'];
	$RestaurantId = $_POST['RestaurantId'];
	$Description = $_POST['Description'];
	$Price = $_POST['Price'];

	echo $Name;
	echo $RestaurantId;
	echo $Description;
	echo $Price;

  	$query = "INSERT INTO product VALUES ('','$Name', '$RestaurantId', '$Description','$Price','')";
	$result = mysqli_query($link,$query);

	  if($result)
	  {
	  echo "<script>alert('Add to Food Menu')</script>";
	  echo "<script>window.location.href='orderMain.php'</script>";
	  }
	  else
	  {
		echo"failed";
	  }
  
?>