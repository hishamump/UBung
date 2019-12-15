<?php



	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
$a = $_SESSION['username'];
?>
<?php include '../header.php';?>
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
	
    <li class="breadcrumb-item active">Profile</li>
  </ol>

<?php
   
    $r = $_POST["rate"];
    $d = $_POST["date"];
	
    $query = "SELECT * FROM user where username = '$a'; " or die(mysqli_connect_error());
	 $result = mysqli_query($link, $query);
	 while ($row = mysqli_fetch_array($result)){
		 $a = $row["Id"];
		
	 }
	 ?>
	 <?php
		
	$query = "INSERT into dispatcherrating (DispatcherId, UserId, Rate, Date) values 
            (' ', '$a ', '$r', '$d')" 
	or die(mysqli_connect_error());

    // to run sql query in database
    $result = mysqli_query($link, $query);

    //Check whether the insert was successful or not
	if($result) 
    {
        echo("Feedback report sent successfully");
    }
    else 
    {
        die("Feedback failed to send" . mysqli_error($link));
    }
?>
<?php include '../footer.php';?>



