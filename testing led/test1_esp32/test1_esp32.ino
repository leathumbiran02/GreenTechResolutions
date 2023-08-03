#include <WiFi.h>

const char* ssid = "HUAWEI-0011EJ";
const char* password = "Mrjaypc01#";
const IPAddress serverIP(192, 168, 3, 7); // Replace with the IP address of your Arduino

void setup() {
  Serial.begin(9600);
  delay(100);
  Serial.println("Connecting to WiFi...");
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("\nWiFi connected.");
}

void loop() {
  // Check if there's data available in the Serial Monitor
  if (Serial.available() > 0) {
    char command = Serial.read();
    Serial.println("Sending command to Arduino: " + String(command));
    sendCommandToArduino(command);
  }

  // Check if there's data available from the Arduino Uno
  if (Serial2.available() > 0) {
    char data = Serial2.read();
    // Process the received data from the Arduino Uno as needed
    // For example, you can display it on the Serial Monitor or take actions based on the received data
  }

  // Your main code goes here

  // Example: Sending data to the Arduino Uno
  // Replace this with the actual data you want to send to the Arduino Uno
  // If you want to send a command to the Arduino Uno, it's already handled in the section above
  // If you want to send additional data, you can use the following:
  // sendToArduino("Your data here");
}

void sendCommandToArduino(char command) {
  WiFiClient client;
  if (client.connect(serverIP, 9600)) {
    client.print(command);
    client.stop();
  } else {
    Serial.println("Failed to connect to Arduino.");
  }
}

void sendToArduino(const String& data) {
  WiFiClient client;
  if (client.connect(serverIP, 9600)) {
    client.print(data);
    client.stop();
  } else {
    Serial.println("Failed to connect to Arduino.");
  }
}
