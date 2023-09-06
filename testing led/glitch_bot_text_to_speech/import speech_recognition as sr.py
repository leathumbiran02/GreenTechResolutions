import speech_recognition as sr
import pyttsx3
import pyaudio
import time
import random

def speak(text):
    engine = pyttsx3.init()
    engine.say(text)
    engine.runAndWait()

def main():
    r = sr.Recognizer()
    is_running = True

    with sr.Microphone() as source:
        print("Say something...")
        while is_running:
            audio = r.listen(source)

            try:
                print("Recognizing...")
                text = r.recognize_google(audio)
                print("You said:", text)
               
                # Respond to user input
                if "your name" in text:
                    response = "My name is GLITCH."
                elif "how old are you" in text:
                    response = "I have no age. I am eternal."
                elif "plants" in text:
                    response = "Check your website."
                elif "weather" in text:
                    weather_conditions = ["It's sunny and warm.", "Expect some rain today.", "Cloudy skies."]
                    response = random.choice(weather_conditions)
                elif "attitude" in text:
                    response = "Are you okay? I don't have an attitude."
                   
                elif "bye" in text:
                    response = "Bye! Have a great day."
                    is_running = False  # Stop the loop
                elif "sushi" in text:
                    response = "Fish are friends. Not food. You should consider becoming a vegetarian."
                    is_running = False  # Stop the loop
                else:
                    response = "I'm here to assist you."
               
                speak(response)  # Speak the response back
            except sr.UnknownValueError:
                print("Sorry, I couldn't understand.")
            except sr.RequestError as e:
                print("Sorry, an error occurred:", e)

if __name__ == "__main__":
    speak("Hello! I am GLITCH. How can I assist you today?")
    main()