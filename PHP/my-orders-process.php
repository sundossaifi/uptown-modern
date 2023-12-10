<?php
    function getOrders()
    {
        try
        {
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `orders` WHERE U_ID=".$_SESSION["uid"].";";
            $result1=$database->query($query);
            
            if(mysqli_num_rows($result1)!=0)
            {
                while ($row = mysqli_fetch_assoc($result1)) 
                {
                    $query="SELECT *FROM `product` WHERE PRODUCT_ID=".$row["P_ID"].";";
                    $result2=$database->query($query);
                    $product = mysqli_fetch_assoc($result2);
                    $productName=$product["NAME"];

                    echo
                    '
                        <tr>
                            <td class="cell-data">
                                '.$row["ORDER_ID"].'
                            </td>
                            <td class="cell-data">
                                '.$row["P_ID"].'
                            </td>
                            <td class="cell-data">
                                '.$productName.'
                            </td>
                            <td class="cell-data">
                                '.$row["ORDER_DATE"].'
                            </td>
                            <td class="cell-data">
                                '.$row["AMOUNT"].'
                            </td>
                            <td class="cell-data">
                                '.$row["PRICE"].'
                            </td>
                            <td class="cell-data">
                                '.$row["STATE"].'
                            </td>
                        </tr>
                    ';
                }
            }

            $database->commit();
            $database->close();
        }
        catch(Exception $exception)
        {
            echo $exception;
        }
    }

    function getProductsID()
    {
        try
        {
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `orders` WHERE U_ID=".$_SESSION["uid"].";";
            $result=$database->query($query);
            
            if(mysqli_num_rows($result)!=0)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    echo
                    '
                        <option value="'.$row["ORDER_ID"].'">'.$row["ORDER_ID"].'</option>
                    ';
                }
            }

            $database->commit();
            $database->close();
        }
        catch(Exception $exception)
        {
            echo $exception;
        }
    }
?>