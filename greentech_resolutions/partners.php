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
            } .hidden {
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
            }

            .container {
                width: 100%;
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
                transform: translatez(0px) scale(0.9);
                line-height: 1.5em;
                padding: 0px 0px; 
                width: 100%;
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
                background-size:100% 100%;
            }

            .back {
                background-color: white;
                transform: rotateY(180deg);
                z-index: 0;
                padding-top: 10px;
                background-size:100% 100%;
            }

            .woolworthsFront,
            .woolworthsBack{
                background-size:105% 125%;
                background-image: url(https://seeklogo.com/images/W/woolworths-logo-15149EA470-seeklogo.com.png);
            }
            .checkersFront,
            .checkersBack{
                background-image: url(images/checkersLogo.png);
            }
            .lightsOutFront,
            .lightsOutBack{
                background-image: url(images/lightsOutLogo.jpg);
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
                width: 100%;
                margin-top: 0px; /* Adjust the margin to move the table lower down */
                border-collapse: collapse;
            }
            td {
                width: 30%; 
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
                    <!-- Woolworths -->
                    <div class="container" id="woolworthsID">
                        <div class="front woolworthsFront side">
                            <div class="content">
                                <h2>WOOLWORTHS</h2>
                                <h4>Is committed to minimizing its environmental impact, promoting responsible sourcing, and supporting sustainable agriculture.</h4>
                                <button onclick="flipCardBack('woolworthsID')">Read More</button>
                            </div>
                        </div>
                        <div class="back woolworthsBack side">
                            <div class="content">
                                <h4>Woolworths Foods is a leading retail chain that places a strong emphasis on sustainability and eco-friendliness in its operations and product offerings. The company is committed to minimizing its environmental impact, promoting responsible sourcing, and supporting sustainable agriculture.</h4> 
                                <button onclick="flipCard('woolworthsID')">Read Less</button>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <!-- LightsOut -->
                    <div class="container" id="lightsOut">
                        <div class="front lightsOutFront side">
                            <div class="content">
                                <h2>LIGHTS OUT</h2>
                                <h4>Lights Out is a company that provides products to businesses and individuals that experience the effects of load-shedding.</h4>
                                <button onclick="flipCardBack('lightsOut')">Read More</button>
                            </div>
                        </div>
                        <div class="back lightsOutBack side">
                            <div class="content">
                                <h4>Lights Out is a company that provides products to businesses and individuals that experience the effects of load-shedding.</h4> 
                                <button onclick="flipCard('lightsOut')">Read Less</button>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <!-- Checkers -->
                    <div class="container" id="checkers">
                        <div class="front checkersFront side">
                            <div class="content">
                                <h2>CHECKERS</h2>
                                <h4>Places a strong emphasis on sourcing fresh produce and other food products from local suppliers, which helps reduce carbon emissions linked to long-distance transportation.</h4>
                                <button onclick="flipCardBack('checkers')">Read More</button>
                            </div>
                        </div>
                        <div class="back checkersBack side">
                            <div class="content">
                                <h4>Checkers is a retail chain that prioritizes sustainability and eco-friendliness in their product offerings by supporting local farmers and promoting sustainable agriculture. They place a strong emphasis on sourcing fresh produce and other food products from local suppliers, which helps reduce carbon emissions linked to long-distance transportation.</h4> 
                                <button onclick="flipCard('checkers')">Read Less</button>
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