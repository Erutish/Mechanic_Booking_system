<?php
    require_once '../connect.php';
    // User clicked submit in the form to update the data
    if(isset($_POST['add'])){
        session_start();
        $car_license = $_POST['car_license'];
        $car_registration = $_POST['car_registration'];
        $car_model = $_POST['car_model'];
        $user_id = $_SESSION['id'];
        $query = "INSERT INTO cars (car_license, car_registration, car_model, user_id) VALUES ('$car_license', '$car_registration', '$car_model', '$user_id')";
        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['caradd'] = '1';
            header('Location:../user_index.php');
        }
        else{
            $_SESSION['caraddfailed'] = '1';
            header('Location:cars.php');
}
    }
?>


