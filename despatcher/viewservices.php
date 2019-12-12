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
	
$ll = $_SESSION['username'];
?>

<?php include '../header.php';?>

<?php 
 
     $query = "SELECT * FROM user WHERE username = '$ll'; " or die(mysqli_connect_error());

  $result = mysqli_query($link, $query);
  
while ($row = mysqli_fetch_array($result)) {
	      
    $a = $row["Id"];
}
?>
<?php 
 

 
     $query = "SELECT dispatcherservice.DispatcherId,service.Name, user.UserName FROM service,dispatcherservice, user WHERE dispatcherservice.DispatcherId = '$a' AND user.Id = '$a'; " or die(mysqli_connect_error());
	  

  $result = mysqli_query($link, $query);
     echo "<table border='1'>";
    echo "<tr>";
                echo "<th>DispatcherId</th>";
                echo "<th>Service Name</th>";			
                echo "<th>Username</th>";
                

            echo "</tr>";
if ($row = mysqli_fetch_array($result)) {
	
	     echo "<tr>";
		
                echo "<td>" . $row['DispatcherId'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
				 echo "<td>" . $row['UserName'] . "</td>";
               
            echo "</tr>";
        }
        echo "</table>";


?>
<?php include '../footer.php';?>