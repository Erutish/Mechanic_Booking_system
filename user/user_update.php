<?php
    require_once '../connect.php';
    // User clicked submit in the form to update the data
    
    if(isset($_POST['update'])){
        session_start();
        
        $id = $_SESSION['id'];
        $username= $_POST['username'];
        $email= $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $query = "UPDATE users SET username='$username', email='$email', phone = '$phone', address = '$address' WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if($result){
            session_start();
            $_SESSION['profileupdate']="1";
            header("Location: customers.php");         
        }else{
            echo '<script>alert("Profile not updated!");</script>';
        }
}