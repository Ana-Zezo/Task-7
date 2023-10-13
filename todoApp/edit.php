<?php
require_once "./pages/header.php";
require_once "./function/helper.php";
require_once "./database/database.php";
$id = $_GET["id"];
$sql = "SELECT * FROM `tasks` WHERE `id` = $id";
$result = mysqli_query($conn, $sql);
$row = null;
if ($result) {
    $row = mysqli_fetch_assoc($result);
}
?>
<div class="row w-50 mx-auto my-5">
    <?php
    keySession("request_error");
    keyAndValueSession("create_error", "name");
    keySession("success_created", "success");
    ?>
    <h1 class="text-center mb=4 text-secondary">Update Your Task</h1>
    <form action="Controller/UpdateController.php" method="POST">
        <label for="text" class="label-control">Task</label>
        <input type="text" name="task" id="text" placeholder="Enter Task" class="form-control my-3"
            value="<?= $row["task"] ?>">
        <input type="hidden" name="id" value="<?= $row["id"] ?>">
        <input type="submit" class="btn btn-warning" value="Update">
        <a href="./profile.php" class="btn btn-primary">Profile</a>
    </form>
</div>
<?php
require_once "./pages/footer.php";
?>