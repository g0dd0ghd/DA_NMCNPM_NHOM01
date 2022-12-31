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
      <div id="summary">
        <p>Bảng điểm tổng kết môn học</p>
        <div class="toolbar">
          <label for="class" class="item">Lớp: </label>
          <select id="class" class="item">
            <option value=""></option>
            <option value="10A1">10A1</option>
            <option value="10A2">10A2</option>
            <option value="10A3">10A3</option>
          </select>
          <label for="subject" class="item">Môn học: </label>
          <select id="subject" class="item">
            <option value="null"></option>
            <option value="Math">Toán</option>
            <option value="English">Anh Văn</option>
            <option value="Literature">Ngữ Văn</option>
          </select>
          <label for="semester" class="item">Học kỳ: </label>
          <select id="semester" class="item">
            <option value="null"></option>
            <option value="HKI">HKI</option>
            <option value="HKII">HKII</option>
          </select>
          <label for="year" class="item">Niên khóa: </label>
          <select id="year" class="item">
            <option value="null"></option>
            <option value="2019-2020">2019-2020</option>
            <option value="2020-2021">2020-2021</option>
            <option value="2021-2022">2021-2022</option>
          </select>
        </div>
        <table class="summary-tab">
          <thead>
            <tr>
              <th>STT</th>
              <th>Lớp</th>
              <th>Môn</th>
              <th>Sĩ số</th>
              <th>Số lượng đạt</th>
              <th>Tỉ lệ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>10A1</td>
              <td>Toán</td>
              <td>40</td>
              <td>30</td>
              <td>75%</td>
            </tr>
            <tr>
              <td>1</td>
              <td>10A2</td>
              <td>Toán</td>
              <td>40</td>
              <td>35</td>
              <td>87.5%</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
