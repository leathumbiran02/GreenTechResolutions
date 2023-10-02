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

        <!--Using a CSS style sheet for the page:-->
        <link rel="stylesheet" href="style.css">

        <style> /* Applying additional styling for this specific page: */
            .hero h1{
                text-align: center;
                color:black;
            }
            .product_details_info ul li{
                list-style-type: none; /* Hide the bullet point symbols */
            }
            .addbutton { /* Button when clicking on products */
                background: linear-gradient(to right, rgba(46, 114, 215, 0.3), rgba(101, 43, 252, 0.3));
                cursor: pointer;
                display: initial;
                padding: 20px;
                width:35%;
                color: #ffffff;
                font-size: 21px;
                font-weight: bold;
                text-align:center;
                transition: background-color 0.3s ease-in-out;
                text-decoration: none;
                margin:20px 0;
            }
            @media(max-width:1080px){ /* Media queries to center the back link under the description: */
                .back_to_products{
                    margin-left:-10px;
                }
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
            <?php
                //Using the database configuration file:
                require_once('db_config.php');

                //Creating a connection to the database using the variables in the dbconfig.php file:
                $connect = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

                //If the connection fails display an error:
                if($connect->connect_error){
                    die("Connection failed!" . $connect->connect_error);
                }

                if(isset($_GET['id'])){
                    /* Get the id and store it in $id: */
                    $id = $_GET['id'];

                    //Using prepared statements with parameterized queries:
                    //Prepare the statement for the products table:
                    $statement=$connect->prepare("
                    SELECT 
                    * 
                    FROM 
                    plant_details
                    WHERE
                    plant_details_id = ?
                    ");

                    $statement->bind_param("i",$id); //Bind the parameter:
                    $statement->execute(); //Execute the statement:
                    $result=$statement->get_result(); //Get the set of results:

                    if($result->num_rows>0){ //If a row was found execute the following code:
                            $row=$result->fetch_assoc();
                            echo    "<h1>" . $row["plant_name"] . "</h1>"; /* Fish Name: */
                            echo    "<div class='product_details_page'>";
                            echo        "<div class='product_details_image_box'>";
                            echo            "<img class='product_details_img' src='" . $row["image"] . "' />"; /* Image: */
                            echo        "</div>";
                            echo        "<div class='product_details_info'>";

                            /* Product Description: */
                            /* Splitting the long description from the database into sentences: */
                            $long_description =preg_split('/(?<=[.?!])\s+/',$row["description"]);

                            /* Displaying each sentence as a bullet point: */
                            echo            "<ul>";
                            foreach ($long_description as $description){
                                echo            "<li class='product_details_description'><i>{$description}</i></li>";
                            }
                            echo            "</ul>";
                            echo "<p class='product_details_description'>Health Benefits: <a href='" . $row["health_benefits"] . "' target='_blank'>" . $row["health_benefits"] . "</a></p>";
                            echo "<p class='product_details_description'>Recipes: <a href='" . $row["recipe"] . "' target='_blank'>" . $row["recipe"] . "</a></p>";                            
                            echo            "<br><div><a  href='learn.php' class='back_to_products' style='margin:10px -10px;'>GO BACK</a></div>";
                            echo        "</div>";
                            echo    "</div>";
                    } else{ /* If the product id does not exist in the table: */
                        echo        "<div class='center-text'>";
                        echo            "<h2 style='color:#09BA20;'>Plant was not found.</h2>";
                        echo        "</div>";
                    }
                    //Close the prepared statement:
                    $statement->close();
                } else{ 
                    /* If the id could not be retrieved for any other reason:*/
                    echo "<div class='center-text'>";
                    echo    "<h2 style='color:#09BA20;'>Invalid request</h2>";
                    echo "</div>";
                }
                //Closing the database connection:
                $connect->close();
            ?>
        </div>
    </body>
</html>