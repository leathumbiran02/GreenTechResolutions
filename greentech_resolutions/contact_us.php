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
            .contactUsContainer{
                display: flex;
                width: 92%;
                height: auto;
                justify-content: space-between;
                margin: 0px 50px;
                margin-top: -20px;
                text-align: center;
            }
            p, span{
                color: white;
                font-size: 20px;
                font-weight: normal;
            }
            p{
                margin-top: 15px;
            }
            span{
                margin-top: -10px;
                color: white;
            }
            h2{
                color: white;
                text-align: center; /* Center the text horizontally */
                font-size: 20px;
                font-weight: bolder;
                padding-bottom: 0px;
            }
            
            .addressCard {
                display: flex;
                flex-direction: column;
                align-items: left;
                text-align: left;
                padding-left: 50px;
            }

            .addressItem {
                margin: 10px 0;
                text-align: left !important;
            }

            .addressItem a {
                color: white;
                font-size: 20px;
                text-decoration: none;
                margin-left: 0px;
                padding-left: -1000px;
            }
            .contact-us-form-box {
                background: none;
                border: none;
                border-radius: 0;
                margin: 0;
                padding: 0;
            }

            .contact_us_submit_btn {
                width: 45%;
                padding: 5px 0;
                cursor: pointer;
                display: inline-block;
                margin: 40px 0; /* Fix the margin property here */
                background-color: #009414;
                color: #ffffff;
                font-weight: normal;
                font-size: 20px;
                border: 0;
                outline: none;
                margin-top: 10px;
                text-align: center; /* Center the text horizontally within the button */
            }

            .contact-us-login_input_group{
                margin-top: -110px;
                padding: 0px;
            }
            .map{
                width: 600px;
                height: auto;
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
        <div class="contact-us-register_login_btn_box">
            <button type="button" class="contact-us-toggle_register_login_btn"><h2>CONTACT US<h2></button> 
        </div>
        <div class="contactUsContainer"> <!-- The body of the page: -->
            <div class="addressCard">
                <div class="mapCard">
                    <img class="map" src="images/map.JPG">
                </div>
                <div class="addressInfo">
                    <div class="addressItem">
                        <a href="https://goo.gl/maps/UNgsTJUgLagswkQE6">9 Concorde E Rd, Bedfordview Johannesburg</a>
                    </div>
                    <div class="addressItem">
                        <a href="tel:+27746149038">+27 74 614 9038</a>
                    </div>
                    <div class="addressItem">
                        <a href="mailto:greentechresolutions@gmail.com">greentechresolutions@gmail.com</a>
                    </div>
                </div>
            </div>

            <div class="contact-us-form-box"> 
                <form class="contact-us-login_input_group" id="contact_us" name = "contact_us" action="contact_us_send_email.php" method="POST" onsubmit = "return(validate_contact_us());">
                    <!-- Full Name: -->
                    <input type = "text" class="input_field" name = "full_name" placeholder = "Full Name"/><br>
                    <!-- Email Address: -->
                    <input type = "email" class="input_field" name = "email" placeholder = "Email Address"/><br>
                    <!-- Comments: -->
                    <input type = "text" class="input_field" name = "comments" placeholder = "Comments"/><br>
                    <!-- Button to submit the details to the database: -->
                    <button type="submit" name="contact_us_submit" class="contact_us_submit_btn">Confirm</button>
                </form>
            </div>            
        </div>
        <!--Use an external javascript file named validate.js to validate the form:-->
        <script src="validate.js"></script>
    </body>
</html>