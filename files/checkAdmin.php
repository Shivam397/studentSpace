<?php include "db.php" ?>
<?php

    session_start();
    
      // If the session variable is empty, this
      // means the user is yet to login
      // User will be sent to 'login.php' page
      // to allow the user to login
      if (!isset($_SESSION['username'])) {
          $_SESSION['msg'] = "You have to log in first";
        //   $username = $_SESSION['username'];
        //   echo $username;
          include "../files/navbar.php";
      }else{
          $username = $_SESSION['username'];
          echo $username;
          if($username == 'Admin'){
            echo "hello,I'm Admin";
            include "../files/navbar_admin.php";
          }
      }

?>