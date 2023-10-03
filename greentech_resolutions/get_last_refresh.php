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

    // Check if the user is logged in
    if (isset($_SESSION['lastTestTime'])) {
        $lastRefreshTime = $_SESSION['lastTestTime'];
    }
    else{
        /* Create a connection to the database: */
        $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // If the connection fails, display an error:
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        // Prepare the statement to fetch the last test time
        $getLastRefreshTime = $connect->prepare("
        SELECT timer_value FROM system_check_timers
        WHERE user_email = ? 
        ");

        $userEmail = $_SESSION['email'];

        $getLastRefreshTime->bind_param("s", $userEmail); // Bind the parameters

        // If the statement is executed, fetch the last test time
        if ($getLastRefreshTime->execute()) {
            $result = $getLastRefreshTime->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $lastRefreshTime = $row['timer_value'];

                // Store the fetched last test time in the session
                $_SESSION['lastTestTime'] = $lastRefreshTime;

                // Echo the last test time as a response
                echo $lastRefreshTime;
            } else {
                echo "No test times found for the user.";
            }
        } else {
            echo "Error fetching last test time.";
        }
    
        // Close the prepared statement and the connection to the database:
        $getLastRefreshTime->close();
        $connect->close();
    }
?>