<?php
session_start();

if (isset($_POST['lastTestTime'])) {
    $_SESSION['lastTestTime'] = $_POST['lastTestTime'];
    echo "Session last test time updated.";
} else {
    echo "Invalid request.";
}
?>
