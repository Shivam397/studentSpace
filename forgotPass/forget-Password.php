<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
      <title>Send Reset Password Link with Expiry Time in PHP MySQL</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <div class="container" style="margin-top:100px; border-radius:30px; width:800px;">
          <div class="card">
            <div class="card-header text-center header">Reset Password</div>
            <div class="card-body" style="background: rgba(255, 255, 255, 0.8);">
              <form action="password-reset-token.php" method="post" style="background: rgba(255, 255, 255, 0.362);">
                <div class="form-group" style="background: rgba(255, 255, 255, 0.362);">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <input type="submit" name="password-reset-token" class="btn btn-primary">
              </form>
            </div>
          </div>
      </div>
 
   </body>
</html>