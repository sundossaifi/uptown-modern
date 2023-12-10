<?php
    include_once "../PHP/nabvar.php";
    include_once "../PHP/footer.php";
    include_once "../PHP/pop-up-message.php";
    include_once "../PHP/store-process.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Uptown-Modern | Store</title>
        <!-- meta data -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- style sheets -->
        <link rel="stylesheet" href="../CSS/Bootstrape_Fontawsome/all.min.css">
        <link rel="stylesheet" href="../CSS/Bootstrape_Fontawsome/bootstrap.min.css">
        <link rel="stylesheet" href="../CSS/Bootstrape_Fontawsome/all.min.css">
        <link rel="stylesheet" href="../CSS/Bootstrape_Fontawsome/bootstrap.min.css">
        <link rel="stylesheet" href="../CSS/Common/navbar.css">
        <link rel="stylesheet" href="../CSS/Common/pop-up-message.css">
        <link rel="stylesheet" href="../CSS/Common/scrollbar.css">
        <link rel="stylesheet" href="../CSS/Common/search.css">
        <link rel="stylesheet" href="../CSS/Common/user.css">
        <link rel="stylesheet" href="../CSS/Common/shopping-cart.css">
        <link rel="stylesheet" href="../CSS/Common/scroll-to-top.css">
        <link rel="stylesheet" href="../CSS/Common/page-button.css">
        <link rel="stylesheet" href="../CSS/Common/footer.css">
        <link rel="stylesheet" href="../CSS/Store/Store_Style.css">
        <link rel="icon" href="../Images/logo.svg">
        <!-- scripts -->
        <script src="../JS/Bootstrape_Fontawsome/all.min.js"></script>
        <script src="../JS/Bootstrape_Fontawsome/bootstrap.bundle.min.js"></script>
        <script src="../JS/store.js"></script>
        <script src="../JS/nav.js"></script>
        <script src="../JS/scrollTop.js"></script>
        <script src="../JS/page-button.js"></script>
    </head>
    <body>
        <?php
            popUpMessage();
            sideNav("../","../Pages/");
        ?>
        <div class="header-background">
            <?php
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $parts = parse_url($url);
                $page="../Pages/Store.php";

                if(isset($parts['query']))
                {
                    $page="../Pages/Store.php?";
                }

                headerNav("../");
                searchContainer("../");
                usepPanelContainer("../",$page);
                shoppingCartContainer("","../",$page);
                scrollToTopButton();
            ?>
            <div class="header">
                <h1 class="headerh1">Store</h1>
            </div>
        </div>
        <div class="HomeStoreParent">
            <div class="HomeStore">
                <a href="../index.php" class="Home">Home</a>
                <div class="dash">\</div>
                <a href="Store.php" class="Store">Store</a>
            </div>
        </div>
        <div class="main-container">
            <div class="imgsWithLeft">
                <div class="Left" style="width: 316;">
                    <div class="Categories">
                        <h4>Categories</h4>
                        <div class="aDivStyle">
                            <a class="aStyle" href="Store.php?cat=Used-Furniture">Used Furniture</a>
                        </div>
                        <div class="aDivStyle">
                            <a class="aStyle" href="Store.php?cat=Living-Room">Living Room</a>
                        </div>
                        <div class="aDivStyle">
                            <a class="aStyle" href="Store.php?cat=Future-Collection">Future Collection</a>
                        </div>
                        <div class="aDivStyle">
                            <a class="aStyle" href="Store.php?cat=Dining-Room">Dining Room</a>
                        </div>
                        <div class="aDivStyle">
                            <a class="aStyle" href="Store.php?cat=Bedroom">Bedroom</a>
                        </div>
                        <div class="aDivStyle">
                            <a class="aStyle" href="Store.php?cat=Accessories">Accessories</a>
                        </div>
                    </div>
                    <div class="color">
                        <h4>Color</h4>
                        <ul class="colorUl">
                            <?php
                                color();
                            ?>
                        </ul>
                    </div>
                    <div class="price">
                        <?php
                            priceSlider();
                        ?>
                    </div>
                    <div class="brand">
                        <h4>Brands</h4>
                        <div class="buttons">
                            <?php
                                brands_materials("brand","BRAND_ID","brandID");
                            ?>
                        </div>
                    </div>
                    <div class="material">
                        <h4>Materials</h4>
                        <div class="buttons">
                            <?php
                                brands_materials("material","MATERIAL_ID","materialID");
                            ?>
                        </div>
                    </div>
                </div>
                <div role="list" class="imgsDiv">
                    <div class="container">
                        <?php
                            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            $parts = parse_url($url);
                            $startingIndex=1;
                            
                            if(isset($parts['query']))
                            {
                                if(isset(explode("&",$parts['query'])[1]))
                                {
                                    if(explode("=",explode("&",$parts['query'])[1])[0]=="pageIndex")
                                    {
                                        $startingIndex= intval(explode("=",explode("&",$parts['query'])[1])[1]);
                                    }
                                }
                                elseif(isset(explode("&",$parts['query'])[0]))
                                {
                                    if(explode("=",explode("&",$parts['query'])[0])[0]=="pageIndex")
                                    {
                                        $startingIndex=intval(explode("=",explode("&",$parts['query'])[0])[1]);
                                    }
                                }
                            }
                            
                            $startingIndex=(($startingIndex*9)-9);
                            products($startingIndex);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
            footer("../","",$page);
        ?>
    </body>
</html>