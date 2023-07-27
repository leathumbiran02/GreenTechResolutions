// DS18B20 Library: https://github.com/milesburton/Arduino-Temperature-Control-Library
#include <OneWire.h>
#include <DallasTemperature.h>

// Data wire is plugged into pin 2 on the Arduino
#define ONE_WIRE_BUS 2

// Setup a oneWire instance to communicate with any OneWire devices (not just Maxim/Dallas temperature ICs)
OneWire oneWire(ONE_WIRE_BUS);

// Pass the oneWire reference to Dallas Temperature library
DallasTemperature sensors(&oneWire);

void setup() {
  pinMode(13, OUTPUT);
  Serial.begin(9600);
  sensors.begin();
}

void loop() {
  if (Serial.available() > 0) {
    char command = Serial.read();
    executeCommand(command);
  }
}

void executeCommand(char command) {
  switch (command) {
    case 'a': // 'a' corresponds to 'on' command
      sensors.begin();
      digitalWrite(13, HIGH); // Turn on the temperature sensor
      break;
    case 'b': // 'b' corresponds to 'off' command
      sensors.begin();
      digitalWrite(13, LOW); // Turn off the temperature sensor
      break;
    case 'c': // 'c' corresponds to 'read' command
      sensors.requestTemperatures();
      float temperature = sensors.getTempCByIndex(0);
      Serial.print(temperature); // Send the temperature value without a line break
      break;
    default:
      Serial.println("Invalid command");
      break;
  }
}
