<?php include '../header.php';?>
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
	
    <li class="breadcrumb-item active">Profile</li>
  </ol>
  <?php
  $submit = '';
  if (isset($_POST['submit'])){
	  $submit = $_POST["submit"];
  }
  $uid = 0;
  if(isset($_GET['id'])){
	  $uid = $_GET["id"];
  }
   if ($submit == 'Update'){
        $uid = $_POST["id"];
		
		$name = $_POST["name"];
        $emailA = $_POST["email"];
        $num = $_POST["phone"];
        $add = $_POST["address"];        
        
		  
        $strSQL = "UPDATE user SET username='$name', email='$emailA', phone='$num', address='$add' WHERE id=$uid";
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
        $query = "SELECT * FROM user where id = $uid " or die(mysqli_connect_error());

        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
    ?>
    <h3>Update <?php echo $row["UserName"] ?> Data</h3>
    <form action="updateCustomer.php" method="POST">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value ='<?php echo $row["UserName"] ?>'></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value='<?php  echo $row["Email"] ?>'></td>
            </tr>
			 <tr>
                <td>Phone:</td>
                <td><input type="number" name="phone" value='<?php  echo $row["Phone"] ?>'></td>
            </tr>
			 <tr>
                <td>Address:</td>
                <td><input type="text" name="address" value='<?php  echo $row["Address"] ?>'></td>
            </tr>
           
           
            <tr>
                <td><input type="submit" name="submit" value="Update"></td>
                <td></td>
            </tr>
        </table>
		
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