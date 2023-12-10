<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if (isset($_POST["refund-request"]))
    {
        session_start();
        $_SESSION["state_type"]="refund-email-state";
        $_SESSION["state"]="failed";

        $message=
        '
            Order ID: '.$_POST["product-id"].'
            Description: '.$_POST["description"].'
        ';

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
        $mail->FromName = $_SESSION["fname"].' '.$_SESSION["lname"];
        $mail->addReplyTo($_SESSION["email"], $_SESSION["fname"].' '.$_SESSION["lname"]);
        $mail->addAddress("uptown.modern.ps@gmail.com");

        $mail->Subject = "Refund Request";
        $mail->Body = $message;

        try 
        {
            $mail->send();
            $_SESSION["state"]="succeeded";
        } 
        catch (Exception $e) 
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }

        header("Location: ../Pages/my-orders.php");
    }
?>