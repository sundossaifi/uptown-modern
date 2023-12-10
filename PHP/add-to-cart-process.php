<?php
    if(isset($_POST["add-button"]))
    {
        session_start();
        $_SESSION["state_type"]="add-item-state";
        $_SESSION["state"]="failed";

        try
        {
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $parts = parse_url($url);

            $userID=$_SESSION["uid"];
            $productID=explode('=',$parts['query'])[1];
            $amount=$_POST["amount"];
            $totalPrice=-1;
            
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `product` WHERE PRODUCT_ID=".$productID." AND AVAILABLE='y';";
            $result=$database->query($query);

            if(mysqli_num_rows($result)==1)
            {
                $product=mysqli_fetch_assoc($result);

                if($product["SALE"]=="y")
                {
                    $query="SELECT *FROM `sale` WHERE PRO_ID=".$productID.";";
                    $result=$database->query($query);
                    $onSaleItem=mysqli_fetch_assoc($result);

                    $totalPrice=$onSaleItem["SALE_PRICE"]*$amount;
                }
                else
                {
                    $totalPrice=$product["PRICE"]*$amount;
                }
            }

            $query="SELECT *FROM `shopping_cart` WHERE P_ID=".$productID." AND U_ID=".$userID.";";
            $result=$database->query($query);

            if(mysqli_num_rows($result)==1)
            {
                $item=mysqli_fetch_assoc($result);
                $amount+=$item["AMOUNT"];
                $totalPrice+=$item["TOTAL_PRICE"];

                $query="UPDATE `shopping_cart` SET  AMOUNT       = ".$amount.",
                                                    TOTAL_PRICE  = ".$totalPrice."
                    WHERE P_ID=".$productID." AND U_ID=".$userID.";";
                $result=$database->query($query);
            }
            else
            {
                $query="INSERT INTO `shopping_cart`(`U_ID`,`P_ID`,`AMOUNT`,`TOTAL_PRICE`) 
                VALUES (".$userID.",".$productID.",".$amount.",".$totalPrice.");";
                $result=$database->query($query);
            }

            if($result)
            {
                $_SESSION["state"]="succeeded";
            }
            else
            {
                $_SESSION["state"]="failed";
            }

            $database->commit();
            $database->close();
        }
        catch (Exception $exception)
        {
            echo $exception;
        }

        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($url);
        $productID=explode("=",explode("&",$parts['query'])[0])[1];
        header("Location: ../Pages/Products.php?id=".$productID."");
    }
?>