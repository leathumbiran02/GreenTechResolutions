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
    $bot_ip=$row['bot_ip'];

    /* Closing the database connection: */
    $connect->close();

    /* If the form is submitted, execute the following code: */
    if($_SERVER['REQUEST_METHOD']==='POST'){

        /* Fetch the updated details from the form: */
        $new_bot_ip=$_POST['bot_ip'];

        /* Create a connection to the database: */
        $connect=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        /* Update the account details in the users table: */
        /* Prepare the statement: */
        $update_bot_ip=$connect->prepare("
        UPDATE
        users
        SET
        bot_ip=?
        WHERE email=?
        ");

        $update_bot_ip->bind_param("ss",$new_bot_ip,$email); /* Bind the parameters: */
        $update_bot_ip->execute(); /* Execute the statement: */

        /* Check if the details were updated successfully in the vendor table: */
        if($update_bot_ip->affected_rows >0){
            echo '<script>alert("Your BOT IP was updated successfully!")</script>';
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
            body{ /* Adding a background image to the page: */
                width: 97%;
                /*overflow: hidden; does not allow page to scroll down*/ 
                margin-top: 150px;
                text-align: center; 
            }
            p, span{
                color: white;
                font-size: 20px;
                font-weight: normal;
            }
            p{
                margin-top: 15px;
            }
            span{
                font-weight: normal;
                display: inline-block;
                float:center;
                padding: 0px 40px;
                padding-top: 40px
            }
            h2{
                color: white;
                text-align: center; /* Center the text horizontally */
                font-size: 20px;
                font-weight: bolder;
                padding-bottom: 0px;
            }
            .input_field, select{
                width:100%;
                padding: 10px 15px;
                margin: 5px 0;
                outline: none;
                background-color: #252525;
                border:none;
                border-bottom: 1px solid #ffffff;
                font-size: 15px;
            }
            .input_field::placeholder,select {
                color: white;

            }
            .submit_btn{
                width: 45%;
                padding: 5px 0px;
                cursor: pointer;
                display: inline-block;
                margin: auto;
                background-color:#009414;
                color: #ffffff;
                font-weight: normal;
                font-size: 20px;
                border: 0;
                outline: none;
                margin-top: 1px;
                float: center;
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
                        <h2>Edit BOT IP</h2> 
                    </div>

                    <form class="contact-us-login_input_group" id="bot_ip" name = "bot_ip" action="manage_bot_ip.php" method="POST" onsubmit = "return(validate_bot_ip());">
                        <!-- BOT IP: -->
                        <input type="text" class="input_field" id="bot_ip" name="bot_ip" value="<?php echo $bot_ip; ?>"><br><br>  
                        <!-- Button to submit the details to the database: -->
                        <button type="submit" name="submit" class="submit_btn">Save</button>

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