<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ifet";
// Connect to the database
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the submitted username and password
    $username = $_POST['uname'];
    $password = $_POST['upswd'];

    // Prepare and execute the query to check the credentials
    $query = "SELECT * FROM register WHERE uname1='$username' AND upswd2='$password'";
    $result = mysqli_query($conn, $query);

    // If the query returns a result, the login is successful
    if (mysqli_num_rows($result) > 0) {
        // Redirect the user to the home page
        header('Location: home.html');
    } else {
        // Display an error message if the login is unsuccessful
        echo "Invalid username or password.";
    }
}
?>
