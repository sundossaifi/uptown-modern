<?php
    if (isset($_POST["pr-submit"]))
    {
        session_start();
        $_SESSION["state_type"]="update_user";
        
        if((isset($_POST["password"]))&&($_POST["password"]==$_SESSION["password"]))
        {
            try
            {
                $database = new mysqli('localhost','root','','uptownmodern');
                $query="";
                
                if($_POST["email"]==$_SESSION["email"])
                {
                    $query="UPDATE `users` SET  FIRST_NAME   = '".$_POST["fname"]."', 
                                                LAST_NAME    = '".$_POST["lname"]."', 
                                                PHONE_NUMBER = ".$_POST["pnumber"].", 
                                                CITY         = '".$_POST["city"]."', 
                                                ADDRESS      = '".$_POST["address"]."'
                    WHERE USER_ID=".$_SESSION["uid"].";";

                    $_SESSION["state"]="succeeded";

                    if(isset($_POST["newpassword"])&&!ctype_space($_POST["newpassword"])&&$_POST["newpassword"]!="")
                    {
                        $query="UPDATE `users` SET      FIRST_NAME   = '".$_POST["fname"]."', 
                                                        LAST_NAME    = '".$_POST["lname"]."',  
                                                        PHONE_NUMBER = ".$_POST["pnumber"].", 
                                                        CITY         = '".$_POST["city"]."', 
                                                        ADDRESS      = '".$_POST["address"]."',
                                                        PASSWORD     = '".$_POST["newpassword"]."'
                            WHERE USER_ID=".$_SESSION["uid"].";";

                            $_SESSION["state"]="succeeded";
                            $_SESSION["password"]=$_POST["newpassword"];
                    }
                }
                elseif($_POST["email"]!=$_SESSION["email"])
                {
                    $query="SELECT *FROM `users` WHERE EMAIL='".$_POST["email"]."';";
                    $result=$database->query($query);

                    if(mysqli_num_rows($result)==0)
                    {
                        $user=mysqli_fetch_assoc($result);
                        
                        $query="UPDATE `users` SET  FIRST_NAME   = '".$_POST["fname"]."', 
                                                    LAST_NAME    = '".$_POST["lname"]."', 
                                                    PHONE_NUMBER = ".$_POST["pnumber"].", 
                                                    CITY         = '".$_POST["city"]."', 
                                                    ADDRESS      = '".$_POST["address"]."',
                                                    EMAIL        = '".$_POST["email"]."'
                        WHERE USER_ID=".$_SESSION["uid"].";";

                        $_SESSION["state"]="succeeded";

                        if(isset($_POST["newpassword"])&&!ctype_space($_POST["newpassword"])&&$_POST["newpassword"]!="")
                        {
                            $query="UPDATE `users` SET      FIRST_NAME   = '".$_POST["fname"]."', 
                                                            LAST_NAME    = '".$_POST["lname"]."',  
                                                            PHONE_NUMBER = ".$_POST["pnumber"].", 
                                                            CITY         = '".$_POST["city"]."', 
                                                            ADDRESS      = '".$_POST["address"]."',
                                                            EMAIL        = '".$_POST["email"]."',
                                                            PASSWORD     = '".$_POST["newpassword"]."'
                                WHERE USER_ID=".$_SESSION["uid"].";";

                                $_SESSION["state"]="succeeded";
                                $_SESSION["password"]=$_POST["newpassword"];
                        }
                    }
                    else
                    {
                        $_SESSION["state"]="email-exist";
                    }
                }
                
                if($_SESSION["state"]="succeeded")
                {
                    $database->query($query);

                    $_SESSION["fname"]=$_POST["fname"];
                    $_SESSION["lname"]=$_POST["lname"];
                    $_SESSION["pnumber"]=$_POST["pnumber"];
                    $_SESSION["city"]=$_POST["city"];
                    $_SESSION["address"]=$_POST["address"];
                    $_SESSION["email"]=$_POST["email"];
                }
                
                $database->commit();
                $database->close();
            }
            catch (Exception $exception)
            {
                echo $exception;
            }
        }
        else
        {
            $_SESSION["state"]="wrong-password";
        }

        header("Location: ../Pages/profile.php");
    }
?>