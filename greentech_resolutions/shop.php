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
            .productContainer{
                display: flex;
                width: 92%;
                height: auto;
                justify-content: space-between;
                margin-left: 50px;
                margin-right: 50px;
                margin-bottom: 50px;
                text-align: center;
            }
            .productCard{
                background-color: #4C4D5E;
                flex-basis: 32%;
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
                float:center;
                padding-top: 20px;
                padding: 0px 40px;
                padding-bottom: 20px;
            }
            .productImg{
                height: 300px;
                width: 300px;
                margin-left: 5px;
                margin-top: 40px;
                padding-bottom: 20px;
                overflow: auto;
            }
            .button{
                width: 40%;
                padding: 5px 0px;
                cursor: pointer;
                margin: auto;
                background-color:#009414;
                color: #ffffff;
                font-weight: normal;
                font-size: 20px;
                border: 0;
                outline: none;
                margin-top: 1px;
                align: center; 
                margin-bottom: 30px
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
        <h2>PRODUCTS</h2>
        <div class="productContainer">
            <div class="productCard">
                <img class="productImg" src="images/servoMotor.webp" onclick="showComingSoonMessage()">
                <span>HKD Servo Motor MG995 13KG</span>
                <span>R120.87</span>
                <button class="button" onclick="showComingSoonMessage()">Add to Cart</button>
            </div>
            <div class="productCard">
                <img class="productImg" src="images/waterPump.webp" onclick="showComingSoonMessage()">
                <span>Mini DC 3-6V Water 120L/H Brushless Motor Submersible Pump</span>
                <span>R43.99</span>
                <button class="button" onclick="showComingSoonMessage()">Add to Cart</button>
            </div>
            <div class="productCard">
                <img class="productImg" src="images/tempSensor.webp" onclick="showComingSoonMessage()">
                <span>Water proof DS18B20 temperature sensor</span>
                <span>R62.16</span>
                <button class="button" onclick="showComingSoonMessage()">Add to Cart</button>
            </div>
        </div>

        <div class="productContainer">
            <div class="productCard">
                <img class="productImg" src="images/smallServoMotor.jpg" onclick="showComingSoonMessage()">
                <span>SG90 Micro Servo Motor 180 degrees</span>
                <span>R39.00</span>
                <button class="button" onclick="showComingSoonMessage()">Add to Cart</button>
            </div>
            <div class="productCard">
                <img class="productImg" src="images/moistureSensor.webp" onclick="showComingSoonMessage()">
                <span>BMT Soil Moisture Sensor</span>
                <span>R26.00</span>
                <button class="button" onclick="showComingSoonMessage()">Add to Cart</button>
            </div>
            <div class="productCard">
                <img class="productImg" src="images/ledLight.jpg" onclick="showComingSoonMessage()">
                <span>LED 120B 12V N/WPR New 5MT</span>
                <span>R310.98</span>
                <button class="button" onclick="showComingSoonMessage()">Add to Cart</button>
            </div>
        </div>
    <!--Use an external javascript file named validate.js to validate the form:-->
    <script src="validate.js"></script>
    </body>
</html>