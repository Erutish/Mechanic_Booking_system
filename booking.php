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
                <li><a href="user_index.php">Home</a></li>
            </ul>
        </div>
    </nav>
    <div class="mechanic-title">
        <h1><u>Do Your Booking Now!</u></h1>
    </div>
    <div class="text-banner" id="add-appointment">
        <?php
        if (isset($_SESSION['appointmentadd'])) {
            echo '<h3>Appointment added successfully!</h3>';
            unset($_SESSION['appointmentadd']);
        }
        if (isset($_SESSION['appointmentaddfailed'])) {
            echo '<h3>"Something went wrong!</h3>';
            unset($_SESSION['appointmentaddfailed']);
        }
        if (isset($_SESSION['appointmentfailed'])) {
            echo '<h3>The mechanic you selected is not available. Please select another day.</h3>';
            unset($_SESSION['appointmentfailed']);
        }
        ?>
    </div>
    <div class="section_container">
        <div class="appointment-form-container">
            <form action="elements/add-appointment.php" method="POST">
                <div class="appointment-row">
                    <div class="appointment-form-group">
                        <label for="mechanic">Mechanic</label>
                        <select id="mechanic" name="mechanic" class="form-control" onchange="checkMechanicAvailability()">
                            <?php
                            $query = "SELECT * FROM mechanics";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['mechanic_id'] . '">' . $row['mechanic_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="appointment-form-group">
                        <label for="car">Car</label>
                        <select id="car" name="car" class="form-control">
                            <?php
                            session_start();
                            $query = "SELECT * FROM cars WHERE user_id = " . $_SESSION['id'];
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) == 0) {
                                echo '<option value="0">You haven\'t added a car yet. </option>';
                            } else {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['car_model'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="appointment-form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" oninput="disableDaysAndTimes()">
                    </div>
                    <div class="appointment-form-group">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" name="time" min="10:00" max="17:00">
                    </div>
                </div>
                <button type="submit" name="submit" class="button">Submit</button>
            </form>
        </div>
    </div>

    <div class="spacing"></div>
    <script src="https://kit.fontawesome.com/692c2638c1.js" crossorigin="anonymous"></script>
    <?php
    include 'footer.php';
    ?>

    <script>
        function disableDaysAndTimes() {
            var selectedDate = new Date(document.getElementById('date').value);
            var day = selectedDate.getDay();

            if (day === 1 || day === 5) {
                alert('Sorry, we are closed on Mondays and Fridays. Please choose another day.');
                document.getElementById('date').value = '';
            }

            var currentTime = new Date();
            var selectedTime = document.getElementById('time').value;
            var selectedHour = parseInt(selectedTime.split(':')[0]);

            if (selectedHour >= 17) {
                alert('Sorry, we are closed after 5 PM. Please choose an earlier time.');
                document.getElementById('time').value = '';
            }
        }

        function checkMechanicAvailability() {
            var selectedMechanicId = document.getElementById('mechanic').value;
            var selectedDate = new Date(document.getElementById('date').value);

            var checkMechanicUrl = 'elements/check-mechanic-availability.php?mechanic_id=' + selectedMechanicId + '&date=' + selectedDate.toISOString().split('T')[0];

            fetch(checkMechanicUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.appointments >= 3) {
                        alert('This mechanic is fully booked on the selected date. Please choose another mechanic.');
                        document.getElementById('mechanic').value = '';
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>


</body>

</html>