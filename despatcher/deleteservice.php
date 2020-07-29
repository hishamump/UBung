<?php include '../header.php';?>
<?php CheckRole(DESPATCHER) ?>
<h1>Delete Service</h1>
<?php
    $aid = 0;
    if (isset($_GET['id'])) {
        $aid = $_GET["id"];
    }
    $uid = $_SESSION['UserId'];
    if ($aid > 0) {
        $query = "DELETE FROM service WHERE id = $aid AND DispatcherId = $uid"
            or die(mysqli_connect_error());
        // to run sql query in database
        $result = mysqli_query($link, $query);

        //Check whether the insert was successful or not
        if ($result) {
            SuccessMessage("Service deleted successfully");
        } else {
            ErrorMessage("Deletion failed" . mysqli_error($link));
        }
    }
    ?>
    <button class="btn btn-primary" onclick="window.location.href = 'services.php';"> &lt; Services List</button>
<?php include '../footer.php';?>