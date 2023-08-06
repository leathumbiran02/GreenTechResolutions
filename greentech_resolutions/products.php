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
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
                background-color: white;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                background-image: url(https://img.freepik.com/free-vector/background-gradient-green-tones_23-2148360340.jpg?w=740&t=st=1691328607~exp=1691329207~hmac=ff61b043e7e12160cc6dc24d7e96b8f5a4c24750925d0c9d8cad38aca6eff884);
                background-position:center;
                background-size:cover;
                background-attachment: fixed;
            }

            .container {
                width: 80%;
                min-height: 350px;
                border-radius: 20px; /* Set only the top-left and top-right corners to create a curved top border */
                position: relative;
                /* Removed transition and transform-style */
                display: flex;
                justify-content: center;
                align-items: center;
                margin-left: 27px;
                background-size: cover;
            }
            .side {
                /* Removed position and backface-visibility */
                text-align: center;
                width: 100%;
                height: 100%;
                padding: 0px 0px;
                color: white;
                border-radius: 20px;
                border-radius: 10px 10px 0 0;
            }

            .content {
                line-height: 1.5em;
                padding: 0px 0px;
                height: auto;
                width: 80%;
                margin-left: 27px;
                position: relative;
                background-color: rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(5px);
                padding-top: 0;
                border-radius: 0 0 10px 10px;
                display: flex;
                flex-direction: column; /* Make the child elements stack vertically */
                justify-content: center; /* Center the content vertically */
                align-items: center; /* Center the content horizontally */
            }

            .content h2,
            h2 {
                position: relative;
                font-size: 25px;
                text-align: center;
                color: white;
                border-radius: 10px;
                padding: 10px;
                margin-bottom: 0;  
            }

            .content h4,
            h4 {
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

            .content button {
                display: block;
                width: 245px;
                height: 40px;
                background-color: transparent; 
                color: #09BA20;
                border: none;
                cursor: pointer;
                font-size: 17px;
                font-weight: bolder;
                margin-top: 20px;
                margin: 0px;
                text-align: center;
            }

            table {
                width: 90%;
                margin-top: 100px;
                border-collapse: collapse;
            }

            td {
                width: 30%; 
                padding: 5px;
            }
            .front {
                z-index: 2;
                background-size:100% 100%;
            }
            .indoor {
                background-image: url(images/small-IndoorSystem.jpg);
            }

            .biggerIndoor {
                background-image: url(https://i.pinimg.com/564x/7e/26/78/7e267824b2b1e7be78093732af6fb0ea.jpg);
            }

            .outdoor {
                background-image: url(https://i.pinimg.com/564x/4e/a2/3c/4ea23c2fc163acdb063ec896b1fbc441.jpg);
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
                    <div class="container" >
                        <div class="front indoor side">
                        </div>
                    </div>
                    <div class="content">
                        <h2>INDOOR SYSTEM</h2>
                        <button>Read More</button>
                    </div>
                </td>
                <td>
                    <!-- LightsOut -->
                    <div class="container">
                        <div class="front biggerIndoor side">
                        </div>
                    </div>
                    <div class="content">
                        <h2>INDOOR SYSTEM</h2>
                        <button>Read More</button>
                    </div>
                </td>
                <td>
                    <!-- Checkers -->
                    <div class="container" >
                        <div class="front outdoor side">
                        </div>
                    </div>
                    <div class="content">
                        <h2>OUTDOOR SYSTEM</h2>
                        <button>Read More</button>
                    </div>
                </td>
            </tr>
        </table>
        <script>
            
        </script>
    </body>
</html>