<?php
    require_once '../connect.php';
    if(isset($_POST['signup'])){
        $username = strtolower($_POST['username']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            session_start();
            $_SESSION['usernametaken']="1";
            echo'username taken';
            header('location: ../signup.php');
        }
        else{
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                session_start();
                $_SESSION['emailtaken']="1";
                echo '<script>alert("email is taken!");</script>';
                header('location: ../signup.php');
            }
            else{
                    if($password == $confirm_password){
                        $password = md5($password);
                        $sql = "INSERT INTO users (username, password, email, role,phone,address) VALUES ('$username', '$password', '$email', '0','$phone','$address')";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            header('location: ../index.php');
                        }else{
                            session_start();
                            $_SESSION['signupfailed']="1";
                            header('location: ../signup.php');
                        }
                    }
                    else{
                        session_start();
                        $_SESSION['passwordunmatched']="1";
                        header('location: ../signup.php');
                    }              
                }
            }
    }
    else{
        session_start();
        $_SESSION['signupfailed']="1";
        header('location: ../signup.php');
    }
?>
