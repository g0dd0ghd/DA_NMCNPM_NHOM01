<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>QLHS</title>
    <link rel="icon" href="../assets/img/logo-hcmus-new.png" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/common.css" />
    <link rel="stylesheet" href="../css/account-list.css" />
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
            <a href="../home-page.html"><i class="fas fa-home"></i> Trang chủ</a>
          </li>
          <li>
            <a href="#"><i class="fas fa-book-open"></i> Lớp học</a>
            <ul class="subnav">
              <li><a href="../search-student.html">Tra cứu HS</a></li>
              <li><a href="../student-list.html">Xem DS lớp</a></li>
              <li><a href="../insert-student.html">Tiếp nhận HS</a></li>
              <li><a href="../score-sheet.html">Bảng điểm</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><i class="far fa-list-alt"></i> Báo cáo</a>
            <ul class="subnav">
              <li><a href="../subject-summary.html">Tổng kết môn</a></li>
              <li><a href="../semester-summary.html">Tổng kết HK</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><i class="fas fa-users"></i> Quản lý</a>
            <ul class="subnav">
              <li><a href="../accounts/admin.html">Admin</a></li>
              <li><a href="../accounts/teacher.html">Giáo viên</a></li>
              <li><a href="../accounts/student.html">Học sinh</a></li>
            </ul>
          </li>
        </ul>
        <!-- End Navigation -->
        <!-- Begin Avatar -->
        <div id="avatar">
          <i class="avatar-icon fas fa-user-alt"></i>
          <ul class="subnav">
            <li><a href="#">Thông tin</a></li>
            <li><a href="../login.html">Đăng xuất</a></li>
          </ul>
        </div>
        <!-- End Avatar -->
      </div>

      <div id="account-list">
        <p>Danh sách tài khoản học sinh</p>
        <div class="toolbar">
          <label for="search-input" class="item">Tìm tài khoản: </label>
          <input type="text" placeholder="Tên người dùng" class="item" id="search-input" />
          <a href="#" class="item" id="search-btn"><i class="fas fa-search"></i></a>
          <div class="button">
            <a href="#" class="item" id="add-btn"><i class="fas fa-plus"></i> Thêm</a>
            <a href="#" class="item" id="edit-btn"><i class="fas fa-edit"></i> Sửa</a>
            <a href="#" class="item" id="save-btn"><i class="fas fa-save"></i> Lưu</a>
          </div>
        </div>
        <table class="account-tab">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên tài khoản</th>
              <th>Mật khẩu</th>
              <th>Email</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td><input type="text" value="nguyenvana" /></td>
              <td><input type="text" value="hs12345" /></td>
              <td><input type="text" value="nguyenvana@gmail.com" /></td>
              <td>
                <a href="#"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td><input type="text" value="nguyenvanb" /></td>
              <td><input type="text" value="hs12345" /></td>
              <td><input type="text" value="nguyenvana@gmail.com" /></td>
              <td>
                <a href="#"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <script src="../js/app.js"></script>
    <script src="../js/account-list.js"></script>
  </body>
</html>