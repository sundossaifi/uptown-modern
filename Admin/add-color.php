<?php
    session_start();
    $_SESSION["state_type"]="add-color-state";
    $_SESSION["state"] = "failed";
    
    $database = new mysqli('localhost','root','','uptownmodern');
    $query="SELECT *FROM `color` WHERE HEX_CODE='".$_POST["color"]."';";
    $result=$database->query($query);

    if(mysqli_num_rows($result)==0)
    {
        $query="INSERT INTO `color`(`HEX_CODE`) VALUES ('".$_POST["color"]."');";
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