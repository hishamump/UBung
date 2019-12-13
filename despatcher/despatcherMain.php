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

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Despatcher</li>
  </ol>
  
  <h2>Despatchers</h2>
<?php
   
    //SQL query
    $query = "SELECT * FROM user WHERE username = '$ll'; " or die(mysqli_connect_error());

    $result = mysqli_query($link, $query);

    //Loop the recordset $rs
    echo "<table border='1'>";
	
	
	
    while ($row = mysqli_fetch_array($result)) {
        echo '
        
        <tr>
            <td>Name:</td>
            <td>' . $row["UserName"] . '</td>
        </tr>
        <tr>
        <td>Email:</td>
        <td>' . $row["Email"] . '</td>
        </tr>
        <tr>
            <td>Status:</td>
            <td>' . $row["Status"] . '</td>
        </tr>
        <tr>
            <td>Role:</td>
            <td>' . $row["Role"] . '</td>
        </tr>
       
        <tr>
            <td colspan = "2" style="background-color:grey">&nbsp;</td>
        </tr>   
		<tr>
            <td style="background-color:purple">
                <button onclick="window.location.href = \'update.php?id=' . $row["Id"] . '\';">Edit</button>
				<button onclick="window.location.href = \'delete.php?id=' . $row["Id"] . '\';">Delete</button>
            </td>
          
        </tr>                 
        <tr>
            <td colspan = "2" style="background-color:grey">&nbsp;</td>
        </tr>           
        ';        
        
    }
    echo "</table>";

    //Check whether the insert was successful or not
    if (!$result) {
        die("Query failed" . mysqli_error($link));
    }


    //Close the database connection
    mysqli_close($link);

    
    ?>
  
<?php include '../footer.php';?>