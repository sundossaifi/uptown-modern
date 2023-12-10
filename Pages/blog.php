<?php
    include_once "../PHP/nabvar.php";
    include_once "../PHP/footer.php";
    include_once "../PHP/pop-up-message.php";
    include_once "../PHP/blog-process.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Uptown-Modern | Blog</title>
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
        <link rel="stylesheet" href="../CSS/Blog/blog.css">
        <link rel="icon" href="../Images/logo.svg">
        <!-- scripts -->
        <script src="../JS/Bootstrape_Fontawsome/all.min.js"></script>
        <script src="../JS/Bootstrape_Fontawsome/bootstrap.bundle.min.js"></script>
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
                $page="../Pages/blog.php";

                if(isset($parts['query']))
                {
                    $page="../Pages/blog.php?";
                }

                headerNav("../");
                searchContainer("../");
                usepPanelContainer("../",$page);
                shoppingCartContainer("","../",$page);
                scrollToTopButton();
            ?>
            <div class="header">
                <h1 class="headerh1">Blog</h1>
            </div>
        </div>
        <div class="navcontainer">
            <div class="navigation">
                <a class="home" href="../index.php">Home</a>
                <a class="blog" href="blog.php">\ Blog</a>
            </div>
        </div>
        <div class="maincontainer">
            <div class="sidebar">
                <div class="categoriescontainer">
                    <h4 class="Categories">Categories</h4>
                    <a class="catchoices" href="blog.php?cat=Reviews">Reviews</a>
                    <a class="catchoices" href="blog.php?cat=Advice">Advice</a>
                    <a class="catchoices" href="blog.php?cat=Trends">Trends</a>
                </div>
                <div class="authorscontainer">
                    <h4 class="authors">Authors</h4>
                    <?php
                        authors();
                    ?>
                </div>
                <div class="shopnowcontainer">
                    <div class="shopnowcomponents">
                        <div class="outletcorner">
                            check out the store and enjoy the high quality furniture
                            <br>
                            and excellent service
                        </div>
                        <a href="Store.php" class="shop-button">
                            <div class="shop-button-text-container">
                                <div class="shop-button-text">Shop Now</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="gridcontainer">
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
                        
                        $startingIndex=(($startingIndex*6)-6);
                        articles($startingIndex);
                    ?>
                </div>
            </div>
        </div>
        <?php
            footer("../","",$page);
        ?>
    </body>
</html>