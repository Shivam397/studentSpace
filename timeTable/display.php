
<?php include "../files/db.php" ?>
<?php include "../files/checkAuth.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIME TABLES</title>
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
  <script src="https://kit.fontawesome.com/0d339bdd70.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="./images/icon.jpg" type="image/jpg">
        
    </style>
</head>
<body style="background-color:#E1ebee;">
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

    <img src="./timeTableImg.png" alt=""><br><br>
    <form method="POST" style="margin-right:20px; float:right">
        <div class="form-row align-items-center">
            <div class="col-auto my-1">
            <select name="branches" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option selected>Choose...</option>
                <option value="CS">COMPUTER SCIENCE</option>
                <option value="IT">INFORMATION TECHNOLOGY</option>
                <option value="ECE">ELECTRONICS & COMMUNICATION</option>
                <option value="EE">ELECTRICAL & ELECTRONICS</option>
                <option value="EI"> ELECTRONICS & INSTRUMENTATION</option>
                <option value="MT">MECHATRONICS</option>
                <option value="CE">CHEMICAL</option>
                <option value="BT">BIOTECHNOLOGY</option>
            </select>
        </div>
        <div class="col-auto my-1">
            <button name="submit1" type="submit" class="btn" style="background-color: #0062cc; color:white;">Submit</button>
        </div>
    </div>
</form><br><br>

<?php
    if(!isset($_POST['submit1'])){
        $selectQuery = "select pdf from pdf_file";
        // include "onLoading.php";
    }else{
        $br=$_POST['branches'];
        $selectQuery = "select pdf from pdf_file where branch='$br'";
    }

    // if (isset($_POST['submit'])){
?>
        <tr>
        <td>    
            <div class="div1" style="margin:40px 0 40px 40px;">
            <?php              
                $query = mysqli_query($conn, $selectQuery);
                while($info=mysqli_fetch_array($query)){
            ?>
                <embed src="pdf/<?php 
                echo $info['pdf'] ?>" type="application/pdf" width="600" height="500" style="margin:40px 0 40px 40px;">
            <?php
            }

            ?>
            
            <script>
                $(document).ready(function(){
                    $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $(".dropdown-menu li").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>
        </div>
    </td>
</tr>


<?php
    if($_SESSION['type'] == 'admin'){
        ?>
        <div class="notes-form" id="check" style="background: url('notes.png'); padding-top:40px; padding-left:150px; padding-right:180px;background-repeat: no-repeat;background-size: cover; padding-bottom:150px; width:90%; height:300px; margin:0 auto;">
            <h3 style="color:#fff; margin-left:15px;">Upload TimeTable</h3>
            <form action="display.php" method="POST" enctype="multipart/form-data">
                <div class="col-sm-10">
                    <select name="branch" class="form-select" aria-label="Default select example" required>
                        <option selected>Choose...</option>
                        <option value="CS">COMPUTER SCIENCE</option>
                        <option value="IT">INFORMATION TECHNOLOGY</option>
                        <option value="ECE">ELECTRONICS & COMMUNICATION</option>
                        <option value="EE">ELECTRICAL & ELECTRONICS</option>
                        <option value="EI"> ELECTRONICS & INSTRUMENTATION</option>
                        <option value="MT">MECHATRONICS</option>
                        <option value="CE">CHEMICAL</option>
                        <option value="BT">BIOTECHNOLOGY</option>
                    </select>
                </div><br>

                <div class="row mb-3" style="margin-left:5px;">
                    <label for="fileExample" class="col-sm-2 col-form-label" style="color:#fff;">Choose File</label>
                    <div class="col-sm-10">
                        <input id="pdf" type="file" name="pdf" value="" style="color:white;" required>
                    </div>
                </div>
                <input id="Upload" type="submit" name="submit" value="Upload" class="btn" style="background-color:#0062cc; color:white; margin-left:15px;">
                </div>
            </form>
      <?php
    }
?>


<?php
    if(isset($_POST['submit'])){
      $br = $_POST['branch'];
      $pdf = $_FILES['pdf']['name'];
      $pdf_type = $_FILES['pdf']['type'];
      $pdf_size = $_FILES['pdf']['size'];
      $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
      $pdf_store = "pdf/".$pdf;

      move_uploaded_file($pdf_tem_loc ,$pdf_store);

      $sql = "insert into pdf_file (branch,pdf) values ('$br','$pdf')";

      $query = mysqli_query($conn,$sql);
      if($query)
      {
          echo "<script>
          alert('updated successfully!!');
      </script>";
      }
    }
?>

<br><br>
<?php
    if($_SESSION['type'] == 'admin'){
    ?>
        <div class="notes-form" id="check" style="background: url('notes.png'); padding-top:50px; padding-left:150px; padding-right:180px; padding-bottom:150px; background-repeat: no-repeat;background-size: cover; width:90%; height:300px; margin:0 auto;">
            <h3 style="color:#fff; margin-left:15px;">Delete TimeTable</h3>
            <form action="display.php" method="POST" enctype="multipart/form-data">
                <div class="col-sm-10">
                    <select name="branch" class="form-select" aria-label="Default select example" required>
                        <option selected>Choose...</option>
                        <option value="CS">COMPUTER SCIENCE</option>
                        <option value="IT">INFORMATION TECHNOLOGY</option>
                        <option value="ECE">ELECTRONICS & COMMUNICATION</option>
                        <option value="EE">ELECTRICAL & ELECTRONICS</option>
                        <option value="EI"> ELECTRONICS & INSTRUMENTATION</option>
                        <option value="MT">MECHATRONICS</option>
                        <option value="CE">CHEMICAL</option>
                        <option value="BT">BIOTECHNOLOGY</option>
                    </select>
                </div><br>
                <input id="Upload" type="submit" name="submit2" value="Delete" class="btn" style="background-color:#0062cc; color:white; margin-left:15px;">
            </form>
        </div>
    <?php
    }
?>

<?php
    if(isset($_POST['submit2'])){
      $br = $_POST['branch'];

      $sql = "DELETE FROM pdf_file where branch = '$br'";
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
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

    <div class="weather" style="background-color:#d9dddc; height:40px;">
      <h3 id="temp" style="font-size:25px; color:black; float:right; padding-right:10px;">On Campus: </h3>
      <script src="../files/script.js"></script>
    </div>
    <?php include "../files/footer.php"?>
</body>
</html>