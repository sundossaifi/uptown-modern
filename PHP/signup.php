<?php
    if (isset($_POST["su-submit"]))
    {
        session_start();
        $_SESSION["state_type"]="sign-up";
        $_SESSION["state"]="failed";
    
        try
        {
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `admin` WHERE EMAIL='".$_POST["email"]."';";
            $result=$database->query($query);

            if(mysqli_num_rows($result)!=0)
            {
                $_SESSION["state"]="failed";
            }
            else
            {
                $database = new mysqli('localhost','root','','uptownmodern');
                $query="SELECT *FROM `users` WHERE EMAIL='".$_POST["email"]."'";
                $result=$database->query($query);
                
                if(mysqli_num_rows($result)!=0)
                {
                    $_SESSION["state"]="failed";
                }
                else
                {
                    $query="INSERT INTO `users`(`FIRST_NAME`,`LAST_NAME`,`PHONE_NUMBER`,`CITY`,`ADDRESS`,`EMAIL`,`PASSWORD`,`ACTIVE`) 
                    VALUES ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["pnumber"]."','".$_POST["city"]."','".$_POST["address"]."','".$_POST["email"]."','".$_POST["password"]."','y');";
                    $result=$database->query($query);
                    $_SESSION["state"]="succeeded";
                }
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