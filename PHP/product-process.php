<?php
    include "store-process.php";

    function productHeaderLinks()
    {
        try
        {
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $parts = parse_url($url);
            $productID=explode("=",explode("&",$parts['query'])[0])[1];

            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT NAME FROM `product` WHERE PRODUCT_ID='".$productID."' AND AVAILABLE='y';";
            $result=$database->query($query);

            if(mysqli_num_rows($result)==1)
            {
                $product=mysqli_fetch_assoc($result);
                
                echo
                '
                    <a href="../index.php" class="Home">Home</a>
                    <div class="dash">\</div>
                    <a href="Store.php" class="Store">Store</a>
                    <div class="dash">\</div>
                    <a href="'.$url.'" class="Store">'.$product["NAME"].'</a>
                ';
            }
            
            $database->commit();
            $database->close();
        }
        catch (Exception $exception)
        {
            echo $exception;
        }
    }

    function productImgs()
    {
        try
        {
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $parts = parse_url($url);
            $productID=explode("=",explode("&",$parts['query'])[0])[1];

            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `product` WHERE PRODUCT_ID='".$productID."' AND AVAILABLE='y';";
            $result=$database->query($query);

            if(mysqli_num_rows($result)==1)
            {
                $product=mysqli_fetch_assoc($result);
                $saleLabel='';

                if($product["SALE"]=="y")
                {
                    $saleLabel='<div class="salepro">sale</div>';
                }

                $query="SELECT *FROM `products_imgs` WHERE PRO_ID='".$productID."';";
                $result=$database->query($query);
                $productImgs = array();
                $imgs="";

                if(mysqli_num_rows($result)!=0)
                {
                    while($img = mysqli_fetch_assoc($result))
                    {
                        array_push($productImgs,$img["PATH"]);
                    }
                }

                $firstImgBorder="";

                for($i=0;$i<count($productImgs);$i++)
                {
                    $firstImgBorder=($i==0)?"border1":"border";
                    $imgs=$imgs."<div id='".$i."' class='mar ".$firstImgBorder."' onclick=setMainImg(this)><img class='smallimage' src='".$productImgs[$i]."'></div>";
                }

                echo
                '
                    '.$saleLabel.'
                    <div class="Divsmallimage">
                        '.$imgs.'
                    </div>
                    <div class="Divbigimage">
                        <img id="mainImg" class="bigimage" src="'.$productImgs[0].'">
                    </div>
                ';
            }

            $database->commit();
            $database->close();
        }
        catch (Exception $exception)
        {
            echo $exception;
        }
    }

    function productInformation()
    {
        try
        {
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $parts = parse_url($url);
            $productID=explode("=",explode("&",$parts['query'])[0])[1];

            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `product` WHERE PRODUCT_ID='".$productID."' AND AVAILABLE='y';";
            $result=$database->query($query);

            if(mysqli_num_rows($result)==1)
            {
                $product=mysqli_fetch_assoc($result);
                $priceBlock="";
                
                if($product["SALE"]=="y")
                {
                    $query="SELECT *FROM `sale` WHERE PRO_ID='".$productID."';";
                    $result=$database->query($query);

                    if(mysqli_num_rows($result)==1)
                    {
                        $sale=mysqli_fetch_assoc($result);
                        $priceBlock=
                        '
                            <div class="originalpricePro">$ '.$product["PRICE"].'.00 USD</div>
                            <div class="salepricePro">$ '.$sale["SALE_PRICE"].'.00 USD</div>
                        ';
                    }
                }
                else
                {
                    $priceBlock='<div class="salepricePro">$ '.$product["PRICE"].'.00 USD</div>';
                }

                $active="false";

                if(isset($_SESSION["active"]))
                {
                    if($_SESSION["active"]=="true")
                    {
                        $active="true";
                    }
                }

                echo
                '
                    <div class="RightTexth1">'.$product["NAME"].'</div>
                    <div class="prices flex">
                        '.$priceBlock.'
                    </div>
                    <div>
                        <p class="paragraph">
                            '.$product["SHORT_DES"].'
                        </p>
                    </div>
                    <div class="flex cstock">
                        <div class="circleStock"></div>
                        <div class="stock">In Stock</div>
                    </div>
                    <form id="add-to-cart-form" class="addToCart flexpro" action="../PHP/add-to-cart-process.php?id='.$productID.'" method="post">
                        <input name="amount" type="number" onKeyDown="return false" required value="1" inputmode="numeric" pattern="^[0-0]$" min="1" max="'.$product["AMOUNT"]-$product["NUMBER_OF_SALES"].'" class="number">
                        <button id="add-button" name="add-button" type="button" value="'.$productID.'" class="addButton" onclick="openAndCloseUserPanel('.$active.')">
                            Add to cart
                        </button>
                    </form>
                ';
            }

            $database->commit();
            $database->close();
        }
        catch (Exception $exception)
        {
            echo $exception;
        }
    }

    function lowerSection()
    {
        try
        {
            $url = str_replace("localhost","127.0.0.1","http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
            $parts = parse_url($url);
            $productID=explode("=",explode("&",$parts['query'])[0])[1];

            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `product` WHERE PRODUCT_ID='".$productID."' AND AVAILABLE='y';";
            $result=$database->query($query);

            $description="";
            $manufacturer="";
            $dimensions="";
            $weight="";
            $assembly="";
            $color="";
            $brand="";
            $material="";

            if(mysqli_num_rows($result)==1)
            {
                $product=mysqli_fetch_assoc($result);

                $description=$product["LONG_DES"];
                $descriptionAttr="'".$product["LONG_DES"]."'";
                $manufacturer="'".$product["MANUFACTURER"]."'";
                $dimensions="'".$product["DIMENSIONS"]."'";
                $weight="'".$product["WEIGHT"]."'";
                $assembly=($product["REQUIRE_ASSEMBLY"]=="y")?"'"."YES"."'":"'"."NO"."'";

                $query="SELECT *FROM `color` WHERE COLOR_ID='".$product["COLOR_ID"]."';";
                $result=$database->query($query);

                if(mysqli_num_rows($result)==1)
                {
                    $value=mysqli_fetch_assoc($result);
                    $color="'".$value["HEX_CODE"]."'";
                }

                $query="SELECT *FROM `brand` WHERE BRAND_ID='".$product["BRAND_ID"]."';";
                $result=$database->query($query);

                if(mysqli_num_rows($result)==1)
                {
                    $value=mysqli_fetch_assoc($result);
                    $brand="'".$value["NAME"]."'";
                }

                $query="SELECT *FROM `material` WHERE MATERIAL_ID='".$product["MATERIAL_ID"]."';";
                $result=$database->query($query);

                if(mysqli_num_rows($result)==1)
                {
                    $value=mysqli_fetch_assoc($result);
                    $material="'".$value["NAME"]."'";
                }
            }

            echo
            '
                <div class="leftdes">
                    <span class="desa">
                        <div id="desctiptionButton" class="desdiv black" onclick="setDescription(`'.$descriptionAttr.'`)">Description</div>
                    </span>
                    <span class="desa">
                        <div id="infoButton" class="desdiv gray" onclick="setAdditionalInfo('.$manufacturer.','.$dimensions.','.$weight.','.$assembly.','.$color.','.$brand.','.$material.')">Additional Info</div>
                    </span>
                </div>
                <div class="outer">
                    <div class="inner"></div>
                </div>
                <div id="rightdes" class="rightdes">
                <p class="desparagraph">
                    '.$description.'
                </p>
                </div>
            ';

            $database->commit();
            $database->close();
        }
        catch (Exception $exception)
        {
            echo $exception;
        }
    }

    function shareProduct()
    {
        $url = str_replace("localhost","127.0.0.1","http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

        echo
        '
            <div class="share-buttons-container" style="margin: 20px 0px;">
                <h3>Share This Product</h3>
                <div id="fb-root"></div>
                <div class="fb-share-button" data-href='.$url.' data-layout="button_count" data-size="large">
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2FWeb-Project%2FPages%2Farticle.php%3FarticleID%3D1&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                        share
                    </a>
                </div>
                <div class="twitter-button-container">
                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-lang="en" data-show-count="false">
                        Tweet
                    </a>
                </div>
            </div>
        ';
    }

    function recommended()
    {
        try
        {
            $productsArray = array();
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `product` WHERE AVAILABLE='y';";
            $result=$database->query($query);

            if(mysqli_num_rows($result)!=0)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $product =new Product
                    (
                        $row["PRODUCT_ID"],$row["NAME"],$row["PRICE"],$row["SALE"],$row["AMOUNT"],
                        $row["NUMBER_OF_SALES"],$row["CATEGORY"],$row["AVAILABLE"],null,$row["SHORT_DES"],
                        $row["LONG_DES"],$row["MANUFACTURER"],$row["DIMENSIONS"],$row["WEIGHT"],
                        $row["REQUIRE_ASSEMBLY"],$row["COLOR_ID"],$row["BRAND_ID"],$row["MATERIAL_ID"]
                    );

                    array_push($productsArray,$product);
                }
            }

            for($i=0;$i<count($productsArray);$i++)
            {
                $query="SELECT *FROM `products_imgs` WHERE PRO_ID='".$productsArray[$i]->getId()."';";
                $result=$database->query($query);

                if(mysqli_num_rows($result)!=0)
                {
                    $row = mysqli_fetch_assoc($result);
                    $productsArray[$i]->setImg($row["PATH"]);
                }
            }
            
            shuffle($productsArray);

            for($i=0;$i<count($productsArray);$i++)
            {
                if($i==4)
                {
                    break;
                }

                echo
                '
                    '.getProductColoumn($productsArray[$i],$database).'
                ';
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