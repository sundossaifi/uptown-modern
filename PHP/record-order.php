<?php
    session_start();
    $_SESSION["state_type"]="order-state";
    $_SESSION["state"]="failed";

    try
    {
        $database = new mysqli('localhost','root','','uptownmodern');
        $query="SELECT *FROM `shopping_cart` WHERE U_ID=".$_SESSION["uid"].";";
        $result1=$database->query($query);
        
        if(mysqli_num_rows($result1)!=0)
        {
            while ($row = mysqli_fetch_assoc($result1)) 
            {
                $query="SELECT *FROM `product` WHERE PRODUCT_ID=".$row["P_ID"].";";
                $result2=$database->query($query);
                $product = mysqli_fetch_assoc($result2);

                $numberOfSales=$product["NUMBER_OF_SALES"]+$row["AMOUNT"];
                $query="UPDATE `product` SET NUMBER_OF_SALES = ".$numberOfSales." WHERE PRODUCT_ID=".$row["P_ID"].";";
                $result2=$database->query($query);

                if(!$result2)
                {
                    $_SESSION["state"]="failed";
                    header("Location: ../index.php");
                }

                $query="SELECT *FROM `product` WHERE PRODUCT_ID=".$row["P_ID"].";";
                $result2=$database->query($query);
                $product = mysqli_fetch_assoc($result2);

                if($product["AMOUNT"]==$product["NUMBER_OF_SALES"])
                {
                    $query="UPDATE `product` SET AVAILABLE = 'n' WHERE PRODUCT_ID=".$row["P_ID"].";";
                    $result2=$database->query($query);

                    if(!$result2)
                    {
                        $_SESSION["state"]="failed";
                        header("Location: ../index.php");
                    }
                }

                $query="INSERT INTO `orders`(`U_ID`,`P_ID`,`ORDER_DATE`,`AMOUNT`,`PRICE`,`STATE`) 
                VALUES (".$_SESSION["uid"].",".$row["P_ID"].",'".date("Y-m-d")."',".$row["AMOUNT"].",".$row["TOTAL_PRICE"].",'in process');";
                $result2=$database->query($query);

                if(!$result2)
                {
                    $_SESSION["state"]="failed";
                    header("Location: ../index.php");
                }
            }
        }
        else
        {
            $_SESSION["state"]="failed";
            header("Location: ../index.php");
        }

        $query="DELETE FROM `shopping_cart` WHERE U_ID=".$_SESSION["uid"].";";
        $result3=$database->query($query);

        if(!$result3)
        {
            $_SESSION["state"]="failed";
            header("Location: ../index.php");
        }

        $database->commit();
        $database->close();

        $_SESSION["state"]="succeeded";
        header("Location: ../Pages/my-orders.php");
    }
    catch (Exception $exception)
    {
        echo $exception;
    }
?>