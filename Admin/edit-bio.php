<?php
    try
    {
        session_start();
        $_SESSION["state_type"]="edit-bio-state";
        $_SESSION["state"] = "failed";

        $database = new mysqli('localhost','root','','uptownmodern');
        $query="UPDATE `admin` SET BIO='".$_POST["bio"]."' WHERE `ADMIN_ID`=".$_POST["aid"].";";
        $result=$database->query($query);
        
        $database->commit();
        $database->close();

        $_SESSION["state"] = "succeeded";
        header("Location: adminadminScreen.php");
    }
    catch (Exception $exception)
    {
        echo $exception;
    }
?> 