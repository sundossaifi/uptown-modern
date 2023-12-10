<?php
    if (isset($_POST["si-submit"]))
    {
        session_start();
        $_SESSION["state_type"]="login";
        $_SESSION["active"]= "false";
        $adminFlag=false;

        try
        {
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `admin` WHERE EMAIL='".$_POST["email"]."' AND PASSWORD='".$_POST["password"]."';";
            $result=$database->query($query);

            if(mysqli_num_rows($result)==1)
            {
                $admin=mysqli_fetch_assoc($result);
                $_SESSION["state_type"]="admin-mode";
                $_SESSION["active"]= "true";
                $adminFlag=true;

                $_SESSION["aID"]=$admin["ADMIN_ID"];
                $_SESSION["fname"]=$admin["FIRST_NAME"];
                $_SESSION["lname"]=$admin["LAST_NAME"];
                $_SESSION["aPIC"]=$admin["PIC"];
                $_SESSION["bio"]=$admin["BIO"];
                $_SESSION["email"]=$admin["EMAIL"];
                $_SESSION["password"]=$admin["PASSWORD"];
            }
            else
            {
                $database = new mysqli('localhost','root','','uptownmodern');
                $query="SELECT *FROM `users` WHERE EMAIL='".$_POST["email"]."' AND PASSWORD='".$_POST["password"]."' AND ACTIVE='y';";
                $result=$database->query($query);
                
                if(mysqli_num_rows($result)==1)
                {
                    $user=mysqli_fetch_assoc($result);
                    $adminFlag=false;
                    
                    $_SESSION["uid"]=$user["USER_ID"];
                    $_SESSION["fname"]=$user["FIRST_NAME"];
                    $_SESSION["lname"]=$user["LAST_NAME"];
                    $_SESSION["pnumber"]=$user["PHONE_NUMBER"];
                    $_SESSION["city"]=$user["CITY"];
                    $_SESSION["address"]=$user["ADDRESS"];
                    $_SESSION["email"]=$user["EMAIL"];
                    $_SESSION["password"]=$user["PASSWORD"];

                    $_SESSION["state"]="succeeded";
                    $_SESSION["active"]= "true";
                }
                else
                {
                    $_SESSION["state"]="failed";
                    $_SESSION["active"]= "false";
                }
            }
            
            $database->commit();
            $database->close();
        }
        catch (Exception $exception)
        {
            echo $exception;
        }

        if($adminFlag)
        {
            header("Location: ../Admin/adminUserScreen.php");
        }
        else
        {
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $parts = parse_url($url);
            $parts['query']=str_replace("page=","",$parts['query']);
            $parts['query']=str_replace("?&","?",$parts['query']);
            header("Location: ".$parts['query']."");
        }
    }
?>