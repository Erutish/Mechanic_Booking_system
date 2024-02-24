// function loginasadmin() {
//     document.getElementById("username").value = "Era";
//     document.getElementById("password").value = "erutish";
//     console.log("Logged in as admin")
// }
// function loginasuser() {
//     document.getElementById("username").value = "shv";
//     document.getElementById("password").value = "shv";
//     console.log("Logged in as user")
// }

function disableDaysAndTimes() {
    var selectedDate = new Date(document.getElementById('date').value);
    var day = selectedDate.getDay(); // 0 is Sunday, 1 is Monday, ..., 6 is Saturday

    // Disable Mondays and Fridays
    if (day === 1 || day === 5) {
        alert('Sorry, we are closed on Mondays and Fridays. Please choose another day.');
        document.getElementById('date').value = '';
    }

    // Disable times after 5 PM
    var currentTime = new Date();
    var selectedTime = document.getElementById('time').value;
    var selectedHour = parseInt(selectedTime.split(':')[0]);

    if (selectedHour >= 17) {
        alert('Sorry, we are closed after 5 PM. Please choose an earlier time.');
        document.getElementById('time').value = '';
    }
}

