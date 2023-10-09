<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .block{
                background-color: #4C4D5E;
                width: 95%;
                height: 200px;
                margin-bottom: 50px;
                display: flex;
                margin-left: 50px;
                margin-right: 50px;
            }
            .logo{
                height: 80px;
                width: auto;
                /* padding-left: 50px; */
                /* margin-top: 55px; */
            }
            .info {
                display: flex;
                flex-direction: column;
                margin-left: 200px; 
                margin-top: 20px;
                line-height: 1.6;
            }
            span.span_footer{
                color: white;
                float: left;
                font-size: 20px;
            }
            .fa.fa-instagram {
                color: transparent;
                background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
                background-clip: text;
                -webkit-background-clip: text;
            }
            .fa {
                padding: 5px;
                font-size: 30px;
                width: 40px;
                text-align: center;
                text-decoration: none;
                border-radius: 50%;
            }
            .fa:hover {
                opacity: 0.7;
            }
            .fa.fa-facebook-f{
                background: #3B5998;
                color: white;
            }
            .fa.fa-youtube-play{
                color: white;
                background-color: white;
            }
            .list{
                display: flex;
                flex-direction: row;
                gap:100px;

            }
        </style>
    </head>
    <body>
        <div class="block">
            <!-- Adding a logo that navigates to the plant page when logged in: -->
            <?php if(isset($_SESSION['users']) && $_SESSION['users'] == true): ?>
                <a href="plant.php"><img class="logo" src="images/gtr-logo2.png" alt="GreenTechResolutions" style="margin-top: 55px; padding-left: 50px;"></a>
            <?php else: ?> <!-- Logo to navigate to the about us page when not logged in: -->
                <a href="about_us.php"><img class="logo" src="images/gtr-logo2.png" alt="GreenTechResolutions" style="margin-top: 55px; padding-left: 50px;"></a>
            <?php endif; ?>

            <div class="info">
                <span class="span_footer" style="margin-left:70px;">STAY CONNECTED</span>
                <span class="span_footer"><a href="https://goo.gl/maps/UNgsTJUgLagswkQE6">9 Concorde E Rd, Bedfordview JHB</a></span><br>  
                <span class="span_footer"><a href="tel:+27746149038">+27 74 614 9038</a></span><br> 
                <span class="span_footer"><a href="mailto:greentechresolutions@gmail.com">greentechresolutions@gmail.com</a></span><br> 
            </div>
            <div class="info">
                <span class="span_footer" style="margin-left:-13px;">SOCIAL</span>
                <span class="span_footer"><a href="https://www.youtube.com/@GreenTechResolutions/featured"><i class="fa fa-youtube-play" style="color:#FF0000;"></i></a></span><br>  
                <span class="span_footer"><a href="https://www.instagram.com/greentechresolutions/"><i class="fa fa-instagram"></i></a></span><br> 
                <span class="span_footer"><a href="https://www.facebook.com/green.tech.resolutions?mibextid=ZbWKwL"><i class="fa fa-facebook-f" ></i></a></span><br>
            </div>
            <div class="info" style="margin-top:20px;">
                <span class="span_footer">GREEN TECH RESOLUTIONS</span>
                <nav class="navbar">
                    <ul class="list" style="list-style-type: none;">
                        <!-- Only display this menu if the person logged in is a user: -->
                        <?php if(isset($_SESSION['users']) && $_SESSION['users'] == true): ?>
                            <li><a>AquaBot</a>
                                <ul style="list-style-type: none;">
                                    <li><a href="plant.php">Plants</a></li>
                                    <li><a href="tank.php">Tank</a></li>
                                    <li><a href="system.php">System</a></li>
                                </ul>
                            </li>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a>Connect</a>
                                <ul style="list-style-type: none;">
                                    <li><a href="chat.php">With Us</a></li>
                                    <li><a href="community.php">Community</a></li>
                                </ul>
                            </li>
                            <li><a href="learn.php">Learn</a></li>
                            <li><a href="account.php">Account</a>
                                <ul style="list-style-type: none;">
                                    <li><a href="logout.php" onclick="return confirm('Are you sure that you want to logout?')">Logout</a></li>
                                </ul>
                            </li>
                        
                            <!-- Microphone button for users to talk to the system: -->
                            <button id="microphoneButton" class='microphone' style="font-size:30px;"><i class="fas fa-microphone"></i></button>
                        <?php else: ?> <!-- Display this menu for guest users only: -->
                            <div id="list1">
                                <li><a href="about_us.php">About Us</a></li>
                                <li><a href="partners.php">Partners</a></li>
                                <li><a href="products.php">Products</a></li>
                                <!-- <li><a href="contact_us.php">Contact Us</a></li>
                                <li><a href="login_register.php">Connect Bot</a></li> -->
                            </div>
                            <div id="list2">
                                <li><a href="contact_us.php">Contact Us</a></li>
                                <li><a href="login_register.php">Connect Bot</a></li>
                            </div>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </body>
    <!-- Provide the link for the JQuery Library: -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>