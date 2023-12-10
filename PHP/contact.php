<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if (isset($_POST["co-submit"]))
    {
        session_start();
        $_SESSION["state_type"]="contactState";
        $_SESSION["state"]="failed";

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
        $mail->FromName = $_POST["name"];
        $mail->addReplyTo($_POST["email-3"], $_POST["name"]);
        $mail->addAddress("uptown.modern.ps@gmail.com");

        $mail->Subject = "Support";
        $mail->Body = $_POST["Message"];

        try 
        {
            $mail->send();
            $_SESSION["state"]="succeeded";
        } 
        catch (Exception $e) 
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }

        header("Location: ../Pages/contact.php");
    }
?>