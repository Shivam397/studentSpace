<?php include "../files/checkAuth.php" ?>
<?php include "../files/db.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOTICES</title>
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
  <link rel="stylesheet" href="mystyle.css">
  <style>
    .div{
      display:flex;
      justify-content:space-between;
      max-width:1300px;
      margin: 0 auto;
    }

  </style>
</head>
<body>
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

    <img src="noticeImg.png" alt=""><br>

  <br>
  <div class="div">
    <div class="d1" style="height:700px; margin-top:32px;">
    <!-- <br> -->
      <?php            
          $sql = "SELECT doe,description FROM notice";
          $result = $conn->query($sql);

          if (mysqli_num_rows($result) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="card" style="height:400px; width:400px;">
                  <div class="cards" style="background-color:#1e4362; height:400px; width:400px;border-radius:8px; ">
                    <h3 style="color:white; text-align:center; padding:40px;"><?php echo $row["doe"]; ?></h3>
                    <br>
                    <p  style="color:white; text-align:center;"><?php echo $row["description"]; ?></p>
                    <br>
                  </div>
                </div>
                <br><br><br>
                <?php
              }
            } else {
              echo "0 results";
            }
      ?>
    </div>


    <div class="d2">
      <?php            
        $sql = "SELECT pdf FROM notice";
        $result = $conn->query($sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              ?><br>
              <embed src="pdf/<?php 
                echo $row['pdf'] ?>" type="application/pdf" width="700" height="400"><br><br><br>
            <?php

            }
          } else {
            echo "0 results";
          }
      ?>
    </div>
  </div>
    

    <script>
          $(document).ready(function(){
              $("#myInput").on("keyup", function() {
                  var value = $(this).val().toLowerCase();
                  $(".dropdown-menu li").filter(function() {
                      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                  });
              });
          });
    </script><br><br><br><br><br>


  

  <?php
    if($_SESSION['type'] == 'admin'){
      ?>
        <div class="notes-form" id="check" style="background: url('../Homepage/images/notes_2.jpg'); padding-top:70px; padding-left:150px; padding-right:180px; padding-bottom:150px; width:90%; height:500px; margin:0 auto;">
          <h3  style="color:white;">Upload Notices</h3>
          <form action="display.php" method="POST" enctype="multipart/form-data">
            <label for="DateInput" class="form-label" style="color:white;">Date</label>
            <input type="date" class="form-control form-control-color" id="DateInput" value="" title="set date" name="date">
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label"  style="color:white;">Description</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
            </div>
            <div class="row mb-3">
              <label for="fileExample" class="col-sm-2 col-form-label"  style="color:white;">Choose File</label>
              <div class="col-sm-10">
                <input id="pdf" type="file" name="pdf" value="" style="color:white;" required>
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
      $date = $_POST['date'];
      $des = $_POST['description'];
      $pdf = $_FILES['pdf']['name'];
      $pdf_type = $_FILES['pdf']['type'];
      $pdf_size = $_FILES['pdf']['size'];
      $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
      $pdf_store = "pdf/".$pdf;

      move_uploaded_file($pdf_tem_loc ,$pdf_store);

      $sql = "insert into notice (doe,description,pdf) values ('$date','$des','$pdf')";

      $query = mysqli_query($conn,$sql);
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