


<?php include '../header.php';
$ll = $_SESSION['username'];?>
<?php CheckRole('Despatcher') ?>

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="../index.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Despatcher</li>
  </ol>
  
  <h2>My Profile</h2>
<?php
   
    //SQL query
    $query = "SELECT * FROM user WHERE username = '$ll'; " or die(mysqli_connect_error());

    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="row">
            <div class="col-md-2">
                <h5>Name:</h5>
            </div>
            <div class="col-md-6">
                <?php echo $row["UserName"] ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <h5>Email:</h5>
            </div>
            <div class="col-md-6">
                <?php echo $row["Email"] ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h5>Status:</h5>
            </div>
            <div class="col-md-6">
                <?php echo $row["Status"] ?>
            </div>
        </div>  

        <?php if (IsInRole(DESPATCHER)) { ?>
        <p>
            <button onclick="window.location.href = 'update.php?id=<?php echo $row["Id"] ?>';"> Edit</button>
        </p>
        <?php }else{?>
        <p>
            <button class="btn btn-primary" onclick="window.location.href = 'index.php';"> &lt; List</button>&nbsp;
        </p>
        <?php
            }
    } else {
        ErrorMessage("Account not found");
    }

    //Check whether the insert was successful or not
    if (!$result) {
        die("Query failed" . mysqli_error($link));
    }
    //Close the database connection
    mysqli_close($link);    
?>
 
<?php include '../footer.php';?>