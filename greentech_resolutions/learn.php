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
        <!-- Using Font Awesome CDN for icons: -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <style>
            .productContainer{
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                margin: 0 auto 50px;
                padding: 0 50px;
                text-align: center;
                margin-top: 50px;
            }
            .productCard{
                flex-basis: calc(33% - 20px); 
                background-color: #4C4D5E;
                height: auto;
                margin-bottom: 20px
            }
            h4, h2, span{
                color: white;
                text-align: center; 
                font-size: 20px;
            }
            h2{
                font-weight: bolder;
                padding-top: 20px;
                padding-bottom: 20px;
                color: white;
            }
            h4{
                font-weight: bolder;
                padding-top: 15px;
                margin-bottom: -20px;
            }
            span{
                font-weight: normal;
                display: inline-block;
                float:center;
                padding-top: 20px;
                padding: 0px 40px;
                padding-bottom: 20px;
            }
            .product-img{
                height: 300px;
                width: 350px;
                margin-left: 5px;
                margin-top: 40px;
                padding-bottom: 20px;
            }
            .addbutton{
                width: 40%;
                padding: 5px 0px;
                cursor: pointer;
                margin: auto;
                background-color:#009414;
                color: #ffffff;
                font-weight: normal;
                font-size: 20px;
                border: 0;
                outline: none;
                margin-top: 1px;
                align: center; 
                margin-bottom: 30px
            }
            .register_login_btn_box{
                margin-left: 50px;
                margin-bottom: -30px;
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
            <div class="blur_background">
                <div class="center-text"> <!-- Class to center the top heading: -->
                    <h2>Educational</h2>
                </div>

                <div class="register_login_btn_box" > <!-- The buttons that switches between both the login and register form: -->
                    <div id="btn"></div>
                    <button type="button" class="toggle_register_login_btn" onclick="learn_about_fish()">Fish</button> 
                    <button type="button" class="toggle_register_login_btn" onclick="learn_about_plants()">Plants</button> 
                </div>

                <div class="search-bar">
                    <input type="text" id="search" placeholder="Search">
                    <button type="button" class="search-bar-btn" onclick="searchProductsLearn()"><i class="fas fa-search"></i></button>
                </div>
           

                <div id="products">
                    <!-- All the products from the database will be displayed here: -->
                    <?php 
                    include 'get_fish_page.php'; 
                    ?>
                </div>
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