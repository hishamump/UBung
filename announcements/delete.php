<?php include '../header.php';?>
<?php CheckRole(ADMIN) ?>
<h1>Delete Announcement</h1>
<?php
    $aid = 0;
    if (isset($_GET['id'])) {
        $aid = $_GET["id"];
    }
    if ($aid > 0) {
        $query = "DELETE FROM Announcement WHERE id = $aid"
            or die(mysqli_connect_error());
        // to run sql query in database
        $result = mysqli_query($link, $query);

        //Check whether the insert was successful or not
        if ($result) {
            SuccessMessage("Announcement deleted successfully");
        } else {
            ErrorMessage("Deletion failed" . mysqli_error($link));
        }
    }
    ?>
    <button class="btn btn-primary" onclick="window.location.href = 'manage.php';"> &lt; Manage List</button>
<?php include '../footer.php';?>