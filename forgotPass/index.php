<?php include('../login/server.php') ?>
<?php include('../navbar/db.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap");
    </style>
</head>
<body>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$forgot_pass)
{
  require ("PHPMailer\PHPMailer.php");
  require ("PHPMailer\SMTP.php");
  require ("PHPMailer\Exception.php");

  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'studentspace554@gmail.com';                     //SMTP username
    $mail->Password   = 'Students@999';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('shivamsawarni554@gmail.com', 'StudentSpace');
    $mail->addAddress($email);     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Password recovery from studentSpace';
    $mail->Body    = "Click here for reset your Password!</b>
                      <a href='http://localhost/studentSpace/login/verify_pass.php?email=$email&forgot_pass=$forgot_pass'>Click here!</a>";

    $mail->send();
    echo 'Message has been sent';
    return true;
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

?>
    <div class="header">
  	    <h2>Reset Your Password</h2>
    </div>
        
    <form method="post" action="index.php">
        <?php include('../login/errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" >
        </div>
        <div class="input-group">
            <label>New Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="submit">Submit</button>
        </div>
        <p>
            Not yet a member? <a href="../login/register.php">Sign up</a>
        </p>
    </form>

    <?php
        if (isset($_POST['submit'])){
            $user = $_POST['username'];
            $pass = $_POST['password'];

            $user_check_query = "SELECT * FROM users WHERE username='$user' LIMIT 1";
            $result = mysqli_query($conn, $user_check_query);
            $user = mysqli_fetch_assoc($result);

            if($user){
                $sql = "UPDATE users SET password =md5('$pass') WHERE username='$user' ";
                if ($conn->query($sql) === TRUE) {
                    echo "Password updated successfully";
    ?>
                    <h2>Return to <a href="../login/login.php">Login </a> </h2>
                <?php
                }
            }
            else{
                echo "User not found" ;
            }
        }
                ?>    

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</body>
</html>