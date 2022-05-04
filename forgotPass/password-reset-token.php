<?php

session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'db123');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require ("PHPMailer\PHPMailer.php");
require ("PHPMailer\SMTP.php");
require ("PHPMailer\Exception.php");

include "../files/db.php";

if(isset($_POST['password-reset-token']) && $_POST['email'])
{
     
    $emailId = $_POST['email'];
 
    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $emailId . "'");
 
    $row= mysqli_fetch_array($result);
 
    if($row)
    {
     
    $password = $row['password'];    
    $token = md5($emailId).rand(10,9999);

    $expFormat = mktime(
    date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
    );
 
    $expDate = date("Y-m-d H:i:s",$expFormat);
 
    $update = mysqli_query($conn,"UPDATE users set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
 
    $link = "<a href='http://localhost/studentSpace/forgotPass/reset-password.php?key=".$emailId."&token=".$token."'>Click To Reset password</a>";

 
    $mail = new PHPMailer();
 
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "studentspace554@gmail.com";
    // GMAIL password
    $mail->Password = "Students@999";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='shivamsawarni554@gmail.com';
    $mail->FromName='studentSpace';
    $mail->AddAddress($emailId);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
        echo "<script>
          alert('Check the Email for Reset password link');
          window.location.href= 'http://localhost/studentSpace/login/login.php';
        </script>";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{
    echo "<script>
      alert('you have not registered yet');
      window.location.href= 'http://localhost/studentSpace/login/register.php';
    </script>";
  }
}
?>