<?php include '../header.php'; ?>
<?php	
	$DispatcherID = $_POST['dID'];
	$username = $_SESSION['username'];
	$query1 = "SELECT * FROM user WHERE UserName = '$username'";
	$result1 = $link->query($query1);
	if ($result1){
		while ($row = mysqli_fetch_array($result1)){
        	$userID = $row['Id'];
    	}
    	$query2 = "UPDATE orders SET Status = '1', DespatcherId = '$DispatcherID' WHERE UserId = '$userID' AND Status = '0'";
		$result2 = $link->query($query2);
		if($result2) {
			echo "<script>alert('Dispatcher selected')</script>";
		  	echo "<script>window.location.href='payment.php'</script>";
		}
		  else {
			echo"failed";
		}
	}
?>
<?php include '../footer.php'; ?>