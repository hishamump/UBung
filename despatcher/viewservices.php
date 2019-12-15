<?php
ob_start();
?>


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
<h2>My Services</h2>
<?php 
 
     $query = "SELECT * FROM user WHERE username = '$ll'; " or die(mysqli_connect_error());

  $result = mysqli_query($link, $query);
  
while ($row = mysqli_fetch_array($result)) {
	      
    $a = $row["Id"];
}
?>
<?php 
 

 
     $sql = "SELECT dispatcherservice.DispatcherId,service.Name, user.UserName FROM service,dispatcherservice, user WHERE dispatcherservice.DispatcherId = '$a' AND user.Id = '$a'; " or die(mysqli_connect_error());

	  

 
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
     echo "<table border='1'>";
    echo "<tr>";
                echo "<th>DispatcherId</th>";
                echo "<th>Service Name</th>";			
                echo "<th>Username</th>";
                

            echo "</tr>";

	while ($row = mysqli_fetch_array($result)) {
	     echo "<tr>";
		
                echo "<td>" . $row['DispatcherId'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
				 echo "<td>" . $row['UserName'] . "</td>";
               
            echo "</tr>";
			
           echo' <td style="background-color:purple">
                <button onclick="window.location.href = \'updateservice.php?id=' . $row["DispatcherId"] . '\';">Edit</button>
				<button onclick="window.location.href = \'deleteservice.php?id=' . $row["DispatcherId"] . '\';">Delete</button>
            </td>
          
        </tr>                 
        <tr>
            <td colspan = "5" style="background-color:grey">&nbsp;</td>
        </tr>   ';        
               
			
        }
        echo "</table>";
		
  mysqli_free_result($result);
  
    } else{
        echo "No Services Added Yet";
		header( "refresh:2;url=services.php" );
		ob_end_flush();

    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}



  
	


?>
<?php include '../footer.php';?>