<?php include '../header.php';?>

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">OrderMain</li>
  </ol>
  
<h1>Update Service</h1>

<?php include '../selectDB.php'; ?>

<body>
<?php

    $submit = '';
    if (isset($_POST['submit'])) {
        $submit = $_POST["submit"];
    }
    $aid = 0;
    if (isset($_GET['id'])) {
        $aid = $_GET["id"];
    }    
    if ($submit == 'Update'){
        $aid = $_POST["id"];
        //Collect and save updateed information
		
		$services = $_POST['services'];
     foreach ($_POST['services'] as $selection =>$value) {
			$services[]=$value;
		}
//$arr = implode("",$genre);

$services = array_unique($services);
$column= implode(", ", $services);


 if ($aid > 0) {
        $query = "SELECT dispatcherservice.ServiceId FROM dispatcherservice CROSS JOIN user WHERE dispatcherservice.DispatcherId = $aid " or die(mysqli_connect_error());

        $result = mysqli_query($link, $query);
        if ($row = mysqli_fetch_array($result)) {
	      
    $a = $row["ServiceId"];
		}
 }
        
        $strSQL = "UPDATE service SET Name='$column' WHERE Id= '$a'";
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
    if ($aid > 0) {
        $query = "SELECT dispatcherservice.ServiceId FROM dispatcherservice CROSS JOIN user WHERE dispatcherservice.DispatcherId = $aid " or die(mysqli_connect_error());

        $result = mysqli_query($link, $query);
        if ($row = mysqli_fetch_array($result)) {
        $a = $row["ServiceId"];
    ?>
    <h3>Update  Data</h3>
    <form action="updateservice.php" method="POST">
       Services: 
        <select id="mySelect" name="services[]" multiple size="7">
            <option>Deliver Ice Cream</option>
            <option>Deliver Sandwich</option>
            <option>Deliver Noodles</option>
            <option>Deliver Burger</option>
            <option>Deliver Waffle</option>
            <option>Deliver Drinks</option>
            <option>Fantasy</option>
        </select><br><br>
      <br><input type="submit" name="submit" value="Update">
        <input type="hidden" id="" name="id" value='<?php echo $aid ?>'>
    </form>
    <?php 
        }else{
            echo '<p style="background-color: #F0CCC4">Announcement not found</p>';
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