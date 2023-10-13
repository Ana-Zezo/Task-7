<?php
session_start();
require_once "../function/helper.php";
require_once "../database/database.php";
// $name = $_POST["task"];
dd($_POST);
if (checkRequest("POST")) {
    $name = sanitize($_POST["task"]);
    $error = [];
    if (requiredVal($name)) {
        $error["name"] = "Task Is Required";
    } elseif (minVal($name, 3)) {
        $error["name"] = "Task Is Less Than 3";
    } elseif (maxVal($name, 25)) {
        $error["name"] = "Task Is Less Than 25";
    }
    if (empty($error)) {
        $sql = "INSERT INTO `tasks`(`task`)VALUES('$name')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION["success_created"] = "Successful To Add Task";
            redirect("../profile.php");
            die;
        }
    } else {
        $_SESSION["create_error"] = $error;
        redirect("../profile.php");
        die;
    }
} else {
    $_SESSION["request_error"] = "Request Error";
    redirect("../profile.php");
    die;
}