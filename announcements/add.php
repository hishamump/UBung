<?php include '../header.php'; ?>

<?php
$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/" . ROOT . "/uploads/";
// Check if image file is a actual image or fake image
if (isset($_POST["submit"]) && $_FILES["fileToUpload"]["tmp_name"] != "") {
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size // 6k
    if ($_FILES["fileToUpload"]["size"] > 600000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<?php
$submit = '';
if (isset($_POST['submit'])) {
    $submit = $_POST["submit"];
}

if ($submit != '') {
    echo "***";
    $uid = $_POST["id"];
    //Collect and save updateed information
    $title = "";
    if (isset($_POST['title'])) {
        $title = $_POST["title"];
    }
    if (isset($_POST['description'])) {
        $description = $_POST["description"];
    }

    $strSQL = "insert into Announcement (Title, Description, Image, UserId) values 
        ('$title', '$description', '$fileName', 1)"
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
<form action="add.php" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <h5>Title:</h5>
            </td>
            <td><input type="text" name="title" class="form-control"></td>
        </tr>
        <tr>
            <td style="vertical-align: top">
                <h5>Description:</h5>
            </td>
            <td><textarea name="description" cols="30" rows="10" class="form-control"></textarea></td>
        </tr>
        <tr>
            <td style="vertical-align: top">
                <h5>Image:</h5>
            </td>
            <td>
                <input class="btn btn-warning" type="file" name="fileToUpload" id="fileToUpload">
                <!-- <input class="btn btn-info" type="submit" value="Upload Image" name="submit"> -->
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input style="width: 100%" class="btn btn-primary" type="submit" name="submit" value="Submit New Announcement"></td>
        </tr>
    </table>
    <input type="hidden" id="" name="id" value='1'>
</form>

<?php include '../footer.php'; ?>