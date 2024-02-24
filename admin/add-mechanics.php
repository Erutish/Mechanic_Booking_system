<?php
    require_once '../connect.php';
    if(isset($_POST['add'])){
        session_start();
        $mechanic_name = $_POST['mechanic_name'];
        $mechanic_age = $_POST['mechanic_age'];
        $mechanic_phone = $_POST['mechanic_phone'];
        $query = "INSERT INTO mechanics (mechanic_name, mechanic_age, mechanic_phone) VALUES ('$mechanic_name', '$mechanic_age', '$mechanic_phone')";
        
        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['mechanicadd'] = '1';
            header('Location: mechanics.php');
        }
        else{
            $_SESSION['mechanicaddfailed'] = '1';
            header('Location:mechanics.php');
        }
    }
?>