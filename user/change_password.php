<?php
    session_start();
    require_once '../connect.php';
    if(isset($_POST['change-password'])){
        $old_password = $_POST['old-password'];
        $old_password = md5($old_password);
        $new_password = $_POST['new-password'];
        $new_password = md5($new_password);
        $confirm_password = $_POST['confirm-password'];
        $confirm_password = md5($confirm_password);
        $id = $_SESSION['id'];
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);
        if($old_password == $user['password']){
            if($new_password == $confirm_password){
                $query = "UPDATE users SET password = '$new_password' WHERE id = $id";
                $result = mysqli_query($conn, $query);
                if($result){
                    session_start();
                    $_SESSION['passwordupdate']="1";
                    header("Location: ../user/user_update.php");      
                }else{
                    session_start();
                    $_SESSION['passwordupdateerror']="1";
                    header("Location:update.php");      
                }
            }else{
                session_start();
                $_SESSION['passwordunmatched']="1";
                header("Location:update.php");      
            }
        }else{
            session_start();
            $_SESSION['wrongpassword']="1";
            header("Location:update.php");      
        }
}