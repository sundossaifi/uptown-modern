<?php
    try
    {
        session_start();
        $_SESSION["state_type"]="delievered-state";
        $_SESSION["state"] = "failed2";

        $database = new mysqli('localhost','root','','uptownmodern');
        $query="SELECT *FROM `orders` WHERE ORDER_ID=".$_POST["d-button"].";";
        $result=$database->query($query);
        $row=mysqli_fetch_assoc($result);

        if($row["STATE"]=="Refunded")
        {
            $_SESSION["state"] = "failed1";
        }
        elseif($row["STATE"]=="Delievered")
        {
            $_SESSION["state"] = "failed2";
        }
        else
        {
            $query="UPDATE `orders` SET STATE = 'Delievered' WHERE ORDER_ID=".$_POST["d-button"].";";
            $result=$database->query($query);
            $_SESSION["state"] = "succeeded";
        }        
        
        $database->commit();
        $database->close();
        header("Location: adminOrdersScreen.php");
    }
    catch (Exception $exception)
    {
        echo $exception;
    }
?>