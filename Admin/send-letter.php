<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    try
    {
        session_start();
        $_SESSION["state_type"]="send-letter-state";
        $_SESSION["state"] = "failed";
        
        $database = new mysqli('localhost','root','','uptownmodern');
        $query="SELECT *FROM `newsletter`;";
        $result=$database->query($query);
        
        while($subscriber=mysqli_fetch_assoc($result))
        {
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;                             
            $mail->isSMTP();                                     
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;                          
                
            $mail->Username = "uptown.modern.ps@gmail.com";                 
            $mail->Password = "Abd123456789";                           
            $mail->SMTPSecure = "tls";                           
            $mail->Port = 587;                                   

            $mail->From = "uptown.modern.ps@gmail.com";
            $mail->FromName = "Uptown Modern";
            $mail->addAddress($subscriber["EMAIL"]);

            $mail->Subject = "NewsLetter";
            $mail->Body = "".$_POST["newsletter"]."";

            try 
            {
                $mail->send();
                $_SESSION["state"]="succeeded";
            } 
            catch (Exception $e) 
            {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
        }

        $database->commit();
        $database->close();
    }
    catch (Exception $exception)
    {
        echo $exception;
    }

    $_SESSION["state"] = "succeeded";
    header("Location: adminNewsLetterScreen.php");
?>