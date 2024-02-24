<?php
require_once '../connect.php';
if (isset($_POST['login'])) {
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    // create a variable for user_id from $result
    $user = mysqli_fetch_assoc($result);
    $id = $user['id'];
    if (mysqli_num_rows($result) == 1) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id;
        
        header('location:index.php');
        
    } else {
        session_start();
        $_SESSION['incorrectpassword'] = "1";
        header('location: ../login.php');
    }
}
?>
