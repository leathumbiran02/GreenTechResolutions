<?php
    //Using the database configuration file:
    require_once('db_config.php');

    //This code is executed when the user clicks the submit button in the login form:
    if(isset($_POST['login_submit'])){
        //Creating a connection to the database:
        $connect = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        //Retrieve the user's email and password from the form and store it:
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Using prepared statements with parameterized queries:
        //Prepare the statement for the users table:
        $login_user=$connect->prepare("
        SELECT 
        * 
        FROM users 
        WHERE email=?
        ");

        $login_user->bind_param("s",$email); //Bind the parameter:
        $login_user->execute(); //Execute the statement:
        $result=$login_user->get_result(); //Get the set of results:
        $row=$result->fetch_assoc(); //Fetch the associated row and store it in $row:

        //Check if the record exists (a row was found) and then redirect to the user's account, otherwise display an error message:
        if($row){
            //If the user exists in the users table:
            $hash_password=$row['password']; //Retrieve the hashed password from the database:

            //Use the password_verify function to verify the password:
            if(password_verify($password,$hash_password)){ 
                //Successful login, redirect to account page:
                session_start(); //Start a session to store the user's information:
                
                /* Session variables: */
                $_SESSION['email']=$row['email']; //Store the users email in a session variable:
                $_SESSION['user_id']=$row['user_id']; //Store the users id in a session variable:
                $_SESSION['users']='true'; //Set the user key to true:

                $full_name = $row['full_name']; //Get the user's first name from the database:

                echo "<script>alert('Welcome $full_name.')</script>"; //Display a successful login message to the user:
                header('Refresh: 1; url=plant.php'); //Redirect to the plant page:
                exit();
            }else{ 
                //If the user was not found in the users table, display an error message:
                echo '<script>alert("Invalid Login. Please Try Again.")</script>'; //Failed login, displays an error message:
                header('Refresh: 1; url=login_register.php'); //Redirect the user to the login page after failure to login:
                exit();
            }
        }
        else {
            //If for any reason the database fails or the user is not found, display an error message:  
            echo '<script>alert("The user was not found. Please Try Again.")</script>'; //Failed login, displays an error message:
            header('Refresh: 1; url=login_register.php'); //Redirect the user to the login page after failure to login: 
        }
        //Closing the prepared statements and database connection:
        $login_user->close();
        $connect->close();
    }else{ /* Form was not submitted, display an error message and redirect to the login page: */
        echo '<script>alert("You do not have permission to access this page.")</script>'; //Display an error message:
        header('Refresh: 1; url=login_register.php');
        exit();
    }
?>