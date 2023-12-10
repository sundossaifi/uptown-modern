<?php
    session_start();
    $_SESSION["state_type"]="add-brand-state";
    $_SESSION["state"] = "failed";
    
    $database = new mysqli('localhost','root','','uptownmodern');
    $query="SELECT *FROM `brand` WHERE NAME='".$_POST["brand"]."';";
    $result=$database->query($query);

    if(mysqli_num_rows($result)==0)
    {
        $query="INSERT INTO `brand`(`NAME`) VALUES ('".$_POST["brand"]."');";
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