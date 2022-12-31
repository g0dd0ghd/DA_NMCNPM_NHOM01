<?php
require_once "./includes/database.php";

$query = "SELECT MaLop FROM lop ORDER BY MaLop DESC";
$statement = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($statement, $query)){
                
  header("Location: ../login.html?error");
  exit();
}
else{
  mysqli_stmt_execute($statement);
  $result = mysqli_stmt_get_result($statement);

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
      <div id="student-list">
        <p>Tra cứu học sinh</p>
        <div class="toolbar">
          <label for="class" class="item">Chọn lớp: </label>
          <select id="class" class="item" name="categories">
            <option value="null"></option>
            <?php
              while($row = mysqli_fetch_array($result)){
                echo "<option value='".$row['MaLop']."'>".$row['MaLop']."</option>";
              }
            ?>
          </select>
          <input type="text" placeholder="Tìm kiếm" class="item" id="search-input" />
          <a href="#" class="item" id="search-btn"><i class="fas fa-search"></i></a>
        </div>
        <table class="student-tab">
          <thead>
            <tr>
              <th>STT</th>
              <th>Mã số HS</th>
              <th>Họ và Tên</th>
              <th>Lớp</th>
              <th>Điểm TB HKI</th>
              <th>Điểm TB HKII</th>
              <th>Trung bình tổng</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>220001</td>
              <td>Nguyễn Văn A</td>
              <td>10A1</td>
              <td>9.0</td>
              <td>10</td>
              <td>9.7</td>
            </tr>
            <tr>
              <td>1</td>
              <td>220002</td>
              <td>Nguyễn Văn B</td>
              <td>10A1</td>
              <td>8.0</td>
              <td>9.5</td>
              <td>9.0</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- End Student List -->
    </div>
    <!-- Custom Script -->
    <script>
      var input = document.getElementById("search-input");
      input.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
          event.preventDefault();
          document.getElementById("search-btn").click();
        }
      });
    </script>
  </body>
</html>
