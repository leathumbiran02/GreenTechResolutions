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
            .hero{ /* Centering the text: */
                text-align: center;
                background: url(images/chat_background.jpg);
                height: 850px;
                backdrop-filter: blur 5px;
            }

            /* Container */
            .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            }

            .dashboard {
            margin-bottom: 20px;
            }

            .navigation {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            }

            .navigation li {
            margin-bottom: 0;
            }

            .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            grid-gap: 20px;
            margin-top: 20px;
            }

            .product-card {
            text-align: center;
            background-color: #010007eb;
            padding: 20px;
            border-radius: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .product-card img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 10px;
            }

            .product-card h3 {
            margin-bottom: 5px;
            color: white;
            }

            .product-card p {
            font-size: 18px;
            color: white;
            margin-bottom: 10px;
            }

            .add-to-cart {
            background: linear-gradient(to right, #008f3f, #09BA20);
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            font-size: 16px;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-transform: uppercase;
            font-weight: bold;
            border: 3px solid #000000
            }

            .add-to-cart:hover {
            background-color: #008f3f;
            }

            .cart {
            background-color: #f5f5f5;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            }

            .cart-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            cursor: pointer;
            }

            .cart-icon i {
            color: #444444;
            }

            .cart-items {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            z-index: 1;
            background-color: #ffffff;
            color: #444444;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            width: 200px;
            }

            .cart-items.visible {
            display: block;
            }

            .cart-items ul {
            list-style: none;
            padding: 0;
            margin: 0;
            }

            .cart-items li {
            margin-bottom: 10px;
            }

            .total-price {
            font-size: 18px;
            margin-top: 10px;
            }

            .checkout {
            background-color: #2ecc71;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            text-transform: uppercase;
            font-weight: bold;
            }

            .checkout:hover {
            background-color: #27ae60;
            
            }

            .remove-item {
            color: #e74c3c;
            font-size: 12px;
            cursor: pointer;
            }
            .payment-options {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
            }
            
            .payment-options h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #444;
            }
            
            .payment-options ul {
            list-style: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            }
            
            .payment-options li {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #666666;
            }
            
            .payment-options li i {
            margin-right: 10px;
            }

            footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            }

            footer p {
            margin-bottom: 0;
            }

            .social-media {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            margin-top: 10px;
            }

            .social-media li {
            margin-right: 10px;
            }

            .social-media li:last-child {
            margin-right: 0;
            }

            .social-media a {
            color: #fff;
            font-size: 20px;
            transition: color 0.3s ease;
            }

            .social-media a:hover {
            color: #00a74a;
            }

            .cart-items.hidden,
            .total-price.hidden {
                display: none;
            }
            .cart-items.visible,
            .total-price.visible {
                display: block;
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
            <div class="spacing" style="margin-top:50px;"></div>
            <div class="dashboard">
            <div class="product-list">
                <div class="product-card">
                <img src="images/f.jpg" alt="Rainbow Trout">
                <h3>Rainbow Trout</h3>
                <p>Price: R100</p>
                <button class="add-to-cart" onclick="addToCart('Rainbow Trout', 100)">Add to Cart</button>
                </div>
                <div class="product-card">
                <img src="images/eggs.jpg" alt="Eggs">
                <h3>Eggs</h3>
                <p>Price: R150</p>
                <button class="add-to-cart" onclick="addToCart('Eggs', 150)">Add to Cart</button>
                </div>
                <div class="product-card">
                <img src="images/mushrooms.jpg" alt="Mushrooms">
                <h3>Mushrooms</h3>
                <p>Price: R120</p>
                <button class="add-to-cart" onclick="addToCart('Mushrooms', 120)">Add to Cart</button>
                </div>
                <div class="product-card">
                <img src="images/a.jpg" alt="Onions">
                <h3>Onions</h3>
                <p>Price: R80</p>
                <button class="add-to-cart" onclick="addToCart('Onions', 80)">Add to Cart</button>
                </div>
            </div>

            <div class="product-list">
                <div class="product-card">
                <img src="images/millie.jpg" alt="millie">
                <h3>Millie</h3>
                <p>Price: R60</p>
                <button class="add-to-cart" onclick="addToCart('millie', 60)">Add to Cart</button>
                </div>
                <div class="product-card">
                <img src="images/beet.jpg" alt="beetroot">
                <h3>Beetroot</h3>
                <p>Price: R40</p>
                <button class="add-to-cart" onclick="addToCart('beetroot', 40)">Add to Cart</button>
                </div>
                <div class="product-card">
                <img src="images/l.jpg" alt="Carrots">
                <h3>Carrots</h3>
                <p>Price: R40</p>
                <button class="add-to-cart" onclick="addToCart('Carrots', 40)">Add to Cart</button>
                </div>
                <div class="product-card">
                <img src="images/d.jpg" alt="Lettuce">
                <h3>Lettuce</h3>
                <p>Price: R40</p>
                <button class="add-to-cart" onclick="addToCart('Lettuce', 40)">Add to Cart</button>
                </div>
            </div>
        </div>
    <!--Use an external javascript file named validate.js to validate the form:-->
    <script src="validate.js"></script>
    </body>
</html>