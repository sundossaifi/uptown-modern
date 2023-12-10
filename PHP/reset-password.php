<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if (isset($_POST["re-submit"]))
    {
        session_start();
        $_SESSION["state_type"]="reset-password-email-state";
        $_SESSION["state"]="failed";

        try
        {
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `users` WHERE EMAIL='".$_POST["email"]."';";
            $result=$database->query($query);
            
            if(mysqli_num_rows($result)==1)
            {
                $user=mysqli_fetch_assoc($result);
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

                $mail->addAddress($_POST["email"]);
                $mail->isHTML(true);

                $mail->Subject = "Reset Password";
                $mail->Body = "<h1>Your Password IS: ".$user["PASSWORD"]."</h1>";

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
            else
            {
                $_SESSION["state"]="failed";
            }

            $database->commit();
            $database->close();
        }
        catch (Exception $exception)
        {
            echo $exception;
        }

        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($url);
        $parts['query']=str_replace("page=","",$parts['query']);
        $parts['query']=str_replace("?&","?",$parts['query']);
        header("Location: ".$parts['query']."");
    }
?>