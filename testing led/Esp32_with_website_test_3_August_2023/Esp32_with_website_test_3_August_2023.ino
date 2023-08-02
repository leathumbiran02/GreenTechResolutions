#include <Arduino.h>
#include <WiFi.h>
#include <ESPAsyncWebServer.h>

//Ip address of esp32 on mobile wifi: 192.168.1.114 (check)
//Ip address of esp32 on home network: 192.168.3.7

const char* ssid = "YourWiFiNetwork";
const char* password = "YourWiFiPassword";

AsyncWebServer server(80);

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

  // Enable CORS - Same Origin Policy:
  //which is a security feature implemented by web browsers to prevent web pages 
  //from making requests to a different domain than the one that served the web page. 
  //This policy is enforced to protect users from certain types of cross-site request forgery 
  //(CSRF) and other security vulnerabilities.
  //To resolve the CORS (Cross-Origin Resource Sharing) issue, you need to enable CORS on your 
  //ESP32 web server. CORS allows the server to explicitly allow requests from different origins, 
  //such as your web page hosted on a different IP address.

  // Enable CORS - Allow requests from any origin and include "Content-Type" header
  /*With this modification, your ESP32 web server will allow cross-origin requests from any origin and 
  include the "Content-Type" header, which is necessary 
  for the AJAX request with application/x-www-form-urlencoded content type. After making this change, 
  restart your ESP32 and try the web page again. The "Cross-Origin Request Blocked" error should be resolved, 
  and you should be able to communicate with the ESP32 without any issues.*/
  DefaultHeaders::Instance().addHeader("Access-Control-Allow-Origin", "*");
  DefaultHeaders::Instance().addHeader("Access-Control-Allow-Headers", "Content-Type");

  // Setup web server route to handle incoming commands
  server.on("/sendCommand", HTTP_POST, [](AsyncWebServerRequest *request) {
    if (request->hasParam("command", true)) {
      String command = request->getParam("command", true)->value();
      sendCommandToArduino(command[0]);
      request->send(200, "text/plain", "OK");
    } else {
      request->send(400, "text/plain", "Missing 'command' parameter");
    }
  });

  // Start web server
  server.begin();
}

void loop() {
  // Your other loop code here (if any)
}

void sendCommandToArduino(char command) {
  espSerial.write(command);
  Serial.println("Command sent to Arduino");
}