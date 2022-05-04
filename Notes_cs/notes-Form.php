<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="notes-form" style="background: url('');  background-color: #1e4362; padding:20px; max-width:800px; margin:0 auto;">
    <form method="POST" action="display.php" enctype="multipart/form-data">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" name="email" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" name="username" required>
    </div>
  </div>

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
  <input id="upload" type="submit" name="submit" value="upload" class="btn" style="background-color:#cc8d58; color:white;">

  <?php
    include 'db.php';

    if(isset($_POST['submit'])){
        $user = $_POST['username'];
        $email = $_POST['email'];
        $sub = $_POST['subject'];
        $pdf = $_FILES['pdf']['name'];
        $pdf_type = $_FILES['pdf']['type'];
        $pdf_size = $_FILES['pdf']['size'];
        $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
        $pdf_store = "pdf/".$pdf;

        move_uploaded_file($pdf_tem_loc ,$pdf_store);

        $sq = "insert into cs (username,email,subject,pdf) values ('$user','$email','$sub','$pdf')";

        $query = mysqli_query($conn,$sq);
    }
?>
</form>
</div>

</body>
</html>