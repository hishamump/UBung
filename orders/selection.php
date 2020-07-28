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
<title>Despatcher</title>

<div align="center">[<a href="ViewUpdateDelete.php">Previous Page</a>]
<h1 align="center">Despatcher</h1>

<html>
<body>
<center>
<table border="1" align="center">
<tr>
	<th>UserId</th>
	<th>Name</th>
	<th>Address</th>
	<th>Phone</th>
	<th>Email</th>
	<th>Action</th>
</tr>
<?php 
	$conn = mysqli_connect("localhost", "root", "", "ubung");
	$sql = "SELECT * FROM user WHERE Role='Despatcher'";
	$result = $conn->query($sql);
	if ($result -> num_rows > 0){
		while($row = $result -> fetch_assoc()){
			$str = "";
		    $str = "<tr>";
		    $str = "<form action=selection2.php method='POST'>";
		    $str .= "<td style='display:none;'><input name='dID' value='" . $row['Id'] . "'/>";
		    $str .= "<td>" . $row['Id'] . "</td>";
		    $str .= "<td>" . $row['UserName'] . "</td>";
		    $str .= "<td>" . $row['Address'] . "</td>";
		    $str .= "<td>" . $row['Phone'] . "</td>";
		    $str .= "<td>" . $row['Email'] . "</td>";
		    $str .= "<td><input type='submit' value='SELECT'/>";
		    $str .="</form>";
		    $str .= "</tr>";
		    echo $str;
		}
	}
?>
</table>
<br>
<form action="orderMain.php" method="post">
<button class="v_btn" type="submit">Go to Main Page</button>
</form>
</center>
</body>
</html>
<?php include '../footer.php'; ?>