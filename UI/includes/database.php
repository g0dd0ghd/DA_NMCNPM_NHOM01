<?php

//Params to connect to a database
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "020902";
$dbName = "quan_ly_hoc_sinh";

//Connection to database
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Database connection failed!");
}

//
function getdata($query){
    $conn = mysqli_connect('localhost', 'root', '020902', 'quan_ly_hoc_sinh');
  
    $data = mysqli_query($conn, $query);
    return $data;
  }

?>
