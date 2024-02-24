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

    <!-- update profile info -->
    <!-- get user info from database -->
    <nav class="wrapper">
        <div class="navbar">
            <ul>
                <li><a href="../user_index.php" >Home</a></li>
                <!-- <li><a href="#convertor">Convertor</a>
                <li><a href="#calculator">Calculator</a></li>
                <li><a href="#magic_box">Magic_Box</a>-->
            </ul> 
        </div>
    </nav>

    <?php
        $id = $_SESSION['id'];
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        $query1= "SELECT * FROM cars WHERE user_id = $id";
        $result1 = mysqli_query($conn, $query1);
        $car = mysqli_fetch_assoc($result1);
    ?>
    <div class="wrapper">
        <div class="update-profile">
            <div class="text-banner" id="update-profile">
                <?php
                    if(isset($_SESSION['profileupdate'])){
                        echo '<h2>Successfully Updated!</h2>';
                        unset($_SESSION['profileupdate']);
                    }
                ?>
            </div>
            <h1>Update Profile</h1>
            <form action="user_update.php" method="post">
                <div class="update-profile-info">
                    <label for="name">Username</label>
                    <input type="text" name="username" value="<?php echo $user['username'] ?>" >
                    <label for="email">Email</label>
                    <input type="text" name="email" value="<?php echo $user['email'] ?>" readonly>
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="<?php echo $user['phone'] ?>">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="<?php echo $user['address'] ?>">
                </div>
                <div class="update-profile-submit">
                    <input type="submit" value="Update" name="update" class="button">
                </div>
            </form>
        </div>


        <div class="update-Car">
            <div class="text-banner" id="update-profile">
                <?php
                    if(isset($_SESSION['carupdate'])){
                        echo '<h2>Successfully Updated!</h2>';
                        unset($_SESSION['carupdate']);
                    }
                    if(isset($_SESSION['carupdateerror'])){
                        echo '<h2>car not updated!</h2>';
                        unset($_SESSION['carupdateerror']);
                    }
                   
                ?>
            </div>
                    
            
            <h1>Update Car</h1>
            <form action="car_update.php" method="post">
                <div class="update-car-info">
                    <label for="car_license">car_license</label>
                    <input type="text" name="car_license" value="<?php echo $car['car_license'] ?>" >
                    <label for="car_registration">car_registration</label>
                    <input type="text" name="car_registration" value="<?php echo $car['car_registration'] ?>" >
                    <label for="car_model">car_model</label>
                    <input type="text" name="car_model" value="<?php echo $car['car_model'] ?>">
                
                </div>
                <div class="update-car-submit">
                    <input type="submit" value="Update" name="update-car" class="button">
                </div>
            </form>
        </div>
        <div class="change-password">
            <div class="text-banner" id="change-password">
                <?php
                    if(isset($_SESSION['passwordupdate'])){
                        echo '<h2>Successfully Updated!</h2>';
                        unset($_SESSION['passwordupdate']);
                    }
                    if(isset($_SESSION['passwordupdateerror'])){
                        echo '<h2>Password not updated!</h2>';
                        unset($_SESSION['passwordupdateerror']);
                    }
                    if(isset($_SESSION['passwordunmatched'])){
                        echo '<h2>New password and confirm password do not match!</h2>';
                        unset($_SESSION['passwordunmatched']);
                    }
                    if(isset($_SESSION['wrongpassword'])){
                        echo '<h2>Old password is incorrect!</h2>';
                        unset($_SESSION['wrongpassword']);
                    }
                ?>
            </div>
            <h1>Change Password</h1>
            <form action="change_password.php" method="post">
                <div class="change-password-info">
                    <label for="old-password">Old Password</label>
                    <input type="password" name="old-password" id="old-password">
                    <label for="new-password">New Password</label>
                    <input type="password" name="new-password" id="new-password">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm-password" id="confirm-password">
                </div>
                <div class="change-password-submit">
                    <input type="submit" value="Update" name="change-password" class="button">
                </div>
            </form>
        </div>
    </div>
    <?php
        include '../footer.php';
    ?>
    <div class="spacing"></div>
    <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>  
    </body>
</html>