<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Reset Password In PHP MySQL</title>
<!-- CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="reset-password.css">
</head>
<body>

<?php
if($_GET['key'] && $_GET['token'])
{
    include "../files/db.php";
    $email = $_GET['key'];
    $token = $_GET['token'];
    $query = mysqli_query($conn,
        "SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$email."';");
    $curDate = date("Y-m-d H:i:s");
    if (mysqli_num_rows($query) > 0) {
        $row= mysqli_fetch_array($query);
        if($row['exp_date'] >= $curDate){ ?>
            <?php include "verify_pass.php"; ?>
        <?php } 
    }else{
        ?>
        <p>This forget password link has been expired</p>
        <?php
    }
}
?>
</div>
</div>
</div>
</body>
</html>