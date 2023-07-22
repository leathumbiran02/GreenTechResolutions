<?php
    //Starting the session so we can check if the user is logged in:
    session_start();

    //Using the database configuration file:
    require_once('db_config.php');

    //Checking if the email address is stored in the session:
    if(!isset($_SESSION['email'])){
        echo "<script>alert('You must be logged in to view this page.')</script>";
        header('Refresh: 1; url=login_register.php');
        exit();
    }

    // Get the timer value from the POST request
    if (isset($_POST['timerValue'])) {

        //Fetch the timer value from the form:
        $timerValue = $_POST['timerValue'];

        //Get the users' email from the session:
        $userEmail = $_SESSION['email'];

        /* Create a connection to the database: */
        $connect=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        //If the connection fails display an error:
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        //Prepare the statement:
        $saveTimer=$connect->prepare("
        INSERT INTO fish_feeder_timers 
        (user_email, timer_value) 
        VALUES (?, ?) 
        ON DUPLICATE KEY UPDATE timer_value = ?
        ");

        $saveTimer->bind_param("sii", $userEmail, $timerValue, $timerValue); //Bind the parameters:

        //If the statement is executed, display an alert message:
        if ($saveTimer->execute()) {
            echo $timerValue; // Echo the updated timer value back to the JavaScript code:
        } else {
            echo ""; // Return an empty string if there was an error updating the timer value:
        }

        //Close the prepared statement and the connection to the database:
        $saveTimer->close();
        $connect->close();
    } else {
        echo ""; // Return an empty string if there was an error updating the timer value:
    }
?>