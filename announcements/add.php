<?php include '../header.php'; ?>

<?php
$submit = '';
if (isset($_POST['submit'])) {
    $submit = $_POST["submit"];
}

if ($submit == 'Add') {
    $uid = $_POST["id"];
    //Collect and save updateed information
    $title = "";
    if (isset($_POST['title'])) {
        $title = $_POST["title"];
    }
    if (isset($_POST['description'])) {
        $description = $_POST["description"];
    }
    $strSQL = "insert into Announcement (Title, Description, UserId) values 
        ('$title', '$description', 1)"
        or die(mysqli_connect_error());

    $result = mysqli_query($link, $strSQL);
    if ($result) {
        echo ("Data Inserted successfully");
    } else {
        die("Update failed" . mysqli_error($link));
    }
}
?>

<h3>Add New Announcement</h3>
<form action="add.php" method="POST">
    <table>
        <tr>
            <td><h5>Title:</h5></td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td style="vertical-align: top"><h5>Description:</h5></td>
            <td><textarea name="description" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Add"></td>
            <td></td>
        </tr>
    </table>
    <input type="hidden" id="" name="id" value='1'>
</form>

<?php include '../footer.php'; ?>