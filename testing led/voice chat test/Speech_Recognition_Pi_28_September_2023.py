import speech_recognition as sr
import pyttsx3
import pyaudio
import time
import random
#Import the requests library for the AJAX to send HTTP POST requests: pip install requests
import requests 
#Import the subprocess library to start the camera code file:
import subprocess
#Import regex library:
import re

camera_process = None #Initialise the process instance:

command = ''

#Define the ESP32's IP address:
esp32_url = 'http://192.168.8.114/sendCommand'

def speak(text):
    engine = pyttsx3.init()
    
    #Get the available voices:
    voices = engine.getProperty('voices')
    
    #Set the voice to a female voice:
    engine.setProperty('voice', voices[1].id)
    
    engine.say(text)
    engine.runAndWait()

def respond_to_input(text):
    #Dictionary to store all the responses:
    responses = {
        #Conversations with the user:
        "name": "My name is GLITCH.",
        "old": "I am a few months old.",
        "plants": "Really? Please check your website.",
        "weather": random.choice(["It's sunny and warm today.", "Expect some rain today.", "There are cloudy skies today."]),
        "attitude": "I don't have an attitude. You have an attitude.",
        "bye": "Goodbye! Have a good day!",
        "sushi": "Fish are friends, not food. You should consider becoming a vegetarian.",
        "aquaponics": "Aquaponics is the process of letting plants grow in fish water two times faster compared to normal farming.",
        "system": "Yes. Yes I am!",
        "dislike": "I dislike Tilapias. THEY ARE IN MY TANK! HELP. ME.",
        "song": "Just keep swimming. Just keep swimming. Swimming. swimming. swimming. swimming.",

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
    }

    #Extract keywords from the input text using regular expressions (regex):
    keywords = [word.lower() for word in responses.keys()]


    #Find the first keyword that matches a response key:
    for keyword in keywords:
        if keyword in text.lower():
            return responses[keyword]

    #If the response does not match any statement in the dictionary, return "I'm here to assist you"
    return "I'm here to assist you."

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
                if "bye" in text.lower():
                    is_running=False

                #Send the response after converting it to text to the dictionary to check if it exists:
                response = respond_to_input(text.lower())
                speak(response) #Speak the response back:

                # Check if the user said any commands for the website and send the commands to the ESP32:
                if text.lower() == "light on":
                    command = 'a'
                    send_command_to_esp32(command)  # Send 'a' to turn the light on:
                if text.lower() == "light off":
                    command = 'b'
                    send_command_to_esp32(command)  # Send 'b' to turn the light off:

                if text.lower() == "pump on":
                    command = '6'
                    send_command_to_esp32(command)  # Send '6' to turn the pump on:
                if text.lower() == "pump off":
                    command = '5'
                    send_command_to_esp32(command)  # Send '5' to turn the pump off:

                if text.lower() == "feed fish":
                    command = '8'
                    send_command_to_esp32(command)  # Send '8' to feed the fish:

                if text.lower() == "cup one":
                    command = '1'
                    send_command_to_esp32(command)  # Send '1' to plant in cup 1:
                if text.lower() == "cup two":
                    command = '2'
                    send_command_to_esp32(command)  # Send '2' to plant in cup 2:
                if text.lower() == "cup three":
                    command = '3'
                    send_command_to_esp32(command)  # Send '3' to plant in cup 3:

                if text.lower() == "start camera":
                    execute_camera_script() #Execute the script to start the camera:
                if text.lower() == "stop camera":
                    stop_camera_script() #Execute the script to stop the camera:

                if text.lower() == "check system":
                    send_command_to_esp32('e')  # Send 'e' to check the system:

                if text.lower() == "check water level":
                    send_command_to_esp32('7')  # Send 'f' to check the water level:

                if text.lower() == "check temperature":
                    send_command_to_esp32('g')  # Send 'g' to check the temperature:
                
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

    #check if the camera_process is not None before attempting to terminate it:
    if camera_process is not None:
        try:
            #Terminate the camera script:
            camera_process.terminate()
            print("Camera script stopped")
        except Exception as e:
            print("An error occurred while stopping the camera script:", e)
    else: 
        print("Camera script is not running, nothing to stop.")

def send_command_to_esp32(command):
    payload = {'command': command}

    #try:
    response = requests.post(esp32_url, data=payload)
    if response.status_code == 200 and response.text == 'OK':
        print("Command sent to ESP32 successfully")
    else:
        print("Failed to send command to ESP32")
    #except Exception as e:
        #print("An error occurred while sending the command to ESP32:", e)

#When the program starts up, play the following message using the speak command:
if __name__ == "__main__":
    speak("Hello! I am GLITCH. How can I assist you today?")
    main()
