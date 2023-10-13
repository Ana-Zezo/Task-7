<?php
session_start();
require_once "../function/helper.php";
require_once "../database/database.php";
$id = $_GET["id"];
$sql = "DELETE FROM `tasks` WHERE id = $id";
$result = mysqli_query($conn, $sql);
if ($result) {
    $_SESSION["success_delete"] = "Successful Delete";
    redirect("../profile.php");
    die;
}