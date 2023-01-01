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

// Hàm lấy tài khoản theo MaActor
function get_account_id($id){
    global $conn;
    connect_db();

    $sql = "select * from TaiKhoan where MaActor LIKE '$id%' ";
    
    $query = mysqli_query($conn, $sql);
    $result = array();
    
    if ($query){
        while ($row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
    }

    return $result;
}

// Hàm lấy tài khoản theo MaNguoiDung
function get_account($id)
{
    global $conn;
    connect_db();

    $sql = "select * from TaiKhoan where MaNguoiDung = {$id}";
    $query = mysqli_query($conn, $sql);
    
    $result = array();

    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $result = $row;
    }

    return $result;
}

// Hàm sửa tài khoản
function edit_account($user_id, $user_name, $password, $actor_id){
    global $conn;
    connect_db();
    
    $account_id = addslashes($user_id);
    $account_name = addslashes($user_name);
    $account_password = addslashes($password);
    $account_actor_id = addslashes($actor_id);
    
    $sql = "
            UPDATE TaiKhoan 
            SET TenNguoiDung = '$account_name', MatKhau = '$account_password'
            WHERE MaNguoiDung = $account_id
    ";
    $query = mysqli_query($conn, $sql);
    
    return $query;
}

// Hàm xóa tài khoản
function delete_account($account_id){
    global $conn;
    connect_db();
    
    $sql = "
    DELETE FROM `TaiKhoan` 
    WHERE `MaNguoiDung` = $account_id";
    
    $query = mysqli_query($conn, $sql);
    
    return $query;
}
?>