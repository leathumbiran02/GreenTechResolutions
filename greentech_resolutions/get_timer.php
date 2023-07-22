<?php
    //Starting the session so we can check if the user is logged in:
    session_start();

    //Using the database configuration file:
    require_once('db_config.php');

    //Checking if the email address is stored in the session:
    if (!isset($_SESSION['email'])) {
        echo "Error: You must be logged in to view this page.";
        exit();
    }

    //Get the users' email from the session:
    $userEmail = $_SESSION['email'];

    /* Create a connection to the database: */
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    //If the connection fails, display an error:
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    //Prepare the statement to fetch the timer value:
    $fetchTimer = $connect->prepare("SELECT timer_value FROM fish_feeder_timers WHERE user_email = ?");
    $fetchTimer->bind_param("s", $userEmail);
    $fetchTimer->execute();

    //Bind the result to a variable:
    $fetchTimer->bind_result($timerValue);

    //Fetch the result and return it as JSON
    if ($fetchTimer->fetch()) {
        echo $timerValue;
    } else {
        echo "";
    }

    //Close the statement and connection:
    $fetchTimer->close();
    $connect->close();
?>
