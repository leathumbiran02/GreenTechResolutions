<!-- This will be the code for the menu that appears on all pages in the website: -->

<!-- Adding a logo that navigates to the dashboard page when logged in: -->
<?php if(isset($_SESSION['user']) && $_SESSION['user'] == true): ?>
    <a href="dashboard.php"><img class="logo" src="images/logo.jpg" alt="GreenTechResolutions"></a>
<?php else: ?> <!-- Logo to navigate to the about us page when not logged in: -->
    <a href="about_us.php"><img class="logo" src="images/logo.jpg" alt="GreenTechResolutions"></a>
<?php endif; ?>

<!--Creating a clickable menu that navigates to the various pages:-->
<nav class="navbar">
    <ul>
        <!-- Only display this menu if the person logged in is a user: -->
        <?php if(isset($_SESSION['users']) && $_SESSION['users'] == true): ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="#">AquaBot</a>
                <ul>
                    <li><a href="plant.php">Plants</a></li>
                    <li><a href="tank.php">Tank</a></li>
                    <li><a href="system.php">System</a></li>
                </ul>
            </li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="chat.php">Chat</a></li>
            <li><a href="account.php">Account</a>
                <ul>
                    <li><a href="logout.php" onclick="return confirm('Are you sure that you want to logout?')">Logout</a></li>
                </ul>
            </li>
            <li><a href="help.php">Help</a></li>
        <?php else: ?> <!-- Display this menu for guest users only: -->
            <li><a href="about_us.php">About Us</a></li>
            <li><a href="partners.php">Partners</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="contact_us.php">Contact Us</a></li>
            <li><a href="login_register.php">Connect Bot</a></li>
        <?php endif; ?>
    </ul>
</nav>