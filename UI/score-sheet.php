<?php
if (isset($_GET['subject']) && isset($_GET['class']) && isset($_GET['semester'])){
  $m = $_GET['subject'];
  $l = $_GET['class'];
  $s = $_GET['semester'];
  $query = "select * from tongket_hocky where";
  if ($m != null){
    $query = $query . " tenmh = '${m}' and";
  }
  if ($l != null){
    $query = $query . " MaLop = ${l} and";
  }
  $query = $query . " HocKy = ${s}";
}
else {
  $query = "select * from tongket_hocky";
}

$conn = mysqli_connect('localhost', 'root', '020902', 'quan_ly_hoc_sinh');
$data = getdata($query);
$monhoc = getdata('select distinct(tenmh) from tongket_hocky');
$namhoc = getdata('select distinct(NamHoc) from tongket_hocky;');
$lop = getdata('select distinct(MaLop) from tongket_hocky;');

function getdata($query){
  $conn = mysqli_connect('localhost', 'root', '020902', 'quan_ly_hoc_sinh');

  $data = mysqli_query($conn, $query);
  return $data;
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
      <!-- Begin Score Sheet -->
      <form action = './score-sheet.php' method = "get">
        <div id="student-list">
          <p>Bảng điểm môn học</p>
          <div class="toolbar">
            <label for="subject" class="item">Chọn môn: </label>
            <select name = "subject" id="subject" class="item">
              <option selected="selected" value=>-Chọn môn-</option>
              <?php while ($row = mysqli_fetch_array($monhoc)):?>
                <option value=<?php echo $row['tenmh']?>><?php echo $row['tenmh']?></option>
              <?php endwhile;?>
            </select>
            <label for="class" class="item">Chọn lớp: </label>
            <select name = "class" id="class" class="item">
              <option selected = "selected" value=>-Chọn lớp-</option>
              <?php while ($row = mysqli_fetch_array($lop)):?>
                <option value=<?php echo $row['MaLop']?>><?php echo $row['MaLop']?></option>
              <?php endwhile;?>
            </select>
            <label for="semester" class="item">Chọn học kì: </label>
            <select name="semester" id="semester" class="item">
              <option selected="selected" value="1">HKI</option>
              <option value="2">HKII</option>
            </select>
            <div class="submit-btn">
              <button name="submit" type="submit">Tìm kiếm</button> 
            </div>
          </div>
          <table class="student-tab">
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã số HS</th>
                <th>Họ và Tên</th>
                <th>Điểm 15 phút</th>
                <th>Điểm một tiết</th>
                <th>Điểm giữa kỳ</th>
                <th>Điểm cuối HK</th>
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
                  <td><?php echo $row['diem15'];?></td>
                  <td><?php echo $row['diem45'];?></td>
                  <td><?php echo $row['giuaky'];?></td>
                  <td><?php echo $row['cuoiky'];?></td>
                </tr>
                <?php endwhile;?>
            </tbody>
          </table>
        </div>
      </form>
      <!-- End Score Sheet -->
    </div>
    <!-- Custon Script -->
    <script src="./js/app.js"></script>
  </body>
</html>
