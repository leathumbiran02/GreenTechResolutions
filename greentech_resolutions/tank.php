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
            .controlBlock{
                display: inline-block; /* Make both blocks inline-block elements */
                background-color: #4C4D5E;
                height: auto;
                padding-top: 5px;
                width: 40%;
                margin-left: 50px;
                padding-bottom: 5px;
                margin-top: 50px;
            }
            .right-block {
                width: 50%; 
                height: auto;
                margin-right: 50px;
            }

            .card, .fish-feederCard{
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
            .fish-feederCard{
                height: 130px;
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
            .timer{
                margin-top: -5px;
                margin-left: -190px;
            }
            .pumpBTN, .feedFishBTN, .setTimerBTN{
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
            .setTimerBTN{
                padding: 5px 9px;
                margin-right: 10px;
            }
            .checkLvlBTN, .checkTempBTN{
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
            .fish-feederCard input[type="time"] {
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                background-color: #f5f5f5;
                color: #333;
            }
            .fish-feederCard input[type="time"]:focus {
                outline: none;
                border-color: #007bff;
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
                        <h4>Loading...</h4>
                        <button class="checkLvlBTN">↺</button> <!-- SET REMINDER FOR FISH FEEDER BUTTON: -->
                        <button class="pumpBTN"id="pumpButton" onclick="togglePump()">TURN PUMP ON</button> <!-- WATER PUMP BUTTON: -->
                    </div>
                </div>

                <div class="card">
                    <span>TEMPERATURE</span>
                    <h4 id="temperatureValue">Loading...</h4> <!-- Use "Loading..." as a placeholder until the value is fetched from the arduino: -->
                    <button class="checkTempBTN">↺</button> <!-- READ TEMPERATURE SENSOR BUTTON: -->
                </div>

                <div class="fish-feederCard">
                    <span >FISH FEEDER</span> <!-- FISH FEEDER: -->
                    <h4>
                        <!--Setting feeding time-->
                        <div class="timer">00:00:00</div>  <!-- COUNTDOWN TIMER: -->
                        <div class="fish-feeder">
                            <input type="time" id="feedTimeInput" class="feedFishTimer"><!-- Store Time -->
                            <button class="setTimerBTN" onclick="setFishFeederTimer()">SET TIMER</button> <!-- SET REMINDER FOR FISH FEEDER BUTTON: -->
                        </div>
                    </h4>
                    <button class= "feedFishBTN"onclick="sendFeedFishCommandToESP32()">FEED FISH</button> <!-- FEED FISH BUTTON: -->
                </div>
            </div>
            <div class="right-block">
            </div>
        </div>
    <script src="validate.js"></script>
</body>
</html>