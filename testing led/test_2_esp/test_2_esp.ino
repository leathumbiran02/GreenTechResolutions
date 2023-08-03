#include <SoftwareSerial.h>

const int ESP_TX_PIN = 1; // Define the ESP32 TX pin
const int ESP_RX_PIN = 3; // Define the ESP32 RX pin
SoftwareSerial espSerial(ESP_RX_PIN, ESP_TX_PIN); // Create a SoftwareSerial object

void setup() {
  Serial.begin(9600); // Initialize the Serial communication for ESP32
  espSerial.begin(9600); // Initialize the SoftwareSerial for communication with Arduino Uno
}

void loop() {
  // Check for any incoming data from the ESP32 serial monitor
  if (Serial.available() > 0) {
    char command = Serial.read(); // Read the incoming character

    // Send the command to the Arduino Uno via UART serial
    espSerial.write(command);
  }

  // Add the rest of your existing code here...

  delay(500); // Wait for a short time to avoid rapid switching due to continuous input
}