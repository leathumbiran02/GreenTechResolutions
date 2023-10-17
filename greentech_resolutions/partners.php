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
            .container {
                display: flex;
                width: 96%;
                height: auto;
                justify-content: space-between;
                margin-left: 50px;
                margin-right: 50px;
                margin-bottom: 50px;
            }
            .card{
                background-color: #4C4D5E;
                flex-basis: 30%;
                height: auto;
            }
            h4, h2, span{
                color: white;
                text-align: center; 
                font-size: 20px;
            }
            h2{
                font-weight: bolder;
                padding-top: 20px;
                padding-bottom: 20px;
            }
            h4{
                font-weight: bolder;
                padding-top: 15px;
                margin-bottom: -20px;
            }
            span{
                font-weight: normal;
                display: inline-block;
                float:left;
                padding: 0px 30px;
                padding-bottom: 20px;
            }
            .lightsOutLogo, .woolworthsLogo, .checkersLogo{
                padding-top: 20px;
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

        <h2>PARTNERS</h2>
        
        <div class="container">
            <!-- Woolworths -->
            <div class="card">
                <a href="https://www.woolworthsholdings.co.za/"><img class="woolworthsLogo" src="images/woolworthsLogo.jpg"></a>
                <a href="https://www.woolworthsholdings.co.za/"><h2>WOOLWORTHS</h2></a>
                <span>Is committed to minimizing its environmental impact, promoting responsible sourcing, and supporting sustainable agriculture.</span>
            </div>
            <!-- LightsOut -->
            <div class="card">
                <a href="https://lights-out-south-africa.000webhostapp.com/index.php"><img class="lightsOutLogo" src= "images/lightsOutLogo.jpg"></a>
                <a href="https://lights-out-south-africa.000webhostapp.com/index.php"><h2>LIGHTS OUT</h2></a>
                <span>Lights Out is a company that provides products to businesses and individuals that experience the effects of load-shedding.</span>
            </div>
            <!-- Checkers -->
            <div class="card">
                <a href="https://www.checkers.co.za/our-sustainability-journey"><img class="checkersLogo" src="images/checkersLogo.png"></a>
                <a href="https://www.checkers.co.za/our-sustainability-journey"><h2>CHECKERS</h2></a>
                <span>Places a strong emphasis on sourcing fresh produce and other food products from local suppliers</span>
            </div>
        <div>
    </body>
</html>