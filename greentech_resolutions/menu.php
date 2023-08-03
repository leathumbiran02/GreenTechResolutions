<!-- This will be the code for the menu that appears on all pages in the website: -->

<!-- Adding a logo that navigates to the plant page when logged in: -->
<?php if(isset($_SESSION['users']) && $_SESSION['users'] == true): ?>
    <a href="plant.php"><img class="logo" src="images/gtr-logo.png" alt="GreenTechResolutions"></a>
<?php else: ?> <!-- Logo to navigate to the about us page when not logged in: -->
    <a href="about_us.php"><img class="logo" src="images/gtr-logo.png" alt="GreenTechResolutions"></a>
<?php endif; ?>

<!-- Creating a menu for mobile view: -->
<input type="checkbox" id="menu-bar">
<label for="menu-bar">Menu</label>

<!--Creating a clickable menu that navigates to the various pages:-->
<nav class="navbar">
    <ul>
        <!-- Only display this menu if the person logged in is a user: -->
        <?php if(isset($_SESSION['users']) && $_SESSION['users'] == true): ?>
            <li><a>AquaBot</a>
                <ul>
                    <li><a href="plant.php">Plants</a></li>
                    <li><a href="tank.php">Tank</a></li>
                    <li><a href="system.php">System</a></li>
                </ul>
            </li>
            <li><a href="shop.php">Shop</a></li>
            <li><a>Connect</a>
                <ul>
                    <li><a href="chat.php">With Us</a></li>
                    <li><a href="community.php">Community</a></li>
                </ul>
            </li>
            <li><a href="learn.php">Learn</a></li>
            <li><a href="account.php">Account</a>
                <ul>
                    <li><a href="logout.php" onclick="return confirm('Are you sure that you want to logout?')">Logout</a></li>
                </ul>
            </li>
        <?php else: ?> <!-- Display this menu for guest users only: -->
            <li><a href="about_us.php">About Us</a></li>
            <li><a href="partners.php">Partners</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="contact_us.php">Contact Us</a></li>
            <li><a href="login_register.php">Connect Bot</a></li>
        <?php endif; ?>
    </ul>
</nav>