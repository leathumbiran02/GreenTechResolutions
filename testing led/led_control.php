<?php
// led_control.php

// Function to send commands to the Arduino through USB serial communication
function sendCommandToArduino($command)
{
    $serialPort = '/dev/ttyAMA0'; // Change this to the correct serial port of your Arduino
    $serial = fopen($serialPort, 'w');
    fwrite($serial, $command);
    fclose($serial);
}

// Check if the 'action' parameter is set in the AJAX request
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    // Define the commands to control the LED on the Arduino
    $ledOnCommand = 'ON';
    $ledOffCommand = 'OFF';

    // Send the appropriate command based on the action received
    if ($action === 'ON') {
        sendCommandToArduino($ledOnCommand);
    } elseif ($action === 'OFF') {
        sendCommandToArduino($ledOffCommand);
    }
}
