<?php
    require("../files/db.php");

    if(isset($_GET['email']) && isset($_GET['v_code']))
    {
        $query = "select * from users where email='$_GET[email]' AND vCode='$_GET[v_code]'";
        $result = mysqli_query($conn, $query);
        if($result)
        {
            if(mysqli_num_rows($result) == 1)
            {
                $result_fetch = mysqli_fetch_assoc($result);
                if($result_fetch['isVerified'] == 0)
                {
                    $update = "UPDATE users set isVerified = 1 where email = '$result_fetch[email]' ";
                    if(mysqli_query($conn,$update)){
                        echo "verification successfull";
                        header('location: login.php');
                    }
                    else{
                        echo "Some error occured";
                    }
                }
                else{
                    echo "Email already verified";
                }
            }
        }else{
            echo "Email already verified";
        }

    }


?>