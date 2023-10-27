<?php
    //Using the database configuration file:
    require_once('db_config.php');

    //Creating a connection to the database using the variables in the db_config.php file:
    $connect = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    //If the connection fails display an error:
    if($connect->connect_error){
        die("Connection failed!" . $connect->connect_error);
    }

    //Using prepared statements with parameterized queries:
    //Prepare the statement:
    $getPlant=$connect->prepare("
    SELECT 
    * 
    FROM 
    community_plant
    ");

    $getPlant->execute(); //Execute the statement:
    $result=$getPlant->get_result(); //Get the result set:

    //Generate HTML code for the webpage to display the details about each plant:
    if($result->num_rows>0){ //If rows were found in the table:

        echo    "<div class='productContainer'>";
        
            while($row = $result->fetch_assoc()){
                echo    "<div class='productCard'>";
                echo        "<img class='product-img' src='" . $row["image"] . "' alt='" . $row['plant_name'] . "' onclick='showComingSoonMessage()'>"; /* Plant image: */
                echo        "<div class='product-info'>";
                echo            "<h2 class='product-title'>" . $row["plant_name"] . "</h2>"; /* Plant name: */
                echo            "<span class='product-title'>" . $row["description"] . "</span>"; /* Plant Description: */
                echo            "<span class='product-price-discount'>R" . $row["price"] . "</span>"; /* Plant price: */
                echo        "<a><button class='addbutton' onclick='showComingSoonMessage()'>Add To Cart</button></a>";
                echo        "</div>";
                echo    "</div>";
            }
        echo    "</div>";
    }else{ //There are no rows or the table is empty, display an error message directly on the page:
        echo    "<div class='center-text'>";
        echo        "<h2 style='color:#09BA20;'>No Plants Were Found.</h2>"; 
        echo    "</div>";
    }

    //If the table is empty, users can still add plants:
    echo "<a class='plus-button' href='add_plant.php'>+</a>";
    
    //Closing the database connection:
    $connect->close();
?>