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
    $getFish=$connect->prepare("
    SELECT 
    * 
    FROM 
    community_fish
    ");

    $getFish->execute(); //Execute the statement:
    $result=$getFish->get_result(); //Get the result set:

    //Generate HTML code for the webpage to display the details about each fish:
    if($result->num_rows>0){ //If rows were found in the table:

        echo    "<div class='products-row'>";
        
            while($row = $result->fetch_assoc()){
                echo    "<div class='product'>";
                echo        "<img class='product-img' src='" . $row["image"] . "' alt='" . $row['fish_name'] . "'>"; /* Fish image: */
                echo        "<div class='product-info'>";
                echo            "<h3 class='product-title' style='color:#6cff7f;'>" . $row["fish_name"] . "</h3>"; /* Fish name: */
                echo            "<h3 class='product-title'>" . $row["description"] . "</h3>"; /* Fish Description: */
                echo            "<span class='product-price-discount'>R" . $row["price"] . "</span>"; /* Fish price: */
                echo        "<a href='fish_details.php?id=" . $row["fish_id"] . "'><button class='addbutton' style='margin-top:10px;'>Buy</button></a>";
                echo        "</div>";
                echo    "</div>";
            }
        echo    "</div>";
    }else{ //There are no rows or the table is empty, display an error message directly on the page:
        echo    "<div class='center-text'>";
        echo        "<h2 style='color:#09BA20;'>No Fish Were Found.</h2>"; 
        echo    "</div>";
    }

    //If the table is empty, users can still add fish:
    echo "<a class='plus-button' href='add_fish.php'>+</a>";
    
    //Closing the database connection:
    $connect->close();
?>