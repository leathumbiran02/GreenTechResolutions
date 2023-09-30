import speech_recognition as sr
import pyttsx3
import pyaudio
import time
import random
#Import the requests library for the AJAX to send HTTP POST requests: pip install requests
import requests 
#Import the subprocess library to start the camera code file:
import subprocess

camera_process = None #Initialise the process instance:

def speak(text):
    engine = pyttsx3.init()
    engine.say(text)
    engine.runAndWait()

def respond_to_input(text):
    #Dictionary to store all the responses:
    responses = {
        #Conversations with the user:
        "name": "My name is GLITCH.",
        "old": "I do not have an age. I am infinite.",
        "plants": "Really? Is that what you paid me to do? Why don't you check your website?",
        "weather": random.choice(["It's sunny and warm today.", "Expect some rain today.", "There are cloudy skies today."]),
        "attitude": "I don't have an attitude. I just don't respond to stupid questions.",
        "bye": "Goodbye! Have a great day!",
        "sushi": "Fish are friends, not food. You should consider becoming a vegetarian.",
        "thank you": "You are welcome!",

        #AJAX FROM WEBSITE FOR COMPONENTS (telling the user what the system is currently doing):
        "light on": "Putting the light on.",
        "light off": "Putting the light off.",
        "pump on": "Putting the putting the pump on.",
        "pump off": "Putting the putting the pump off.",
        "feed fish": "Feeding the fish now.",
        "cup one": "Planting in cup 1.",
        "cup two": "Planting in cup 2.",
        "cup three": "Planting in cup 3.",
        "start camera": "Starting the camera.",
        "stop camera": "Stopping the camera.",
        "check system": "Checking your system.",
        "check water level": "Checking the water level.",
        "check temperature": "Checking the temperature.",
        "harvest": "Checking if your plant is ready to harvest.",
    }

    #If the response does not match any statement in the dictionary, return "I'm here to assist you"
    return responses.get(text, "I'm here to assist you.")

def main():
    r = sr.Recognizer()
    is_running = True

    with sr.Microphone() as source:
        print("Say something...")
        while is_running:
            audio = r.listen(source)

            #Use try for exception handling:
            try:
                print("Recognizing...")
                text = r.recognize_google(audio)
                print("You said: ", text)
               
                #Respond to user input, if the user says 'bye' end the loop:
                if text.lower()=="bye":
                    is_running=False 

                #Send the response after converting it to text to the dictionary to check if it exists:
                response = respond_to_input(text.lower())
                speak(response) #Speak the response back:

                # Check if the user said any commands for the website and send the commands to the ESP32:
                if text.lower() == "light on":
                    send_command_to_esp32('a')  # Send 'a' to turn the light on:
                if text.lower() == "light off":
                    send_command_to_esp32('b')  # Send 'b' to turn the light off:

                if text.lower() == "pump on":
                    send_command_to_esp32('6')  # Send '6' to turn the pump on:
                if text.lower() == "pump off":
                    send_command_to_esp32('5')  # Send '5' to turn the pump off:

                if text.lower() == "feed fish":
                    send_command_to_esp32('8')  # Send '8' to feed the fish:

                if text.lower() == "cup one":
                    send_command_to_esp32('1')  # Send '1' to plant in cup 1:
                if text.lower() == "cup two":
                    send_command_to_esp32('2')  # Send '2' to plant in cup 2:
                if text.lower() == "cup three":
                    send_command_to_esp32('3')  # Send '3' to plant in cup 3:

                if text.lower() == "start camera":
                    execute_camera_script() #Execute the script to start the camera:
                if text.lower() == "stop camera":
                    stop_camera_script() #Execute the script to stop the camera:

                if text.lower() == "check system":
                    send_command_to_esp32('e')  # Send 'e' to check the system:

                if text.lower() == "check water level": #should be 7 as seen in the Arduino code:
                    send_and_receive_water_level_to_esp32('7')  # Send 'f' to check the water level:

                if text.lower() == "check temperature":
                    send_and_receive_temperature_to_esp32('g')  # Send 'g' to check the temperature:
                
                if text.lower() == "harvest":
                    send_command_to_esp32('0') # Send '0' to check if a plant is ready for harvest:

            #Exception handling:
            except sr.UnknownValueError:
                print("Sorry, I couldn't understand.")
            except sr.RequestError as e:
                print("Sorry, an error occurred: ", e)

def execute_camera_script():
    global camera_process #Access the global process instance:
    try:
        #Use subprocess.Popn to run the script in the background and store the process instance: 
        camera_process = subprocess.Popen(["python", "placeholder.py"])  #Replace with the path of the camera code file:
        print("Camera script executed successfully")
    except Exception as e:
        print("An error occurred while executing the camera script:", e)

def stop_camera_script():
    global camera_process  #Access the global process instance:
    try:
        #Terminate the camera script:
        camera_process.terminate()
        print("Camera script stopped")
    except Exception as e:
        print("An error occurred while stopping the camera script:", e)

#Route 1 for sending commands only:
def send_command_to_esp32(command):
    esp32_url = 'http://192.168.8.114/sendCommand'  #IP Address of the ESP32:
    payload = {'command': command}

    try:
        response = requests.post(esp32_url, data=payload)
        if response.status_code == 200 and response.text == 'OK':
            print("Command sent to ESP32 successfully")
        else:
            print("Failed to send command to ESP32")
    except Exception as e:
        print("An error occurred while sending the command to ESP32:", e)

#Route 2 for sending and receiving commands for water level:
def send_and_receive_water_level_to_esp32(command):
    esp32_url = 'http://192.168.8.114/sendAndReceiveWaterLevelCommand'  #IP Address of the ESP32:
    payload = {'command': command}

    try:
        response = requests.post(esp32_url, data=payload)
        if response.status_code == 200 and response.text == 'OK':
            print("Command sent to ESP32 successfully")
        else:
            print("Failed to send command to ESP32")
    except Exception as e:
        print("An error occurred while sending the command to ESP32:", e)

#Route 5 for sending and receiving commands for temperature:
def send_and_receive_temperature_to_esp32(command):
    esp32_url = 'http://192.168.8.114/sendAndReceiveTemperatureCommand'  #IP Address of the ESP32:
    payload = {'command': command}

    try:
        response = requests.post(esp32_url, data=payload)
        if response.status_code == 200 and response.text == 'OK':
            print("Command sent to ESP32 successfully")
        else:
            print("Failed to send command to ESP32")
    except Exception as e:
        print("An error occurred while sending the command to ESP32:", e)

#When the program starts up, play the following message using the speak command:
if __name__ == "__main__":
    speak("Hello! I am GLITCH. How can I assist you today?")
    main()
