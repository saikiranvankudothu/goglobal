<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="forgotindex.css" />
    <title>Update Password</title>
</head>

<body>
    <?php
    require("partials/_dbconnect.php");
    if(isset($_GET['email']) && isset($_GET['reset_token'])){
            date_default_timezone_set('Asia/kolkata');
            $date= date("Y-m-d");
            $query = "SELECT * from `usertab` WHERE `username`= '$_GET[email]' AND `resettoken`='$_GET[reset_token]' AND `resettokenexpire`='$date'";
            $result = mysqli_query($conn,$query);
            if($result){
                if(mysqli_num_rows($result)==1)
                {
                    // echo"
                    //     <form>
                    //     <h3>create a new password</h3>
                    // ";

                }
                else{
                    echo"
                    <script>
                    alert('Invalid or Expired Link');
                    window.location.href='forgotindex.html';
                    </script>
                    ";
                }




            }else{
                echo"
                <script>
                alert('Server down! try again later...');
                window.location.href='updatepassword.php';
                </script>
                ";
            }
    }
?>
<?php
    if(isset($_POST['updatepassword']))
    {
        $pass = password_hash($_POST['Password'],PASSWORD_BCRYPT);
        $update = "UPDATE `usertab` SET `password`='$pass', `resettoken`= NULL, `resettokenexpire`= NULL WHERE `username` = '{$_GET['email']}'";
        if(mysqli_query($conn,$update)){
            echo"
            <script>
            alert('Password Updated Successfully');
            window.location.href='register.php';
            </script>
            ";

        }
        else{
            echo"
            <script>
            alert('Server down! try again later...');
            window.location.href='updatepassword.php';
            </script>
            ";

        }

    }


?>


<div class="container">
        <div class="forms-container">
            <div class="reset-create">
                <form method="POST" class="reset-form" onsubmit="return validateForm()"
                    class="reset-form">
                    <h2 class="title">Enter New Password</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="password" placeholder="Enter New Password" name="Password" id="Password" />
                    </div>
                    <button type="submit" class="btn solid" name="updatepassword">UPDATE</button>
                    <input type = 'hidden' name= 'email' value='$_GET[email]'/>
                </form> 

<script src="register.js"></script>
<script src="updatepass.js"></script>
    

</body>

</html>