#include <Arduino.h>
#include <WiFi.h>
#include <ESPAsyncWebServer.h>

#define espSerial Serial2 // Assuming you are using Serial2 for ESP32's TX and RX pins

//Ip address of esp32 on mobile wifi: 192.168.1.114 (check)
//Ip address of esp32 on home network: 192.168.3.7

const char* ssid = "HUAWEI_E5577_CB36"; /* Wifi name */
const char* password = "alaykalea1"; /* Wifi password */

AsyncWebServer server(80); /* WebServer port for apache */

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

  // Enable CORS - Same Origin Policy:
  //which is a security feature implemented by web browsers to prevent web pages 
  //from making requests to a different domain than the one that served the web page. 
  //This policy is enforced to protect users from certain types of cross-site request forgery 
  //(CSRF) and other security vulnerabilities.
  //To resolve the CORS (Cross-Origin Resource Sharing) issue, you need to enable CORS on your 
  //ESP32 web server. CORS allows the server to explicitly allow requests from different origins, 
  //such as your web page hosted on a different IP address.

  /*In the code above, the DefaultHeaders::Instance().addHeader("Access-Control-Allow-Origin", "*"); 
  line enables CORS for all requests by adding the Access-Control-Allow-Origin header with the value *. 
  This allows any origin (any IP address) to make requests to your ESP32 web server.
  Note: Enabling CORS with * is suitable for testing and development purposes on a local network. For production systems, 
  it's recommended to restrict CORS to specific origins to improve security. You can replace * with the specific IP address 
  of your web page to limit access to only that particular origin.*/

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