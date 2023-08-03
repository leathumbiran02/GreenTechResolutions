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

            .card{
                width: 270px;
                height: 240px;
                margin: 0 auto;
                /*margin-left: 0 auto;
                margin-right: 0 auto;
                margin-bottom: 0 auto;*/
                padding: 10px;
                border: 3px solid black;
                border-radius: 10px;
                background-color: lightgray; /* Replace 'lightgray' with your preferred shade of gray */
                position: relative;
                perspective: 1000px;
            }
            .card button, td button {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 245px;
                height: 40px;
                background-color: #343A54; 
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 17px;
                font-weight: bolder;
                border: 3px solid black;
            }
            .card button:hover, td button:hover{
                background-color: #09BA20; /* Change to your preferred background color on hover */
                color: #000546; /* Change to your preferred text color on hover */
                border: 3px solid black;
            }
            .cards-wrapper {
                display: flex;
            }
            .card h2 {
                font-size: 20px;
                text-align: center;
                margin-top: 10px;
                color: #000546; 
            }
            .card h5 {
                font-size: 16px;
                text-align: center;
                margin-bottom: 10px;
                color: #000546; 
            }
            .card h4 {
                font-size: 16px;
                text-align: left;
                margin-bottom: 10px;
                color: #000546; 
            }
            .first-row {
                margin-bottom: -10px;
            }
            /* Styling for the grid container */
            .grid-container {
                display: grid;
                margin-top: 30px;
                grid-template-columns: auto 110px 110px 110px;
                grid-template-rows:  auto 115px 115px 115px;
                /* Collapses the borders of the grid cells */
                border-collapse: collapse;
            }
            /* Styling for grid cells */
            .grid-item {
                padding: 8px;
                border: 1px solid black; /* Adds a black border to all grid cells */
            }
            /* Styling for labels (A, B, C, 1, 2, 3) */
            .label {
                font-weight: bold; /* Makes the text bold */
                text-align: center; /* Centers the text horizontally */
            }
            /* Styling for the top row of labels (A, B, C) */
            .label-top, .label-left {
                border: none; /* Removes the borders for the labels on the top row and the left column */
            }
            /* New class to remove borders for A, B, and C */
            .label-letter {
                border: none; /* Removes the borders for A, B, and C cells */
            }
            .grid-item img {
                width: 100px;
                height: 100px; 
            }
            .grid-item {
                display: inline-block;
                font-size: 20px; /* Set the font size to 20 pixels */
            }
            /* New CSS rule to make the labels (A, B, C, 1, 2, 3) bigger */
            .label {
                font-size: 20px; /* Set the font size to 24 pixels */
            }
            table {
                margin: 0 auto; /* Sets left and right margins to "auto", which centers the table */
                width: 100%;
            }
            .selected-text {
                display: none;
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

        <div class="spacing" style="height: 100px;"></div>
            <table>
                <tr>
                    <td>
                        <div class="grid-container">
                                <!-- Top row of labels -->
                                <div class="grid-item label label-top"></div> <!-- Empty cell to position the top-left corner -->
                                <div class="grid-item label label-letter">A</div> <!-- Label "A" in the top row -->
                                <div class="grid-item label label-letter">B</div> <!-- Label "B" in the top row -->
                                <div class="grid-item label label-letter">C</div> <!-- Label "C" in the top row -->

                                <!-- First column of labels -->
                                <div class="grid-item label label-left">1</div> <!-- Label "1" in the left column -->
                                <div class="grid-item"><img src="https://media.istockphoto.com/id/1253289278/vector/cannabis-leaf-illustration.jpg?s=612x612&w=0&k=20&c=bOLtnIMxjRN11mri8vf9IC2Wwqyo7V8DirUKw1v9gS0=" id="plant1" onclick="sendPlantingPlantCommandToESP32(1)"></div> <!-- Content in the cell corresponding to row 1 and column "A" -->
                                <div class="grid-item"><img src="https://media.istockphoto.com/id/181072765/photo/lettuce-isolated-isolated-on-white-background.jpg?s=612x612&w=0&k=20&c=axHLN2tckTBwUBZEsd1-LNhnQZ_LMWEGmMBLRVe1qwQ=" id="plant2" onclick="sendPlantingPlantCommandToESP32(2)"></div> <!-- Content in the cell corresponding to row 1 and column "B" -->
                                <div class="grid-item"><img src="https://media.istockphoto.com/id/941825808/photo/tomato-isolated-tomato-on-white-background-with-clipping-path-full-depth-of-field.jpg?s=612x612&w=0&k=20&c=FOo7yfEpxmdTHYBHVr2og-nE_m4mib32rYxZQxUARbs=" id ="plant3" onclick="sendPlantingPlantCommandToESP32(3)"></div> <!-- Content in the cell corresponding to row 1 and column "C" -->

                        </div>
                    </td>
                    <td>
                        <div class="card" style="height: 140px;">
                            <h2 id="lightStatus">LED Light</h2>
                            <button id="ledButton" onclick="toggleLED()" style="margin-top:20px; ">Turn ON</button>
                        </div>
                        <div class="card" style="height: 140px;">
                            <h2 id="cameraStatus">Camera</h2>
                            <button id="openCameraButton" style="margin-top:20px; ">OPEN CAMERA</button>
                            <!-- <table>
                                <tr>
                                    <td>
                                        <button id="openCameraButton" >OPEN CAMERA</button>
                                    </td>
                                </tr>
                            </table> -->
                        </div>
                    </td>
                </th>
            </table>
        
        <div class="card" id="cameraCard" style="display: none;">
            <!-- Add camera content here -->
            <h3>Camera Content</h3>
            <p>This is the display for the camera.</p>
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