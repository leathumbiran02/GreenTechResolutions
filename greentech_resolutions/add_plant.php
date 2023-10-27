<?php
    //Starting the session:
    session_start();

    //Using the database configuration file:
    require_once('db_config.php');

    //Checking if the email address is stored in the session:
    if(!isset($_SESSION['email'])){
        echo "<script>alert('You must be logged in to view this page.')</script>";
        header('Refresh: 1; url=login_register.php');
        exit();
    }

    /* If the form is submitted, execute the following code: */
    if($_SERVER['REQUEST_METHOD']==='POST'){

        /* Fetch the updated details from the form: */
        $plant_name=$_POST['plant_name'];
        $description=$_POST['description'];
        $image=$_POST['image'];
        $price=$_POST['price'];

        //Fetch the email address from the session:
        $user_email=$_SESSION['email'];

        /* Create a connection to the database: */
        $connect=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        /* Prepare the statement: */
        $add_community_plant=$connect->prepare("
        INSERT INTO
        community_plant
        (user_email,plant_name,description,image,price)
        VALUES
        (?,?,?,?,?)
        ");

        $add_community_plant->bind_param("sssss",$user_email,$plant_name,$description,$image,$price); /* Bind the parameters: */
        $add_community_plant->execute(); /* Execute the statement: */

        /* Check if the details were updated successfully in the vendor table: */
        if($add_community_plant->affected_rows >0){
            echo '<script>alert("Your plant was successfully added!")</script>';
            header('Refresh: 1; url=community.php');
            exit();
        }

        /* Closing the database connection: */
        $connect->close();
    }
?>

<!-- HTML for the page that the user/admin will see in their browser: -->
<!DOCTYPE html>
<html>
    <head>
        <!--Title of Web Page: GreenTechResolutions-->
        <title>GreenTechResolutions</title>

        <!--Using a CSS style sheet for the page:-->
        <link rel="stylesheet" href="style.css">
        <style>
            h2{
                color: white;
                text-align: center;
                font-size: 20px;
                font-weight: bold;
                padding-top: 50px;
            }
            .contact-us-form-box{
                height: 450px;
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
            <div class="form_page"> <!-- The body of the page: -->
                <div class="contact-us-form-box"> 
                    <div class="contact-us-register_login_btn_box">
                        <h2>Add Plant</h2> 
                    </div>

                    <form class="contact-us-login_input_group" id="community_plant" name = "community_plant" action="add_plant.php" method="POST" onsubmit = "return(validate_add_plant());">
                        <!-- Plant name: -->
                        <input type="text" class="input_field" id="plant_name" name="plant_name" placeholder="Plant Name">

                        <!-- Description: -->
                        <input type="text" class="input_field" id="description" name="description" placeholder="Description">
                        
                        <!-- Image -->
                        <input type="text" class="input_field" id="image" name="image" placeholder="Link to image">
                        
                        <!-- Price: -->
                        <input type="number" step="0.01" min="0" class="input_field" id="price" name="price" placeholder="Price"><br><br>  

                        <!-- Button to submit the details to the database: -->
                        <button type="submit" name="submit" class="submit_btn">Save</button>

                        <div class="center-text">
                            <!-- Go Back:-->
                            <a href="community.php"><span class="back-button">Go Back</span></a>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        <!--Use an external javascript file named validate.js to validate the form:-->
        <script src="validate.js"></script>
    </body>
</html>