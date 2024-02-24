<?php
require_once '../connect.php';

if (isset($_GET['mechanic_id']) && isset($_GET['date'])) {
    $mechanic_id = $_GET['mechanic_id'];
    $date = $_GET['date'];

    $query = "SELECT COUNT(*) as appointments FROM appointments WHERE mechanic_id = $mechanic_id AND date = '$date'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    } else {
        echo json_encode(['appointments' => 0]);
    }
} else {
    echo json_encode(['appointments' => 0]);
}
?>
