<?php
    function popUpMessage()
    {
        $className = (basename($_SERVER['PHP_SELF'])=="index.php")?"main-page":"";
        
        if(isset($_SESSION["state_type"]))
        {
            if($_SESSION["state_type"]!="")
            {
                if($_SESSION["state_type"]=="sign-up")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message $className'>Your Account Registered Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message $className'>This Email Already Exist</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="login")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message $className'>Welcome Back</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message $className'>Incorrect Email OR Password</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="reset-password-email-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message $className'>An Email Has Been Sent To Your Email Address</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message $className'>Email Address Not Found</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="newsletter-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message $className'>You Will Be Notified Of The Latest News</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message $className'>Email Already Exist</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="contactState")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message $className'>Message Sent Successfully We Will Reply Soon</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message $className'>Message Not Sent Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="update_user")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message $className'>Information Updated Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "email-exist")
                    {
                        echo "<div class='pop-up-message $className'>This Email Is Already Exist</div>";
                    }
                    elseif($_SESSION["state"] == "wrong-password")
                    {
                        echo "<div class='pop-up-message $className'>Wrong Password</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="logout")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        session_destroy();
                        header("Location: ../index.php");
                    }
                }
                elseif($_SESSION["state_type"]=="remove-item-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message $className'>Item Removed Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message $className'>Something Went Wrong Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="add-item-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message $className'>Item Added Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message $className'>Something Went Wrong Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="order-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message $className'>Item Purchased Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message $className'>Something Went Wrong Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="refund-email-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message $className'>Refund Email Sent Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message $className'>Something Went Wrong Try Later</div>";
                    }
                }
            }

            $_SESSION["state_type"]="";
        }
    }
?>