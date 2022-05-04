<?php include "../files/checkAuth.php" ?>
<?php include "../files/db.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS NOTES</title>
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
  <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <script src="https://kit.fontawesome.com/0d339bdd70.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
      body{
        background-color: #E1ebee;
      }
      
      .all-notes{
        max-width:1200px;
        margin:0 auto;
      }

      .notes-form label{
        color:#fff;
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

    <br><br>

    <form method="POST" action ="display.php" style="margin-right:270px; float:right;">
        <div class="form-row">
          <input type="text" name="search" placeholder="Search here" style="width:1015px; height:40px;"> &nbsp;
          <button name="submitSearch" type="submit" class="btn" style="background-color:#0062cc; color:white; height:40px;">Submit</button>
        </div>
    </form>
    <br><br>
    <br><br>

    
    <?php
      if(!isset($_POST['submitSearch']))
        $sql = "SELECT subject, username, pdf FROM cs";
      else
      {
        $sr = $_POST['search'];
        $sql = "SELECT subject, username, pdf FROM cs where pdf like '%$sr%' ";
      }
    ?>

  <div class="all-notes">
    <?php            
      // $sql = "SELECT subject, username, pdf FROM cs";
      $result = $conn->query($sql);

      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
            ?>
             <div class="card" style="height:700px; width:1100px; background-color:rgba(221, 216, 216, 0.75);">
              <div class="cards" style="background-color:#19386b; height:85px; width:1100px;">
      
            <h4 style= color:white;><i class="uil uil-book-open" style= "color:white;"></i> <?php echo $row['subject'] ?></h4>
            <h6 style= color:white;> <?php echo $row['username'] ?> </h6>
            <br>
            <embed src="pdf/<?php 
                echo $row['pdf'] ?>" type="application/pdf" width="1100px" height="700px">
                </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

            <?php
          }
        } else {
          echo "0 results";
        }
    ?>
  </div>


<br><br>
<br><br>

<?php
    if($_SESSION['type'] == 'admin'){
    ?>
        <div class="form" id="check" style=" margin-top:200px; padding-top:10px; padding-left:150px; padding-right:180px; background-color:blue; padding-bottom:150px; width:90%; height:300px; margin:0 auto;">
            <h3>Delete Notes</h3>
            <form action="display.php" method="POST">
              <div class="row mb-3">
                <label for="fileExample" class="col-sm-2 col-form-label">Enter name of pdf</label>
                <div class="col-sm-10">
                  <input id="text" type="text" name="name" value=""  required>
                </div>
              </div>
                <input id="Upload" type="submit" name="submit2" value="Delete" class="btn" style="background-color:#0062cc; color:white;">
            </form>
        </div>
    <?php
    }
?>

<?php
    if(isset($_POST['submit2'])){
      $name = $_POST['name'];

      $sql = "DELETE FROM cs where pdf like '%$name%'";
      $query = mysqli_query($conn,$sql);
      if($query)
      {
        echo "<script>
            alert('Deleted successfully!!');
        </script>";
      }
    }
?>

<br><br>
<br><br>
<br><br>
<div class="notes-form" style="background: url('notes_2.jpg'); padding-top:130px; padding-left:150px; padding-right:180px; padding-bottom:150px; width:90%; height:500px; margin:0 auto;">
    <form method="POST" action="display.php" enctype="multipart/form-data">
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Subjects</label>
    <div class="col-sm-10">
        <select name="subject" class="form-select" aria-label="Default select example" required>
            <option selected>Choose...</option>
            <option value="DS">DATA STRUCTURES</option>
            <option value="IDE">DISCRETE MATHEMATICS</option>
            <option value="AI">ARTIFICIAL INTELLIGENCE AND MACHINE LEARNING</option>
            <option value="DBMS">DATABASE MANAGEMENT SYSTEM</option>
            <option value="JAVA">JAVA</option>
            <option value="TOC">THEORY OF COMPUTATION</option>
            <option value="OS">OPERATING SYSTEM</option>
            <option value="SE">SOFTWARE ENGINEERING</option>
            <option value="SP">SYSTEM PROGRAMMING</option>
            <option value="OOP">OBJECT ORIENTED PROGRAMMING</option>
            <option value="DAA">DESIGN AND ANALYSIS OF ALGORITHMS</option>
            <option value="COA">COMPUTER ORGANIZATION AND ARCHITECTURE</option>
            <option value="DCN">DATA COMMUNICATION AND NETWORKING</option>
        </select>
    </div>
  </div>

  <div class="row mb-3">
    <label for="fileExample" class="col-sm-2 col-form-label">File</label>
    <div class="col-sm-10">
        <input id="pdf" type="file" name="pdf" value="" style="color:white;" required>
    </div>
  </div>
  <input id="Upload" type="submit" name="submit" value="Upload" class="btn" style="background-color:#0062cc; color:white;">

  <?php

    if(isset($_POST['submit'])){
        $user = $_SESSION['username'];
        $sub = $_POST['subject'];
        $pdf = $_FILES['pdf']['name'];
        $pdf_type = $_FILES['pdf']['type'];
        $pdf_size = $_FILES['pdf']['size'];
        $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
        $pdf_store = "pdf/".$pdf;

        move_uploaded_file($pdf_tem_loc ,$pdf_store);

        $sql = "insert into cs (username,subject,pdf) values ('$user','$sub','$pdf')";

        $query = mysqli_query($conn,$sql);
    }
?>





<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</form>
</div>
<br>
<div class="weather" style="background-color:#cfd9e5; height:40px;">
    <h3 id="temp" style="font-size:25px; color:black; float:right; padding-right:10px;">On Campus: </h3>
    <script src="../files/script.js"></script>
  </div>

  <?php include "../files/footer.php" ; ?>
</body>
</html>