<?php
  session_start();
  if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
    echo "Reach";
    // Redirect the user to the login page
    header('Location: ./login.html');
    exit();
  }
  
  if(isset($_SESSION['user_id']) && (substr($_SESSION['user_id'], 0,2)==='AD' or substr($_SESSION['user_id'], 0,2)==='GV')){
    if(isset($_POST['submit'])){
      require_once "includes/database.php";
  
      $stuname = $_POST['stuname'];
      $stuphonenum = $_POST['stuphonenum'];
      $stuaddress = $_POST['stuaddress'];
      $stubday = $_POST['stubday'];
      $stugender = $_POST['stugender'];
      $stuclass = $_POST['stuclass'];
  
      $sql = "INSERT INTO hocsinh (HoTen,GioiTinh,NgaySinh,Email,DiaChi,MaLop) values(?,?,?,?,?,?)";
  
      $statement = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($statement, $sql)){
          
          header("Location: ./insert-student.php?error");
          exit();
      }
      else{      
        mysqli_stmt_bind_param($statement, "ssssss", $stuname,$stugender,$stubday,$stuphonenum,$stuaddress,$stuclass);
        mysqli_stmt_execute($statement);
        header("Location ./insert-student.php");
        exit();
      }
    }
  }
  else{
    echo "<script>alert('You cannot access this site.');</script>";
    echo "<script>window.location = 'javascript:history.go(-1);';</script>";
    exit;
  }
  
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
    <link rel="stylesheet" href="./css/insert-student.css" />
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
      <!-- Begin Add Student -->
      <div id="add-student">
        <p>Tiếp nhận học sinh</p>
        <a href="./home-page.html" class="button">
          <h4><i class="fas fa-caret-left"></i> Thoát</h4>
        </a>
        <form method="post">
          <div class="input-group">
            <div class="item">
              <label for="student-name">Tên học sinh:</label>
              <input type="text" name="stuname" id="student-name" placeholder="Họ và tên" />
            </div>
            <div class="item">
              <label for="student-phonenum">Số điện thoại:</label>
              <input type="text" name="stuphonenum" id="student-phonenum" placeholder="Số điện thoại" />
            </div>
            <div class="item">
              <label for="student-address">Địa chỉ:</label>
              <input type="text" name="stuaddress" id="student-address" placeholder="Địa chỉ" />
            </div>
            <div class="item">
              <label for="student-birthday">Ngày sinh:</label>
              <input type="date" name="stubday" id="student-birthday" />
            </div>
            <div class="item">
              <div class="sub-item">
                <label for="student-gender">Giới tính:</label>
                <select name="stugender" id="student-gender">
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
                </select>
              </div>
              <div class="sub-item">
                <label for="student-class">Lớp:</label>
                <input type="text" name="stuclass" id="student-class" placeholder="Lớp" />
              </div>
            </div>
            <button type="submit" name="submit" class="button save-btn" onclick="javascript:alert('Đã lưu thông tin!')"><h4><i class="fas fa-save"></i> Lưu</h4></button>
              
          </div>
        </form>
      </div>
      <!-- End Add Student -->
    </div>
  </body>
</html>
