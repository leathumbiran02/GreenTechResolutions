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
            /* Ensure that the table and its cells take the full width of the container */
            table {
                width: 100%;
            }
            
            td {
                width: 33.33%; /* Divide the table width into equal parts for each cell */
            }
            
            /* Set the card class styles */
            .card {
                
                padding: 10px; /* Reduce the padding to make the cards smaller */
                position: relative;
                width: 333px; /* Adjust the size as needed */
                height: 333px; /* Adjust the size as needed */
                perspective: 1000px; /* Create the 3D effect */
            }

            .flip-card-inner {
                position: relative;
                width: 333px; /* Adjust the size as needed */
                height: 333px; /* Adjust the size as needed */
                transform-style: preserve-3d; /* Enable 3D transformations for inner elements */
                transition: transform 0.5s; /* Add a smooth transition */
            }
            
            /* Set the image styles inside the cards */
            .card img {
                width: 333px; /* Set a fixed width for the images, adjust as needed */
                height: 333px; /* Set a fixed height for the images, adjust as needed */
                object-fit: cover; /* Maintain aspect ratio and cover the entire space */
            }
            
            /* Optional: Center the images vertically if needed */
            .card img {
                display: block;
                margin: 0 auto;
            }

            .front, .back {
                position: absolute;
                width: 100%;
                height: 100%;
                backface-visibility: hidden; /* Hide the backface of the card */
            }

            .front {
                transform: rotateY(0deg); /* Show the front side of the card */
            }

            .back {
                transform: rotateY(180deg); /* Initially hide the back side of the card */
                text-align: center;
                padding: 20px;
                background-color: #f1f1f1;
                color: black; /* Set the text color to black */
                font-size: 14px; /* Adjust the font size as needed */
                border-radius: 5px;
            }

            /* Show the back side of the card on hover */
            .card:hover .front {
                transform: rotateY(-180deg);
            }

            .card:hover .back {
                transform: rotateY(0deg);
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