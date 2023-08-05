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
            .hero{ 
                backdrop-filter: blur(5px);
            }
            body{ /* Adding a background image to the page: */
                width: 100%;
                background-image: url(images/contact_us_background.jpg);
                background-position:center;
                background-size:cover;
                background-attachment: fixed;
                overflow: hidden;
                margin-top: 80px;
            }
            p{
                margin-top: 20px;
                color: black;
                font-size: 22px;
                font-weight: bold;
            }
            a{
                color: #62f875;
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
        <div class="hero">
            <div class="form_page"> <!-- The body of the page: -->
                <div class="center-text">
                    <h1 class="contact-us-toggle_register_login_btn" style="color:white; filter:drop-shadow(1px 1px 3px black);">Contact Us:</h1>
                    <h3 class="contact-us-toggle_register_login_btn" style="color:white; filter:drop-shadow(1px 1px 3px black);">Head Office Address: <a href="https://goo.gl/maps/UNgsTJUgLagswkQE6">9 Concorde E Rd, Bedfordview Johannesburg</a><br><br> Phone Number: <a href="tel:+27746149038">+27 74 614 9038</a><br><br> Email Address: <a href="mailto:greentechresolutions@gmail.com">greentechresolutions@gmail.com</a><br></h3>
                </div>


                <div class="contact-us-form-box"> 
                    <div class="contact-us-register_login_btn_box">
                        <button type="button" class="contact-us-toggle_register_login_btn">Leave A Comment</button> 
                    </div>

                    <form class="contact-us-login_input_group" id="contact_us" name = "contact_us" action="contact_us_send_email.php" method="POST" onsubmit = "return(validate_contact_us());">
                        <!-- Full Name: -->
                        <input type = "text" class="contact-us-input_field" name = "full_name" placeholder = "Full Name"/>
                        <!-- Email Address: -->
                        <input type = "email" class="contact-us-input_field" name = "email" placeholder = "Email Address"/>
                        <!-- Comments: -->
                        <input type = "text" class="contact-us-input_field" name = "comments" placeholder = "Comments"/><br><br>
                        <!-- Button to submit the details to the database: -->
                        <button type="submit" name="contact_us_submit" class="contact-us-submit_btn">Confirm</button>
                    </form>
                </div>
                <footer style="filter:drop-shadow(1px 1px 3px black); margin-top:-50px;"> <!-- Have a notice appear at the bottom of the page: -->
                    <div class="spacing" style="height:130px;"></div>
                    <div class="center-text">
                        <br><p style="color:white; font-size: 24px;"><i>Notice: All requests will be handled during working hours (8am-5pm) from Monday to Friday.</i></p>
                    </div>
                </footer>
            </div>
        </div>
        <!--Use an external javascript file named validate.js to validate the form:-->
        <script src="validate.js"></script>
    </body>
</html>