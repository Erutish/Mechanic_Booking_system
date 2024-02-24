<?php
require_once '../connect.php';
    if(isset($_GET['id'])){
        session_start();
        $id = $_GET['id'];
        $query = "DELETE FROM users WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['profiledelete'] = '1';
            header("Location:../index.php");
        }
        else{
            $_SESSION['profiledeletefailed'] = '1';
            header("Location:customers.php");
        }
    }
?>