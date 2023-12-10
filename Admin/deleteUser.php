<?php
    try
    {
        session_start();
        $_SESSION["state_type"]="block-user-state";
        $_SESSION["state"] = "failed";

        $database = new mysqli('localhost','root','','uptownmodern');
        $query="UPDATE `users` SET ACTIVE='n' WHERE `USER_ID`=".$_POST["block-button"].";";
        $result=$database->query($query);
        
        $database->commit();
        $database->close();

        $_SESSION["state"] = "succeeded";
        header("Location: adminUserScreen.php");
    }
    catch (Exception $exception)
    {
        echo $exception;
    }
?> 