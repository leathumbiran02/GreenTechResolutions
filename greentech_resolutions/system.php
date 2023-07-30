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
                height: 90px;
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
            .card button, button {
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto; 
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
                perspective: 1000px;
            }
            .card button:hover, button:hover{
                background-color: #09BA20; /* Change to your preferred background color on hover */
                color: #000546; /* Change to your preferred text color on hover */
                border: 3px solid black;
            }
            .cards-wrapper {
                display: flex;
            }
            
            .card h2 {
                font-size: 20px;
                text-align: left;
                margin-top: -10px; 
                padding: 10px 0; 
                color: #000546; 
            }
            .card h5, h5 {
                font-size: 16px;
                text-align: left;
                margin-top: -20px; 
                padding: 10px 0; 
                color: #000546; 
            }
            .card h4 {
                font-size: 16px;
                text-align: left;
                margin: 0; 
                padding: 10px 0; 
                color: #000546; 
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
            #armStatus.red, 
            #tankStatus.red{
                color: red;
            }
            #systemError{
                color: red;
                text-align: center; 
                margin-top: 30px;
            }
            #status{
                color:red; 
                margin-top: -13px;
                font-size: 45px; 
                text-align: right;
                margin-top: -13px;
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
                <div class="card">
                    <table>
                        <tr>
                            <td>
                                <h2>ARM</h2>
                                <h5>Operational</h5>
                            </td>
                            <td>
                                <p id="armStatus">&#11044;</p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card">
                    <table>
                        <tr>
                            <td>
                                <h2>TANK</h2>
                                <h5>Operational</h5>
                            </td>
                            <td>
                                <p id="tankStatus">&#11044;</p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div>
                    <button id="refreshButton"  onclick="refreshButton();" style="margin-top: 30px;" >TEST SYSTEM</button>
                    <h5 style="text-align: center; margin-top: -10px;"><span id="lastRefreshed"></span></h5>
                </div>
                <div id="testCard">
                    <h2 id="systemError">SYSTEM ERROR!!!</h2>
                    <div class="card">
                        <!--All arm errors-->
                        <table>
                            <tr>
                                <td>
                                    <h2 style="margin-top: 0px;">BASE MOTOR</h2>
                                    <h5>Arm</h5>
                                </td>
                                <td>
                                    <p id="status">&#11044;</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <table>
                            <tr>
                                <td>
                                    <h2 style="margin-top: 0px;">SHOULDER MOTOR</h2>
                                    <h5>Arm</h5>
                                </td>
                                <td>
                                    <p id="status">&#11044;</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <table>
                            <tr>
                                <td>
                                    <h2 style="margin-top: 0px;">ELBOW MOTOR</h2>
                                    <h5>Arm</h5>
                                </td>
                                <td>
                                    <p id="status">&#11044;</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <table>
                            <tr>
                                <td>
                                    <h2>WRIST 1 MOTOR</h2>
                                    <h5>Arm</h5>
                                </td>
                                <td>
                                    <p id="status">&#11044;</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <table>
                            <tr>
                                <td>
                                    <h2>WRIST 2 MOTOR</h2>
                                    <h5>Arm</h5>
                                </td>
                                <td>
                                    <p id="status">&#11044;</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <table>
                            <tr>
                                <td>
                                    <h2>HAND MOTOR</h2>
                                    <h5>Arm</h5>
                                </td>
                                <td>
                                    <p id="status">&#11044;</p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!--All tank errors-->
                    <div class="card">
                        <table>
                            <tr>
                                <td>
                                    <h2>FISH FEEDER</h2>
                                    <h5>Tank</h5>
                                </td>
                                <td>
                                    <p id="status">&#11044;</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <table>
                            <tr>
                                <td>
                                    <h2>ULTRASONIC SENSOR</h2>
                                    <h5>Tank</h5>
                                </td>
                                <td>
                                    <p id="status">&#11044;</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <table>
                            <tr>
                                <td>
                                    <h2>PUMP</h2>
                                    <h5>Tank</h5>
                                </td>
                                <td>
                                    <p id="status">&#11044;</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <table>
                            <tr>
                                <td>
                                    <h2>TEMPERATURE SENSOR</h2>
                                    <h5>Tank</h5>
                                </td>
                                <td>
                                    <p id="status">&#11044;</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <table>
                            <tr>
                                <td>
                                    <h2>WATER LEVEL SENSOR</h2>
                                    <h5>Tank</h5>
                                </td>
                                <td>
                                    <p id="status">&#11044;</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <table>
                            <tr>
                                <td>
                                    <h2>LED LIGHT</h2>
                                    <h5>Tank</h5>
                                </td>
                                <td>
                                    <p id="status">&#11044;</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card">
                        <table>
                            <tr>
                                <td>
                                    <h2>CAMERA</h2>
                                    <h5>Tank</h5>
                                </td>
                                <td>
                                    <p id="status">&#11044;</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                </div>
            <!-- Using an external javascript file for the buttons and timers: -->
            <script src="validate.js"></script>
            <script>
                function showText() {
                    const displayText = document.getElementById('displayText');
                    displayText.style.display = 'block';
                }
                function refreshButton() {
                    const refreshButton = document.getElementById('refreshButton');
                    const lastRefreshed = document.getElementById('lastRefreshed');

                    // Get the current date and time
                    const now = new Date();
                    const formattedDateTime = formatDate(now);

                    // Update the button label and lastRefreshed text
                    refreshButton.innerText = 'TESTING...';
                    lastRefreshed.innerText = formattedDateTime;
                    // Add the "red" class to armStatus to change its color to red
                    armStatus.classList.add('red');
                    tankStatus.classList.add('red');

                    testCard.style.display = 'block'; // Show the card

                    // Reset the button label after a delay (e.g., 2 seconds)
                    setTimeout(() => {
                        refreshButton.innerText = 'TEST SYSTEM';
                    }, 2000); // Change this value to adjust how long the "Refreshed" label stays visible (in milliseconds)
                }

                function formatDate(date) {
                    // Format the date and time as desired (e.g., "YYYY-MM-DD HH:MM:SS")
                    const year = date.getFullYear();
                    const month = padZero(date.getMonth() + 1);
                    const day = padZero(date.getDate());
                    let hours = padZero(date.getHours());
                    let minutes = padZero(date.getMinutes());
                    let time;

                    if(hours > 12){
                        time = (hours - 12) + ":" + minutes +"pm";
                    }else{
                        time = hours + ":" + minutes +"am";
                    }

                    return `Last Test: ${day}/${month}/${year} at ${time}`;
                }

                function padZero(number) {
                    // Add a leading zero if the number is less than 10
                    return number < 10 ? `0${number}` : number;
                }
            </script>
    </body>
</html>
<!--
Status operational and error 
system error 
Alert button green and red 
Icons 
Time saves
-->