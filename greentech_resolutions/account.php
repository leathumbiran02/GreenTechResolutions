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

        <style>
            .hero{ /* Centering the text on the page: */
                text-align: center;
            }
            .addbutton { /* Button when clicking on BOT IP: */
                background: linear-gradient(to right, #09BA20, #6cff7f);
                border: none;
                border-radius: 20px;
                cursor: pointer;
                display: initial;
                padding: 15px;
                width:30%;
                color: black;
                font-size: 21px;
                font-weight: bold;
                text-align:center;
                transition: background-color 0.3s ease-in-out;
                text-decoration: none;
                margin:20px;
                border: 3px solid black;
            }
            .chat-page-toggle_register_login_btn{
                font-size:40px;
                padding: 0px 30px;
            }
            .hero h1{
                color: #343A54;
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
                    echo "<h1 class='chat-page-toggle_register_login_btn'><br>Account Details</h1>";
                    echo "<a href='manage_bot_ip.php'><button class='addbutton'>Change BOT IP</button></a>";
                    echo "<div class='user-info'>";
                    echo    "<table class='user-info-table'>";
                    echo        "<tbody>";
                    echo            "<tr>";
                    echo                "<td class='user-td'>";
                    echo                    "<th class='user-th'>Name:</th>";
                    echo                "</td>";
                    echo                "<td class='user-td'>";
                    echo                    "$full_name";
                    echo                "</td>";
                    echo            "</tr>";
                    echo            "<tr>";
                    echo                "<td class='user-td'>";
                    echo                    "<th class='user-th'>Email:</th>";
                    echo                "</td>";
                    echo                "<td class='user-td'>";
                    echo                    "$email";
                    echo                "</td>";
                    echo            "</tr>";
                    echo            "<tr>";
                    echo                "<td class='user-td'>";
                    echo                    "<th class='user-th'>BOT IP:</th>";
                    echo                "</td>";
                    echo                "<td class='user-td'>";
                    echo                    "$bot_ip";
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