<?php
    include_once "PHP/nabvar.php";
    include_once "PHP/footer.php";
    include_once "PHP/pop-up-message.php";
    include "PHP/index-process.php";

    if(!isset($_SESSION["active"]))
    {
        $_SESSION["active"]="false";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Uptown-Modern | Home</title>
        <!-- meta data -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- style sheets -->
        <link rel="stylesheet" href="CSS/Bootstrape_Fontawsome/all.min.css">
        <link rel="stylesheet" href="CSS/Bootstrape_Fontawsome/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/Common/navbar.css">
        <link rel="stylesheet" href="CSS/Common/pop-up-message.css">
        <link rel="stylesheet" href="CSS/Common/scrollbar.css">
        <link rel="stylesheet" href="CSS/Common/search.css">
        <link rel="stylesheet" href="CSS/Common/user.css">
        <link rel="stylesheet" href="CSS/Common/shopping-cart.css">
        <link rel="stylesheet" href="CSS/Common/scroll-to-top.css">
        <link rel="stylesheet" href="CSS/Common/footer.css">
        <link rel="stylesheet" href="CSS/Home/services.css">
        <link rel="stylesheet" href="CSS/Home/best-sellers.css">
        <link rel="stylesheet" href="CSS/Home/categories.css">
        <link rel="stylesheet" href="CSS/Home/shop-now.css">
        <link rel="stylesheet" href="CSS/Home/blog-section.css">
        <link rel="stylesheet" href="CSS/Home/instagram-section.css">
        <link rel="icon" href="Images/logo.svg">
        <!-- scripts -->
        <script src="JS/Bootstrape_Fontawsome/all.min.js"></script>
        <script src="JS/Bootstrape_Fontawsome/bootstrap.bundle.min.js"></script>
        <script src="JS/home.js"></script>
        <script src="JS/nav.js"></script>
    </head>
    <body>
        <?php
            popUpMessage();
            sideNav("","Pages/");
        ?>
        <div id="home-header" class="home-header">
            <?php
                headerNav("");
            ?>
            <div class="header-content">
                <div class="header-buttons" onclick="swapImages()">
                    <img src="Images/_arrow_left.svg" alt="arrow left">
                </div>
                <div class="subtitle-container">
                    <div id="subtitle" class="subtitle">New This Spring</div>
                    <h1 id="h1-subtitle" class="h1-subtitle">
                        Future
                        <br>
                        Collection
                    </h1>
                    <div id="discover-button" class="discover-button">
                        <a href="Pages/Store.php?cat=future-collection">
                            <div>
                                Discover
                            </div>
                            <div class="discover-button-line"></div>
                        </a>
                    </div>
                </div>
                <div class="animated-header-img">
                    <div id="animated-circle" class="circle"></div>
                    <img id="header-img" src="Images/light.png" alt="light">
                </div>
                <div class="header-buttons" onclick="swapImages()">
                    <img src="Images/arrow_right.svg" alt="arrow right">
                </div>
            </div>
        </div>
        <?php
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $parts = parse_url($url);
            $page="../index.php";

            if(isset($parts['query']))
            {
                $page="../index.php?";
            }

            searchContainer("");
            usepPanelContainer("",$page);
            shoppingCartContainer("Pages/","",$page);
            scrollToTopButton();
        ?>
        <div class="services-container">
            <div id="one">
                <h4 class="number">01</h4>
                <div>
                    <h4>Fast Shipping</h4>
                    <p>
                        Fast delivery,
                        <br>
                        all you have to do is order and count on us.
                    </p>
                </div>
            </div>
            <div id="two">
                <h4 class="number">02</h4>
                <div>
                    <h4>Free Returns</h4>
                    <p>
                        If you want to return something,
                        <br>
                        do not worry, we provide you a fast and free return service,
                        <br>
                        customer satisfaction is our goal.
                    </p>
                </div>
            </div>
            <div id="three">
                <h4 class="number">03</h4>
                <div>
                    <h4>Secure Payment</h4>
                    <p>
                        We offer multiple and secure payment methods,
                        <br>
                        all your information will be protected.
                    </p>
                </div>
            </div>
        </div>
        <div class="products-container">
            <h2>Best Sellers</h2>
            <div class="container">
                <div class="container">
                    <div class="row row-cols-4">
                        <?php
                            bestSellers();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="categories-container">
            <h2>Categories</h2>
            <div class="each-category-container">
                <div id="firstLeft" class="left-categories">
                    <div class="left-category-img-container">
                        <img src="Images/Img_0003_Layer1.jpg" alt="living room">
                        <div id="living-category" class="category">
                            <h3>Living Room</h3>
                            <div class="view-button">
                                <a href="Pages/Store.php?cat=Living-Room">
                                    <hr>
                                    <div>
                                        View Category
                                    </div>
                                    <hr>
                                    <div class="view-button-line"></div>
                                    <hr>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="firstLeftText" class="category-text">
                    QUALITY IS AN INVESTMENT IN THE FUTURE
                </div>
            </div>
            <div class="each-category-container">
                <div id="firstRightText" class="category-text">
                    BUY LESS,
                    <br>
                    CHOOSE WELL,
                    <br>
                    MAKE IT LAST
                </div>
                <div id="firstRight" class="right-categories">
                    <div class="right-category-img-container">
                        <img src="Images/Img_0002_Layer2.jpg" alt="dining room">
                        <div id="dining-category" class="category">
                            <h3>Dining Room</h3>
                            <div class="view-button">
                                <a href="Pages/Store.php?cat=Dining-Room">
                                    <hr>
                                    <div>
                                        View Category
                                    </div>
                                    <hr>
                                    <div class="view-button-line"></div>
                                    <hr>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="each-category-container">
                <div id="secondLeft" class="left-categories">
                    <div class="left-category-img-container">
                        <img src="Images/Img_0000_Layer4.jpg" alt="bedroom">
                        <div id="bedroom-category" class="category">
                            <h3>Bedroom</h3>
                            <div class="view-button">
                                <a href="Pages/Store.php?cat=Bedroom">
                                    <hr>
                                    <div>
                                        View Category
                                    </div>
                                    <hr>
                                    <div class="view-button-line"></div>
                                    <hr>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="secondLeftText" class="category-text">
                    IF YOU LOVE IT,
                    <br>
                    BUY IT
                </div>
            </div>
            <div class="each-category-container">
                <div id="secondRightText" class="category-text">
                    BUY WHAT YOU
                    <br>
                    BELIEVE IN
                </div>
                <div id="secondRight" class="right-categories">
                    <div class="right-category-img-container">
                        <img src="Images/Img_0001_Layer3.jpg" alt="accessories">
                        <div id="accessories-category" class="category">
                            <h3>Accessories</h3>
                            <div class="view-button">
                                <a href="Pages/Store.php?cat=Accessories">
                                    <hr>
                                    <div>
                                        View Category
                                    </div>
                                    <hr>
                                    <div class="view-button-line"></div>
                                    <hr>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="shop-now-container" class="shop-now-container">
            <div class="shop-now-message">
                check out the store and enjoy the high quality furniture
                <br>
                and excellent service
            </div>
            <div class="shop-now-button">
                <a href="Pages/Store.php">Shop Now</a>
            </div>
        </div>
        <div class="blog-section">
            <h2>
                Latest Posts
            </h2>
            <div class="posts-container">
                <?php
                    latestPosts();
                ?>
            </div>
            <a href="Pages/blog.php" class="posts-button">
                <div class="posts-button-text-container">
                    <div class="posts-button-text">View All Posts</div>
                </div>
            </a>
        </div>
        <div class="instagram-section">
            <div class="instagram-section-header">
                <h2>
                    Instagram
                </h2>
                <div>
                    <a href="https://www.instagram.com/uptown.modern/" target="_blank">@Uptown.Modern</a>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <?php
                        instagramPosts();
                    ?>
                </div>
            </div>  
        </div>
        <?php
            footer("","Pages/",$page);
        ?>
    </body>
</html>