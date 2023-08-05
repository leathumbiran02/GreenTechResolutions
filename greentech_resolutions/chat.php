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
            .chat-page-submit_btn{
                border: 3px solid black;
                color:black;
            }
            body{ /* Adding a background image to the page: */
                width: 100%;
                padding: 20px;
                background-image: url(images/contact_us_background.jpg);
                background-position:center;
                background-size:cover;
                background-attachment: fixed;
                /* backdrop-filter: blur(2px); */
            }
            .chat-page-toggle_register_login_btn{
                color: #62f875;
                filter:drop-shadow(1px 1px 3px black);
            }
        </style>
    </head>
    <body>
        <header> <!-- Including the file that contains the menu: -->
            <?php 
                include 'menu.php';
            ?>
        </header>
        <div class="spacing" style="height:80px;"></div>
        <div class="form_page"> <!-- The body of the page: -->
            <div class="center-text"> <!-- Class to center the top heading: -->
                <h1 class="chat-page-toggle_register_login_btn"><br>Chat with us! We'd love to hear your feedback or answer any questions that you may have.</h1><br>
            </div>

            <div class="chat-page-form-box"> <!-- Class used to style the chat form: -->
                <!-- Chat form: -->
                <form class="chat-page-login_input_group" id="chat" name = "chat" action="chat_send_email.php" method="POST" onsubmit = "return(validate_chat_form());">
                    
                    <!-- Full Name: -->
                    <input type = "text" class="chat-page-input_field" name = "full_name" placeholder = "Full Name"/>

                    <!-- Email Address: -->
                    <input type = "email" class="chat-page-input_field" name = "email" placeholder = "Email Address"/>

                    <!-- Reason for contacting GreenTech Resolutions: -->
                    <select class="chat-page-input_field" name="reason" id="reasonSelect" onchange="toggleOtherReason()">

                        <option value="" disabled selected>Reason for contacting</option> <!-- Option 1 (a placeholder message which is disabled): -->
                        <option value="I want to become a supplier for GreenTech Resolutions">I want to become a supplier for GreenTech Resolutions</option> <!-- Option 2: -->
                        <option value="My system stopped working">My system stopped working</option> <!-- Option 3: -->
                        <option value="I don't know how to set up my Aquabot">I don't know how to set up my Aquabot</option> <!-- Option 4: -->
                        <option value="Other">Other</option> <!-- Option 5: -->

                    </select>

                    <!-- Text field that only appears if the user clicks on Other: -->
                    <input type = "text" class="chat-page-input_field" name = "other_reason" id="otherReasonInput" placeholder = "Reason For Contacting (Please specify)" style="display:none;"/><br><br>
                    
                    <!-- Button to submit the details to the database: -->
                    <button type="submit" name="chat_submit" class="chat-page-submit_btn">Confirm</button>

                </form>
            </div>
        </div>   
          
        <!--Use an external javascript file named validate.js to validate the form:-->
        <script src="validate.js"></script>
    </body>
</html>