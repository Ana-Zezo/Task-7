<?php
require_once "../function/helper.php";
require_once "../database/database.php";
$task = $_POST["task"];
$id = $_POST["id"];
if (checkRequest("POST")) {
    $name = sanitize($_POST["task"]);
    $error = [];
    if (requiredVal($name)) {
        $error["name"] = "Required Value";
    } elseif (minVal($name, 3)) {
        $error["name"] = "Task Less Than 3";
    } elseif (maxVal($name, 25)) {
        $error["name"] = "Task Less Than 25";
    }

    if (empty($error)) {
        $sql = "UPDATE `tasks` SET `task` = '$task' WHERE `id` = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION["success_Update"] = "Successful Update";
            redirect("../profile.php");
            die;
        }
    } else {
        $_SESSION["update_error"] = $error;
        redirect("../profile.php");
        die;
    }
} else {
    $_SESSION["request_error"] = "Request Error";
    redirect("../profile.php");
    die;
}