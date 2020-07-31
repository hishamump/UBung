<?php include '../header.php'; ?>
<?php CheckRole(CUSTOMER) ?>
<?php
if (isset($_POST['submit'])) {
  $uid = $_SESSION['UserId'];
  //Collect and save updateed information
  $rate = $_POST["rank"];
  $dispatcherId = $_POST["despatcher"];

  $strSQL = "INSERT into dispatcherrating (DispatcherId, UserId, Rate, Date) values 
              ('$dispatcherId ', '$uid ', '$rate', NOW())"
    or die(mysqli_connect_error());

  $result = mysqli_query($link, $strSQL);
  if ($result) {
    SuccessMessage("Ranked successfully");
  } else {
    die("Rank failed" . mysqli_error($link));
  }
}

$query = "SELECT * FROM user WHERE Role = '" . DESPATCHER . "' AND Status = 1" or die(mysqli_connect_error());
$result = mysqli_query($link, $query);

?>

<h3>Rate Dispatcher</h3>
<form action="feedbackForm.php" method="POST" enctype="multipart/form-data">
  <table>
    <tr>
      <td>
        <h5>Dispatcher:</h5>
      </td>
      <td>
        <select name="despatcher" required>
          <option selected="selected" value="">Choose one</option>
          <?php while ($result && $row = mysqli_fetch_array($result)) { ?>
            <option value="<?php echo $row["Id"] ?>"><?php echo $row["UserName"] ?></option>
          <?php
          }
          ?>
        </select>

      </td>
    </tr>
    <tr>
      <td style="vertical-align: top">
        <h5>Rank:</h5>
      </td>
      <td>
        <input type="radio" name="rank" value="1" required>1
        <input type="radio" name="rank" value="2">2
        <input type="radio" name="rank" value="3">3
        <input type="radio" name="rank" value="4">4
        <input type="radio" name="rank" value="5">5
      </td>
    </tr>
    <tr>
      <td></td>
      <td><input style="width: 100%" class="btn btn-primary" type="submit" name="submit" value="Submit"></td>
    </tr>
  </table>
</form>

<?php include '../footer.php'; ?>