<?php 



$con = mysqli_connect('localhost','root','');
 
 if (!$con)
 {
	 echo 'No connection';
 }

if (!mysqli_select_db($con,'UBung'))
{
	echo 'database not selected';
	
}
	if(!empty($_POST["del_id"])){
		$id = $_POST["id"];
		$query = mysqli_query($con,"DELETE FROM Restaurant WHERE Id = '$id' ") or die(mysqli_error($con));
		print '<script type="text/javascript">'; 
		print 'alert("Restaurant has been disaproved!")'; 
		print '</script>'; 			
		
	}
	

function display(){
		global $query,$con;
		$query = "SELECT * FROM Restaurant";
		if ($result = $con->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$id = $row["Id"];
				$Rname = $row["Rname"];
				$name = $row["Name"];
				$phone = $row["phone"];
				$email = $row["email"];
							
 
				echo '<tr> 
						<td>'.$id.'</td> 
						<td>'.$Rname.'</td> 
						<td>'.$name.'</td> 
						<td>'.$phone.'</td> 
						<td>'.$email.'</td> 
						
						<td><form method="post" action="admin.php">
								<input type="hidden" name="id" value='.$id.'>
								<input type="submit" name="del_id" value="Disaprove this restaurant">
							</form>
								</td>
						
					</tr>';
			}
			$result->free(); 
		}
		else{
					print '<script type="text/javascript">'; 
					print 'alert("Data not exist on following table.")'; 
					print '</script>'; 			
		}

	}
    
?>

<!DOCTYPE html>
<head>
	<style>
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 80%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #dddddd;
		}
</style>
</head>
<body>

<h2>Restaurant Table</h2>
<h5>
<table>
  <tr>
    <th>Id </th>
	<th>Restaurant name </th>
    <th>Name</th>
    <th>Phone</th>
	<th>Email</th>
	
	<th colspan="2">Edit Info</th>
  </tr>
  <tr>
		<?php display();?>
  </tr>
	

</body>
</html>