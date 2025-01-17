<?php
    //Starting the session so we can check if the user is logged in:
    session_start();

    //Checking if the email address is stored in the session:
    if(!isset($_SESSION['email'])){
        echo "<script>alert('You must be logged in to view this page.')</script>";
        header('Refresh: 1; url=login_register.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <!--Title of Web Page: GreenTechResolutions-->
        <title>GreenTechResolutions</title>

        <!--Using a CSS style sheet for the page-->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <style>
            .container {
                display: flex;
                justify-content: space-between;
                align-items: flex-start; /* Adjust alignment as needed */
                margin-top:-10px;
            }
            .controlBlock, .newFeaturesBlock{
                display: inline-block; /* Make both blocks inline-block elements */
                background-color: #4C4D5E;
                height: auto;
                padding-top: 5px;
                width: 30%;
                margin-left: 50px;
                padding-bottom: 5px;
                margin-top: 50px;
            }
            .newFeaturesBlock{
                display: flex;
                justify-content: space-between;
                height: 150px;
                width: 93%;
                margin-bottom: 50px;
            }
            .right-block {
                width: 45%; 
                height: auto;
                margin-right: 50px;
                width: 810px;
                height: 530px;
                margin-top: 50px;
                overflow: hidden;
            }
            .card, .fish-feederCard, .featuresCard{
                width: 300px;
                height: 80px;
                margin: 40px auto;
                padding: 10px;
                border:none;
                background-color: #252525; 
                position: relative;
                perspective: 1000px;
                justify-content: space-between; 
            }
            .featuresCard{
                display: inline-block;
            }
            .fish-feederCard{
                height: 125px;
            }
            .fish-feederCard span, .timer{
                margin-top: -5px;
            }
            h4, h2, span, th, td{
                color: white;
                text-align: center; /* Center the text horizontally */
                font-size: 20px;
            }
            h2{
                font-weight: bolder;
                padding-top: 50px;
            }
            h4{
                padding-top: 30px;
                top: 18%;
            }
            span, h4{
                font-weight: normal;
                display: inline-block; /* Make the span and button inline-block elements */
                float: left;
                position: absolute;
            }
            span{
                top: 15%;
            }
            .newfeatureText{
                margin-top:10px;
                margin-bottom:-10px;
            }
            .timer{
                margin-top: -5px;
                margin-left: 0px;
                text-align: left;
            }
            .pumpBTN, .feedFishBTN, .cleanBTN, .balanceBTN, .heaterBTN{
                width: 45%;
                padding: 5px 0px;
                cursor: pointer;
                display: inline-block;
                margin: auto;
                background-color:#009414;
                color: #ffffff;
                font-weight: normal;
                font-size: 20px;
                border: 0;
                outline: none;
                margin-top: 1px;
                float: right;
            }
            .checkLvlBTN, .checkTempBTN, .checkpHBTN, .setTimerBTN{
                width: 30px; /* Adjust the width as needed */
                height: 30px; /* Make sure the height matches the width to create a perfect circle */
                border-radius: 50%;
                background-color:#009414;
                color: #ffffff;
                border: 0;
                margin-top: 29px;
                margin-left: 100px;
                font-size: 28px;
            }
            .setTimerBTN{
                padding: 0px;
                margin-left: -10px;
                margin-top: -10px;
                width: 30px;
                font-size: 20px;
            }
            .checkpHBTN{
                margin-left: 40px;
            }
            .fish-feederCard input[type="time"] {
                padding: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                background-color: #4C4D5E;
                color: #ffffff;
            }
            .fish-feederCard input[type="time"]:focus {
                outline: none;
                border-color:#009414;
            }
            .feedFishTimer{
                color: #4C4D5E;
                margin-top: -5px;
            }
            .fishTankVideo{
                width:810px;
                height: 600px;
                margin-top: 0px;
                overflow: hidden;
                width: 100%;
                height: 100%;
                transform: scale(1.5);
            }           
        </style>
    </head>
    <body>
        <header>
            <!-- Including the file that contains the menu: -->
            <?php 
                include 'menu.php';
            ?>
        </header>

        <h2>TANK</h2>
        <div class="container">
            <div class="controlBlock">
                <h2>CONTROL PANEL</h2> 
                <div class="form-page">
                    <div class="card">     
                        <span>WATER LEVEL</span> <!-- WATER LEVEL: -->
                        <h4 id="waterLevel">Loading...</h4>
                        <button class="checkLvlBTN" onclick="checkWaterLevel()">↺</button> <!-- Check Water Level Button: -->
                        <button class="pumpBTN"id="pumpButton" onclick="togglePump()">TURN PUMP ON</button> <!-- WATER PUMP BUTTON: -->
                    </div>
                </div>

                <div class="card">
                    <span>TEMPERATURE</span>
                    <h4 id="temperatureValue">Loading...</h4> <!-- Use "Loading..." as a placeholder until the value is fetched from the arduino: -->
                    <button class="checkTempBTN" onclick="checkTemperature()">↺</button> <!-- READ TEMPERATURE SENSOR BUTTON: -->
                </div>

                <div class="fish-feederCard">
                    <span >FISH FEEDER</span> <!-- FISH FEEDER: -->
                    <h4>
                        <!--Setting feeding time-->
                        <div class="timer">00:00:00</div>  <!-- COUNTDOWN TIMER: -->
                        <div class="fish-feeder">
                            <input type="time" id="feedTimeInput" class="feedFishTimer"><!-- Store Time -->
                            <button class="setTimerBTN" onclick="setFishFeederTimer()">✎</button> <!-- SET REMINDER FOR FISH FEEDER BUTTON: -->
                        </div>
                    </h4>
                    <button class= "feedFishBTN"onclick="sendFeedFishCommandToESP32()">FEED FISH</button> <!-- FEED FISH BUTTON: -->
                </div>
            </div>
            <div class="right-block">
            <video class="fishTankVideo" autoplay loop muted playsinline controls>
                <source src="videos/fishTankVideo.mp4" type="video/mp4">
            </video>
            </div>
        </div>
        <h2 class="newfeatureText">NEW FEATURES</h2>
        <div class="newFeaturesBlock">
            <div class="featuresCard">
                <span>CLEAN TANK</span>
                <button onclick="showComingSoonMessage()" class="cleanBTN">START</button>
            </div>
            <div class="featuresCard">
                <span>pH LEVEL</span>
                <h4>7</h4>
                <button onclick="showComingSoonMessage()" class="balanceBTN">BALANCE</button>
                <button onclick="showComingSoonMessage()" class="checkpHBTN">↺</button>
            </div>
            <div class="featuresCard">
                <span>HEATER</span>
                <h4>20°</h4>
                <button onclick="showComingSoonMessage()" class="heaterBTN">TURN OFF</button>
            </div>
        </div>
    <script>
        // JavaScript code for creating bubbles
        function createBubbles() {
            const tank = document.querySelector('.tank');
            const numBubbles = 30; // Adjust the number of bubbles as needed

            for (let i = 0; i < numBubbles; i++) {
                const bubble = document.createElement('div');
                bubble.classList.add('bubble');
                bubble.style.left = Math.random() * 100 + '%'; // Random horizontal position
                bubble.style.top = Math.random() * 100 + '%'; // Random vertical position
                bubble.style.animationDuration = (Math.random() * 2 + 2) + 's'; // Random animation duration between 2s and 4s
                const randomSize = Math.floor(Math.random() * 20 + 10); // Random size between 10px and 30px
                bubble.style.width = randomSize + 'px';
                bubble.style.height = randomSize + 'px';
                tank.appendChild(bubble);
            }
        }
        // Call the function to create random bubbles when the page loads
        window.onload = createBubbles;
    </script>
    <script src="validate.js"></script>
</body>
</html>