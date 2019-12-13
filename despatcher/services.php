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
    <li class="breadcrumb-item active">Services</li>
  </ol>
  
 <?php 
 
     $query = "SELECT * FROM user WHERE username = '$ll'; " or die(mysqli_connect_error());

  $result = mysqli_query($link, $query);
  
while ($row = mysqli_fetch_array($result)) {
	      
    $a = $row["Id"];

}
  ?> 
  
  <form action="serviceread.php" method="POST">
  Services: <select id="mySelect" name="services[]" multiple size="7">
    <option>Deliver Ice Cream</option>
    <option>Deliver Sandwich</option>
    <option>Deliver Noodles</option>
    <option>Deliver Burger</option>
	<option>Deliver Waffle</option>
    <option>Deliver Drinks</option>
    <option>Fantasy</option>
  </select><br><br>
  <br><input type="submit">
  
<?php include '../footer.php';?>