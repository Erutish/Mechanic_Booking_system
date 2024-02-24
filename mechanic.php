<?php
session_start();
include 'connect.php';



// Fetch the list of mechanics from the database
$query = "SELECT * FROM mechanics";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    echo "Error fetching mechanics: " . mysqli_error($conn);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Assignment 3</title>
</head>

<body>
    <div class="wrapper">
        <div class="navbar">
            <ul>
                <li><a href="index.php">Back</a></li>
                <!-- <li><a href="#convertor">Convertor</a>
                <li><a href="#calculator">Calculator</a></li>
                <li><a href="#magic_box">Magic_Box</a>
            </ul> -->
        </div>
        <h1><u>Mechanics List</u></h1>
        <table class="mechanics-table">
            <tr>
                <th>Mechanic ID</th>
                <th>Mechanic Name</th>
                <th>Mechanic Age</th>
                <th>Mechanic Phone</th>
            </tr>
            <?php
            // Display the list of mechanics in a table
            while ($mechanic = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . $mechanic['mechanic_id'] . '</td>
                        <td>' . $mechanic['mechanic_name'] . '</td>
                        <td>' . $mechanic['mechanic_age'] . '</td>
                        <td>' . $mechanic['mechanic_phone'] . '</td>
                      </tr>';
            }
            ?>
        </table>
    </div>
    <?php
    include 'footer.php';
    ?>
   
</body>

</html>

<?php

mysqli_close($conn);
?>