<?php
require '../includes/account.php';
global $conn;
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';

connect_db();
$result = mysqli_query($conn,"SELECT MaActor FROM TaiKhoan WHERE MaNguoiDung=$id");
while($row = mysqli_fetch_array($result))
{
  $key = $row['MaActor'];
}

if ($id){
    delete_account($id);
}

$key = substr($key,0,2);

if ($key == "GV"){
    header("location: ../accounts/teacher.php");
}
else if($key == "AD"){
    header("location: ../accounts/admin.php");
}
else{
    header("location: ../accounts/student.php");
}

?>