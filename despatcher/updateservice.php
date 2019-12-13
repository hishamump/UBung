<?php include '../header.php';?>
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">OrderMain</li>
  </ol>
  
  <h2>Update Menu</h2>
  
  <?php include '../selectDB.php'; ?>

<body>
   
    <?php
    $submit = '';
    if (isset($_POST['submit'])) {
        $submit = $_POST["submit"];
    }
    $uid = 0;
    if (isset($_GET['id'])) {
        $uid = $_GET["id"];
    }    
    if ($submit == 'Update'){
        $uid = $_POST["id"];
        //Collect and save updateed information
       
    
    
        $name = $_POST["name"];
        $email = $_POST["email"];
        $status = $_POST["status"];
        $role = $_POST["role"];        
        
        $strSQL = "UPDATE user SET username='$name', email='$email', status='$status',role='$role' WHERE id=$uid";
       
        $result = mysqli_query($link, $strSQL);
        if($result) 
        {
            echo("Data updated successfully");
        }
        else 
        {
            die("Update failed" . mysqli_error($link));
        }
    }


    if ($uid > 0) {
        $query = "SELECT * FROM user WHERE id = $uid " or die(mysqli_connect_error());

        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
    ?>
    <h3>Update <?php echo $row["UserName"] ?> Data</h3>
    <form action="update.php" method="POST">
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
  
        <input type="hidden" id="" name="id" value='<?php echo $row["Id"]?>'>
    </form>
    <?php 
        }else{
            echo '<p style="background-color: #F0CCC4">User not found</p>';
        }
    }else{
        echo '<p style="background-color: #F0CCC4">Please provide user id</p>';
    }

    function isChecked($value, $compare){
        if ($value == $compare){
            return "checked";
        }else{
            return "";
        }
    }    

    function isSelected($value, $compare, $word = ''){
        if ($word == ''){
            $word = 'selected';
        }
        if (strpos($value, $compare) !== false){
            return $word;
        }else{
            return "";
        }
    } 
    mysqli_close($link);
    ?>
  
<?php include '../footer.php';?>