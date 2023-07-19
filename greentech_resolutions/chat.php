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
            p{
                margin-top: 20px;
                color: black;
                font-size: 22px;
                font-weight: bold;
            }
            .form-box{ /* For the form */
                width: 450px;
                height:350px;
                position: relative;
                margin: 0 auto;
                background-color: #CED1D8;
                border-radius: 35px;
                padding: 5px;
                overflow: hidden;
            }
            .register_login_btn_box{
                width: 260px;
                margin: 35px auto;
                position: relative;
                box-shadow: none;
                border-radius: 30px;
            }
            .toggle_register_login_btn{
                padding: 20px 30px;
                cursor: pointer;
                background: transparent;
                border: 0;
                outline: none;
                position: relative;   
                color: #343A54;
                font-weight: bolder;
                font-size: 20px;
                text-transform: uppercase;
            }
            #btn{
                top:0;
                left: 0;
                position: absolute;
                width: 250px;
                height: 100%;
                background: none;
                border-radius: 30px;
                transition: .5s;
            }
            .login_input_group{
                top:30px;
                position: absolute;
                width: 400px;
                transition: .5s;
            }
            .login_input_group input{
                color: #ffffff;
                font-size: 20px;
            }
            .input_field{
                width:100%;
                padding: 10px 15px;
                margin: 5px 20px;
                border-radius: 20px;
                outline: none;
                background-color: #343A54;
                color: #ffffff;
            }
            .submit_btn{
                width: 85%;
                padding: 10px 30px;
                cursor: pointer;
                display: block;
                margin: 0 50px;
                background: linear-gradient(to right, #09BA20, #6cff7f);
                color: #000000;
                font-weight: bolder;
                font-size: 20px;
                border: 0;
                outline: none;
                border-radius: 30px;
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
        <div class="form_page"> <!-- The body of the page: -->
            <div class="center-text">
                <h1 class="toggle_register_login_btn"><br>Chat with us! We'd love to hear your feedback or answer any questions that you may have.</h1>
            </div>

            <div class="form-box"> 
                <form class="login_input_group" id="chat" name = "chat" action="chat_send_email.php" method="POST" onsubmit = "return(validate_chat_form());">
                    <!-- Full Name: -->
                    <input type = "text" class="input_field" name = "full_name" placeholder = "Full Name"/>
                    <!-- Email Address: -->
                    <input type = "email" class="input_field" name = "email" placeholder = "Email Address"/>
                    <!-- Reason for contacting GreenTech Resolutions: -->
                    <select class="input_field" name="reason" id="reasonSelect" onchange="toggleOtherReason()">
                        <option value="" disabled selected>Reason for contacting</option>
                        <option value="I want to become a supplier for GreenTech Resolutions">I want to become a supplier for GreenTech Resolutions</option>
                        <option value="My system stopped working">My system stopped working</option>
                        <option value="I don't know how to set up my Aquabot">I don't know how to set up my Aquabot</option>
                        <option value="Other">Other</option>
                    </select>
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