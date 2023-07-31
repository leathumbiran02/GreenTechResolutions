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
            /* Moved table styling here to avoid CSS conflicts: */
            /* Ensure that the table and its cells take the full width of the container: */
            table {
                width: 100%;
            }

            td {
                width: 33.33%; /* Divide the table width into equal parts for each cell: */
            }
            /* Adjusting the position of the cards: */
            .form-page {
                position: relative;
            }

            /* Adjusting the water tank image for mobile view: */
            @media (max-width: 1900px) {
                .water-tank-img {
                    width: 100%;
                    max-width: 400px; /* Set a maximum width for the water tank image on smaller screens: */
                    height: auto;
                    position: static; /* Reset position to allow normal flow on smaller screens: */
                    margin: 0 auto;
                }

                /* Center the cards horizontally on smaller screens: */
                .tank-card {
                    margin: 0 auto;
                }
                
                /* Center the image vertically on the screen: */
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
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


        <div class="spacing" style="height:80px;"></div>
        <div class="form-page">
            <!-- Water Tank Image: -->
            <img src="https://www.pngmart.com/files/15/Aquarium-Fish-Tank-PNG-Free-Download.png" alt="Water Tank" class="water-tank-img">

            <div class="tank-card">
                <table>
                    <tr class="tank-first-row">
                        <td>
                            <div class="tank-water-level">
                                <div class="tank-water"></div>
                            </div>
                        </td>
                        <td>
                            <h2 style="margin-right: 100px;">WATER LEVEL</h2> <!-- WATER LEVEL: -->
                            <h5>50%</h5>
                        </td>
                    </tr>
                </table>
                <button style="margin-top: 30px;" >FILL TANK</button> <!-- FILL TANK BUTTON: -->
            </div>

            <div class="tank-card">
                <table>
                    <tr>
                        <td><h3>pH<h3></td>
                        <td>
                            <h2>PH LEVEL</h2> <!-- PH LEVEL: -->
                            <h5>7</h5>
                        </td>
                    </tr>
                </table>
                <button style="margin-top: 54px;">NEUTRALIZE</button> <!-- PH LEVEL BUTTON (UNUSED FEATURE) -->
            </div>

            <div class="tank-card">
                <table>
                    <tr>
                        <td><h3>temp<h3></td>
                        <td>
                            <h2>TEMPERATURE</h2>
                            <h5 id="temperatureValue">Loading...</h5> <!-- Use "Loading..." as a placeholder until the value is fetched from the arduino: -->
                        </td>
                    </tr>
                </table>
                <button onclick="readTemperature()" style="margin-top: 54px;">READ TEMPERATURE</button> <!-- READ TEMPERATURE SENSOR BUTTON: -->
            </div>

            <div class="tank-card">
                <table>
                    <tr>
                        <td class="clock-icon" style="width: 20%;">&#x23F1;</td>
                        <td>
                            <h2>FISH FEEDER</h2> <!-- FISH FEEDER: -->
                            <h5>
                                <!--Setting feeding time-->
                                <div class="fish-feeder">
                                    <input type="time" id="feedTimeInput" class="feedFishTimer"><!-- Store Time -->
                                    <button onclick="setFishFeederTimer()" style="width: 120%; display: initial; margin-right: -5px;">SET REMINDER</button> <!-- SET REMINDER FOR FISH FEEDER BUTTON: -->
                                </div>
                                <div class="timer">00:00:00</div>   <!-- COUNTDOWN TIMER: -->
                            </h5>
                        </td>
                    </tr>
                </table>
                <button onclick="sendFeedFishCommandToArduino()">FEED FISH</button> <!-- FEED FISH BUTTON: -->
            </div>
        </div>
    <!-- Using an external javascript file for the buttons and timers: -->
    <script src="validate.js"></script>
</body>
</html>