<?php
    //Starting the session so we can che^ck if the user is logged in:
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
            .hero{ /* Centering the text: */
                text-align: center;
            }
            .controlBlock, .plantInfoBlock, .cupBlock{
                display: inline-block; /* Make both blocks inline-block elements */
                background-color: #4C4D5E;
                height: auto;
                padding-top: 5px;
            }
            .controlBlock{
                width: 47%; 
                margin-left: 50px;
                padding-bottom: 5px;
                height: 280px;
            }
            .plantInfoBlock{
                display: inline-block;
                width: 1250px;
                margin: 40px 50px;
                float: center;
                justify-content: center;
                padding-bottom: 50px;
            }
            .cup{
                display: block; 

            }
            .cupsCard{
                display: flex;
                margin-left: 50px;
            }
            .card{
                width: 270px;
                height: 70px;
                margin: 40px auto;
                padding: 10px;
                border:none;
                background-color: #252525; 
                position: relative;
                perspective: 1000px;
                justify-content: space-between; 
            }
            .cupBlock{
                width: 550px;
                float:right;
                margin-right: 50px;
                margin-top: 0px;
                height: 280px;
                overflow: auto;
            }
            h4, h2, span, th, td{
                color: white;
                text-align: center; /* Center the text horizontally */
                font-size: 20px;
            }
            h2{
                font-weight: bolder;
                padding-top: 50px;
                padding-bottom: 20px;
            }
            h4{
                font-weight: bolder;
                padding-top: 15px;
                margin-bottom: -20px;
            }
            span{
                font-weight: normal;
                float:center;
                position: absolute;
                color: white; 
            }
            .cameraBTN, .ledBTN{
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
                float:right;
                margin-top: 8px;
            }
            table{
                margin-right: 13%;
                float: center;
                border-collapse: collapse;
                border: none;
                border:1;   
                margin:10px 350px; 
                margin-top: 62px;           
            }
            th, td{
                padding: 10px;
                border: 3px solid #09BA20; /* Add a border to individual cells if needed */
                padding: 8px; /* Add padding to cells for spacing */
            }
            .plantInfoBlock td:first-child,
            .plantInfoBlock th:first-child {
                border-top: none; 
                border-right: none;
            }
            .plantInfoBlock th:nth-child(1) {
                border-left: none;
            }
            .plantInfoBlock tr:nth-child(4) {
                border-bottom: none;
            }
            .plantInfoBlock td:nth-child(2),
            .plantInfoBlock td:nth-child(3),
            .plantInfoBlock td:nth-child(4) {
                border-top: none;
            }
            .plantInfoBlock td:nth-child(4){
                border-right: none;
            }
            .plantInfoBlock tr:nth-child(3) td{
                border-bottom: none;
            }
            .plantInfoBlock tr:nth-child(3) th{
                border-bottom: none;
            }
            .strawberryIcon{
                width: 100px;
                height: auto;
                margin:10px 30px;
            }
            .cupTxt{
                margin-top: 140px;
                margin-left: -100px;
            }
            .heading{
                margin-top:-30px;
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
        <h2>PLANT</h2>

        <div class="controlBlock">
            <h4>CONTROL PANEL</h4>  
            <div class="card" >
                <span id="lightStatus">LED LIGHT</span>
                <button id="ledButton" class="ledBTN" onclick="toggleLED()">TURN ON</button>
            </div>
            <div class="card" >
                <span id="cameraStatus">CAMERA</span><button id="openCameraButton" class="cameraBTN">OPEN</button>
            </div>
        </div>
        <div class="cupBlock">
            <h2 class="heading">PLANTING</h2>
            <div class="cupsCard">
                <div class="cup">
                    <img class="strawberryIcon"src="images/strawberry.png" onclick="sendPlantingPlantCommandToESP32(3)">
                    <span class="cupTxt" onclick="sendPlantingPlantCommandToESP32(1)">Cup 1</span>
                </div>
                <div class="cup">
                    <img class="strawberryIcon"src="images/strawberry.png"onclick="sendPlantingPlantCommandToESP32(2)">
                    <span class="cupTxt" onclick="sendPlantingPlantCommandToESP32(2)">Cup 2</span>
                </div>
                <div class="cup">
                    <img class="strawberryIcon"src="images/strawberry.png"onclick="sendPlantingPlantCommandToESP32(1)">
                    <span class="cupTxt" onclick="sendPlantingPlantCommandToESP32(3)">Cup 3</span>
                </div>
            </div>
        </div>
        <div class="plantInfoBlock">
            <h4>PLANT INFO</h4> 
            <table> <!-- You can adjust the border attribute as needed -->
                <tr>
                    <th>POSITION</th>
                    <td id="plant1" onclick="sendPlantingPlantCommandToESP32(1)">CUP 1</td>
                    <td id="plant2" onclick="sendPlantingPlantCommandToESP32(2)">CUP 2</td>
                    <td id="plant3" onclick="sendPlantingPlantCommandToESP32(3)">CUP 3</td>
                </tr>
                <tr>
                    <th>TYPE</th>
                    <td>STRAWBERRY</td>
                    <td>STRAWBERRY</td>
                    <td>STRAWBERRY</td>
                </tr>
                <tr>
                    <th>GROWTH</th>
                    <td>30 DAYS</td>
                    <td>15 DAYS</td>
                    <td>25 DAYS</td>
                </tr>
            </table>
        </div>

        
        <!-- Using an external javascript file for the buttons and timers: -->
        <script src="validate.js"></script>
        <script>
            // Get references to the button and the camera card
            const openCameraButton = document.getElementById('openCameraButton');
            const cameraCard = document.getElementById('cameraCard');
            // Add an event listener to the button
            openCameraButton.addEventListener('click', function() {
                // Toggle the visibility of the camera card
                if (cameraCard.style.display === 'none') {
                    cameraCard.style.display = 'block';
                } else {
                    cameraCard.style.display = 'none';
                }
            });

            function showText() {
                const displayText = document.getElementById('displayText');
                displayText.style.display = 'block';
            }
        </script>
    </body>
</html>