<?php
require_once "./includes/database.php";

$query = "SELECT MaLop FROM lop ORDER BY MaLop DESC";
$statement = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($statement, $query)){
                
  header("Location: ./search-student.php?error");
  exit();
}
else{
  mysqli_stmt_execute($statement);
  $result = mysqli_stmt_get_result($statement);
}


if(isset($_POST["submit"]) && $_POST['stuclass'] != null){
  echo "reach";
  $class = $_POST["stuclass"];
  $name = $_POST["stuname"];
  

  $search_query = "SELECT * FROM tongket_hocky where MaLop=? AND HoTen LIKE ?";
  $statement1 = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($statement1, $search_query)){
    header("Location: ./search-student.php?error");
    exit();
  }
  else{
    $name = '%'.$name.'%';
    mysqli_stmt_bind_param($statement1,"ss",$class,$name);
    mysqli_stmt_execute($statement1);
    $result1 =mysqli_stmt_get_result($statement1);
  }


  
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
          <form method="post">
          <label for="class" class="item">Chọn lớp: </label>
          <select id="class" class="item" name="stuclass">
            <option value=""></option>
            <?php
              while($row = mysqli_fetch_array($result)){
                echo "<option value='".$row['MaLop']."'>".$row['MaLop']."</option>";
              }
            ?>
          </select>
          <tbody>
            
          </tbody>
          </table>'
          <input type="text" name="stuname" placeholder="Nhập tên học sinh cần tìm" class="item" id="search-input" />
          <button type="submit" name="submit" class="item" id="search-btn"><i class="fas fa-search"></i></button>
          </form>
        </div>
        <table class="student-tab">
          <thead>
            <tr>
              <th>STT</th>
              <th>Mã số HS</th>
              <th>Họ và Tên</th>
              <th>Lớp</th>
              <th>Điểm 15 phút</th>
              <th>Điểm 45 phút</th>
              <th>Điểm giữa kỳ</th>
              <th>Điểm cuối kỳ</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 1;
              while($row = mysqli_fetch_array($result1)):
                ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $row['MaHocSinh'];?></td>
                    <td><?php echo $row['HoTen'];?></td>
                    <td><?php echo $row['MaLop']?></td>
                    <td><?php echo $row['diem15'];?></td>
                    <td><?php echo $row['diem45'];?></td>
                    <td><?php echo $row['giuaky'];?></td>
                    <td><?php echo $row['cuoiky'];?></td>
                    <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
                  </tr>
                <?php endwhile;?>
          </tbody>
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


<?php

?>