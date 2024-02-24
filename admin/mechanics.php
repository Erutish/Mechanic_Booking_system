<!-- show the list of mechanics from database -->
<!-- Path: admin\mechanics.php -->
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
                <li><a href="index.php" >Home</a></li>
                <!-- <li><a href="#convertor">Convertor</a>
                <li><a href="#calculator">Calculator</a></li>
                <li><a href="#magic_box">Magic_Box</a>
            </ul> -->
        </div>
    </nav>
    <div class="wrapper">
        <!-- Get the list of Mechanics from database and then list it in a table -->
        <div class="mechanics-list">
            <div class="text-banner" id="mechanics-list">
                <?php
                    if(isset($_SESSION['mechanicadd'])){
                        echo '<h2>Successfully Added!</h2>';
                        unset($_SESSION['mechanicadd']);
                    }
                    if(isset($_SESSION['mechanicaddfailed'])){
                        echo '<h2>"Something went wrong!</h2>';
                        unset($_SESSION['mechanicaddfailed']);
                    }
                    if(isset($_SESSION['mechanicdelete'])){
                        echo '<h2>Successfully Deleted!</h2>';
                        unset($_SESSION['mechanicdelete']);
                    }
                    if(isset($_SESSION['mechanicdeletefailed'])){
                        echo '<h2>"Something went wrong!</h2>';
                        unset($_SESSION['mechanicdeletefailed']);
                    }
                ?>
            </div>
            <h1>Mechanics List</h1>
            <table class="mechanics-table">
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                <?php
                    $query = "SELECT * FROM mechanics";
                    $result = mysqli_query($conn, $query);
                    while($mechanic = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        echo '<td>'.$mechanic['mechanic_name'].'</td>';
                        echo '<td>'.$mechanic['mechanic_age'].'</td>';
                        echo '<td>'.$mechanic['mechanic_phone'].'</td>';
                        echo '<td>';
                        echo '<a href="delete-mechanics.php?id='.$mechanic['mechanic_id'].'">Delete</i></a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
        <!-- Add Mechanic -->
        <div class="add-mechanic">
            <div class="text-banner" id="mechanic-add">
                <?php
                    if(isset($_SESSION['mechanicadd'])){
                        echo '<h2>Successfully Added!</h2>';
                        unset($_SESSION['mechanicadd']);
                    }
                    if(isset($_SESSION['mechanicaddfailed'])){
                        echo '<h2>"Something went wrong!</h2>';
                        unset($_SESSION['mechanicaddfailed']);
                    }
                ?>
            </div>
            <h1>Add Mechanic</h1>
            <form action="add-mechanics.php" method="post">
                <label for="mechanic_name">Name</label>
                <input type="text" name="mechanic_name" id="mechanic_name" required>
                <label for="mechanic_age">Age</label>
                <input type="number" name="mechanic_age" id="mechanic_age" required>
                <label for="mechanic_phone">Phone</label>
                <input type="number" name="mechanic_phone" id="mechanic_phone" required>
                <input type="submit" name="add" value="Add">
            </form>
        </div>
    </div>
    <?php
        include '../footer.php';
    ?>
    <script src="../js/scripts.js"></script>
</body>
</html>
<?php
    mysqli_close($conn);
?>
