<?php include '../header.php';?>
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
	
    <li class="breadcrumb-item active">Feedback Report</li>
  </ol>
  <?php
   //SQL query
    $query = "SELECT * FROM dispatcherrating; " or die(mysqli_connect_error());

    $result = mysqli_query($link, $query);

    //Loop the recordset $rs
    echo "<table border='1'>";

    while ($row = mysqli_fetch_array($result)) {
        echo '
  
  	<h2>Feedback:</h2>
    <table border="1">
	<tr>
            <td>Customer id:</td>
            <td>'
               
           . $row["UserId"].
                
            '</td>
        </tr>
        <tr>
            <td>Rating given:</td>
            <td>'
               
           . $row["Rate"].
                
            '</td>
        </tr>
		<tr>
            <td>Date:</td>
            <td>'
               
           . $row["Date"].
                
            '</td>
        </tr>
        ';   
     }
    echo "</table>";
	?>
	<?php include '../footer.php';?>
  




	
	

