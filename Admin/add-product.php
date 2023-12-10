<?php
    session_start();
    $_SESSION["state_type"]="add-product-state";
    $_SESSION["state"] = "failed";

    $database = new mysqli('localhost','root','','uptownmodern');
    $query="INSERT INTO `product` (`NAME`, `PRICE`, `SALE`, `AMOUNT`, 
    `NUMBER_OF_SALES`, `CATEGORY`, `AVAILABLE`, `SHORT_DES`, `LONG_DES`, 
    `MANUFACTURER`, `DIMENSIONS`, `WEIGHT`, `REQUIRE_ASSEMBLY`, `COLOR_ID`, 
    `BRAND_ID`, `MATERIAL_ID`) 
    VALUES 
    (
        '".$_POST["name"]."','".$_POST["price"]."','n',
        '".$_POST["amount"]."','0','".$_POST["category"]."', 
        'y','".$_POST["short-des"]."', '".$_POST["long-des"]."',
        '".$_POST["manufacturer"]."','".$_POST["dimensions"]."','".$_POST["weight"]."', 
        '".$_POST["assembly"]."','".$_POST["color"]."','".$_POST["brand"]."',
        '".$_POST["material"]."'
    );";
    $result=$database->query($query);
    
    $productImgs = $_FILES['imgs'];
    $imgsCount = count($productImgs["name"]);
    $productID=$database->insert_id;

    for($i = 0; $i < $imgsCount; $i++) 
    {
        $path=uploadImage($productImgs["name"][$i],$productImgs["tmp_name"][$i]);
        $path=str_replace("C:/xampp/htdocs","http://localhost",$path);

        $query="INSERT INTO `products_imgs`(`PRO_ID`,`PATH`) 
        VALUES ('".$productID."','".$path."');";
        $result=$database->query($query);
    }
    
    $database->commit();
    $database->close();

    $_SESSION["state"] = "succeeded";
    header("Location: add-product-screen.php");

    function uploadImage($fileName,$fileTmpName)
    {
        $uploadDirectory = "C:/xampp/htdocs/Web-Project/Products-IMGS/";
        $uploadPath = $uploadDirectory . basename($fileName); 
        move_uploaded_file($fileTmpName, $uploadPath);
        return $uploadPath;
    }
?>