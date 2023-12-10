<?php
    try
    {
        session_start();
        $_SESSION["state_type"]="refund-state";
        $_SESSION["state"] = "failed";

        $database = new mysqli('localhost','root','','uptownmodern');
        $query="SELECT *FROM `orders` WHERE ORDER_ID=".$_POST["r-button"].";";
        $result=$database->query($query);
        $row=mysqli_fetch_assoc($result);

        if($row["STATE"]!="Refunded")
        {
            $query="UPDATE `orders` SET STATE = 'Refunded' WHERE ORDER_ID=".$_POST["r-button"].";";
            $result=$database->query($query);

            $query="SELECT *FROM `orders` WHERE ORDER_ID=".$_POST["r-button"].";";
            $result=$database->query($query);
            $order=mysqli_fetch_assoc($result);
            $productID=$order["P_ID"];
            $amount=$order["AMOUNT"];


            $query="SELECT *FROM `product` where PRODUCT_ID=".$productID.";";
            $result=$database->query($query);
            $product=mysqli_fetch_assoc($result);

            $noOfSales=abs($product["NUMBER_OF_SALES"]-$amount);

            $query="UPDATE `product` SET    AVAILABLE           = 'y',
                                            NUMBER_OF_SALES     =".$noOfSales." 
                                            WHERE PRODUCT_ID=".$productID.";";
            $result=$database->query($query);
            $_SESSION["state"] = "succeeded";
        }
        else
        {
            $_SESSION["state"] = "failed";
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