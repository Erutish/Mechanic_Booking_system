<?php
require_once '../connect.php';
    if(isset($_GET['id'])){
        session_start();
        $id = $_GET['id'];
        $query = "DELETE FROM mechanics WHERE mechanic_id = $id";
        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['mechanicdelete'] = '1';
            header('Location:mechanics.php');
        }
        else{
            $_SESSION['mechanicdeletefailed'] = '1';
            header('Location:mechanics.php');
        }
    }
?>