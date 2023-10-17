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
    fish_details
    ");

    $getFish->execute(); //Execute the statement:
    $result=$getFish->get_result(); //Get the result set:

    //Generate HTML code for the webpage to display the details about each fish:
    if($result->num_rows>0){ //If rows were found in the table:

        echo    "<div class='productContainer'>";
            while($row = $result->fetch_assoc()){
                echo    "<div class='productCard'>";
                echo        "<img class='product-img' src='" . $row["image"] . "' alt='" . $row['fish_name'] . "'>"; /* Fish image: */
                echo        "<div class='product-info'>";
                echo            "<h2 class='product-title'>" . $row["fish_name"] . "</h2>"; /* Fish name: */
                echo            "<span class='product-title'>" . $row["description"] . "</span>"; /* Fish Description: */
                echo        "<a href='fish_details.php?id=" . $row["fish_details_id"] . "'><button class='addbutton' style='margin-top:10px;'>READ MORE</button></a>"; /* Read more button: */
                echo        "</div>";
                echo    "</div>";
            }
        echo    "</div>";
    }else{ //There are no rows or the table is empty, display an error message directly on the page:
        echo    "<div class='center-text'>";
        echo        "<h2 style='color:#09BA20;'>No Fish Were Found.</h2>"; 
        echo    "</div>";
    }
    
    //Closing the database connection:
    $connect->close();
?>