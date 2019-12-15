
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
$a = $_SESSION['username'];
?>
<?php include '../header.php';?>
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
	
    <li class="breadcrumb-item active">Profile</li>
  </ol>
  <?php
   //SQL query
    $query = "SELECT * FROM user where username = '$a'; " or die(mysqli_connect_error());

    $result = mysqli_query($link, $query);

    //Loop the recordset $rs
    echo "<table border='1'>";

    while ($row = mysqli_fetch_array($result)) {
        echo '
  
  	<h2>Your Profile:</h2>
    <table border="1">
        <tr>
            <td>Username:</td>
            <td>'
               
           . $row["UserName"].
                
            '</td>
        </tr>
		<tr>
            <td>Email:</td>
            <td>'
               
           . $row["Email"].
                
            '</td>
        </tr>
        <tr>
            <td>Phone number:</td>
            <td>'
               
           . $row["Phone"].
                
            '</td>
        </tr>
		<tr>
            <td>Address:</td>
            <td>'
               
           . $row["Address"].
                
            '</td>
        </tr>
		 <tr>
            <td style="background-color:black">
                <button onclick="window.location.href = \'updateCustomer.php?id=' . $row["Id"] . '\';">Edit</button>
            </td>
           
        </tr>                 
        <tr>
            <td colspan = "2" style="background-color:white">&nbsp;</td>
        </tr>           
        ';   
     }
    echo "</table>";
	?>
	<?php include '../footer.php';?>
  




	
	

