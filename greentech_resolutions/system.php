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

        <style>
            .systemStatus, .statuses {
                background-color: #4C4D5E;
                height: auto;
                padding-top: 5px;
                width:50%;
                margin-left: 50px;
                padding-bottom: 5px;
                margin-top: 20px;
            }
            .systemStatus{
                display: inline-block; 
            }
            .statuses{
                width: 92%;
                display: flex;
                justify-content: space-between;
            }
            .armStatusBlock, .tankStatusBlock{
                flex: 1;
                display: inline-block;
            }
            .armStatusBlock{
                margin-left: 240px;
                margin-right: 170px;
            } 
            .tankStatusBlock{
                margin-right: -300px;
            }
            .card{
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
            h4, h2, span{
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
            .dateAndTime{
                text-align:left;
            }
            .testSystemBTN{
                width: 30px; /* Adjust the width as needed */
                height: 30px; /* Make sure the height matches the width to create a perfect circle */
                border-radius: 50%;
                background-color:#009414;
                color: #ffffff;
                border: 0;
                margin-top: 29px;
                margin-left: 100px;
                font-size: 28px;
                float: right;
                margin-top: -3px;
            }
            #testCard {
                display: none;
            }
            table {
                width: 100%;
            }
            #tankStatus, 
            #armStatus {
                color: green; /* Sets the color to green */
                font-size: 45px; 
                text-align: right;
                margin-top: -13px; 
            }
            p{
                color:green; 
                margin-top: -13px;
                font-size: 45px; 
                text-align: right;
            }
            .roboticArm {
                width: auto;
                height: 485px; 
                padding-left: 80px;
                margin-bottom: -200px;
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
        <h2>SYSTEM</h2>
                <div class="systemStatus">
                    <h2>SYSTEM STATUS</h2>
                    <div class="card">    
                        <span>ARM</span>
                        <h4>Operational</h4>
                        <p id="armStatus">&#11044;</p>
                    </div>
                    <div class="card">
                        <span>TANK</span>
                        <h4>Operational</h4>
                        <p id="tankStatus">&#11044;</p>
                    </div>
                    <div class="card">
                        <span>LAST TEST</span>
                        <button id="refreshButton" onclick="refreshButton();" class="testSystemBTN">↺</button>
                        <h4 class="dateAndTime"id="lastRefreshed"></h4>
                    </div>
                </div>
                <img class="roboticArm" src="images/roboticArm.png">
                
                <!-- Code for testing that the data has been retrieved from the Arduino: -->
               <!--  <p id="system_status">Loading...</p> -->

                <div id="testCard" class="statuses">
                    <div class="armStatusBlock">
                    <h2>ARM</h2>
                        <div class="card">
                            <span>BASE MOTOR</span>
                            <h4>Motor 1</h4>
                            <p>&#11044;</p>      
                        </div>
                        <div class="card">
                            <span>SHOULDER MOTOR</span>
                            <h4>Motor 2</h4>
                            <p>&#11044;</p>         
                        </div>
                        <div class="card">
                            <span>ELBOW MOTOR</span>
                            <h4>Motor 3</h4>
                            <p>&#11044;</p>       
                        </div>
                        <div class="card">
                            <span>WRIST 1 MOTOR</span>
                            <h4>Motor 4</h4>
                            <p>&#11044;</p>        
                        </div>
                        <div class="card">
                            <span>WRIST 2 MOTOR</span>
                            <h4>Motor 5</h4>
                            <p>&#11044;</p>       
                        </div>
                    </div>
                    <div class="tankStatusBlock">
                        <h2>TANK</h2>
                        <div class="card">
                            <span>FISH FEEDER</span>
                            <h4>Motor 6</h4>
                            <p>&#11044;</p>       
                        </div>
                        <div class="card">
                            <span>TEMPERATURE SENSOR</span>
                            <h4>Sensor 1</h4>
                            <p>&#11044;</p>       
                        </div>
                        <div class="card">
                            <span>Water Level Sensor</span>
                            <h4>Sensor 2</h4>
                            <p>&#11044;</p>        
                        </div>
                        <div class="card">
                            <span>FILL TANK PUMP</span>
                            <h4>Pump 1</h4>
                            <p>&#11044;</p>        
                        </div>
                        <div class="card">
                            <span>WATER FLOW PUMP</span>
                            <h4>Pump 2</h4>
                            <p>&#11044;</p>         
                        </div>
                    </div>
                </div>
            <!-- Using an external javascript file for the buttons and timers: -->
            <script src="validate.js"></script>
            <script>
                function showText() {
                    const displayText = document.getElementById('displayText');
                    displayText.style.display = 'block';
                }
            </script>
    </body>
</html>