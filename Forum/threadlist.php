<?php
    // ini_set('error_reporting',0);
    // ini_set('display_errors',0);
?>

<?php session_start();
if(isset($_SESSION['id']))
{

    ?>

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
            #ques {
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
        <?php include "../files/nav_logout.php"?>

        <?php
            $cat_id = $_GET['catid'];
            $sql = "SELECT * FROM categories WHERE category_id= $cat_id"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $catname = $row['category_name'];
                $catdesc = $row['category_description'];
            }
        
        ?>

        <?php
            $user = $_SESSION['username'];
            $showAlert = false;
            $method = $_SERVER['REQUEST_METHOD'];
            if($method=='POST'){
                // Insert into thread db
                // $th_title = $_POST['title'];
                $th_desc = $_POST['desc'];

                $th_desc = str_replace("<", "&lt;", $th_desc);
                $th_desc = str_replace(">", "&gt;", $th_desc); 

                // $username = $_SESSION['username'];
                $user = $_SESSION['username'];
                // $sql = "SELECT id FROM users where username = '$user'";
                // $res = mysqli_query($conn, $sql);
                // $row = mysqli_fetch_assoc($res);
                // $user_id = $row['id'];
                // echo $user_id;

                // $sno = $_GET['thread_cat_id']; 
                $sql = "INSERT INTO `threads` (`thread_desc`, `thread_cat_id`, `thread_user_name`, `timestamp`) VALUES ( '$th_desc', '$cat_id', '$user', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                $showAlert = true;
                if($showAlert){
                    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> Your thread has been added! Please wait for others to respond
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>';
                } 
            }
        ?>


        <!-- Category container starts here -->
        <div class="container my-4" style="background-color:#fff;">
            <div class="jumbotron"style="background-color:#fff;">
                <p class="lead" style="color:#19386b;"> <b><?php echo $catdesc;?></b></p>
            </div>
        </div>

        <?php 
            echo '<div class="container">
            <h1 class="py-2" style="color:#19386b;">Reply...</h1> 
            
            <form action="'. $_SERVER["REQUEST_URI"] . '" method="post">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"></label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="thread">Submit</button>
            </form>
            </div>';
        ?>
        
        <div class="container mb-5" id="ques">
            <h1 class="py-2" style="color:#19386b;">Comments</h1>
        <?php
            // echo $_SESSION['id'];
            $id = $_GET['catid'];
            // echo $id;
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id"; 
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $id = $row['thread_id'];
                // $title = $row['thread_title'];
                $desc = $row['thread_desc']; 
                $thread_time = $row['timestamp']; 
                $thread_user_name = $row['thread_user_name']; 
                // echo $thread_user_id;
                // $sql2 = "SELECT username FROM users WHERE id='$thread_user_name'";
                // $result2 = mysqli_query($conn, $sql2);
                // $row2 = mysqli_fetch_assoc($result2);
                // $username = $row2['username'];
                // $username = $_SESSION['username'];



                echo '<div class="media my-3">
                    <div class="media-body">'.
                    '<h5 class="mt-0"> <a class="text-dark" href="thread.php?thread_id=' . $id. '">'. $desc . ' </a></h5>
                        '. $desc . ' </div>'.'<div class="font-weight-bold my-0"> Comment by: '. $thread_user_name . ' at '. $thread_time. '</div>'.
                '</div>';

            }
            // echo var_dump($noResult);
            if($noResult){
                echo '<div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <p class="display-4">No Threads Found</p>
                            <p class="lead"> Be the first person to ask a question</p>
                        </div>
                    </div> ';
            }
        ?>

        </div>

        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>

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

    <?php 
}
else{
    echo '<script>alert("Session Expired! login to continue!"); window.location.href="index.php"</script>';
}
?>


<!-- 83  <form action="'. $_SERVER["REQUEST_URI"] . '" method="post"> -->