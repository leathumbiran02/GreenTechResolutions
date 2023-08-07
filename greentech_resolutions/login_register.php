<!DOCTYPE html>
<html>
    <head>
        <!--Title of Web Page: GreenTechResolutions-->
        <title>GreenTechResolutions</title>

        <!--Using a CSS style sheet for the page-->
        <link rel="stylesheet" href="style.css">

        <style>
            body{ /* Adding a background image to the page: */
                width: 100%;
                background-image: url(images/login_background.jpg);
                background-position:center;
                background-size:cover;
                background-attachment: fixed;
                overflow: hidden;
                margin-top: 80px;
            }
            p{
                margin-top: 20px;
                color: white;
                font-size: 22px;
                font-weight: bold;
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
        <div class="spacing" style="height:150px;"></div>
        <div class="hero">
            <div class="form_page"> <!-- The body of the page: -->
                <div class="form-box"> <!-- The login and register form: -->
                    <div class="register_login_btn_box"> <!-- The buttons that switches between both the login and register form: -->
                        <div id="btn"></div>
                        <button type="button" class="toggle_register_login_btn" onclick="login()">Login</button> <!-- When the Login button is clicked call the login() function: -->
                        <button type="button" class="toggle_register_login_btn" onclick="register()">Sign Up</button> <!-- When the Register button is clicked call the register() function: -->
                    </div>

                    <!--Create a login form for a user to enter their email and password:-->
                    <form class="login_input_group" id="login" name = "login_form" action="user_login.php" method="POST" onsubmit = "return(validate_login());">
                        <!-- Email Address: -->
                        <input type = "email" class="input_field" name = "email" placeholder = "Email Address"/>
                        <!-- Password: -->
                        <input type = "password" class="input_field" name = "password" placeholder = "Password"/><br><br>
                        <!-- Button to submit the details to the database: -->
                        <button type="submit" name="login_submit" class="submit_btn">Login</button>
                    </form>

                    <!--Create a registration form that sends the information to the database:-->
                    <form class = "login_input_group" id="register" name = "register_form" action = "register.php" method = "POST" onsubmit = "return(validate_registration());">
                        <!-- Full Name: -->
                        <input type = "text" class="input_field" name = "full_name" placeholder = "Full Name"/>
                        <!-- Email Address: -->
                        <input type = "email" class="input_field" name = "email" placeholder = "Email Address"/>
                        <!--Password:-->
                        <input type = "password" class="input_field" name = "pass" placeholder = "Password"/>
                        <!-- Confirm Password: -->
                        <input type = "password" class="input_field" name = "confirm_pass" placeholder = "Confirm password"/>
                        <!-- BOT IP:-->
                        <input type = "text" class="input_field" name = "bot_ip" placeholder = "BOT IP"/>
                        <!-- Agree to terms and conditions checkbox -->
                        <input type="checkbox" class="check_box" id="agree_checkbox"><span class="remember_password">I agree to the terms & conditions</span>
                        <!--Button to submit the form:-->
                        <button type="submit" name="register_submit" class="submit_btn">Sign Up</button>       
                    </form>
                </div>
                <footer style="filter:drop-shadow(1px 1px 3px black);"> <!-- Have a terms and conditions appear at the bottom of the page: -->
                    <div class="spacing" style="height:50px;"></div>
                    <div class="center-text">
                        <br><p style="font-size: 24px;"><i>Terms & Conditions: By creating an account you agree to share your full name, email address, and Bot IP with GreenTech Resolutions.</i></p>
                    </div>
                </footer>
            </div>
        </div>   
        <!--Use an external javascript file named validate.js to validate the form:-->
        <script src="validate.js"></script>
    </body>
</html>