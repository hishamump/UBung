<?php include '../header.php';?>
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
	
    <li class="breadcrumb-item active">Feedback</li>
  </ol>

<form action="readFeedback.php" method="post">

	On a scale of 1 to 5, how much will you rate our despatchers?<br>
	<input type="number" name="rate"><br><br>
	Date:<br>
	<input type="date" name="date"><br><br>
  
	<br><input type="submit">
  
</form>
<?php include '../footer.php';?>