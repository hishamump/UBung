<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete User</title>
</head>
<?php include '../selectDB.php'; ?>

<body>



    <?php
	
    $uid = 0;
    if (isset($_GET['id'])) {
        $uid = $_GET["id"];
    }
    if ($uid > 0) {
     
     $querya = "SELECT ServiceId FROM dispatcherservice WHERE DispatcherId = $uid";
	 $result = mysqli_query($link, $querya);
  
while ($row = mysqli_fetch_assoc($result)) {
	      
    $a = $row["ServiceId"];
$queryy = "DELETE FROM service WHERE Id = $a";
	 $result = mysqli_query($link, $queryy);
	 $query = "DELETE FROM dispatcherservice WHERE DispatcherId = $uid";
	 $result = mysqli_query($link, $query);
	
}

	
	}

if($result) 
	        {
		        
                    echo("deleted successfully");
					header( "refresh:5;url=viewservices.php" );
					
		}
		else 
	        {
			        
	            die("delete failed");
	        }
			
			
?>
</body>

</html>