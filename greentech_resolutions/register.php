<?php
    //Using the database configuration file:
    require_once('db_config.php');

    //This code is executed when the user clicks the submit button in the registration form:
    if(isset($_POST['register_submit'])) {
        //Retrieving the data from the form and storing it:
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $confirm_pass = $_POST['confirm_pass'];
        $bot_ip = $_POST['bot_ip'];
        
        /* Hasing passwords for security purposes: */
        $hash_password=password_hash($pass, PASSWORD_DEFAULT); 

        //Creating a connection to the database:
        $connect = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        if(!$connect) {//If the connection fails display an error:
            die("Connection failed! " . mysqli_connect_error());
        }

        /* Checking if the email entered already exists in the user table or vendor table before inserting: */
        /* Prepare the statement: */
        $email_exists=$connect->prepare("
        SELECT email 
        FROM users 
        WHERE email=?
        ");

        $email_exists->bind_param("s",$email); /* Bind the parameter: */
        $email_exists->execute(); /* Execute the statement: */
        $result=$email_exists->get_result(); /* Get the result: */

        /* If the email already exists, display an error message to the user: */
        if($result->num_rows>0){
            echo '<script>alert("This email address has already been used. Please use a different one.")</script>'; //Display an error message to the user:
            header('Refresh: 1; url=login_register.php'); //Redirect the user to the registration page after failing to register:
        }else{   
            /* If the email does not exist, check if the password entered in both boxes are the same:  */
            if($pass===$confirm_pass){
                /* Insert into the users table: */
                //Prepare the statement for the users table:
                $create_user=$connect->prepare("
                INSERT INTO users (
                full_name, 
                email, 
                password,
                bot_ip
                )
                VALUES (?,?,?,?)
                ");

                $create_user->bind_param("ssss",$full_name,$email,$hash_password,$bot_ip); //Bind the parameters:

                //Execute the statement:
                /* If connection is successful and a row was affected, display a success message and redirect to the login page: */
                if($create_user->execute()){
                    if(mysqli_affected_rows($connect)>0){
                        echo '<script>alert("Thank you for registering with us!")</script>';
                        header('Refresh: 1; url=login_register.php'); 
                    }else{ //If the statement cannot be executed, display an error message and redirect to the login page:
                        echo '<script>alert("Failed To Register. Please Try Again.")</script>';
                        header('Refresh: 1; url=login_register.html'); 
                    } 
                }
                else{  //If executing the statement fails for any other reason, display an error message and redirect to the login page:
                    echo '<script>alert("Failed To Register. Please Try Again.")</script>';
                    header('Refresh: 1; url=login_register.html'); 
                }
                //Closing the prepared statement:
                $create_user->close();
            }else{  /* Password and Confirm Password Do not Match, display an error message and redirect to the login page: */
                echo '<script>alert("The passwords you entered do not match. Please try again.")</script>';
                header('Refresh: 1; url=login_register.php');
            }
        }
        //Closing the prepared statement and the database connection:
        $email_exists->close();
        $connect->close();
    }
?>
