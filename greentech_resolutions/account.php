<?php
    //Starting the session:
    session_start();

    //Using the database configuration file:
    require_once('db_config.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <!--Title of Web Page: Lights Out-->
        <title>Lights Out</title>

        <!--Using a CSS style sheet for the page:-->
        <link rel="stylesheet" href="style.css">

        <style>
            .hero{ /* Centering the text on the page: */
                text-align: center;
            }
            .addbutton { /* Button when clicking on products */
                background: linear-gradient(to right, rgb(101,43,252,1), rgb(176,20,252,1));
                cursor: pointer;
                display: initial;
                padding: 15px;
                width:30%;
                color: #ffffff;
                font-size: 21px;
                font-weight: bold;
                text-align:center;
                transition: background-color 0.3s ease-in-out;
                text-decoration: none;
                margin:20px;
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
                    header('Location: login_register.php');
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
                    /* Fetch the user/vendor details: */
                    $full_name = $row['full_name'];
                    $email = $row['email'];

                    /* Displaying the user's account details, a manage account button and a logout button on the page: */
                    echo "<h1 class='main-header'>Account Details:</h1>";
                    echo "<div class='user-info'>";
                    echo    "<table>";
                    echo        "<tbody>";
                    echo            "<tr>";
                    echo                "<td>";
                    echo                    "<th>Name:</th>";
                    echo                "</td>";
                    echo                "<td>";
                    echo                    "$full_name";
                    echo                "</td>";
                    echo            "</tr>";
                    echo            "<tr>";
                    echo                "<td>";
                    echo                    "<th>Email:</th>";
                    echo                "</td>";
                    echo                "<td>";
                    echo                    "$email";
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