<?php
require_once '../connect.php';

// Check if the form is submitted
if (isset($_POST['update-car'])) {
    // Check if the session is not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Get user ID from the session
    $user_id = $_SESSION['id'];

    // Sanitize and get the values from the form
    $car_license = mysqli_real_escape_string($conn, $_POST['car_license']);
    $car_registration = mysqli_real_escape_string($conn, $_POST['car_registration']);
    $car_model = mysqli_real_escape_string($conn, $_POST['car_model']);

    // Use prepared statement to update the data
    $query = "UPDATE cars SET car_license=?, car_registration=?, car_model=? WHERE user_id=?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, 'sssi', $car_license, $car_registration, $car_model, $user_id);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        // Check if the update was successful
        if ($result) {
            $_SESSION['carupdate'] = "1";
            header("Location: customers.php");
        } else {
            $_SESSION['carupdateerror'] = "1";
            header("Location: customers.php");
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Error preparing statement!");</script>';
    }
}
?>
