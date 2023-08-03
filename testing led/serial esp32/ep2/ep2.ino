#include <Arduino.h>

#define espSerial Serial2 // Assuming you are using Serial2 for ESP32's TX and RX pins

void setup() {
  Serial.begin(9600); // Serial for debugging
  espSerial.begin(9600); // Serial for communication with the Arduino Uno
  delay(1000); // Wait for serial to initialize
}

void loop() {
  // Check if there's data available in the serial buffer
  if (Serial.available() > 0) {
    char command = Serial.read(); // Read the incoming character from serial
    sendCommandToArduino(command);
  }

  // Your other loop code here (if any)
}

void sendCommandToArduino(char command) {
  espSerial.write(command);
  Serial.println("Command sent to Arduino");
}
