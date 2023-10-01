from flask import Flask, request

app = Flask(_name_)
#CORS(app) #Enables cross origin requests to the flask application

@app.route('/')
def index():
	return "HI!"
	
@app.route('/execute_voice_chat', methods=['POST'])
def execute_voice_chat():
    # Handle the POST request and execute your Python script
    import subprocess

    try:
        subprocess.run(["python3", "/home/gtr/Desktop/voice_chat/voice_chat_code.py"])
        return "Voice chat script executed successfully!", 200
    except Exception as e:
        return f"Error executing voice chat script: {str(e)}", 500

if _name_ == '_main_':
    app.run(host='0.0.0.0', port=5000)