<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400&display=swap");
        .btn {
            padding: 10px;
            font-size: 15px;
            color: white;
            background: #1e4362;
            border: none;
            border-radius: 5px;
        }

        .btn:hover{
            color:#fff;
        }
    </style>
</head>
<body>
      <div class="header">
  	<h2>Login</h2>
  </div>
        
    <form method="post" action="login.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" >
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <div class="select">
            <label for="">User Type</label>
            <select class="form-select" name="type" aria-label="Default select example">
                <option selected>Choose..</option>
                <option value="admin">admin</option>
                <option value="users">User</option>
            </select>
        </div>

        <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
        </div>
        <p><a href="../forgotPass/forget-Password.php">Forgot Password</a> </p>
        <p>
            Not yet a member? <a href="register.php">Sign up</a>
        </p>
    </form>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>
