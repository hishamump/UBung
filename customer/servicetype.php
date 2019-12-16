<?php
ob_start();
?>




<?php include '../header.php';
$ll = $_SESSION['username'];?>
<h2>My Services</h2>
<?php 
 
     $query = "SELECT * FROM user WHERE username = '$ll'; " or die(mysqli_connect_error());

  $result = mysqli_query($link, $query);
  
while ($row = mysqli_fetch_array($result)) {
	      
    $a = $row["Id"];
}
?>
<?php 
 

 
     $sql = "SELECT user.UserName , service.Name FROM user, service WHERE user.Status = 1;" or die(mysqli_connect_error());

	  

 
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
     echo "<table border='1'>";
    echo "<tr>";
                echo "<th>Username</th>";
                echo "<th>Service Name</th>";			
               
                

            echo "</tr>";

	while ($row = mysqli_fetch_array($result)) {
	     echo "<tr>";
		
                echo "<td>" . $row['UserName'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
				
               
            echo "</tr>";
			
          
           echo'
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