<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['notloggedin']="1";
        header("Location: /login.php");
    }
    else{
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['role'] != 1){
            $_SESSION['notadmin']="1";
            header("Location: /login.php");
        }
    }
?>