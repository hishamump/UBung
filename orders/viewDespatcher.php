<?php include '../header.php'; ?>
<title>Despatcher List</title>

<div align="center">[<a href="orderMain.php">Previous Page</a>]
<h1 align="center">Despatcher List</h1>
<table border="1" align="center">
<tr>
	<th>UserId</th>
	<th>Name</th>
	<th>Address</th>
	<th>Phone</th>
	<th>Email</th>
</tr>
<tr>
	<?php
	//$link = mysqli_connect("localhost","root","","ubung");
	$link = mysqli_connect("localhost", "root", "", "", "3306");
	$select = "select * from user WHERE Role='Despatcher' ";
	$run = mysqli_query($link, $select);

	while($row = mysqli_fetch_array($run)){
		$Id 			= $row['Id'];
		$Name			= $row['UserName'];
		$Address    	= $row['Address'];
		$Phone			= $row['Phone'];
		$Email			= $row['Email'];
	?>
	<td align="center"><?php echo $Id;?></td>
	<td align="center"><?php echo $Name;?></td>
	<td align="center"><?php echo $Address;?></td>
	<td align="center"><?php echo $Phone;?></td>
	<td align="center"><?php echo $Email;?></td>
</tr>
	<?php }  ?>
</table>

<form action="orderMain.php" method="post">
<button class="v_btn" type="submit">Go to Main Page</button>
</form>
</center>
</body>
</html>
<?php include '../footer.php'; ?>