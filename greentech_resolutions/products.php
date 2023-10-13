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
                float:left;
                padding: 0px 40px;
                padding-bottom: 20px;
            }
            .smallIndoorSystem, .biggerIndoorSystem, .smallOutdoorSystem{
                height: 400px;
                width: 310px;
                margin-left: 5px;
                margin-top: 40px;
            }
            .button{
                width: 45%;
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
            <?php 
                include 'menu.php';
            ?>
        </header>
        <h2>PRODUCTS</h2>
        <div class="productContainer">
            <div class="productCard">
                <img class="smallIndoorSystem" src="images/small-IndoorSystem.jpg">
                <h2>AQUA-BOT 1.0</h2>
                <span>Automated Freshwater Indoor System</span>
                <button class="button">Add to Card</button>
            </div>
            <div class="productCard">
                <img class="biggerIndoorSystem" src="images/bigger-IndoorSystem.jpg">
                <h2>AQUA-BOT 2.0</h2>
                <span>Medium Sized Indoor Freshwater System</span>
                <button class="button">Add to Card</button>
            </div>
            <div class="productCard">
                <img class="smallOutdoorSystem" src="images/small-OutdoorSystem.jpg">
                <h2>OUTDOOR SYSTEM</h2>
                <span>Medium Outdoor Freshwater System</span>
                <button class="button">Add to Card</button>
            </div>
        </div>
    </body>
</html>