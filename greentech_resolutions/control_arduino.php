<?php
if (isset($_GET['cmd'])) { //If you get cmd, execute the following code:
  $cmd = $_GET['cmd']; //Store the command sent:
  $port = 'COM6'; //Port number for the arduino connected through the serial port:
  $serial = fopen($port, 'w'); //Open the serial port and supply the port number:
  fwrite($serial, $cmd); //Write to the arduino and supply the command sent:
  fclose($serial); //Close the serial port:
}
?>
