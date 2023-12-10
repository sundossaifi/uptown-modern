<?php
    try
    {
        session_start();
        $_SESSION["state_type"]="unavailable-state";
        $_SESSION["state"] = "failed";

        $database = new mysqli('localhost','root','','uptownmodern');
        $query="UPDATE `product` SET AVAILABLE = 'n' WHERE PRODUCT_ID=".$_POST["p_id"].";";
        $result=$database->query($query);
        
        $database->commit();
        $database->close();

        $_SESSION["state"] = "succeeded";
        header("Location: adminProductScreen.php");
    }
    catch (Exception $exception)
    {
        echo $exception;
    }
?>