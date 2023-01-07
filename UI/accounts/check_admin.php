<?php
    session_start();
    if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
      echo "Reach";
      // Redirect the user to the login page
      header('Location: ./login.html');
      exit();
    }

    
    if(isset($_SESSION['user_id']) && substr($_SESSION['user_id'], 0,2)==='AD'){
        $check = true;
    }
    else{
        $check = false;
        echo "<script>alert('You cannot access this site.');</script>";
        echo "<script>window.location = 'javascript:history.go(-1);';</script>";
        exit;
    }
?>