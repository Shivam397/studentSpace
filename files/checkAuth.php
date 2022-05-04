<?php
    session_start();
  
    // If the session variable is empty, this
    // means the user is yet to login
    // User will be sent to 'login.php' page
    // to allow the user to login
    if (!isset($_SESSION['type'])) {
        $_SESSION['msg'] = "You have to log in first";
        header("Location: ../login/login.php");
    }

?>