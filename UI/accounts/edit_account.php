<?php
require_once "../includes/account.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = get_account($id);
}

$key = $data['MaActor'];

if (!$data){
    header("location: student.php");
 }

if (isset($_POST['submit'])){
    $data['TenNguoiDung'] = isset($_POST['TenNguoiDung']) ? $_POST['TenNguoiDung'] : '';
    $data['MatKhau'] = isset($_POST['MatKhau']) ? $_POST['MatKhau'] : '';
    
    // Validate thong tin
    $errors = array();
    if (empty($data['TenNguoiDung'])){
        $errors['TenNguoiDung'] = 'Chưa nhập tên người dùng';
    }
    
    if (empty($data['MatKhau'])){
        $errors['MatKhau'] = 'Chưa nhập mật khẩu tài khoản';
    }
    
    if (!$errors){
        edit_account($data['MaNguoiDung'], $data['TenNguoiDung'], $data['MatKhau'], $data['MaActor']);
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
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

  </head>
  <body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label >Mã người dùng</label>
                <input type="text" class="form-control" name="MaNguoiDung" autocomplete="off" value=<?php echo $data['MaNguoiDung']?> readonly>
            </div>
            <div class="form-group">
                <label >Tên Người dùng</label>
                <input type="text" class="form-control" name="TenNguoiDung" autocomplete="off" value=<?php echo $data['TenNguoiDung']?>>
            </div>
            <div class="form-group">
                <label >Mật Khẩu</label>
                <input type="text" class="form-control" name="MatKhau" autocomplete="off" value=<?php echo $data['MatKhau']?>>
            </div>
            <div class="form-group">
                <label >Tên tài khoản</label>
                <input type="text" class="form-control" name="TenTaiKhoan" autocomplete="off" value=<?php echo $data['MaActor']?> readonly>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
        </form>
    </div>
  </body>
</html>