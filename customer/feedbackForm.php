<?php include '../header.php';?>
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
	
    <li class="breadcrumb-item active">Feedback</li>
  </ol>


<?php
   
    
	
    $query = "SELECT user.UserName, user.Id FROM user WHERE Role = 'Despatcher'; " or die(mysqli_connect_error());
	 $result = mysqli_query($link, $query);
	 while ($row = mysqli_fetch_array($result)){
		 
		 $a = $row["Id"];
		 $b = $row["UserName"];
		 echo '
		 <table border="1">
	<tr>
            <td>Id:</td>
            <td>'
               
           . $a.
                
            '</td>
        </tr>
        <tr>
            <td>Despatcher Name:</td>
            <td>'
               
           . $b.
                
            '</td>
        </tr>
		
         
        </tr>           
        ';   
     }
    echo "</table>";
	 
	
	 ?>
	


<form action="readFeedback.php" method="post">
<br>
	On a scale of 1 to 5, how much will you rate our despatchers?<br>
	<input type="number" name="rate"><br><br>
	Date:<br>
	<input type="date" name="date"><br><br>	
	Despatcher Id:<br>
	<input type="number" name="despatcher"><br><br>
  
	<br><input type="submit">
  
</form>



<?php include '../footer.php';?>