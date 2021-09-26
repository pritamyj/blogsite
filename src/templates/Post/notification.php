<?php if (isset($_REQUEST["info"])) {
?>
    <?php if ($_REQUEST["info"] == "added") { ?>
        <div class="alert alert-sucess" role="alert">
            <h3>Post has been added successfully</h3>
        </div>
    <?php } else if ($_REQUEST["info"] == "updated") { ?>
        <div class="alert alert-sucess" role="alert">
            <h3> Post has been updated successfully</h3>
        </div>
    <?php } else if ($_REQUEST["info"] == "deleted") { ?>
        <div class="alert alert-danger" role="alert">
            <h3>Post has been deleted successfully</h3>
        </div>
    <?php } ?>
<?php } ?>