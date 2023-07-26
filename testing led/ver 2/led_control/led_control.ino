void setup() {
  int ledPin = 13; // Pin connected to the LED
  pinMode(ledPin, OUTPUT);
  Serial.begin(9600); // Set the baud rate to the same value in the PHP code
}

void loop() {
  char incomingByte; // Variable to store incoming data

  if (Serial.available() > 0) {
    incomingByte = Serial.read(); // Read incoming data from the serial port

    // Check the command received and perform the corresponding action
    if (incomingByte == 'toggle') {
      int ledPin = 13; // Pin connected to the LED
      digitalWrite(ledPin, !digitalRead(ledPin)); // Toggle the LED state
    }
  }
}
