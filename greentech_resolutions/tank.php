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
            .hero{ /* Centering the text: */
                text-align: center;
            }
            .card {
                width: 400px;
                height: 200px;
                margin: 0 auto;
                margin-bottom: 10px;
                padding: 10px;
                border: 3px solid black;
                border-radius: 10px;
                background-color: lightgray; /* Replace 'lightgray' with your preferred shade of gray */
                position: relative;
                perspective: 1000px;
                margin-right: 300px;
            }

            .card button {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
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
            .card button:hover {
                background-color: #09BA20; /* Change to your preferred background color on hover */
                color: #000546; /* Change to your preferred text color on hover */
                border: 3px solid black;
            }
            .card h2 {
                font-size: 20px;
                margin-top: 10px;
                color: #000546; 
            }
            .card h5 {
                font-size: 16px;
                margin-bottom: 10px;
                color: #000546; 
            }

            .first-row {
                margin-bottom: -10px;
            }
            .water-level {
                width: 50px;
                height: 50px;
                background-color: lightgray; /* Blue background representing the container */
                border-radius: 50%;
                position: relative;
                overflow: hidden;
            }

            .water {
                width: 100%;
                background-color: #00aaff; /* Blue background representing the water */
                position: absolute;
                bottom: 0;
                left: 0;
                animation: fillWater 2s ease-in-out infinite alternate; /* Animation properties */
            }

            .water::before {
                content: "";
                display: block;
                width: 100%;
                height: 70%; /* Change this value to adjust the initial water level (0 to 100%) */
                background-color: rgba(0, 170, 255, 0.7); /* Semi-transparent blue representing water level */
                position: absolute;
                bottom: 0;
                left: 0;
            }

            /* Animation keyframes */
            @keyframes fillWater {
                0% {
                    height: 50%; /* Initial water level */
                }
                100% {
                    height: 60%; /* Final water level (completely filled) */
                }
            }
            .clock-icon {
                font-size: 60px; 
                color: #00aaff; 
            }
            
            .feedFishTimer{
                margin-right: 20px;
                width: 100px;
                padding: 5px 5px;
            }
            .fish-feeder {
                display: flex;
                align-items: center;
                margin-top: 10px; 
            }
            .timer{
                margin-top:10px;
                font-size: px;
            }

            /* Moved table styling here to avoid CSS conflicts: */
            /* Ensure that the table and its cells take the full width of the container */
            table {
                width: 100%;
            }

            td {
                width: 33.33%; /* Divide the table width into equal parts for each cell */
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


        <div class="spacing" style="height:150px;"></div>
        <div class="form-page">
            <div class="card">
                <table>
                    <tr class="first-row">
                        <td>
                            <div class="water-level">
                                <div class="water"></div>
                            </div>
                        </td>
                        <td>
                            <h2 style="margin-right: 100px;">WATER LEVEL</h2>
                            <h5>50%</h5>
                        </td>
                    </tr>
                </table>
                <button style="margin-top: 30px;" >FILL TANK</button>
            </div>

            <div class="card">
                <table>
                    <tr>
                        <td><h3>pH<h3></td>
                        <td>
                            <h2>PH LEVEL</h2>
                            <h5>7</h5>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="card">
                <table>
                    <tr>
                        <td class="clock-icon">&#x23F1;</td>
                        <td>
                            <h2>FISH FEEDER</h2>
                            <h5>
                                <!--Setting feeding time-->
                                <div class="fish-feeder">
                                    <input type="time" id="feedTimeInput" class="feedFishTimer"><!-- Store Time -->
                                    <button onclick="setFishFeederTimer()" style="width: 120%; display: initial; margin-right: -5px;">SET REMINDER</button>
                                </div>
                                <div class="timer">00:00:00</div>   
                            </h5>
                        </td>
                    </tr>
                </table>
                <button>FEED FISH</button>
            </div>
        </div>

    <!-- Using an external javascript file for the buttons and timers: -->
    <script src="validate.js"></script>
</body>
</html>