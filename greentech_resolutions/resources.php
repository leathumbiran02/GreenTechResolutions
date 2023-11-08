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
            /*About us section*/
            .aboutUsSection {
                display: flex;
                align-items: center;
            }
            .personHoldingPlant {
                max-width: 70%; /* Adjust the image width as needed */
                margin-right: 20px; /* Add some spacing between the image and text */
                height: auto;
                padding: 25px;
            }
            .aboutUsContent {
                flex: 1; /* Allow the text to take up remaining space */
                margin-left:-40px;
                padding-right:50px;
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
                .aboutUsContent {
                    flex: 1; /* Allow the text to take up remaining space */
                    margin-left: 0; /* Reset the margin for text content */
                    padding-right: 50px; /* Adjust padding as needed */
                    padding-left: 50px;
                    padding-bottom: 20px;
                }
            }
            /*Aquaponics section*/
            .aquaponicsSection{
                background-color: #4C4D5E;
                padding-bottom: 20px;
                margin-left: 50px;
                margin-right: 50px;
                margin-bottom: 50px;
            }
            .aquaponicsContent{
                background-color: #4C4D5E;
                padding-right:50px;
                padding-left:50px;
                padding-bottom:20px;
                padding-top:30px;/* Space in section above text */
                margin-top:5px;/* Space above section */
            }
            .aquaponicsGallery {
                display: flex;
                justify-content: space-between;
                gap: 0px; /* Add some gap between images */
                margin-bottom: 50px;
            }

            .aquaponicsGallery img {
                max-height: 500px; /* Set a maximum height for all images */
            }

            .galleryImg1,
            .galleryImg2 {
                flex: 1; /* Distribute available space equally between these images */
                width: 30%;
                max-width: none; /* Remove the max-width restriction to allow bigger width */
                max-height: none; /* Allow the image to use its natural height */
            }

            .aquaponicDiagram {
                max-width: 30%; /* Adjust as needed */
                height: auto;
            }
            @media (max-width: 768px) {
            /* Apply these styles when screen width is 768px or smaller */
                .aquaponicsGallery {
                    flex-direction: column; /* Stack images vertically */
                    align-items: center; /* Center align images horizontally */
                }

                .aquaponicsGallery img {
                    width: 100%; /* Make images take full width of the container */
                }

                .aquaponicDiagram {
                    max-width: 50%; /* Adjust as needed for better layout */
                }
            }
            .ourTeamSection{
                padding-top:30px;
                padding-bottom:30px;
                text-align: center;
            }
            .ourTeamContent{
                padding-top:20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 0rem; /* Add some gap between images */
            }
            .ourTeamFirstCard,
            .ourTeamSecondCard, 
            .ourTeamThirdCard {
                width: 30%;
                height: 450px;
                background-color: #4C4D5E;
                border: none;
                display: block;
                justify-content: center;
                align-items: center;
                text-align: center;
            }
            .ourTeamFirstCard{
                margin-left:50px;
            }
            .ourTeamThirdCard{
                margin-right:50px;
            }
            .ourPictures {
                width: 250px; /* Adjust the image size as needed */
                height: auto;
                border-radius: 50%;
                padding-top: 20px;
            }
            @media (max-width: 768px) {
                .ourTeamContent {
                    display: flex;
                    flex-wrap: wrap; /* Allow cards to wrap to the next row when needed */
                    padding-top:0px;
                }
                .ourTeamFirstCard, .ourTeamSecondCard, .ourTeamThirdCard {
                    margin: 0px;
                    display: block;
                    flex: 0 0 100%; /* Make each card occupy 100% of the container width on small screens */
                    max-width: 100%;
                }
                .ourTeamFirstCard{
                    margin-top: 30px;
                }
                .ourTeamSecondCard, .ourTeamThirdCard {
                    margin-top: -60px;
                }
            }
            .chooseUsSection{
                padding-top:30px;
                padding-bottom:30px;
                text-align: center;
                margin-left:50px;
                margin-right:50px;
            }
            .chooseUsFirstRow, .chooseUsSecondtRow
            {
                padding-top:20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 2rem; /* Add some gap between images */
            }
            .chooseUsFirstCard, .chooseUsSecondCard, .chooseUsThirdCard{
                width: 30%;
                height: 290px;
                border: none;
                display: block;
                justify-content: center;
                align-items: center;
                text-align: center;
            }       
            .chooseUs1, .chooseUs2, .chooseUs3, .chooseUs4, .chooseUs5, .chooseUs6{
                width: 300px;
                height: auto;
                padding-bottom:10px;
            }
            @media (max-width: 768px) {
                .chooseUsFirstRow, .chooseUsSecondtRow {
                    display: flex;
                    flex-wrap: wrap; /* Allow cards to wrap to the next row when needed */
                    padding-top:0px;
                }
                .chooseUsFirstCard, .chooseUsSecondCard, .chooseUsThirdCard {
                    margin: 0px;
                    display: block;
                    flex: 0 0 100%; /* Make each card occupy 100% of the container width on small screens */
                    max-width: 100%;
                    margin:0px;
                    padding:0px;
                    margin-bottom: -20px;
                }
            }
            h4, h2, a{
                color: white;
                text-align: center; /* Center the text horizontally */
                font-size: 20px;
            }
            h2{
                font-weight: bolder;
            }
            h4, a{
                font-weight: normal;
            }
            a {
                text-decoration: none;
            }
        </style>  
    <body>
        <header>
            <!-- Including the file that contains the menu: -->
            <?php 
                include 'menu.php';
            ?>
        </header> 
        <div class="chooseUsSection">
            <h2>MODEL<br></h2>
            <div class="chooseUsContent">
            <img class="personHoldingPlant" src="images/SketchUp.png">
            </div>
        </div>
        <div class="chooseUsSection">
            <h2>SCHEMATICS DIAGRAM<br></h2>
            <div class="chooseUsContent">
            <img class="personHoldingPlant" src="images/resources/schematics.png">
            </div>
        </div>
        <div class="chooseUsSection">
            <h2>TOOLS AND TECHNOLOGY STACK<br></h2>
            <div class="chooseUsContent">
            <img class="personHoldingPlant" src="images/Tech Stack.png">
            </div>
        </div>
        <div class="chooseUsSection">
            <h2>NETWORK CONNECTION DIAGRAM<br></h2>
            <div class="chooseUsContent">
            <img class="personHoldingPlant" src="images/NetworkDiagram.png">
            </div>
        </div>
        <div class="chooseUsSection">
            <h2>ENHANCED ENTITY RELATIONSHIP DIAGRAM (EERD)<br></h2>
            <div class="chooseUsContent">
            <img class="personHoldingPlant" src="images/resources/eerd.png">
            </div>
        </div>
        <div class="chooseUsSection">
            <h2>BUDGET<br></h2>
            <div class="chooseUsContent">
            <img class="personHoldingPlant" src="images/resources/budget.png">
            </div>
        </div>
        <div class="chooseUsSection">
            <h2>GANTT CHART<br></h2>
            <div class="chooseUsContent">
            <img class="personHoldingPlant" src="images/GanttChart.jpg">
            </div>
        </div>
        <div class="chooseUsSection">
            <h2>BURNDOWN CHART<br></h2>
            <div class="chooseUsContent">
            <img class="personHoldingPlant" src="images/burndown.png">
            </div>
        </div>
    </body>
    <footer>
        <?php 
            include 'footer.php';
        ?>
    </footer>
</html>

