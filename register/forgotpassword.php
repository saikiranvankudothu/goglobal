<?php
    require("partials/_dbconnect.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    function sendMail($email,$reset_token)
    {
        require('PHPMailer/PHPMailer.php');
        require('PHPMailer/SMTP.php');
        require('PHPMailer/Exception.php');

        $mail = new PHPMailer(true);

        try {
            //Server settings                     
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'triptailshub@gmail.com';                     //SMTP username
            $mail->Password   = 'wpmidzehstyftxuz';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('triptailshub@gmail.com', 'TRIPTAILSHUB ');
            $mail->addAddress($email);     //Add a recipient

        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password Reset Link from TRIPTAILSHUB';
            $mail->Body    = "We got a request from you to reset your password! </br>
            Click the Link Below: <br>
            <a href = 'http://localhost/travel_final/goglobal/register/updatepassword.php?email=$email&reset_token=$reset_token'>Reset password</a>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
        
            $mail->send();
            return true;
            } catch (Exception $e) {
                echo "Mailer Error: {$mail->ErrorInfo}";
                return false;
            }
    }


    if(isset($_POST['reset-btn'])){
    $query="SELECT * FROM `usertab` WHERE `username`='$_POST[email]'";
    $result=mysqli_query($conn, $query);
    if ($result){
        if(mysqli_num_rows($result)==1){
            /** mail found **/
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/kolkata');
            $date= date("Y-m-d");
            $query = "UPDATE `usertab` SET`resettoken`='$reset_token',`resettokenexpire`='$date' WHERE `username`='$_POST[email]'";
            if(mysqli_query($conn,$query) && sendMail($_POST['email'],$reset_token))
            {
                echo"
                <script>
                alert('Password Reset link sent to your mail');
                window.location.href='forgotindex.html';
                </script> 
                ";

            }else{
                echo"
                <script>
                alert('Server down! try again later...');
                window.location.href='forgotindex.html';
                </script>
                ";
            }

        }
        else{
            echo"
            <script>
            alert('E-mail Entered Not-found');
            window.location.href='forgotindex.html';
            </script>
            ";} 
    } 
    else{
        echo"
        <script>
        alert('cannot run query');
        window.location.href='forgotindex.html ';
        </script>
        ";} 
    }
?>