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
    plant_details
    ");

    $getPlant->execute(); //Execute the statement:
    $result=$getPlant->get_result(); //Get the result set:

    //Generate HTML code for the webpage to display the details about each plant:
    if($result->num_rows>0){ //If rows were found in the table:

        echo    "<div class='products-row'>";
        
            while($row = $result->fetch_assoc()){
                echo    "<div class='product' style='background-color:#343A54;'>";
                echo        "<img class='product-img' src='" . $row["image"] . "' alt='" . $row['plant_name'] . "'>"; /* Plant image: */
                echo        "<div class='product-info'>";
                echo            "<h3 class='product-title' style='color:#6cff7f; font-size:25px;'>" . $row["plant_name"] . "</h3>"; /* Plant name: */
                echo            "<h3 class='product-title' style='color:white; font-size:22px;'>" . $row["description"] . "</h3>"; /* Plant Description: */
                echo        "<a href='plant_details.php?id=" . $row["plant_details_id"] . "'><button class='addbutton' style='margin-top:10px;'>Read More</button></a>"; /* Read more button: */
                echo        "</div>";
                echo    "</div>";
            }
        echo    "</div>";
    }else{ //There are no rows or the table is empty, display an error message directly on the page:
        echo    "<div class='center-text'>";
        echo        "<h2 style='color:#09BA20;'>No Plants Were Found.</h2>"; 
        echo    "</div>";
    }
    
    //Closing the database connection:
    $connect->close();
?>