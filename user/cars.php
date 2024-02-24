<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title> Assignment 3</title>
</head>

<body>
    <?php
    include '../connect.php';
    ?>

    <?php
    $id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    ?>
    <nav class="wrapper">
        <div class="navbar">
            <ul>
                <li><a href="../user_index.php">Home</a></li>
                <!-- <li><a href="#convertor">Convertor</a>
                <li><a href="#calculator">Calculator</a></li>
                <li><a href="#magic_box">Magic_Box</a>
            </ul> -->
        </div>
    </nav>
    <div class="wrapper">
        <div class="add-car">
            <div class="text-banner" id="add-car">
                <?php
                if (isset($_SESSION['caradd'])) {
                    echo '<h2>Successfully Added!</h2>';
                    unset($_SESSION['caradd']);
                }
                if (isset($_SESSION['caraddfailed'])) {
                    echo '<h2>"Something went wrong!</h2>';
                    unset($_SESSION['caraddfailed']);
                }
                if (isset($_SESSION['cardelete'])) {
                    echo '<h2>Successfully Deleted!</h2>';
                    unset($_SESSION['cardelete']);
                }
                if (isset($_SESSION['cardeletefailed'])) {
                    echo '<h2>"Something went wrong!</h2>';
                    unset($_SESSION['cardeletefailed']);
                }
                ?>
            </div>
            <div class="main-title" style="color:#9290C3";>
                <h1>Add Car</h1>
            </div>
            <form action="cars-add.php" method="post">
                <div class="add-car-info">
                    <label for="car_license">Car License Number</label>
                    <input type="text" name="car_license" value="">
                    <label for="car_registration">Car Registration Number</label>
                    <input type="number" name="car_registration" value="">
                    <label for="car_model">Car Model</label>
                    <input type="text" name="car_model" value="">
                </div>
                <div class="add-car-submit">
                    <input type="submit" value="Add" name="add" class="button">
                </div>
            </form>
            <!-- Display the list of cars added already from Database -->
            <div class="car-list" style='background-color:#9290C3;'>
                <h2>Cars Added</h2>
                <?php
                $query = "SELECT * FROM cars WHERE user_id = $id";
                $result = mysqli_query($conn, $query);
                while ($car = mysqli_fetch_assoc($result)) {
                    echo '<div class="car-item">
                                <div class="car-info">
                                <div class="car-delete">
                                <a href="cars-delete.php?id=' . $car['id'] . '">
                                <i class="fas fa-times"></i>
                                </a>
                            </div>
                                    <p>Car License Number: ' . $car['car_license'] . '</p>
                                    <p>Car Registration Number: ' . $car['car_registration'] . '</p>
                                    <p>Car Model: ' . $car['car_model'] . '</p>
                                    
                                </div>
                            </div>';
                }
                ?>
            </div>
            <?php
            include '../footer.php';
            ?>
            <div class="spacing"></div>
            <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>
</body>

</html>