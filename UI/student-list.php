<?php
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
  echo "Reach";
  // Redirect the user to the login page
  header('Location: ./login.html');
  exit();
}

if (isset($_GET['class']) && $_GET['class'] != null){
  $l = $_GET['class'];
  
  $query = "select * from hocsinh where MaLop = '${l}'";
}
else {
  $query = "select * from hocsinh";
}

include_once('./includes/database.php');

$data = getdata($query);
$lop = getdata('select MaLop from lop;');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>QLHS</title>
    <link rel="icon" href="./assets/img/logo-hcmus-new.png" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/common.css" />
    <link rel="stylesheet" href="./css/student-list.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
  </head>
  <body>
    <div id="main">
      <div id="header">
        <!-- Begin Navigation -->
        <ul id="nav">
          <li>
            <a href="./home-page.html"><i class="fas fa-home"></i> Trang chủ</a>
          </li>
          <li>
            <a href="#"><i class="fas fa-book-open"></i> Lớp học</a>
            <ul class="subnav">
              <li><a href="./search-student.php">Tra cứu HS</a></li>
              <li><a href="./student-list.php">Xem DS lớp</a></li>
              <li><a href="./insert-student.php">Tiếp nhận HS</a></li>
              <li><a href="./score-sheet.php">Bảng điểm</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><i class="far fa-list-alt"></i> Báo cáo</a>
            <ul class="subnav">
              <li><a href="./subject-summary.php">Tổng kết môn</a></li>
              <li><a href="./semester-summary.php">Tổng kết HK</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><i class="fas fa-users"></i> Quản lý</a>
            <ul class="subnav">
              <li><a href="./accounts/admin.php">Admin</a></li>
              <li><a href="./accounts/teacher.php">Giáo viên</a></li>
              <li><a href="./accounts/student.php">Học sinh</a></li>
            </ul>
          </li>
        </ul>
        <!-- End Navigation -->
        <!-- Begin Avatar -->
        <div id="avatar">
          <i class="avatar-icon fas fa-user-alt"></i>
          <ul class="subnav">
            <li><a href="#">Thông tin</a></li>
            <li><a href="./login.html">Đăng xuất</a></li>
          </ul>
        </div>
        <!-- End Avatar -->
      </div>
      <!-- Begin Student List -->
      <form action = './student-list.php' method = "get">
        <div id="student-list">
          <p>Danh sách học sinh</p>
          <div class="toolbar">
            <label for="class" class="item">Chọn lớp: </label>
            <select name = "class" id="class" class="item">
              <option selected = "selected" value=>-Chọn lớp-</option>
              <?php while ($row = mysqli_fetch_array($lop)):?>
                <option value=<?php echo $row['MaLop']?>><?php echo $row['MaLop']?></option>
                <?php endwhile;?>
              </select>
            <div class="button">
              <a href="./insert-student.php" class="item"><i class="fas fa-plus"></i> Thêm</a>
              <a href="#" class="item" id="edit-btn"><i class="fas fa-edit"></i> Sửa</a>
              <a href="#" class="item" id="save-btn"><i class="fas fa-save"></i> Lưu</a>
              <button name="submit" type="submit"><i class="fas fa-clipboard-list"></i></button> 
            </div>
          </div>
          <table class="student-tab">
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã số HS</th>
                <th>Họ và Tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Email</th>
                <th class="address">Địa chỉ</th>
                <th>Lớp</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php
                $i = 1;
                while ($row = mysqli_fetch_array($data)):
                ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['MaHocSinh'];?></td>
                    <td><?php echo $row['HoTen'];?></td>
                    <td><?php echo $row['GioiTinh']?></td>
                    <td><?php echo $row['NgaySinh'];?></td>
                    <td><?php echo $row['Email'];?></td>
                    <td><?php echo $row['DiaChi'];?></td>
                    <td><?php echo $row['MaLop'];?></td>
                    <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                  </tr>
                <?php endwhile;?>
              </tr>
            </tbody>
          </table>
          
      </form>
          </div>
        </div>
      </form>
      <!-- End Student List -->
    </div>
    <!-- Custom Script  -->
    <script src="./js/app.js"></script>
  </body>
</html>
