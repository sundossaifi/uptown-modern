<?php
    try
    {
        session_start();
        $_SESSION["state_type"]="set-on-sale-state";
        $_SESSION["state"] = "failed";

        $database = new mysqli('localhost','root','','uptownmodern');
        $query="UPDATE `product` SET SALE='y' WHERE `PRODUCT_ID`=".$_POST["pid"].";";
        $result=$database->query($query);
        
        $query="INSERT INTO `sale`(`PRO_ID`,`SALE_PRICE`) VALUES('".$_POST["pid"]."','".$_POST["price"]."');";
        $result=$database->query($query);

        $query="SELECT *FROM `shopping_cart` WHERE P_ID=".$_POST["pid"].";";
        $result=$database->query($query);

        while($product=mysqli_fetch_assoc($result))
        {
            $totalPrice=$product["AMOUNT"]*$_POST["price"];
            $query="UPDATE `shopping_cart` SET TOTAL_PRICE='".$totalPrice."' WHERE P_ID=".$_POST["pid"].";";
            $database->query($query);
        }

        $database->commit();
        $database->close();

        $_SESSION["state"] = "succeeded";
        header("Location: AdminSectionScreen.php");
    }
    catch (Exception $exception)
    {
        echo $exception;
    }
?>