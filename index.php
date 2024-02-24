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
    <div class="spacing"></div>
    <div class="main-title">
        <h1> We Are Qualified AND Professional</h1>
    </div>
    <div class="spacing"></div>
    <div class="functions">
        <div class="fun1">
            <div class="card 1" style="width: 500px;height: 350px;">
                <div class="card_image">
                    <a href="signup.php"><img src="Image/pexels-henry-&-co-1406282.jpg" alt=""></a>
                </div>
                <div class="card_title">
                    <p>Create an account</p>
                </div>
            </div>
        </div>
        <div class="fun2">
            <div class="card 2" style="width: 500px;height: 350px;">
                <div class="card_image">
                    <a href="login.php"><img src="Image/christin-hume-Hcfwew744z4-unsplash.jpg" alt=""></a>
                </div>
                <div class="card_title">
                    <p>Book an appointment</p>
                </div>
            </div>
        </div>
        <div class="fun3">
            <div class="card 3" style="width: 500px;height: 350px;">
                <div class="card_image">
                    <a href="mechanic.php"><img src="Image/istockphoto-1465217090-1024x1024.jpg" alt=""></a>
                </div>
                <div class="card_title">
                    <p>look for mechanic</p>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>
    <?php
    include 'footer.php';
    ?>

</body>

</html>