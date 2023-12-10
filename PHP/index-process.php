<?php
    include "store-process.php";
    include "Class/Article.php";

    define
    (   'postPictures',
    [   "Images/23-unsplash.jpg",
        "Images/83-unsplash.jpg",
        "Images/99unsplash.jpg",
        "Images/unsplash(1).jpg",
        "Images/unsplash-2.jpg"
    ]);

    function bestSellers()
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
            
            for($i=0;$i<count($productsArray);$i++)
            {
                for($j=0;$j<count($productsArray);$j++)
                {
                    if ($productsArray[$i]->getNumberOfSales() > $productsArray[$j]->getNumberOfSales()) 
                    {
                        $temp = $productsArray[$i];
                        $productsArray[$i] = $productsArray[$j];
                        $productsArray[$j] = $temp;
                    }
                }
            }

            for($i=0;$i<count($productsArray);$i++)
            {
                if($i==8)
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

    function latestPosts()
    {
        try
        {
            $articlesArray = array();
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `article`;";
            $result=$database->query($query);

            if(mysqli_num_rows($result)!=0)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $article =new Article
                    (
                        $row["ARTICLE_ID"],$row["TITLE"],$row["POST_DATE"],$row["CATEGORY"],
                        $row["PIC"],$row["CONTENT"],$row["AUTHOR_ID"]
                    );

                    array_push($articlesArray,$article);
                }
            }
            
            for($i=0;$i<count($articlesArray);$i++)
            {
                for($j=0;$j<count($articlesArray);$j++)
                {
                    if ($articlesArray[$i]->getPostDate() > $articlesArray[$j]->getPostDate()) 
                    {
                        $temp = $articlesArray[$i];
                        $articlesArray[$i] = $articlesArray[$j];
                        $articlesArray[$j] = $temp;
                    }
                }
            }

            for($i=0;$i<count($articlesArray);$i++)
            {
                if($i==2)
                {
                    break;
                }

                $autherName="";
                $query="SELECT *FROM `admin` where ADMIN_ID=".$articlesArray[$i]->getAuthorID().";";
                $result=$database->query($query);

                if(mysqli_num_rows($result)!=0)
                {
                    $row = mysqli_fetch_assoc($result);
                    $autherName=$row["FIRST_NAME"]." ".$row["LAST_NAME"];
                }

                echo 
                '
                    <div class="post">
                        <div class="post-img-container">
                            <img src="'.$articlesArray[$i]->getImg().'" alt="post img">
                            <div class="post-type">'.$articlesArray[$i]->getCategory().'</div>
                        </div>
                        <div class="post-info">'.$articlesArray[$i]->getPostDate().' <span>By</span><a href="Pages/blog.php?authID='.$article->getAuthorID().'">'.$autherName.'</a></div>
                        <h4>'.$articlesArray[$i]->getTitle().'</h4>
                        <div class="article-button">
                            <a href="Pages/article.php?articleID='.$articlesArray[$i]->getId().'">
                                <hr>
                                <div>
                                    Read Article
                                </div>
                                <hr>
                                <div class="article-button-line"></div>
                                <hr>
                            </a>
                        </div>
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

    function instagramPosts()
    {
        try
        {
            $postsArray = array();
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `INSTAGRAM_POSTS`;";
            $result=$database->query($query);

            if(mysqli_num_rows($result)!=0)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    array_push($postsArray,$row["URL"]);
                }

                shuffle($postsArray);
            }

            for($i=0;$i<count($postsArray);$i++)
            {
                if($i==5)
                {
                    break;
                }

                echo
                '
                    <div class="col">
                        <div class="instagram-card" onmouseenter="instagramHoverAnimation('.$i.')" onmouseleave="instagramUnHoverAnimation('.$i.')">
                            <a href="'.$postsArray[$i].'" target="_blank">
                                <div class="img-div">
                                    <img src="'.postPictures[$i].'" alt="instagram-pic">
                                </div>
                                <div class="instagram-img-div">
                                    <img src="Images/instagram-icon-dark.svg" alt="instagram-pic">
                                </div>
                            </a>
                        </div>
                    </div>
                ';
            }
        }
        catch(Exception $exception)
        {
            echo $exception;
        }
    }
?>