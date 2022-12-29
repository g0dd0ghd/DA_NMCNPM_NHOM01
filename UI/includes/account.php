<?php
global $conn;

// Hàm kết nối database
function connect_db(){
    global $conn;

    if (!$conn){
        $conn = mysqli_connect('localhost', 'root', '', 'quan_ly_hoc_sinh') or die ('Can\'t connect to database');
        mysqli_set_charset($conn, 'utf8');
    }
}

// Hàm ngắt kết nối
function disconnect_db(){
    global $conn;

    if ($conn){
        mysqli_close($conn);
    }
}

?>