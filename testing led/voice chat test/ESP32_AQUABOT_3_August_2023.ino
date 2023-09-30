#include <Servo.h>
#include <NewPing.h>

const int waterPump = 5;             // Relay Pin = 5
const int soilMoistureSensor = A2;   // Soil Moisture Sensor Pin = A2
const int servoPin = 7;
const int startPos = 0;
const int endPos = 70;
const int ledPin = A0;

const int TRIGGER_PIN = 2;
const int ECHO_PIN = 3;
const int MAX_DISTANCE = 200; // Maximum distance we want to sense (in centimeters)
const int HARVEST_DISTANCE_MIN = 4; // Minimum distance (in centimeters) for the plant to be ready for harvest
const int HARVEST_DISTANCE_MAX = 10; // Maximum distance (in centimeters) for the plant to be ready for harvest

Servo myServo;
NewPing sonar(TRIGGER_PIN, ECHO_PIN, MAX_DISTANCE);

Servo base;
Servo shoulder;
Servo elbow;
Servo wrist1;  // Wrist 1 servo declaration
Servo wrist2;  // Wrist 2 servo declaration
Servo hand;

const int HOME_POSITION[] = {90, 180, 100, 180, 0, 180}; // Adjusted base angle to 40
const int PICKUP_POSITION[] = {116, 154, 150, 180, 0, 180}; // Hand at 180 degrees to close
const int DROP_POSITIONS[][6] = {
  {99, 140, 145, 180, 0, 180},
  {85, 140, 145, 180, 0, 180},
  {71, 140, 145, 180, 0, 180}
};
const int NUM_DROP_POSITIONS = sizeof(DROP_POSITIONS) / sizeof(DROP_POSITIONS[0]);

void setup() {
  Serial.begin(9600);
  pinMode(waterPump, OUTPUT);
  digitalWrite(waterPump, HIGH); // Ensure the water pump is initially turned off
  pinMode(ledPin, OUTPUT);
  digitalWrite(ledPin, LOW);
  myServo.attach(servoPin);
  myServo.write(startPos);

  initializeServos();
  initializeArm(); // Slow initialization before entering the main loop
}

void loop() {
  // Check if there's data available in the serial buffer
  if (Serial.available() > 0) {
    char command = Serial.read(); // Read the incoming character from serial
    
    if (command == '5') {
      digitalWrite(waterPump, HIGH); // Turn on the water pump
      Serial.println("Pump turned off.");     
    } else if (command == '6') {
      digitalWrite(waterPump, LOW); // Turn off the water pump
      Serial.println("Pump turned on.");
   
      
    } else if (command == '7') {
      //Read and display soil moisture percentage:
      int sensorValue = analogRead(soilMoistureSensor); //Read the analog value from the soil moisture sensor
      int percentage = map(sensorValue, 0, 1023, 0, 100); //Map the sensor value to a percentage (0-100)
      
      //Send the water level as a response to the ESP32:
      Serial.println(percentage);

      /* Serial.print("Soil moisture: ");
      Serial.print(percentage);
      Serial.println("%"); */

      // Display pump status
      Serial.print("Pump Status: ");
      if (digitalRead(waterPump) == LOW) {
        Serial.println("ON");
      } else {
        Serial.println("OFF");
      }
    } else if (command == '8') {
      myServo.write(endPos); // Move the servo to 70 degrees
      delay(2000); // Wait for 2 seconds
      myServo.write(startPos); // Move the servo back to 0 degrees
    } else if (command == '0') {
      measureAndDisplayDistance();
    } else if (command == 'a') {
      digitalWrite(ledPin, HIGH);
      Serial.println("LED ON");
    } else if (command == 'b') {
      digitalWrite(ledPin, LOW);
      Serial.println("LED OFF");
    }
    else {
      executeAction(command);
    }

    // Wait for a short time to avoid rapid switching due to continuous input
    delay(500);

  }
}

void initializeServos() {
  base.attach(8);
  shoulder.attach(9);
  elbow.attach(10);
  wrist1.attach(12);  // Corrected assignment: wrist1 should be connected to pin 6
  wrist2.attach(11);  // Corrected assignment: wrist2 should be connected to pin 5
  hand.attach(13);

  // Slow initialization
  moveServosSlowly(HOME_POSITION);
}

void initializeArm() {
  moveServosSlowly(HOME_POSITION);
}

void executeAction(int action) {
  if (action >= '1' && action <= '4') {
    int dropIndex = action - '1';
    moveServos(PICKUP_POSITION);
    delay(100); // Delay after reaching PICKUP_POSITION (0.1 seconds)

    // Close the hand
    hand.write(0); // The hand servo may be inverted, so 0 represents the fully closed position
    delay(500); // Wait for 5 seconds to simulate holding the object

    // Move to the drop position
    moveServos(DROP_POSITIONS[dropIndex]);
    delay(500); // Wait for 5 seconds after reaching the drop position

    // Open the hand (return to pickup position)
    hand.write(180); // The hand servo may be inverted, so 180 represents the fully open position
    delay(100); // Delay after reaching PICKUP_POSITION (0.1 seconds)

    moveServosSlowly(HOME_POSITION); // Return to the home position
  } else {
    Serial.println("Invalid input");
  }
}

void moveServos(const int angles[]) {
  int currentAngles[] = {base.read(), shoulder.read(), elbow.read(), wrist1.read(), wrist2.read(), hand.read()};
  const int speedDelay = 20;  // Adjust this value for slower movement

  for (int i = 0; i < 6; i++) {
    int currentAngle = currentAngles[i];
    int targetAngle = angles[i];

    for (int angle = currentAngle; angle != targetAngle; angle += (targetAngle > currentAngle) ? 1 : -1) {
      setServoAngle(i, angle);
      delay(speedDelay);
    }
  }
}

void moveServosSlowly(const int angles[]) {
  int currentAngles[] = {base.read(), shoulder.read(), elbow.read(), wrist1.read(), wrist2.read(), hand.read()};
  const int speedDelay = 50;  // Adjust this value for even slower movement

  for (int i = 0; i < 6; i++) {
    int currentAngle = currentAngles[i];
    int targetAngle = angles[i];

    for (int angle = currentAngle; angle != targetAngle; angle += (targetAngle > currentAngle) ? 1 : -1) {
      setServoAngle(i, angle);
      delay(speedDelay);
    }
  }
}

void setServoAngle(int servoIndex, int angle) {
  switch (servoIndex) {
    case 0:
      base.write(angle);
      break;
    case 1:
      shoulder.write(angle);
      break;
    case 2:
      elbow.write(angle);
      break;
    case 3:
      wrist1.write(angle);
      break;
    case 4:
      wrist2.write(angle);
      break;
    case 5:
      hand.write(angle);
      break;
    default:
      break;
  }
}

void measureAndDisplayDistance() {
  delay(50); // Wait for a short time to stabilize readings

  unsigned int distance = sonar.ping_cm(); // Get the distance in centimeters

  Serial.print("Distance: ");
  Serial.print(distance);
  Serial.println(" cm");

  if (distance >= HARVEST_DISTANCE_MIN && distance <= HARVEST_DISTANCE_MAX) {
    Serial.println("Plant is ready to harvest!");
  } else {
    Serial.println("Plant is not ready for harvest.");
  }
}
