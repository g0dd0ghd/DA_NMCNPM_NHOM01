<?php

session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
  echo "Reach";
  // Redirect the user to the login page
  header('Location: ./login.html');
  exit();
}

include_once('./includes/database.php');
if(isset($_SESSION['user_id']) && (substr($_SESSION['user_id'], 0,2)==='AD' or substr($_SESSION['user_id'], 0,2)==='GV')){
    if (isset($_POST['submit'])){
        $hs = $_POST['MaHS'];
        $hk = $_POST['HocKy'];
        $nh = $_POST['NamHoc'];
        $m = $_POST['MaMH'];
        $diem15 = $_POST['diem15'];
        $diem45 = $_POST['diem45'];
        $giuaky = $_POST['giuaky'];
        $cuoiky = $_POST['cuoiky'];
    
        if ($diem15 >= 0 && $diem15 <= 10){
    
            $sql1 = "replace into `ketqua` values ('${hs}', '${m}', 1, ${diem15}, ${hk}, ${nh})";
            mysqli_query($conn, $sql1);
        }
    
        if ($diem45 >= 0 && $diem45 <= 10){
    
            $sql2 = "replace into `ketqua` values ('${hs}', '${m}', 2, ${diem45}, ${hk}, ${nh})";
            mysqli_query($conn, $sql2);
        }
    
        if ($giuaky >= 0 && $giuaky <= 10){
    
            $sql3 = "replace into `ketqua` values ('${hs}', '${m}', 3, ${giuaky}, ${hk}, ${nh})";
            mysqli_query($conn, $sql3);
        }
        
        if ($cuoiky >= 0 && $cuoiky <= 10){
    
            $sql4 = "replace into `ketqua` values ('${hs}', '${m}', 4, ${cuoiky}, ${hk}, ${nh})";
            mysqli_query($conn, $sql4);
        }
    
        header('location:score-sheet.php');
    }
    
    $MaHS = $_GET['MaHS'];
    $MaMH = $_GET['MaMH'];
    $HocKy = $_GET['HocKy'];
    $NamHoc = $_GET['NamHoc'];
    $diem15 = $_GET['diem15'];
    $diem45 = $_GET['diem45'];
    $giuaky = $_GET['giuaky'];
    $cuoiky = $_GET['cuoiky'];
}
else{
    echo "<script>alert('You cannot access this site.');</script>";
    echo "<script>window.location = 'javascript:history.go(-1);';</script>";
    exit;
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
                <label >Mã học sinh</label>
                <input type="text" class="form-control" name="MaHS" autocomplete="off" value=<?php echo $MaHS?> readonly>
            </div>
            <div class="form-group">
                <label >Môn học</label>
                <input type="text" class="form-control" name="MaMH" autocomplete="off" value=<?php echo $MaMH?> readonly>
            </div>
            <div class="form-group">
                <label >Học kỳ</label>
                <input type="text" class="form-control" name="HocKy" autocomplete="off" value=<?php echo $HocKy?> readonly>
            </div>
            <div class="form-group">
                <label >Năm học</label>
                <input type="text" class="form-control" name="NamHoc" autocomplete="off" value=<?php echo $NamHoc?> readonly>
            </div>
            <div class="form-group">
                <label >Điểm 15 phút</label>
                <input type="text" class="form-control" name="diem15" autocomplete="off" value=<?php echo $diem15?>>
            </div>
            <div class="form-group">
                <label >Điểm 45 phút</label>
                <input type="text" class="form-control" name="diem45" autocomplete="off" value=<?php echo $diem45?>>
            </div>  
            <div class="form-group">
                <label >Điểm giữa kỳ</label>
                <input type="text" class="form-control" name="giuaky" autocomplete="off" value=<?php echo $giuaky?>>
            </div>
            <div class="form-group">
                <label >Điểm cuối kỳ</label>
                <input type="text" class="form-control" name="cuoiky" autocomplete="off" value=<?php echo $cuoiky?>>
            </div>  
            <button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
        </form>
    </div>
  </body>
</html>