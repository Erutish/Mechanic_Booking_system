<?php
    require_once '../connect.php';
    if(isset($_POST['update'])){
        session_start();
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $role = $_POST['role'];
        $query = "UPDATE users SET username = '$username', email = '$email', phone = '$phone', address = '$address', role = '$role' WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if($result){
            session_start();
            $_SESSION['profileupdate']="1";
            header("Location: ../admin/customers.php");
        }else{
            session_start();
            $_SESSION['profileupdatefailed']="1";
            header("Location: ../admin/customers.php");
        }
    }
?>



