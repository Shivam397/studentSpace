<?php include "../files/checkAuth.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

  <!-- <link rel="stylesheet" href="index.js"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
  <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet' />
  <script src="https://kit.fontawesome.com/0d339bdd70.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="./images/icon.jpg" type="image/jpg">

  <link rel="stylesheet" href="./contact_list.css">

  <style>
        tr:nth-child(odd) {
            /* background-color: #d6cfc7; */
            /* background-color: #cbc6c6; */
            background-color: #d9dddc;
        }
    </style>
  <title>Contact List</title>
</head>
<body>
    <?php include "../files/db.php" ?>
    <?php   
        if(isset($_SESSION['type'])) {
          $_SESSION['msg'] = "You have to log in first";
          if($_SESSION['type'] == 'admin')
            include "../files/navbar_admin.php";
          else{
            include "../files/nav_logout.php";
          }
      }else{
        include "../files/navbar.php";
      }
    ?>


    <div class="cont">
        <img src="./contactImg.png" alt="">
    </div><br><br>

    <div class="container">
    <h2 style="color:rgb(25,56,135);">CONTACTS</h2>
    <table class="table">
        <!-- <tr style="background-color:#D49F73;"> -->
        <tr style="background-color:rgb(25,56,107,0.8);">
            <th style="color:#fff;">Id</th>
            <th style="color:#fff;">Name</th>
            <th style="color:#fff;">Email Id</th>
            <th style="color:#fff;">Phone No.</th>
        </tr>

            <?php   
                $selectQuery = "select * from teacher";
                $query = mysqli_query($conn, $selectQuery);     
                
                while($res = mysqli_fetch_array($query)){
                ?>

                    <tr>
                        <td><?php   echo $res['teacher_id']; ?></td>
                        <td><?php   echo $res['name']; ?></td>
                        <td><?php   echo $res['email']; ?></td>
                        <td><?php   echo $res['mobile']; ?></td>
                    </tr>
                <?php
                }
                ?>
                    
    </table>
    </div>
    <br><br>
    <?php include "cards.php" ?>
    <br><br><br>

    <?php
    if($_SESSION['type'] == 'admin'){
    ?>
        <div class="notes-form" id="check" style="background: url('../Homepage/images/notes_2.jpg'); padding-top:70px; padding-left:150px; padding-right:180px; padding-bottom:150px; width:90%; height:500px; margin:0 auto;">
            <h3>Upload Details</h3><br>
            <form action="contact_list.php" method="POST">
            <div class="row mb-3">
              <label for="fileExample" class="col-sm-2 col-form-label" style="color:white;">Enter name</label>
              <div class="col-sm-10">
                <input id="text" type="text" name="name" value="" style="background-color:white;" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="fileExample" class="col-sm-2 col-form-label" style="color:white;">Enter Email</label>
              <div class="col-sm-10">
                <input id="text" type="text" name="email" value="" style="background-color:white;" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="fileExample" class="col-sm-2 col-form-label" style="color:white;">Enter mobile</label>
              <div class="col-sm-10">
                <input id="text" type="text" name="mobile" value="" style="background-color:white;" required>
              </div>
            </div>
                <input id="Upload" type="submit" name="submit" value="Upload" class="btn" style="background-color:#0062cc; color:white;">
            </form>
        </div>
    <?php
    }
?>

<?php

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        $sql = "insert into teacher (name,email,mobile) values ('$name','$email','$mobile')";

        $query = mysqli_query($conn,$sql);
        if($query)
        {
          echo "<script>
            alert('Updated successfully!!');
          </script>";
        }
    }
?>


<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

<br><br><br>
    
    <div class="weather" style="background-color:#d9dddc; height:40px;">
      <h3 id="temp" style="font-size:25px; color:black; float:right; padding-right:10px;">On Campus: </h3>
      <script src="../files/script.js"></script>
    </div>
    <?php include "../files/footer.php" ; ?>
</body>
</html>