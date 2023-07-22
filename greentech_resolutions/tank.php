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

    <script>
        window.addEventListener("DOMContentLoaded", function () {
            // Send an AJAX request to the server to get the timer value
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "get_timer.php", true);
            xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                let timerValue = xhr.responseText;
                if (timerValue) {
                    // If timerValue is not empty, set the timer with the fetched value
                    startTimer(timerValue);
                    // Also set the value in the input field
                    let feedTimeInput = document.getElementById("feedTimeInput");
                    let feedTime = new Date(parseInt(timerValue));
                    let hours = String(feedTime.getHours()).padStart(2, "0");
                    let minutes = String(feedTime.getMinutes()).padStart(2, "0");
                    feedTimeInput.value = `${hours}:${minutes}`;
                }
            }
        };
        xhr.send();
        });

        // Global variable to hold the timer interval ID
        let timerInterval;

        // Function to update the timer based on the fetched value
        function updateTimerWithFetchedValue(timerValue) {
            let currentTime = new Date().getTime();
            let remainingTime = timerValue - currentTime;

            if (remainingTime < 0) {
                // Timer has ended
                clearInterval(timerInterval);
                document.querySelector(".timer").textContent = "Time's up!";
            } else {
                let hours = Math.floor(remainingTime / (1000 * 60 * 60));
                let minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                // Display the timer
                document.querySelector(".timer").textContent = hours + ":" + minutes + ":" + seconds;

                // Clear the previous timer interval if it exists
                clearInterval(timerInterval);

                // Start the timer
                timerInterval = setInterval(function() {
                    updateTimerWithFetchedValue(timerValue);
                }, 1000); // Update every second
            }
        }

        // Timer function
        function startTimer(targetTime) {
            function updateTimer() {
                let currentTime = new Date().getTime();
                let remainingTime = targetTime - currentTime;

                if (remainingTime < 0) {
                    // Timer has ended
                    clearInterval(timerInterval);
                    document.querySelector(".timer").textContent = "Time's up!";
                } else {
                    let hours = Math.floor(remainingTime / (1000 * 60 * 60));
                    let minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                    let seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

                    hours = hours < 10 ? "0" + hours : hours;
                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    // Display the timer
                    document.querySelector(".timer").textContent = hours + ":" + minutes + ":" + seconds;
                }
            }

            //Call the updateTimer immediately to show the initial timer value:
            updateTimer();

            // Clear the previous timer interval if it exists
            clearInterval(timerInterval);

            updateTimer(); // Update immediately to avoid the initial 1-second delay
            timerInterval = setInterval(updateTimer, 1000); // Update every second
        }

        // Function to set the fish feeder timer based on user input
        function setFishFeederTimer() {
            let feedTimeInput = document.getElementById("feedTimeInput").value;
            let currentTime = new Date();
            let feedTime = new Date(currentTime.toDateString() + " " + feedTimeInput);

            // If the user has selected a time in the past, set the timer for the next day
            if (feedTime.getTime() <= currentTime.getTime()) {
                feedTime.setDate(feedTime.getDate() + 1);
            }

            // Calculate the time difference in milliseconds
            let timerDuration = feedTime.getTime() - currentTime.getTime();

            // Start the timer
            startTimer(feedTime.getTime());

            // Store the timer value in LocalStorage
            localStorage.setItem("fishFeederTimer", feedTime.getTime());

            //Send an AJAX request to the server to update the database
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "update_timer.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Request successful:
                    let updatedTimerValue = xhr.responseText; //Get the response from update_timer.php:
                    if(updatedTimerValue){
                        //Update the timer with the updated value:
                        updateTimerWithFetchedValue(parseInt(updatedTimerValue));
                    }
                }
            };

            xhr.send("timerValue=" + feedTime.getTime());
        }

        // Add an event listener to fetch the timer value and update the timer once the page is loaded
        window.addEventListener("load", function() {
            // Check if the timer value is stored in LocalStorage
            let storedTimerValue = localStorage.getItem("fishFeederTimer");
            if (storedTimerValue) {
                // If the timer value is found in LocalStorage, update the timer with the stored value
                updateTimerWithFetchedValue(parseInt(storedTimerValue));
            } else {
                // If the timer value is not found in LocalStorage, fetch it from the server
                let xhr = new XMLHttpRequest();
                xhr.open("GET", "get_timer.php", true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        let timerValue = parseInt(xhr.responseText);
                        if (!isNaN(timerValue)) {
                            // Update the timer with the fetched value
                            updateTimerWithFetchedValue(timerValue);
                            // Store the fetched value in localStorage
                            localStorage.setItem("fishFeederTimer", timerValue);
                        }
                    }
                };
                xhr.send();
            }
        });
    </script>
</body>
</html>