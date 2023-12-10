<?php
    if(isset($_POST["remove-button"]))
    {
        session_start();
        $_SESSION["state_type"]="remove-item-state";
        $_SESSION["state"]="failed";

        try
        {
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="DELETE FROM `shopping_cart` WHERE ITEM_ID=".$_POST["remove-button"]." AND U_ID=".$_SESSION["uid"].";";
            $result=$database->query($query);
            
            if($result)
            {
                $_SESSION["state"]="succeeded";
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