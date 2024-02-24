<?php
    require_once '../connect.php';
    if(isset($_GET['id'])){
        session_start();
        $id = $_GET['id'];
        $query = "DELETE FROM appointments WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if($result){
            session_start();
            $_SESSION['appointmentdelete']="1";
            header("Location: ../admin/appointments.php");
        }else{
            session_start();
            $_SESSION['appointmentdeletefailed']="1";
            header("Location: ../admin/appointments.php");
        }
    }
?>