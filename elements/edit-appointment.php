<?php
    require_once '../connect.php';
    if(isset($_POST['update'])){
        session_start();
        $id = $_POST['appointment-id'];
        $mechanic_id = $_POST['mechanic'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $query = "UPDATE appointments SET mechanic_id = '$mechanic_id', date = '$date', time = '$time' WHERE id = '$id'";
        // console log the query
        echo '<script>console.log("'.$query.'")</script>';
        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['appointmentupdate'] = '1';
            header('Location: ../admin/appointments.php');
        }
        else{
            $_SESSION['appointmentupdatefailed'] = '1';
            header('Location: ../admin/appointments.php');
        }
    }
?>

