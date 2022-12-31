<?php
include_once('./includes/database.php');
if (isset($_GET['class']) && isset($_GET['semester']) && isset($_GET['year'])){
  $l = $_GET['class'];
  $s = $_GET['semester'];
  $y = $_GET['year'];
  $query = "select * from tb_hocky_lop where";
  if ($l != null){
    $query = $query . " MaLop = '${l}' and";
  }
  if ($y != null){
    $query = $query . " NamHoc = ${y} and";
  }
  $query = $query . " HocKy = ${s}";
}
else {
  $query = "select * from tb_hocky_lop";
}


$data = getdata($query);
$namhoc = getdata('select distinct(NamHoc) from tb_hocky_lop;');
$lop = getdata('select MaLop from Lop;');

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
    <link rel="stylesheet" href="./css/summary.css" />
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
      </div>
      <!-- End Avatar -->
      <form action = './semester-summary.php' method = "get">
        <div id="summary">
          <p>Bảng điểm tổng kết học kỳ</p>
          <div class="toolbar">
            <label for="class" class="item">Lớp: </label>
            <select name="class" id="class" class="item">
                <option selected="selected" value=>-Chọn lớp-</option>
                <?php while ($row = mysqli_fetch_array($lop)):?>
                  <option value=<?php echo $row['MaLop']?>><?php echo $row['MaLop']?></option>
                <?php endwhile;?>
            </select>
            <label for="semester" class="item">Học kỳ: </label>
            <select name="semester" id="semester" class="item">
              <option selected="selected" value="1">HKI</option>
              <option value="2">HKII</option>
            </select>
            <label for="year" class="item">Niên khóa: </label>
            <select name="year" id="year" class="item">
                <option selected="selected" value=>-Chọn năm-</option>
                <?php while ($row = mysqli_fetch_array($namhoc)):?>
                  <option value=<?php echo $row['NamHoc']?>><?php echo $row['NamHoc']?></option>
                <?php endwhile;?>
            </select>
            <div class="submit-btn">
              <button name="submit" type="submit">Tìm kiếm</button> 
            </div>
          </div>
          <table class="summary-tab">
            <thead>
              <tr>
                <th>STT</th>
                <th>Lớp</th>
                <th>Sĩ số</th>
                <th>Số lượng đạt</th>
                <th>Tỷ lệ</th>
              </tr>
            </thead>
            <tbody>
            <?php
                $i = 1;
                while ($row = mysqli_fetch_array($data)):
                ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['MaLop'];?></td>
                    <td><?php echo $row['SiSo'];?></td>
                    <td><?php echo $row['sldat'];?></td>
                    <td><?php echo $row['tiledat']; echo '%';?></td>
                  </tr>
                  <?php endwhile;?>
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </body>
</html>
