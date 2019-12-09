<?php include 'header.php';?>

<h1>Update Announcement</h1>

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
            echo("Data updated successfully");
        }
        else 
        {
            die("Update failed" . mysqli_error($link));
        }
    }

    if ($aid > 0) {
        $query = "SELECT * FROM announcement where id = $aid " or die(mysqli_connect_error());

        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
    ?>
    <h3>Update <?php echo $row["Title"] ?> Data</h3>
    <form action="aUpdate.php" method="POST">
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
                <td><input type="submit" name="submit" value="Update"></td>
                <td></td>
            </tr>
        </table>
        <input type="hidden" id="" name="id" value='<?php echo $row["Id"]?>'>
    </form>
    <?php 
        }else{
            echo '<p style="background-color: #F0CCC4">Announcement not found</p>';
        }
    }else{
        echo '<p style="background-color: #F0CCC4">Please provide user id</p>';
    }
    mysqli_close($link);
    ?>

<?php include 'footer.php';?>
