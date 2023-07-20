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
            h5{
                font-size:1.1em;
            } 
            .product{
                background-color: #343A54;
                opacity: 95%;
                border: 2px solid #09BA20;
            }
            .register_login_btn_box{
                margin:35px;
            }
            #btn{
                width:120px;
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

        <div class="form-page">
            <div class="center-text"> <!-- Class to center the top heading: -->
                <h1 class="chat-page-toggle_register_login_btn"><br>Community Market</h1>
            </div>

            <div class="register_login_btn_box" > <!-- The buttons that switches between both the login and register form: -->
                <div id="btn"></div>
                <button type="button" class="toggle_register_login_btn" onclick="fish()">Fish</button> 
                <button type="button" class="toggle_register_login_btn" onclick="plants()">Plants</button> 
            </div>

            <div class="search-bar">
                <input type="text" id="search" placeholder="Search products...">
                <button type="button" class="search-bar-btn" onclick="searchProducts()">Search</button>
            </div>

            <div id="products">
                <!-- All the products from the database will be displayed here: -->
                <?php 
                include 'get_community_fish.php'; 
                ?>
            </div>
        </div>

        <!-- Provide the link for the JQuery Library: -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Preventing the user from clicking outside of the buttons using Javascript: -->
        <script>
            $(document).ready(function(){
                /* Ensuring that the user cannot click outside of the add button, view button, update button, as well as making sure that the menu (which is located in the header) and the product-img remain responsive: */
                $(document).on('click', function(event){
                    if(!$(event.target).closest('.addbutton, header, .product-img, .plus-button').length && !$(event.target).is('.deletebutton')){
                        event.preventDefault();
                    }
                });
            });
        </script>

        <!--Use an external javascript file named validate.js to validate the form:-->
        <script src="validate.js"></script>
    </body>
</html>