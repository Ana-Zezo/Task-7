<?php

$localhost = "localhost";
$username = "root";
$pass = "";
$dbname = "todoApp";
$conn = mysqli_connect($localhost, $username, $pass, $dbname);
echo mysqli_error($conn);