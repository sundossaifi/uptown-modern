<?php
    try
    {
        session_start();
        $_SESSION["state_type"]="remove-from-sale-state";
        $_SESSION["state"] = "failed";

        $database = new mysqli('localhost','root','','uptownmodern');
        $query="UPDATE `product` SET SALE='n' WHERE `PRODUCT_ID`=".$_POST["r-pid"].";";
        $result=$database->query($query);
        
        $query="DELETE FROM `sale` WHERE PRO_ID='".$_POST["r-pid"]."';";
        $result=$database->query($query);

        $query="SELECT *FROM `shopping_cart` WHERE P_ID=".$_POST["r-pid"].";";
        $result=$database->query($query);

        while($product=mysqli_fetch_assoc($result))
        {
            $query="SELECT *FROM `product` WHERE `PRODUCT_ID`=".$_POST["r-pid"].";";
            $p=$database->query($query);
            $pr=mysqli_fetch_assoc($p);

            $totalPrice=$product["AMOUNT"]*$pr["PRICE"];
            $query="UPDATE `shopping_cart` SET TOTAL_PRICE='".$totalPrice."' WHERE P_ID=".$_POST["r-pid"].";";
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