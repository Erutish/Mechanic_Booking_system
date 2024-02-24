<?php
require_once '../connect.php';

if (isset($_POST['submit'])) {
    session_start();
    $user_id = $_SESSION['id'];
    $mechanic_id = $_POST['mechanic'];
    $car_id = $_POST['car'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Check if the mechanic has three or more appointments on the selected date
    $query1 = "SELECT * FROM appointments WHERE mechanic_id = $mechanic_id AND date = '$date'";
    $result1 = mysqli_query($conn, $query1);

    if (mysqli_num_rows($result1) >= 3) {
        $_SESSION['appointmentfailed'] = '1';
        header('Location: ../booking.php');
    } else {
        // Check if the user already has an appointment for the selected car on the same day
        $query2 = "SELECT * FROM appointments WHERE user_id = $user_id AND car_id = $car_id AND date = '$date'";
        $result2 = mysqli_query($conn, $query2);

        if (mysqli_num_rows($result2) > 0) {
            $_SESSION['appointmentfailed'] = '2';
            header('Location: ../booking.php');
        } else {
            // Check if the selected time is within a two-hour window of an existing appointment for the mechanic
            $startTime = date('H:i', strtotime("-1 hour", strtotime($time)));
            $endTime = date('H:i', strtotime("+1 hour", strtotime($time)));

            $query3 = "SELECT * FROM appointments WHERE mechanic_id = $mechanic_id AND date = '$date' AND time BETWEEN '$startTime' AND '$endTime'";
            $result3 = mysqli_query($conn, $query3);

            if (mysqli_num_rows($result3) > 0) {
                $_SESSION['appointmentfailed'] = '3';
                header('Location: ../booking.php');
            } else {
                $query4 = "INSERT INTO appointments (mechanic_id, car_id, user_id, date, time) VALUES ($mechanic_id, $car_id, $user_id, '$date', '$time')";
                $result4 = mysqli_query($conn, $query4);

                if ($result4) {
                    $_SESSION['appointmentadd'] = '1';
                    header('Location: ../user_index.php');
                } else {
                    $_SESSION['appointmentaddfailed'] = '1';
                    header('Location: ../booking.php');
                }
            }
        }
    }
}
?>
