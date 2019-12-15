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
	//if(!empty($_POST["del_id"])){
		//$id = $_POST["id"];
		//$query = mysqli_query($con,"DELETE FROM Food WHERE Id = '$id' ") or die(mysqli_error($con));
		//print '<script type="text/javascript">'; 
		//print 'alert("Your Order has been disaproved!")'; 
		//print '</script>'; 			
		
	//}
	

function display(){
		global $query,$con;
		$query = "SELECT * FROM Food";
		if ($result = $con->query($query)) {
			while ($row = $result->fetch_assoc()) {
				$id = $row["Id"];
				$Foodname = $row["Foodname"];
				$Price = $row["Price"];
				$RName = $row["RName"];
							
 
				echo '<tr> 
						<td>'.$id.'</td> 
						<td>'.$Foodname.'</td> 
						<td>'.$Price.'</td> 
						<td>'.$RName.'</td> 
						
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
	<th>Food Name</th>
    <th>Price</th>
	<th>Restaurant Name</th>
	
  </tr>
  <tr>
		<?php display();?>
  </tr>
	

</body>
</html>