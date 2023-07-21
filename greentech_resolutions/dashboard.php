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
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 10px; /* Adjust the value to control the roundness of the corners */
                background-color: lightgray; /* Replace 'lightgray' with your preferred shade of gray */
            }
            .card h2 {
                font-size: 20px;
                margin-top: 10px;
            }
            .card h5 {
                font-size: 16px;
                margin-bottom: 10px;
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
        </style>
    </head>
    <body>
        <header>
            <!-- Including the file that contains the menu: -->
            <?php 
                include 'menu.php';
            ?>
        </header>
        
        <center>
        <h2>NOTIFICATIONS</h2>
        </center>

        <div class="card">
            <table>
            <tr>
                <td><div class="water-level">
                        <div class="water"></div>
                </div></td>
                <td><h2>Water Level</h2>
                    <h5>50%</h5></td><
                
            </tr>
            </table>
        </div>
    </body>
</html>