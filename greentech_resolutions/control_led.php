<?php
//Starting the session so we can check if the user is logged in:
session_start();

// Checking if the email address is stored in the session:
if (!isset($_SESSION['email'])) {
    echo "<script>alert('You must be logged in to view this page.')</script>";
    header('Refresh: 1; url=login_register.php');
    exit();
}

// Change 'COM3' to the appropriate serial port of your Arduino.
$serialPort = 'COM3';
$command = 'toggle'; // This command will be sent to the Arduino.

// Open the serial port
$fp = fopen($serialPort, 'w');

// Send the command to the Arduino
fwrite($fp, $command);

// Close the serial port
fclose($fp);

// Return the current state of the LED to JavaScript
// In this example, we simulate the state change by alternating between 0 and 1.
// Replace this with the actual state of the LED read from Arduino if you have feedback.
echo rand(0, 1);
?>
