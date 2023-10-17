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
            body{ /* Adding a background image to the page: */
                width: 97%;
                /*overflow: hidden; does not allow page to scroll down*/ 
                margin-top: 150px;
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
                font-weight: normal;
                display: inline-block;
                float:center;
                padding: 0px 40px;
                padding-top: 40px
            }
            h2{
                color: white;
                text-align: center; /* Center the text horizontally */
                font-size: 20px;
                font-weight: bolder;
                padding-bottom: 0px;
            }
            .input_field, select{
                width:100%;
                padding: 10px 15px;
                margin: 5px 0;
                outline: none;
                background-color: #252525;
                border:none;
                border-bottom: 1px solid #ffffff;
                font-size: 15px;
            }
            .input_field::placeholder,select {
                color: white;

            }
            .submit_btn{
                width: 45%;
                padding: 5px 0px;
                cursor: pointer;
                display: inline-block;
                margin: auto;
                background-color:#009414;
                color: #ffffff;
                font-weight: normal;
                font-size: 20px;
                border: 0;
                outline: none;
                margin-top: 1px;
                float: center;
            }
        </style>
    </head>
    <body>
        <header> <!-- Including the file that contains the menu: -->
            <?php 
                include 'menu.php';
            ?>
        </header>
        <div class="form_page"> <!-- The body of the page: -->
            <h2>CONNECT WITH US</h2>
            <span> We'd love to hear your feedback or answer any questions that you may have.</span>
            <div class="chat-page-form-box"> <!-- Class used to style the chat form: -->
                <!-- Chat form: -->
                <form class="chat-page-login_input_group" id="chat" name = "chat" action="chat_send_email.php" method="POST" onsubmit = "return(validate_chat_form());">
                    
                    <!-- Full Name: -->
                    <input type = "text" class="input_field" name = "full_name" placeholder = "Full Name"/>

                    <!-- Email Address: -->
                    <input type = "email" class="input_field" name = "email" placeholder = "Email Address"/>

                    <!-- Reason for contacting GreenTech Resolutions: -->
                    <select class="input_field" name="reason" id="reasonSelect" onchange="toggleOtherReason()">

                        <option value="" disabled selected>Reason for contacting</option> <!-- Option 1 (a placeholder message which is disabled): -->
                        <option value="I want to become a supplier for GreenTech Resolutions">I want to become a supplier for GreenTech Resolutions</option> <!-- Option 2: -->
                        <option value="My system stopped working">My system stopped working</option> <!-- Option 3: -->
                        <option value="I don't know how to set up my Aquabot">I don't know how to set up my Aquabot</option> <!-- Option 4: -->
                        <option value="Other">Other</option> <!-- Option 5: -->

                    </select>

                    <!-- Text field that only appears if the user clicks on Other: -->
                    <input type = "text" class="input_field" name = "other_reason" id="otherReasonInput" placeholder = "Reason For Contacting (Please specify)" style="display:none;"/><br><br>
                    
                    <!-- Button to submit the details to the database: -->
                    <button type="submit" name="chat_submit" class="submit_btn">Confirm</button>

                </form>
            </div>
        </div>   
          
        <!--Use an external javascript file named validate.js to validate the form:-->
        <script src="validate.js"></script>
    </body>
</html>