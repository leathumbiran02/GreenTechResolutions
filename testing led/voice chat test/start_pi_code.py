from flask import Flask, request

app = Flask(__name__)

@app.route('/execute_voice_chat', methods=['POST'])
def execute_voice_chat():
    # Handle the POST request and execute your Python script
    import subprocess

    try:
        subprocess.run(["python3", "/home/pi/Desktop/voice_chat_code.py"])
        return "Voice chat script executed successfully!", 200
    except Exception as e:
        return f"Error executing voice chat script: {str(e)}", 500

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=80)
