<?php
    session_start();
    $_SESSION["state_type"]="add-material-state";
    $_SESSION["state"] = "failed";
    
    $database = new mysqli('localhost','root','','uptownmodern');
    $query="SELECT *FROM `material` WHERE NAME='".$_POST["material"]."';";
    $result=$database->query($query);

    if(mysqli_num_rows($result)==0)
    {
        $query="INSERT INTO `material`(`NAME`) VALUES ('".$_POST["material"]."');";
        $result=$database->query($query);
        $_SESSION["state"] = "succeeded";
    }
    else
    {
        $_SESSION["state"] = "failed";
    }
    
    $database->commit();
    $database->close();
    header("Location: AdminSectionScreen.php");
?>