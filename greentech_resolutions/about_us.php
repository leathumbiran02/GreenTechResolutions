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
            .card{
                width: 0 auto;
                height: 0 auto ;
                margin: 0 auto;
                /*margin-left: 0 auto;
                margin-right: 0 auto;
                margin-bottom: 0 auto;*/
                padding: 10px;
                border: 3px solid black;
                border-radius: 10px;
                background-color: lightgray; /* Replace 'lightgray' with your preferred shade of gray */
                position: relative;
                perspective: 1000px;
            }
            .card button, td button {
                display: flex;
                align-items: left;
                justify-content: left;
                width: 245px;
                height: 40px;
                background-color: lightgray; 
                color: #000546;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 17px;
                font-weight: bolder;
            }
            .card button:hover, td button:hover{
                color: #09BA20; /* Change to your preferred text color on hover */
                
            }
            .cards-wrapper {
                display: flex;
            }
            .card h2 {
                font-size: 20px;
                text-align: center;
                margin-top: 10px;
                color: #000546; 
            }
            .card h5 {
                font-size: 16px;
                text-align: center;
                margin-bottom: 10px;
                color: #000546; 
            }
            .card h4 {
                font-size: 16px;
                text-align: left;
                margin-bottom: 10px;
                color: #000546; 
            }
        </style>
        <script>
            function toggleReadMore() {

                const moreText = document.getElementById("moreText");
                const readMoreBtn = document.getElementById("readMoreBtn");

                if (moreText.classList.contains("hidden")) {
                    moreText.classList.remove("hidden");
                    readMoreBtn.textContent = "Read Less";
                } else {
                    moreText.classList.add("hidden");
                    readMoreBtn.textContent = "Read More";
                }
            }
        </script>    
    </head>
    <body>
        <header>
            <!-- Including the file that contains the menu: -->
            <?php 
                include 'menu.php';
            ?>
        </header>    
        <div class="cards-container">

            <div class="card">
                <h2>About Us</h2>
                <h4>Welcome to Green Tech Resolution, a company dedicated to sustainability and promoting eco-friendly practices. We aim to create a greener future using technology, education, and innovation.</h4>
                <div class="hidden" id="moreText">
                <h4>
                    We understand the urgent need to address environmental challenges and strive to lead in sustainable solutions. Our mission is to educate and empower individuals about sustainable living and provide them with the tools and knowledge to make a positive impact.
                    Our focus is aquaponics, sustainable power systems as well as sustainable automated systems, a groundbreaking method that combines aquaculture, hydroponics, and technology. We offer aquaponics systems that integrate robotics and automation, providing a seamless and user-friendly experience. Our technology allows for full automation, and a website interface lets users monitor and control their aquaponics system from anywhere, at any time.
                </h4>
                </div>
                <button onclick="toggleReadMore()">Read More</button>
            </div>
            <script src="script.js"></script>
            </div>
        </div>
    </body>
</html>

