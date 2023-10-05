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
            .systemStatus{
                display: inline-block; /* Make both blocks inline-block elements */
                background-color: #4C4D5E;
                height: auto;
                padding-top: 5px;
                width: 40%;
                margin-left: 50px;
                padding-bottom: 5px;
                margin-top: 50px;
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
                
                <!-- Code for testing that the data has been retrieved from the Arduino: -->
               <!--  <p id="system_status">Loading...</p> -->

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