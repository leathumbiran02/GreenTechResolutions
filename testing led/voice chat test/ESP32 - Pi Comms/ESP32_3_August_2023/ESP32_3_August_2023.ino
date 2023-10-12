#include <Arduino.h>
#include <WiFi.h>
#include <ESPAsyncWebServer.h>

#define espSerial Serial2 // Assuming you are using Serial2 for ESP32's TX and RX pins

// Ip address of esp32 on mobile wifi: 192.168.8.114 (check)
// Ip address of website: 127.0.0.1:80
// Ip address of raspberry pi on mobile wifi: 192.168.8.117:5000

const char* ssid = "HUAWEI_E5577_CB36"; /* Wifi name */
const char* password = "alaykalea1"; /* Wifi password */

AsyncWebServer server(80); /* WebServer port for Apache */
AsyncWebServer server2(5000); //Another server for the Pi:

void setup() {
  Serial.begin(9600);
  espSerial.begin(9600);
  delay(1000);

  // Connect to Wi-Fi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");

  // Print the IP address
  Serial.print("Connected to WiFi. IP Address: ");
  Serial.println(WiFi.localIP());

  // Enable CORS - Same Origin Policy
  DefaultHeaders::Instance().addHeader("Access-Control-Allow-Origin", "*");
  DefaultHeaders::Instance().addHeader("Access-Control-Allow-Headers", "Content-Type");

  // Route 1 - for most components - website
  server.on("/sendCommand", HTTP_POST, [](AsyncWebServerRequest *request) {
    if (request->hasParam("command", true)) {
      String command = request->getParam("command", true)->value();
      sendCommandToArduino(command[0], [&](String response) {
        // Forward the response to the client (website)
        request->send(200, "text/plain", response);
      });
    } else {
      request->send(400, "text/plain", "Missing 'command' parameter");
    }
  });

  // Route 1 - for most components - pi
  server2.on("/sendCommand", HTTP_POST, [](AsyncWebServerRequest *request) {
    if (request->hasParam("command", true)) {
      String command = request->getParam("command", true)->value();
      sendCommandToArduino(command[0], [&](String response) {
        // Forward the response to the client (website)
        request->send(200, "text/plain", response);
      });
    } else {
      request->send(400, "text/plain", "Missing 'command' parameter");
    }
  });

  // Route 2 - for water level - website
  server.on("/sendAndReceiveWaterLevelCommand", HTTP_POST, [](AsyncWebServerRequest *request) {
    if (request->hasParam("command", true)) {
      String command = request->getParam("command", true)->value();
      sendCommandToArduino(command[0], [&](String response) {
        // Forward the response (water level) to the client (website)
        request->send(200, "text/plain", response);
      });
    } else {
      request->send(400, "text/plain", "Missing 'command' parameter");
    }
  });

  // Route 3 - for system - website
  server.on("/sendAndReceiveCheckSystemCommand", HTTP_POST, [](AsyncWebServerRequest *request) {
    if (request->hasParam("command", true)) {
      String command = request->getParam("command", true)->value();
      sendCommandToArduino(command[0], [&](String response) {
        // Forward the response (check system) to the client (website)
        request->send(200, "text/plain", response);
      });
    } else {
      request->send(400, "text/plain", "Missing 'command' parameter");
    }
  });

  // Route 4 - for camera - website
  // Setup web server route to handle incoming and outgoing commands for camera

  // Route 5 - for temperature - website
  server.on("/sendAndReceiveTemperatureCommand", HTTP_POST, [](AsyncWebServerRequest *request) {
    if (request->hasParam("command", true)) {
      String command = request->getParam("command", true)->value();
      sendCommandToArduino(command[0], [&](String response) {
        // Forward the response (temperature) to the client (website)
        request->send(200, "text/plain", response);
      });
    } else {
      request->send(400, "text/plain", "Missing 'command' parameter");
    }
  });

  // Start web servers for website and pi:
  server.begin();
  server2.begin();
}

void loop() {
  // Your other loop code here (if any)
}

void sendCommandToArduino(char command, std::function<void(String)> callback) {
  espSerial.write(command); // Send command to Arduino:
  Serial.println("Command sent to Arduino");

  if(command=='7'){
    String responseFromArduino = "80"; // Define a string to store the response:
  
    callback(responseFromArduino);
  }
  else if(command=='g'){
    String responseFromArduino = "25"; // Define a string to store the response:
  
    callback(responseFromArduino);
  }

  String responseFromArduino = ""; // Define a string to store the response:
  
  while (espSerial.available()) {
    char c = espSerial.read();
    responseFromArduino += c;
  }

  // Call the callback function with the actual response from Arduino:
  callback(responseFromArduino);
}
