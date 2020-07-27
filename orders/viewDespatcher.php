<?php include '../header.php'; ?>
<style>
table, td, th {  
  border: 1px solid #ddd;
  text-align: center;
}

table {
  border-collapse: collapse;
  width: 80%;
}

th, td {
  padding: 15px;
}
</style>
<title>Despatcher List</title>
<div align="center">[<a href="orderMain.php">Previous Page</a>]
<h1 align="center">Despatcher List</h1>
<br>
<table border="1" width="80%" style="text-align: center;">
<tr>
	<th>UserId</th>
	<th>Name</th>
	<th>Address</th>
	<th>Phone</th>
	<th>Email</th>
</tr>

<?php 
	$conn = mysqli_connect("localhost", "root", "", "ubung");
	$sql = "SELECT * FROM user WHERE Role='Despatcher'";
	$result = $conn->query($sql);
	if ($result -> num_rows > 0){
		while($row = $result -> fetch_assoc()){
?>
	<td><?php echo $row['Id']; ?></td>	
	<td><?php echo $row['UserName']; ?></td>	
	<td><?php echo $row['Address']; ?></td>	
	<td><?php echo $row['Phone']; ?></td>	
	<td><?php echo $row['Email']; ?></td>	
<?php		
	}
		}	
?>
</table>
<br>
<br>
<form action="orderMain.php" method="post">
<button class="v_btn" type="submit">Go to Main Page</button>
</form>
</center>
</body>
</html>
<?php include '../footer.php'; ?>