<?php

//Params to connect to a database
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "quan_ly_hoc_sinh";

//Connection to database
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Database connection failed!");
}

echo ('ket noi thanh cong')

?>