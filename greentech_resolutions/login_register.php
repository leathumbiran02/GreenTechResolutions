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
                /*overflow: hidden; does not allow page to scroll down*/ 
                margin-top: 20px;
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
            }
            h2{
                color: white;
                text-align: center; /* Center the text horizontally */
                font-size: 20px;
                font-weight: bolder;
                padding-bottom: 0px;
            }
            .toggle_register_login_btn{
                margin-left: -27px;
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
                <div class="form-box"> <!-- The login and register form: -->
                    <!--Create a login form for a user to enter their email and password:-->
                    <form class="login_input_group" id="login" name = "login_form" action="user_login.php" method="POST" onsubmit = "return(validate_login());">
                        <h2>LOGIN</h2>
                        <!-- Email Address: -->
                        <input type = "email" class="input_field" name = "email" placeholder = "Email Address"/>
                        <!-- Password: -->
                        <input type = "password" class="input_field" name = "password" placeholder = "Password"/><br><br>
                        <!-- Button to submit the details to the database: -->
                        <button type="submit" name="login_submit" class="submit_btn">Login</button>
                        <div style ="text-align: center;">
                            <span class="account">Don't have an account?</span><button type="button" class="toggle_register_login_btn" onclick="register()">Sign Up</button> <!-- When the Register button is clicked call the register() function: -->
                        </div>
                    </form>
                    <!--Create a registration form that sends the information to the database:-->
                    <form class = "login_input_group" id="register" name = "register_form" action = "register.php" method = "POST" onsubmit = "return(validate_registration());">
                        <h2>SIGN UP</h2>
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
                        <div style = "margin-top: -20px;">   
                            <!-- Agree to terms and conditions checkbox -->
                            <input type="checkbox" class="check_box" id="agree_checkbox"><span>I agree to the terms & conditions<span>
                        </div>
                        <!--Button to submit the form:-->
                        <button type="submit" name="register_submit" class="submit_btn">Sign Up</button>    
                        <div style ="text-align: center;">
                            <span >Already have an account?</span><button type="button" class="toggle_register_login_btn" onclick="login()">Login</button> <!-- When the Login button is clicked call the login() function: -->
                        </div>
                    </form>
                </div>
                <footer style="filter:drop-shadow(1px 1px 3px black);"> <!-- Have a terms and conditions appear at the bottom of the page: -->
                    <div class="spacing" style="height:0px;"></div>
                    <div class="center-text">
                        <br><p style="font-size: 20px;"><i>Terms & Conditions: By creating an account you agree to share your full name, email address, and Bot IP with GreenTech Resolutions.</i></p>
                    </div>
                </footer>
            </div>
        </div>   
        <!--Use an external javascript file named validate.js to validate the form:-->
        <script src="validate.js"></script>
    </body>
</html>