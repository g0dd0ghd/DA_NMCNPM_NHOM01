<?php 

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        require_once "database.php";
        
        if(empty($username) || empty($password)){
            header("Location: ../login.html");
            exit();
        }
        else{
            
            $sql = "SELECT * FROM taikhoan WHERE MaNguoiDung = ?";
            $statement = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($statement, $sql)){
                
                header("Location: ../login.html?error");
                exit();
            }
            else{
                
                mysqli_stmt_bind_param($statement, "s", $username);
                mysqli_stmt_execute($statement);
                
                $result = mysqli_stmt_get_result($statement);
                
                if($row = mysqli_fetch_assoc($result)){
                    if($password !== $row['MaKhau']){
                        
                        header("Location: ../login.html?error=wrongusernameorpassword");
                        exit();
                    }
                    else{
                        session_start();
                        #$_SESSION['sessionId'] = $result['id'];
                        $_SESSION['sessionUser'] = $row['MaNguoiDung'];
                        header("Location: ../home-page.html");
                        exit();
                    }
                }
                else{
                    header("Location: ../login.html?error=nouser");
                }
            }
        }
    }
    else {
        header("Location: ../login.html?error=accessforbidden");
        exit();
    }

?>