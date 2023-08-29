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
            .aboutUsSection {
                display: flex;
                align-items: center;
            }

            .personHoldingPlant {
                max-width: 35%; /* Adjust the image width as needed */
                margin-right: 20px; /* Add some spacing between the image and text */
                height: auto;
                padding: 50px;
            }
            .text-content {
                flex: 1; /* Allow the text to take up remaining space */
                margin-left:-40px;
                padding-right:35px;
            }
            @media (max-width: 768px) {
                .aboutUsSection {
                    display: flex;
                    flex-direction: column; /* Change flex direction to column on small screens */
                }
                .personHoldingPlant {
                    max-width: 100%; /* Make the image full width on small screens */
                    margin-right: 0; /* Remove the spacing between the image and text */
                    padding: 50px; /* Adjust padding as needed */
                    padding-bottom: 25px;
                }
                .text-content {
                    flex: 1; /* Allow the text to take up remaining space */
                    margin-left: 0; /* Reset the margin for text content */
                    padding-right: 50px; /* Adjust padding as needed */
                    padding-left: 50px;
                }
            }
            h4, h2{
                color: white;
                text-align: center; /* Center the text horizontally */
                font-size: 20px;
            }
            h2{
                font-weight: bolder;
            }
            h4{
                font-weight: normal;
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
        <div class="aboutUsSection">
            <img class="personHoldingPlant" src="images/about_us_holding_plant.jpg" alt="GreenTechResolutions">
            <div class="text-content">
                <h2>ABOUT US</h2>
                <h4><br>Welcome to GreenTech Resolutions, a company dedicated to
                sustainability and promoting Eco-friendly practices.
                We aim to create a greener future using technology, education
                and, innovation.There is an urgent need to address
                environmental challenges and strive to lead in sustainable
                solutions.
                <br> <br> 
                Our mission is to educate and empower individuals about
                sustainable living and provide them with the tools and knowledge
                to make a positive impact. We offer aquaponics systems that
                integrate robotics and automation, providing a seamless and
                user-friendly experience. Our technology allows for full
                automation and a website interface lets users monitor and
                control their aquaponics system.
                </h4>
            </div>
        </div>
    </body>
</html>

