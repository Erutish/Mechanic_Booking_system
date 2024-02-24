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
    <!-- connect to dbconnection  -->
    <?php
    include '../connect.php';
    ?>
    <!-- create a grid with 3 parts to view list of mechanics, list of appointments and list of customers with icon -->
    <!-- header -->


    <nav class="wrapper">
        <div class="navbar">
            <ul>
                <li><a href="../logout.php">LogOut</a>
                    <!--<li><a href="#calculator">Calculator</a></li>
                <li><a href="#magic_box">Magic_Box</a>
            </ul> -->
        </div>
    </nav>
    <div class="main-title">

        <h1>Admin Portal</h1>

    </div>
    <div class="spacing"></div>
    <div class="functions">
        <div class="fun1">
            <a href="appointments.php">
                <div class="card 1">
                    <div class="card_icon">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <div class="card_title">
                        <p>Appointments</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="fun2">
            <a href="customers.php">
                <div class="card 2">
                    <div class="card_icon">
                        <i class="fa-solid fa-user-group"></i>
                    </div>
                    <div class="card_title">
                        <p>Customers</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="fun3">
            <a href="mechanics.php">
                <div class="card 3">
                    <div class="card_icon">
                        <i class="fa-solid fa-user-cog"></i>
                    </div>
                    <div class="card_title">
                        <p>Mechanics</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="spacing"></div>
        <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>
        <?php
        include '../footer.php';
        ?>
</body>

</html>