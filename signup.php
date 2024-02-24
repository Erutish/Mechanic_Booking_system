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
    <?php
        include 'connect.php';
    ?>
    <nav class="wrapper">
        <div class="navbar">
            <ul>
                <li><a href="index.php" >Back</a></li>
                <!-- <li><a href="#convertor">Convertor</a>
                <li><a href="#calculator">Calculator</a></li>
                <li><a href="#magic_box">Magic_Box</a>-->
            </ul> 
        </div>
    </nav>
   
    <div class="text-banner" id="update-profile">
                <?php
                    if(isset($_SESSION['passwordunmatched'])){
                        echo '<h2>Password does not match!</h2>';
                        unset($_SESSION['passwordunmatched']);
                    }
                    if(isset($_SESSION['signupfailed'])){
                        echo '<h2>Signup Failed!</h2>';
                        unset($_SESSION['signupfailed']);
                    }
                    if(isset($_SESSION['emailtaken'])){
                        echo '<h2>The Email Address is already registered! Please try signing in!</h2>';
                        unset($_SESSION['emailtaken']);
                    }
                    if(isset($_SESSION['usernametaken'])){
                        echo '<h2>The username is already registered! Please try signing in or try another username!</h2>';
                        unset($_SESSION['usernametaken']);
                    }
                ?>
    </div>
    <div class="login-form-container">
    <form action="elements/user_signup.php" method="post">
            <div class="login-form-header">
                    <h1>Signup</h1>
            </div>
        <div class="login-form-body">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirm-password" id="confirm-password" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone_Number</label>
                <input type="tel" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>
            <div class="signup-form-submit">
                <input type="submit" name="signup" value="Signup">
            </div>
        </div>
    </form>
    </div>
    
    <script src="script.js"></script> 
    <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>  
    <?php
    include 'footer.php';
    ?>
    </body>
</html>