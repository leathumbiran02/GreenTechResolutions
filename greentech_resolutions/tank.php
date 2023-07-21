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
                width: 300px;
                margin: 0 auto;
                margin-bottom: 10px;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 10px; /* Adjust the value to control the roundness of the corners */
                background-color: lightgray; /* Replace 'lightgray' with your preferred shade of gray */
            }
            .card button {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                height: 40px;
                background-color: #000546; 
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            .card button:hover {
                background-color: #fff; /* Change to your preferred background color on hover */
                color: #000546; /* Change to your preferred text color on hover */
                border: 2px solid #000546; /* Add a border on hover, or customize as needed */
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
                    <div class="water-level">
                        <div class="water"></div>
                    </div>
                </td>
                <td>
                    <h2>WATER LEVEL</h2>
                    <h5>50%</h5>
                </td>
            </tr>
            </table>
        <button>FILL TANK</button>
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
                        <h5>7</h5>
                    </td>
                </tr>
            </table>
        <button>FEED FISH</button>
    </div>

</body>
</html>