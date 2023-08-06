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

            .hidden {
                display: none;
            }
            body {
                height: 100vh;
                display: flex;
                justify-content: center; /* Center horizontally */
                align-items: center;
                perspective: 1000px;
                transform-style: preserve-3d;
                position: relative;
                background-color: white;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                background-image: url(images/about_us_background.jpg);
                background-position:center;
                background-size:cover;
                background-attachment: fixed;
                backdrop-filter: blur(2px);
            }
            
            .container {
                min-width: 80%;
                min-height: 420px;
                border-radius: 20px;
                position: relative;
                transition: 1.5s ease-in-out;
                transform-style: preserve-3d;
                display: flex; /* Use flexbox */
                justify-content: center; /* Center content horizontally */
                align-items: center;
                margin-top: 0px;
            }

            .side {
                position: absolute;
                text-align: center;
                width: 100%;
                height: 100%;
                padding: 0px 0px;
                color: white;
                backface-visibility: hidden;
                border-radius: 20px;
            }

            .content {
                transform: translatez(70px) scale(0.8);
                line-height: 1.5em;
                padding: 0px 0px; 
                min-width: 80%;
                height: auto;
                transform-style: preserve-3d;
                position: relative; /* Use position: absolute; */
                top: 50%; /* Vertically center */
                left: 50%; /* Horizontally center */
                transform: translate(-50%, -50%);
                background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent gray background */
                backdrop-filter: blur(5px);
            }
            .content h2 {
                position: relative;
                font-size: 25px;
                text-align: center;
                color: white;
                border-radius: 10px;
                padding: 10px;
                margin-bottom: 0;  
            }
            .content h4 {
                margin-top: 0px;
                line-height: 2em;
                font-size: 20px;
                text-align: center;
                margin-bottom: 10px;
                color: white;
                border-radius: 10px;
                padding: 0px;
                font-weight: normal;
                padding-bottom: 0px;
            }
            .front {
                z-index: 2;
                background-size: cover;
            }

            .back {
                background-color: white;
                transform: rotateY(180deg);
                z-index: 0;
                padding-top: 10px;
                background-size: cover;
            }

            .aboutUsFront, .aboutUsBack{
                background-image: url(https://image.slidesdocs.com/responsive-images/background/green-science-technology-agriculture-farmland-powerpoint-background_d6a0dcbc2c__960_540.jpg);
            }
            .aquaponicsFront{
                background-image: url(https://worldwaterreserve.com/wp-content/uploads/2018/11/Small-aquaponics-system-on-wooden-table-art.jpg);
            }
            .aquaponicsBack{
                background-image: url(images/whatIsAquaponics.png);
            }
            
            .container button {
                display: center;
                align-items: center;
                justify-content: center;
                width: 245px;
                height: 40px;
                background-color: transparent; 
                color: #09BA20;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 17px;
                font-weight: bolder;
                padding-top: 0px;
                padding-bottom: 20px;
            }

            form {
                text-align: left;
            }

            .back h2 {
                margin: 0;
            }
            /* my button style  */
            .white-mode {
                text-decoration: none;
                padding: 7px 10px;
                background-color: white;
                border-radius: 3px;
                color: white;
                transition: 0.35s ease-in-out;
                position: fixed;
                left: 15px;
                bottom: 15px;
            }

            .white-mode:hover {
                background-color: white;
                color: white;
            }
            table {
                width: 80%;
                margin-top: 500px; /* Adjust the margin to move the table lower down */
                border-collapse: collapse;
            }
            td {
                padding: 5px; /* Adjust the padding to reduce space between td elements */
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
            <tr>
                <td>
                    <div class="spacing" style="margin-top:-50px;"></div> 
                    <div class="container" id ="aboutUsID">
                        <div class="front aboutUsFront side">
                            <div class="content">
                                <h2>About Us</h2> <!-- Changed from h1 to h2 -->
                                <h4>Welcome to GreenTech Resolutions, a company dedicated to sustainability and promoting eco-friendly practices. We aim to create a greener future using technology, education and, innovation.</h4> <!-- Changed from p to h4 -->
                                <button onclick="flipCardBack('aboutUsID')">Read More</button>
                            </div>
                        </div>
                        <div class="back aboutUsBack side">
                            <div class="content">
                                <h4>There is an urgent need to address environmental challenges and strive to lead in sustainable solutions. Our mission is to educate and empower individuals about sustainable living and provide them with the tools and knowledge to make a positive impact.

                                We offer aquaponics systems that integrate robotics and automation, providing a seamless and user-friendly experience. Our technology allows for full automation, and a website interface lets users monitor and control their aquaponics system.
                                </h4> 
                                <button onclick="flipCard('aboutUsID')">Read Less</button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="container" id="aquaponics">
                        <div class="front aquaponicsFront side">
                            <div class="content">
                                <h2>What is Aquaponics?</h2> 
                                <h4>Aquaponics is a sustainable farming method that combines aquaculture (fish farming) and hydroponics (growing plants in water) in a symbiotic system. In an aquaponics system, fish waste provides nutrients for the plants, while the plants naturally filter the water for the fish.
                                The fish waste, which contains ammonia, is broken down by beneficial bacteria into nitrates. These nitrates serve as fertilizer for the plants, allowing them to grow without the need for soil. As the plants absorb the nutrients, they purify the water, creating a clean and healthy environment for the fish.
                                Its advantages are that it requires significantly less water compared to conventional agriculture, as water is recycled within the system and it eliminates the need for chemical fertilizers and pesticides, promoting organic and sustainable food production.
                                </h4> 
                                <button onclick="flipCardBack('aquaponics')">View Process</button>
                            </div>
                        </div>
                        <div class="back aquaponicsBack side" id="aquaponics">
                            <div class="content" style = "background-color: rgba(0, 0, 0, 0); top: 98%;">
                                <button onclick="flipCard('aquaponics')">Back</button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <script>
        function flipCardBack(containerID) {
            var container = document.querySelector('#' + containerID);
            container.style.transform = 'rotateY(180deg)';
        }
        function flipCard(containerID) {
            var container = document.querySelector('#' + containerID);
            container.style.transform = 'rotateY(0deg)';
        }
    </script>
    </body>
</html>

