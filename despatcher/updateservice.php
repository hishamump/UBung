<?php include '../header.php'; ?>
<?php CheckRole(DESPATCHER) ?>
<?php
$submit = '';
if (isset($_POST['submit'])) {
    $submit = $_POST["submit"];
}
$sid = 0;
if (isset($_GET['id'])) {
    $sid = $_GET["id"];
}
if ($submit == 'Update') {
    $sid = $_POST["id"];
    //Collect and save updateed information
    $name = $_POST["name"];

    $strSQL = "UPDATE service SET Name='$name' WHERE id=$sid";
    $result = mysqli_query($link, $strSQL);
    if ($result) {
        SuccessMessage("Data updated successfully");
    } else {
        ErrorMessage("Update failed: " . mysqli_error($link));
    }
}

if ($sid > 0) {
    $query = "SELECT * FROM service where id = $sid " or die(mysqli_connect_error());

    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
?>
        <h1>Update <?php echo $row["Name"] ?> Data</h1>
        <form action="updateservice.php" method="POST">
            <table>
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="name" value='<?php echo $row["Name"] ?>'></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="window.location.href = 'services.php';">Back</button>
                        <input class="btn btn-warning" type="submit" name="submit" value="Update">
                    </td>
                </tr>
            </table>
            <input type="hidden" id="" name="id" value='<?php echo $row["Id"] ?>'>
        </form>
<?php
    } else {
        ErrorMessage("Service not found");
    }
} else {
    ErrorMessage("Service id not provided");
}
mysqli_close($link);
?>
<?php include '../footer.php'; ?>