<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Assignment3</title>
</head>

<body>
    <?php
    // connection
    include 'connect.php';

    ?>
    <nav class="wrapper">
        <div class="navbar">
            <ul>
                <li><a href="logout.php" >LogOut</a></li>
                <!-- <li><a href="#convertor">Convertor</a>
                <li><a href="#calculator">Calculator</a></li>
                <li><a href="#magic_box">Magic_Box</a>
            </ul> -->
        </div>
    </nav>
    
    <div class="main-title">
        <h1> USER PROTAL</h1>
    </div>
    <div class="spacing"></div>
    <div class="functions">
        <div class="fun1">
            <div class="card 1" style="width: 500px;height: 350px;">
                <div class="card_image">
                    <a href="user/customers.php"><img src="Image/pexels-henry-&-co-1406282.jpg" alt=""></a>
                </div>
                <div class="card_title">
                    <p>See Your Profile</p>
                </div>
            </div>
        </div>
        <div class="fun2">
            <div class="card 2" style="width: 500px;height: 350px;">
                <div class="card_image">
                    <a href="booking.php"><img src="Image/christin-hume-Hcfwew744z4-unsplash.jpg" alt=""></a>
                </div>
                <div class="card_title">
                    <p>Book an appointment</p>
                </div>
            </div>
        </div>
        <div class="fun3">
            <div class="card 3" style="width: 500px;height: 350px;">
                <div class="card_image">
                    <a href="user/cars.php"><img src="Image/istockphoto-1465217090-1024x1024.jpg" alt=""></a>
                </div>
                <div class="card_title">
                    <p>Add Your car</p>
                </div>
            </div>
        </div>
    </div>
    <script src=script.js></script>
    <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>
    <?php
    include 'footer.php';
    ?>

</body>

</html>