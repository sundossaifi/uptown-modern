<?php
    include "Class/Product.php";
    include "Class/Brand-Material.php";

    function products($startingIndex)
    {
        try
        {
            $productsArray = array();
            $database = new mysqli('localhost','root','','uptownmodern');
            $query=getProductQuery();
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
            
            $pageContentArray=array();
            $counter=0;

            for($i=$startingIndex;$i<count($productsArray);$i++)
            {
                if($counter==9)
                {
                    break;
                }

                if(isset($productsArray[$i]))
                {
                    array_push($pageContentArray,$productsArray[$i]);
                }

                $counter++;
            }

            for($i=0;$i<count($pageContentArray);$i+=3)
            {
                $firstColumn=getProductColoumn($pageContentArray[$i],$database);

                $secondColumn=
                '
                    <div class="col" style="width: 281.33px">
                    </div>
                ';

                if($i+1<count($pageContentArray))
                {
                    $secondColumn=getProductColoumn($pageContentArray[$i+1],$database);
                }
                
                $thirdColumn=
                '
                    <div class="col" style="width: 281.33px">
                    </div>
                ';

                if($i+2<count($pageContentArray))
                {
                    $thirdColumn=getProductColoumn($pageContentArray[$i+2],$database);
                }
                
                echo 
                '
                    <div class="row">
                        '.$firstColumn.'
                        '.$secondColumn.'
                        '.$thirdColumn.'
                    </div>
                ';
            }

            if(count($productsArray)>9)
            {
                $numberOfPages=ceil(count($productsArray)/9);
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if(str_contains($url,"?pageIndex="))
                {
                    $url = substr($url, 0, strpos($url, "?pageIndex="));
                }
                
                if(str_contains($url,"&pageIndex="))
                {
                    $url = substr($url, 0, strpos($url, "&pageIndex="));
                }
                
                $parts = parse_url($url);
                $appendedChar="";

                if(isset($parts['query']))
                {
                    $appendedChar="&";
                }
                else
                {
                    $appendedChar="?";
                }

                echo '<div class="pages-container">';
                for($i=1;$i<=$numberOfPages;$i++)
                {
                    echo '<a id="'.$i.'" href="'.$url."".$appendedChar."pageIndex=".$i.'" class="page-button">'.$i.'</a>';
                }
                echo '</div>';
            }

            $database->commit();
            $database->close();          
        }
        catch(Exception $exception)
        {
            echo $exception;
        }
    }

    function getProductQuery()
    {
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($url);
        $query="";

        if(isset($parts['query']))
        {
            $key=explode("=",explode("&",$parts['query'])[0])[0];
            $value=explode("=",explode("&",$parts['query'])[0])[1];
            
            if($key=="cat")
            {
                $query="SELECT *FROM `product` WHERE CATEGORY ='".$value."' AND AVAILABLE='y';";
            }
            elseif($key=="colorID")
            {
                $query="SELECT *FROM `product` WHERE COLOR_ID='".$value."' AND AVAILABLE='y';";
            }
            elseif($key=="price")
            {
                $query="SELECT *FROM `product` WHERE PRICE<='".$value."' AND AVAILABLE='y';";
            }
            elseif($key=="brandID")
            {
                $query="SELECT *FROM `product` WHERE BRAND_ID='".$value."' AND AVAILABLE='y';";
            }
            elseif($key=="materialID")
            {
                $query="SELECT *FROM `product` WHERE MATERIAL_ID='".$value."' AND AVAILABLE='y';";
            }
            elseif($key=="searchKey")
            {
                $query="SELECT *FROM `product` WHERE NAME LIKE '%".$value."%' AND AVAILABLE='y';";
            }
            elseif($key=="pageIndex")
            {
                $query="SELECT *FROM `product` WHERE AVAILABLE='y';";
            }
        }
        else
        {
            $query="SELECT *FROM `product` WHERE AVAILABLE='y';";
        }

        return $query;
    }

    function getProductColoumn($product,$database)
    {
        $saleLabel="";
        $originalPrice="";
        $salePrice="";

        if($product->getSale()=="y")
        {
            $query="SELECT *FROM `sale` where PRO_ID=".$product->getId().";";
            $result=$database->query($query);

            if(mysqli_num_rows($result)!=0)
            {
                $row = mysqli_fetch_assoc($result);
                $saleLabel='<div class="sale">Sale</div>';
                $originalPrice='<div class="originalPrice gray">$ '.$product->getPrice().'.00 USD</div>';
                $salePrice='<div class="salePrice black">$ '.$row["SALE_PRICE"].'.00 USD</div>';
            }
        }
        else
        {
            $salePrice='<div class="salePrice black">$ '.$product->getPrice().'.00 USD</div>';
        }

        return
        '
            <div class="col">
                <div class="product">
                    <a href="http://localhost/Web-Project/Pages/products.php?id='.$product->getId().'">
                        <div class="parent">
                            '.$saleLabel.'
                            <img class="image" src="'.$product->getImg().'">
                        </div>
                    </a>
                    <div class="NameAndPrice">
                        <h4 class="Name">'.$product->getName().'</h4>
                        <div class="flex">
                            '.$originalPrice.'
                            '.$salePrice.'
                        </div>
                    </div>
                    <div class="hidden">
                        <a href="http://localhost/Web-Project/Pages/products.php?id='.$product->getId().'" class="quickview">Checkout This</a>
                    </div>
                </div>
            </div>
        ';
    }

    function color()
    {
        try
        {
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `color`;";
            $result=$database->query($query);

            if(mysqli_num_rows($result)!=0)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    echo
                    '
                        <a href="Store.php?colorID='.$row["COLOR_ID"].'" class="colorLi" style="background-color: '.$row["HEX_CODE"].';">
                            <span class="colorSpan"></span>
                        </a>
                    ';
                }
            }
        }
        catch(Exception $exception)
        {
            echo $exception;
        }
    }

    function brands_materials($tableName,$tableColoumn,$urlParameter)
    {
        try
        {
            $brandArray = array();
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `$tableName`;";
            $result=$database->query($query);

            if(mysqli_num_rows($result)!=0)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $brand =new Brand_Material
                    (
                        $row[$tableColoumn],$row["NAME"]
                    );

                    array_push($brandArray,$brand);
                }
            }

            for($i=0;$i<count($brandArray);$i+=3)
            {
                
                $firstColumn=getBrandMaterialColumn($brandArray[$i],$urlParameter);

                $secondColumn='';

                if($i+1<count($brandArray))
                {
                    $secondColumn=getBrandMaterialColumn($brandArray[$i+1],$urlParameter);
                }
                
                $thirdColumn='';
                
                if($i+2<count($brandArray))
                {
                    $thirdColumn=getBrandMaterialColumn($brandArray[$i+2],$urlParameter);
                }

                echo 
                '
                    <div class="row1">
                        '.$firstColumn.'
                        '.$secondColumn.'
                        '.$thirdColumn.'
                    </div>
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

    function getBrandMaterialColumn($item,$urlParameter)
    {
        return
        '
            <div class="cont">
                <div class="center">
                    <a class="btn" href="Store.php?'.$urlParameter.'='.$item->getId().'">
                        <svg width="80px" height="40px" viewBox="0 0 80 40" class="border">
                            <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                            <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                        </svg>
                        <span>'.$item->getName().'</span>
                    </a>
                </div>
            </div>
        ';
    }

    function priceSlider()
    {
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($url);
        $value=0;

        if(isset($parts['query']))
        {
            if(explode("=",explode("&",$parts['query'])[0])[0]=="price")
            {
                $value=explode("=",explode("&",$parts['query'])[0])[1];
            }
        }

        echo
        '
            <h4>Price</h4>
            <div class="slidecontainer">
                <input type="range" min="0" max="10000" value="'.$value.'" step="100" class="slider" id="myRange" onchange="redirect()" oninput="setPriceLabel()">
                <label id="priceLabel" for="myRange">'.$value.'$</label>
                <a id="redirect-price-link" href=""></a>
            </div>
        ';
    }
?>