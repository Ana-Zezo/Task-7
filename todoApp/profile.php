<?php
require_once "./pages/header.php";
require_once "./function/helper.php";
require_once "./database/database.php";
?>
<h1 class="text-center my-4 py-4">ToDo App</h1>

<div class="row w-50 mx-auto">
    <?php
    keySession("request_error");
    keySession("update_error");
    keySession("success_Update");
    keyAndValueSession("create_error", "name");
    keySession("success_created", "success");
    ?>
    <form action="Controller/CreateController.php" method="POST">

        <label for="text" class="label-control">Task</label>
        <input type="text" name="task" id="text" placeholder="Enter Task" class="form-control my-3">
        <button class="btn btn-success">Add Task</button>
    </form>
</div>
<hr class="w-50 mx-auto my-4">
<div class="row w-75 mx-auto my-4">
    <?php
    keySession("success_delete", "success");
    ?>
    <h1 class="text-center mx-auto py-4">List</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tasks</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $sql = "SELECT * FROM tasks";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        $name = $row["task"];
                        ?>
                    </tr>
                    <th scope="row">
                        <?= $id ?>
                    </th>
                    <td>
                        <?= $name ?>
                    </td>
                    <td class="w-25">
                        <a href="./edit.php?id=<?= $id ?>" class="btn btn-info">Edit</a>
                        <a href="./controller/DeleteController.php?id=<?= $id ?>" class="btn btn-danger">Delete</a>
                    </td>
                    <?php
                    }
                }
                ?>
        </tbody>
    </table>
</div>

<?php
require_once "./pages/footer.php";
?>