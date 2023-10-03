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
    if (isset($_POST['refreshed'])) {

        // Get the current date and time as a Unix timestamp
        $currentDateTime = time();

        /* Create a connection to the database: */
        $connect=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        //If the connection fails display an error:
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        // Prepare the statement:
        $saveRefreshTime = $connect->prepare("
        INSERT INTO system_check_timers
        (user_email, timer_value)
        VALUES (?, ?)
        ON DUPLICATE KEY UPDATE timer_value = ?
        ");

        $userEmail = $_SESSION['email']; /* Get the user email from the session: */

        $saveRefreshTime->bind_param("sss", $userEmail, $currentDateTime, $currentDateTime); // Bind the parameters:

        // If the statement is executed, display an alert message:
        if ($saveRefreshTime->execute()) {
            echo "Refresh time updated: " . $currentDateTime; // Echo a response back to JavaScript if needed
        } else {
            echo "Error updating refresh time."; // Return an error message if there was an issue
        }

        // Store the last test time in the session
        $_SESSION['lastTestTime'] = $currentDateTime;

        // Close the prepared statement and the connection to the database:
        $saveRefreshTime->close();
        $connect->close();
    } else {
        echo "Invalid request.";
    }
?>