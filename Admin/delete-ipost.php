<?php
    try
    {
        session_start();
        $_SESSION["state_type"]="delete-ipost-state";
        $_SESSION["state"] = "failed";

        $database = new mysqli('localhost','root','','uptownmodern');
        $query="DELETE FROM `instagram_posts` WHERE URL='".$_POST["re-link"]."';";
        $result=$database->query($query);
        
        $database->commit();
        $database->close();

        $_SESSION["state"] = "succeeded";
        header("Location: instagramScreen.php");
    }
    catch (Exception $exception)
    {
        echo $exception;
    }
?>