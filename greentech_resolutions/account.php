<?php
    //Starting the session:
    session_start();

    //Using the database configuration file:
    require_once('db_config.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <!--Title of Web Page: GreenTechResolutions-->
        <title>GreenTechResolutions</title>

        <!--Using a CSS style sheet for the page:-->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <style>
            body{ /* Adding a background image to the page: */
                width: 97%;
                /*overflow: hidden; does not allow page to scroll down*/ 
                margin-top: 100px;
                text-align: center; 
            }
            h4, h2, a{
                color: white;
                text-align: center; /* Center the text horizontally */
                font-size: 20px;
            }
            h2{
                font-weight: bolder;
            }
            h4, a{
                font-weight: normal;
            }
            a {
                text-decoration: none;
            }
            .editButton{
                width: 80px;
                height: auto;
                border-radius: 80%;
                background-color:#009414;
                color: #ffffff;
                border: 0;
                margin-top: 29px;
                margin-left: 100px;
                font-size: 28px;
                padding: 0px;
                margin-left: 8px;
                margin-top: -10px;
            }
            .user-info{
                padding-bottom: 0px;
            }
            footer{
                margin-top: -250px;
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
            <!--Container for the users' information:-->
            <?php
                /* Redirect the user/vendor to the login page if they are not logged in: */
                if(!isset($_SESSION['email'])){
                    echo "<script>alert('You must be logged in to view this page.')</script>";
                    header('Refresh: 1; url=login_register.php');
                    exit();
                }

                //Creating a connection to the database:
                $connect = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        
                //Store the email entered in this session in $email:
                $email = $_SESSION['email']; 

                /* Prepare the statement: */
                $check_user =$connect->prepare("
                SELECT 
                * 
                FROM users 
                WHERE email=?
                ");
                        
                $check_user->bind_param("s",$email); //Bind the parameter:
                $check_user->execute(); //Execute the statement:
                $result=$check_user->get_result(); //Get the set of results:
                $row=$result->fetch_assoc(); //Fetch the associated row and store it:

                //If the user is not found in any table, display an error message and redirect to the login page:
                if(!$row){
                    echo '<script>alert("The user could not be found. Please try again.")</script>';
                    header('Refresh: 1; url=login_register.php');
                    exit();
                }

                //Display the user's account information:
                if(isset($row['full_name'])){
                    /* Fetch the user details: */
                    $full_name = $row['full_name'];
                    $email = $row['email'];
                    $bot_ip = $row['bot_ip'];

                    /* Displaying the user's account details, a manage account button and a logout button on the page: */
                    echo "<h2><br>ACCOUNT DETAILS</h2>";
                    echo "<div class='spacing' style='margin-top:50px;'></div>";
                    echo "<div class='user-info'>";
                    echo    "<table class='user-info-table'>";
                    echo        "<tbody>";
                    echo            "<tr>";
                    echo                "<td class='user-td'>";
                    echo                    "<th class='user-th'><h2>Name:</h2></th>";
                    echo                "</td>";
                    echo                "<td class='user-td'>";
                    echo                    "<span>$full_name</span><a href='manage_name.php' class='editButton'>✎</a>";
                    echo                "</td>";
                    echo            "</tr>";
                    echo            "<tr>";
                    echo                "<td class='user-td'>";
                    echo                    "<th class='user-th'><h2>Email:</h2></th>";
                    echo                "</td>";
                    echo                "<td class='user-td'>";
                    echo                    "<span>$email</span><a href='manage_email.php'class='editButton'>✎</a>";
                    echo                "</td>";
                    echo            "</tr>";
                    echo            "<tr>";
                    echo                "<td class='user-td'>";
                    echo                    "<th class='user-th'><h2>BOT IP:</h2></th>";
                    echo                "</td>";
                    echo                "<td class='user-td'>";
                    echo                    "<span>$bot_ip</span><a href='manage_bot_ip.php'class='editButton'>✎</a>";
                    echo                "</td>";
                    echo            "</tr>";
                    echo        "</tbody>";
                    echo    "</table>";
                    echo "</div>";
                }
                //Closing the database connection:
                $connect->close();
            ?>
        </div>
    </body>
</html>