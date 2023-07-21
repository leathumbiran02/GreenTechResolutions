<?php
    //Starting the session so we can check if the user is logged in:
    session_start();
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
        </style>
    </head>
    <body>
        <header>
            <!-- Including the file that contains the menu: -->
            <?php 
                include 'menu.php';
            ?>
        </header>
        
        <table>
    <!-- First column -->
    <tr>
        <td>
            <!-- Card 1: Freshwater Indoor System -->
            <div class="card">
                <!-- Front of the card -->
                <div class="front">
                    <img src="images/indoorSystem1.JPG" alt="freshwater indoor system">
                </div>
                <!-- Back of the card -->
                <div class="back">
                    <p>Freshwater Indoor System</p>
                    <p>The Aqua-Bot Freshwater system is a fully automated and web-controlled setup designed for freshwater aquariums and aquaponic systems. Key features include remote control and monitoring through a web application, support for freshwater fish and plants with optimal conditions, automated feeding, aquatic plant management, error notifications, and integration with an aquaponic setup. It offers convenience, automation, and comprehensive control for maintaining a freshwater aquarium, making it an efficient solution for fish and plant enthusiasts.</p>
                    <button class="more-info-btn">More Info</button>
                </div>
            </div>
        </td>

        <!-- Second column -->
        <td>
            <!-- Card 2: Freshwater Outdoor System -->
            <div class="card">
                <!-- Front of the card -->
                <div class="front">
                    <img src="images/outdoorSystem2.JPG" alt="freshwater outdoor system">
                </div>
                <!-- Back of the card -->
                <div class="back">
                    <p>Freshwater Outdoor System</p>
                    <button class="more-info-btn">More Info</button>
                </div>
            </div>
        </td>

        <!-- Third column -->
        <td>
            <!-- Card 3: Saltwater Indoor System -->
            <div class="card">
                <!-- Front of the card -->
                <div class="front">
                    <img src="images/indoorSystem2.JPG" alt="saltwater indoor system">
                </div>
                <!-- Back of the card -->
                <div class="back">
                    <p>Saltwater Indoor System</p>
                    <p>The Aqua-Bot Marine system is a fully automated and web-controlled setup designed for marine aquariums. It offers remote control through a web application and ensures optimal conditions for marine fish and coral. With features like automated feeding, coral and reef maintenance, water quality monitoring, error notifications, and additional options like automated water changes and advanced filtration integration, it provides marine enthusiasts with a convenient and comprehensive solution for managing their aquariums.</p>
                    <button class="more-info-btn">More Info</button>
                </div>
            </div>
        </td>
    </tr>
</table>


    </body>
</html>