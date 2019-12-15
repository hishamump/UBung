

<?php include '../header.php';
$ll = $_SESSION['username'];?>
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Services</li>
  </ol>
  
  <h2>Available Services</h2>
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
    <option>Deliver Fast Food</option>
  </select><br><br>
  <br><input type="submit">
  
<?php include '../footer.php';?>