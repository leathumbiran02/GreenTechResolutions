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

    //Retrieve the user's email address from the session:
    $email = $_SESSION['email'];

    //Create a connection to the database:
    $connect=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

    /* Using prepared statements with parameterized queries: */
    /* Check if the email retrieved matches any email in the users table: */
    /* Prepare the statement: */
    $user_query=$connect->prepare("
    SELECT
    *
    FROM
    users
    WHERE email=?
    ");

    $user_query->bind_param("s",$email); /* Bind the parameter: */
    $user_query->execute(); /* Execute the statement: */
    $result=$user_query->get_result(); /* Get the set of results: */
    $row=$result->fetch_assoc(); /* Fetch the associated row: */

    /* Display the users' information in the form: */
    $email=$row['email'];

    /* Closing the database connection: */
    $connect->close();

    /* If the form is submitted, execute the following code: */
    if($_SERVER['REQUEST_METHOD']==='POST'){

        /* Fetch the updated details from the form: */
        $new_email=$_POST['manage_email'];

        /* Create a connection to the database: */
        $connect=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        /* Update the account details in the users table: */
        /* Prepare the statement: */
        $update_email=$connect->prepare("
        UPDATE
        users
        SET
        email=?
        WHERE email=?
        ");

        $update_email->bind_param("ss",$new_email,$email); /* Bind the parameters: */
        $update_email->execute(); /* Execute the statement: */

        /* Check if the details were updated successfully in the vendor table: */
        if($update_email->affected_rows >0){
            echo '<script>alert("Your email was updated successfully!")</script>';
            // Update the email in the session
            $_SESSION['email'] = $new_email;
            header('Refresh: 1; url=account.php');
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
            .hero{ /* Centering the text on the page: */
                backdrop-filter: blur(5px);
            }
            .contact-us-register_login_btn_box{
                margin: 35px 130px;
            }
            .contact-us-form-box{
                height: 330px;
                border: 3px solid black;
                background-color: #010007eb;
            }
            .contact-us-login_input_group input{
                border: 3px solid black;
                color:black;
                background-color: white;
            }
            .contact-us-submit_btn{
                color: black;
                border: 3px solid black;
            }
            body{ /* Adding a background image to the page: */
                width: 100%;
                background-image: url(images/account_background.jpg);
                background-position:center;
                background-size:cover;
                background-attachment: fixed;
                overflow: hidden;
                margin-top: 80px;
            }
            .contact-us-toggle_register_login_btn{
                color: white;
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
            <div class="spacing" style="height:200px;"></div>
            <div class="form_page"> <!-- The body of the page: -->
                <div class="contact-us-form-box"> 
                    <div class="contact-us-register_login_btn_box">
                        <button type="button" class="contact-us-toggle_register_login_btn">Edit Email</button> 
                    </div>

                    <form class="contact-us-login_input_group" id="manage_email" name = "manage_email" action="manage_email.php" method="POST" onsubmit = "return(validate_email());">
                        <!-- EMAIL: -->
                        <input type="text" class="contact-us-input_field" id="manage_email" name="manage_email" value="<?php echo $email; ?>"><br><br>  
                        <!-- Button to submit the details to the database: -->
                        <button type="submit" name="submit" class="contact-us-submit_btn">Save</button>

                        <div class="center-text">
                            <!-- Go Back:-->
                            <a href="account.php"><span class="back-button">Go Back</span></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!--Use an external javascript file named validate.js to validate the form:-->
        <script src="validate.js"></script>
    </body>
</html>