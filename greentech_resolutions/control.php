<?php
if (isset($_GET['cmd'])) {
  $cmd = $_GET['cmd'];
  $port = 'COM3'; // Change this to the correct serial port of your Arduino
  $serial = fopen($port, 'w');
  fwrite($serial, $cmd);
  fclose($serial);
}
?>
