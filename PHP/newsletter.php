<?php
    if (isset($_POST["ne-submit"]))
    {
        session_start();
        $_SESSION["state_type"]="newsletter-state";
        $_SESSION["state"]="failed";
        
        try
        {
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `newsletter` WHERE EMAIL='".$_POST["email"]."'";
            $result=$database->query($query);
            
            if(mysqli_num_rows($result)!=0)
            {
                $_SESSION["state"]="failed";
            }
            else
            {
                $query="INSERT INTO `newsletter`(`EMAIL`) 
                VALUES ('".$_POST["email"]."');";
                $result=$database->query($query);
                $_SESSION["state"]="succeeded";
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