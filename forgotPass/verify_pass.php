<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="reset-password.css">
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="card">
<div class="card-header text-center header">Reset Password In PHP MySQL</div>
<div class="card-body">
<form action="update-forget-password.php" method="post">
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
    <div class="form-group reset-form">
        <label for="exampleInputEmail1">Password</label>
        <input type="password" name='password' class="form-control" placeholder="Password of atleast 7 characters">
        </div>                
        <div class="form-group">
        <label for="exampleInputEmail1">Confirm Password</label>
        <input type="password" name='cpassword' class="form-control">
        </div>
        <input type="submit" name="new-password" class="btn btn-primary">
</form>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</body>
</html>