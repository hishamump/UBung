
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

?>
<!DOCTYPE html>
<html>
<head>

	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "", "3306") or die(mysql_connect_error());
mysqli_select_db($link, "ubung") or die(mysqli_error($link));

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$name = $_SESSION['username'];
// Attempt select query execution with order by clause
$sql = "SELECT role FROM user	 WHERE username = '$name' ";


if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
       
        while($row = mysqli_fetch_array($result)){       
		  //header("Location: new.php"); 
                echo  "You are" . " " . $row['role'] ;        
				header( "refresh:2;url=new.php" );
        }		
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


 
// Close connection
mysqli_close($link);
?>
			

			<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
			
		<?php endif ?>
		
	</div>
		
</body>
</html>