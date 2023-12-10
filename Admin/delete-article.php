<?php
    try
    {
        session_start();
        $_SESSION["state_type"]="delete-article-state";
        $_SESSION["state"] = "failed";

        $database = new mysqli('localhost','root','','uptownmodern');
        $query="DELETE FROM `article` WHERE ARTICLE_ID=".$_POST["delete-article-button"].";";
        $result=$database->query($query);
        
        $database->commit();
        $database->close();

        $_SESSION["state"] = "succeeded";
        header("Location: adminarticleScreen.php");
    }
    catch (Exception $exception)
    {
        echo $exception;
    }
?>