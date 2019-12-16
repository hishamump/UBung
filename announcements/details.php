<?php include '../header.php'; ?>
<?php
$aid = 0;
if (isset($_GET['id'])) {
    $aid = $_GET["id"];
}
if ($aid > 0) {
    $query = "SELECT * FROM Announcement where Id = $aid " or die(mysqli_connect_error());

    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <h3>Details for <?php echo $row["Title"] ?></h3>
        <div class="row">
            <div class="col-md-6">
                <h4></h4>
                <p>
                    <?php echo $row["Description"] ?>
                </p>
            </div>
            <div class="col-md-6">
                <img src="/<?php echo ROOT ?>/uploads/<?php echo $row["Image"] ?>" class="img-thumbnail" alt="Image">
            </div>
        </div>
        <?php if (IsInRole(ADMIN)) { ?>
        <p>
            <button class="btn btn-primary" onclick="window.location.href = 'manage.php';"> &lt; Manage List</button>&nbsp;
            <button class="btn btn-primary" onclick="window.location.href = 'update.php?id=<?php echo $row["Id"] ?>';">Edit</button>&nbsp;
            <button class="btn btn-primary" id="btn-confirm" onclick="">Delete</button>
        </p>
        <?php }else{?>
        <p>
            <button class="btn btn-primary" onclick="window.location.href = 'index.php';"> &lt; List</button>&nbsp;
        </p>
<?php
    }} else {
        ErrorMessage("Announcement not found");
    }
} else {
    ErrorMessage("Announcement id not provided");
}
?>

<div class="modal fade"  role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" tabindex="-1" id="myModalLabel">Confirm Delete!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="modal-btn-si">Yes</button>
                <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
            </div>
        </div>
    </div>
</div>

<?php mysqli_close($link) ?>
<?php include '../footer.php' ?>
<script>
    var modalConfirm = function(callback) {
        $("#btn-confirm").on("click", function() {
            $("#mi-modal").modal('show');
        });

        $("#modal-btn-si").on("click", function() {
            callback(true);
            $("#mi-modal").modal('hide');
        });

        $("#modal-btn-no").on("click", function() {
            callback(false);
            $("#mi-modal").modal('hide');
        });
    };

    modalConfirm(function(confirm) {
        if (confirm) {
            window.location.href = 'delete.php?id=<?php echo $row["Id"] ?>';
        } else {

        }
    });
</script>