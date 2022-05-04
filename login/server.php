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

function sendMail($email,$v_code)
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
    $mail->Subject = 'Email verification from studentSpace';
    $mail->Body    = "Thanks for registration <b>Click link below to activate the account!</b>
                      <a href='http://localhost/studentSpace/login/verify.php?email=$email&v_code=$v_code'>Verify</a>";

    $mail->send();
    echo 'Message has been sent';
    return true;
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
    $v_code = bin2hex(random_bytes(16));
  	$query = "INSERT INTO users (username, email, password, vCode, isVerified) 
  			  VALUES('$username', '$email', '$password','$v_code', 0)";

  	if(mysqli_query($db, $query) && sendMail($_POST['email'],$v_code))
    {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      if($_SESSION['success']){
        echo "<script>
                alert('Registration successfully!');
                window.location.href= 'http://localhost/studentSpace/login/login.php';
            </script>";
      }
    }
    else{
      echo "<script>
                alert('Server Down');
                window.location.href= 'http://localhost/studentSpace/login/login.php';
            </script>";
    }
  	
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $type = mysqli_real_escape_string($db, $_POST['type']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (empty($type)) {
      array_push($errors, "UserType is required");
    }
  
    if (count($errors) == 0) {
        if($type == 'admin'){
          $password = ($password);
          $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        }else{
          $password = md5($password);
          $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        }
  
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $result_fetch = mysqli_fetch_assoc($results);
          if($result_fetch['isVerified'] == 1)
          {
            $_SESSION['id'] = $result_fetch['id'];
            $_SESSION['type'] = $type;
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: ../Homepage/index.php'); 
          }
          else{
            echo "Email not verified";
            ?>
            <script>
              alert('Email not verified');
            </script>
            <?php
              header('location: ../Homepage/index.php');  
          }
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  ?>