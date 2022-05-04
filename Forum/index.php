<?php include "../files/checkAuth.php" ; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        #ques{
            min-height: 433px;
        }
        body{
            background: #E1ebee;
        }
    </style>
    <title>Welcome to Forums</title>
</head>

<body>
    <?php include "../files/db.php"?>
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


    <!-- Category container starts here -->
    <div class="container my-4" id="ques">
        <h2 class="text-center my-4"  style="color:#19386b;">Browse Questions</h2>
        <div class="row my-4">
          <!-- Fetch all the categories and use a loop to iterate through categories -->
         <?php 
            $sql = "SELECT * FROM `categories`"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
            // echo $row['category_id'];
            // echo $row['category_name'];
            $id = $row['category_id'];
            $cat = $row['category_name'];
            $desc = $row['category_description'];
            echo '<div class="col-md-4 my-2">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body" style=" background-color:#b6c5e6;">
                            <h5 class="card-title"><a href="threadlist.php?catid=' . $id . '">' . $cat . '</a></h5>
                            <p class="card-text">' . substr($desc, 0, 90). '... </p>
                            <a href="threadlist.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
                        </div>
                    </div>
                    </div>';
            } 
         ?>
            
 
        </div>
    </div>

    <div class="container1" style="background: url('notes_2.jpg'); padding :130px 180px 150px 150px; width:90%; height:500px; margin:0 auto;">
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="color:white">Subject Name</label>
                <input type="text" class="form-control" name="category" id="exampleFormControlInput1" placeholder="Enter subject name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" style="color:white">Ask question</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"></textarea>
            </div>
            <input type="submit" value="submit" name="submit" class="btn" style="background-color:#0062cc; color:white;">
        </form>
    </div>
    
    <br><br>
    <?php
        if(isset($_POST['submit'])){
            $cat = $_POST['category'];
            $text = $_POST['text'];
            
            $sql = "INSERT INTO categories (category_name,category_description) values ('$cat','$text')";
            $query = mysqli_query($conn,$sql);
            if($query)
            {
                echo "<script>
                    alert('Category created successfully!!');
                </script>";
            }
        }
    ?>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

    <div class="weather" style="background-color:#d9dddc; height:40px;">
      <h3 id="temp" style="font-size:25px; color:black; float:right; padding-right:10px;">On Campus: </h3>
      <script src="../files/script.js"></script>
    </div>
    <?php include "../files/footer.php" ; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
    