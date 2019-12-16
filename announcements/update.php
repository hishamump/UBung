<?php include '../header.php';?>
<?php CheckRole(ADMIN) ?>
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
        $title = $_POST["title"];
        $description = $_POST["description"];
        
        $strSQL = "UPDATE Announcement SET Title='$title', Description='$description' WHERE id=$aid";
        $result = mysqli_query($link, $strSQL);
        if($result) 
        {
            SuccessMessage("Data updated successfully");
        }
        else 
        {
            ErrorMessage("Update failed: " . mysqli_error($link));
        }
    }

    if ($aid > 0) {
        $query = "SELECT * FROM announcement where id = $aid " or die(mysqli_connect_error());

        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
    ?>
    <h1>Update <?php echo $row["Title"] ?> Data</h1>
    <form action="update.php" method="POST">
        <table>
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" value ='<?php echo $row["Title"] ?>'></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><textarea name="description" cols="30" rows="10"><?php echo $row["Description"] ?></textarea></td>
            </tr>
            <tr>
                <td><input class="btn btn-warning" type="submit" name="submit" value="Update"></td>
                <td><button type="button" class="btn btn-primary" onclick="window.location.href = 'details.php?id=<?php echo $row["Id"] ?>';">Cancel</button></td>
            </tr>
        </table>
        <input type="hidden" id="" name="id" value='<?php echo $row["Id"]?>'>
    </form>
    <?php 
        }else{
            ErrorMessage("Announcement not found");
        }
    }else{
        ErrorMessage("Announcement id not provided");
    }
    mysqli_close($link);
    ?>
<?php include '../footer.php';?>