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
                padding
            }
            .personHoldingPlant {
                max-width: 35%; /* Adjust the image width as needed */
                margin-right: 20px; /* Add some spacing between the image and text */
                height: auto;
                padding: 50px;
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
            }
            .aquaponicsContent{
                background-color: #4C4D5E;
                padding-right:50px;
                padding-left:50px;
                padding-bottom:20px;
                padding-top:30px;/* Space in section above text */
                margin-top:10px;/* Space above section */
            }
            .aquaponicsGallery {
                display: flex;
                justify-content: space-between;
                gap: 1rem; /* Add some gap between images */
            }

            .aquaponicsGallery img {
                max-height: 500px; /* Set a maximum height for all images */
            }

            .galleryImg1,
            .galleryImg2 {
                flex: 1; /* Distribute available space equally between these images */
                width: 35%;
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
                gap: 7rem; /* Add some gap between images */
            }
            .ourTeamFirstCard,
            .ourTeamSsecondCard, 
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
                text-decoration: underline;
            }
        </style>  
    <body>
        <header>
            <!-- Including the file that contains the menu: -->
            <?php 
                include 'menu.php';
            ?>
        </header> 
        <div class="aboutUsSection">
            <img class="personHoldingPlant" src="images/about_us_holding_plant.jpg">
            <div class="aboutUsContent">
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
        <div class="aquaponicsSection">
            <div class="aquaponicsContent">
                <h2>WHAT IS AQUAPONICS</h2>
                <h4><br>Aquaponics is a sustainable farming method that combines
                aquaculture (fish farming) and hydroponics (growing plants in
                water) in a symbiotic system. In an aquaponics system, fish
                waste provides nutrients for the plants, while the plants
                naturally filter the water for the fish.
                <br><br>
                Aquaponics is a sustainable farming method that combines
                aquaculture (fish farming) and hydroponics (growing plants in
                water) in a symbiotic system. In an aquaponics system, fish
                waste provides nutrients for the plants, while the plants
                naturally filter the water for the fish. The fish waste, which
                contains ammonia, is broken down by beneficial bacteria into
                nitrates. These nitrates serve as fertilizer for the plants,
                allowing them to grow without the need for soil. As the plants
                absorb the nutrients, they purify the water, creating a clean
                and healthy environment for the fish. Its advantages are that it
                requires significantly less water compared to conventional
                agriculture, as water is recycled within the system and it
                eliminates the need for chemical fertilizers and pesticides,
                promoting organic and sustainable food production.
            </h4>
            </div>  
        </div>
        <div class="aquaponicsGallery">
            <img class="galleryImg1" src="images/aquaponicsGallery1.jpg" >
            <img class="aquaponicDiagram" src="images/aquaponicsDiagram.JPG" >
            <img class="galleryImg2" src="images/aquaponicsGallery2.JPG" >
        </div>
        <div class="ourTeamSection">
            <h2>OUT TEAM</h2>
            <div class="ourTeamContent">
                <div class="ourTeamFirstCard">
                    <img class="ourPictures" src="images/mackylesPic.png" >
                    <h2><br>MACKYLE NAIDOO</h2>
                    <h4>BSc IT Robotics</h4>
                    <a href="https://www.linkedin.com/in/mackyle-naidoo-15552723b/"><br>Linked in</a>
                    <a href="https://github.com/Kyle1802"><br>GitHub</a>
                </div>
                <div class="ourTeamSecondCard">
                    <img class="ourPictures" src="images/leasPic.png" >
                    <h2><br>LEA THUMBIRAN</h2>
                    <h4>BSc IT Software Engineering</h4>
                    <a href="https://www.linkedin.com/in/lea-t-42b352211/"><br>Linked in</a>
                    <a href="https://github.com/leathumbiran02"><br>GitHub</a>
                </div>
                <div class="ourTeamThirdCard">
                    <img class="ourPictures" src="images/toniPic.jpg" >
                    <h2><br>TONISHA GOVENDER</h2>
                    <h4>BSc IT Software Engineering</h4>
                    <a href="https://www.linkedin.com/in/tonisha-govender-584785219/"><br>Linked in</a>
                    <a href="https://github.com/TonishaGovender"><br>GitHub</a>
                </div>
            </div>
        </div>
        
    </body>
</html>

