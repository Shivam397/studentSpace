<?php
    if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'])
    {
        include "../files/db.php";
        $emailId = $_POST['email'];
        $token = $_POST['reset_link_token'];
        $password = md5($_POST['password']);

        $query = mysqli_query($conn,"SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'");
        $row = mysqli_num_rows($query);
        if($row){
            mysqli_query($conn,"UPDATE users set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE email='" . $emailId . "'");
            
            echo "<script>
                alert('Congratulations! Your password has been updated successfully.');
                window.location.href= 'http://localhost/studentSpace/login/login.php';
            </script>";
            // echo '<p>Congratulations! Your password has been updated successfully.</p>';
            
        }else{
           echo "<script>
               alert('Something went wrong, Try again.');
               window.location.href= 'http://localhost/studentSpace/forgotPass/forget-Password.php';
            </script>";
        }
    }
?>