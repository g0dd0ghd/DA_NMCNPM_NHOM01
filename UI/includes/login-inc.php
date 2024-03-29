<?php 
    session_start();
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        require_once "database.php";
        
        if(empty($username) || empty($password)){
            header("Location: ../login.html");
            exit();
        }
        else{
            
            $sql = "SELECT * FROM taikhoan WHERE MaActor = ?";
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
                    if($password !== $row['MatKhau']){
                        
                        header("Location: ../login.html?error=wrongUsernameorpassword");
                        exit();
                    }
                    else{
                        
                        $_SESSION['login'] = true;
                        $_SESSION['user_id'] = $row['MaActor'];
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

?>