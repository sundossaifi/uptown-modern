<?php
    include_once "../PHP/nabvar.php";
    include_once "../PHP/footer.php";
    include_once "../PHP/pop-up-message.php";
    include_once "../PHP/product-process.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Uptown-Modern | Product</title>
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
        <link rel="stylesheet" href="../CSS/Common/share-buttons.css">
        <link rel="stylesheet" href="../CSS/Common/footer.css">
        <link rel="stylesheet" href="../CSS/Store/product_Style.css">
        <link rel="stylesheet" href="../CSS/Store/Store_Style.css">
        <link rel="icon" href="../Images/logo.svg">
        <!-- scripts -->
        <script src="../JS/Bootstrape_Fontawsome/all.min.js"></script>
        <script src="../JS/Bootstrape_Fontawsome/bootstrap.bundle.min.js"></script>
        <script src="../JS/product.js"></script>
        <script src="../JS/nav.js"></script>
        <script src="../JS/scrollTop.js"></script>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=1078733622991163&autoLogAppEvents=1" nonce="plka9hYT"></script>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
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
                $page="../Pages/products.php";

                if(isset($parts['query']))
                {
                    $page="../Pages/products.php?";
                }

                headerNav("../");
                searchContainer("../");
                usepPanelContainer("../",$page);
                shoppingCartContainer("","../",$page);
                scrollToTopButton();
            ?>
            <div class="header">
                <h1 class="headerh1">Product</h1>
            </div>
        </div>
        <div>
            <div class="header2"></div>
            <div class="HomeStoreParent">
                <div class="HomeStore">
                    <?php
                        productHeaderLinks();
                    ?>
                </div>
            </div>
            <div class="flexpro goright">
                <div class="bigDiv">
                    <?php
                        productImgs();
                    ?>
                </div>
                <div class="RightText">
                    <?php
                        productInformation();
                    ?>
                    <div class="checkWithText">
                        <div class="adv-container">
                            <div class="check flexpro">
                                <img src="../Images/check.png" class="checkIcon">
                                <div class="checkText">
                                    Secure Payment
                                </div>
                            </div>
                            <div class="check flexpro">
                                <img src="../Images/check.png" class="checkIcon">
                                <div class="checkText">
                                    Fast Shipping
                                </div>
                            </div>
                            <div class="check flexpro">
                                <img src="../Images/check.png" class="checkIcon">
                                <div class="checkText">
                                    Lifetime Warranty
                                </div>
                            </div>
                            <?php
                                shareProduct();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hr-container">
                <hr class="hrclass">
            </div>
            <div class="des-container">
                <div class="descrition flexpro">
                    <?php
                        lowerSection();
                    ?>
                </div>
            </div>
            <div class="hr-container">
                <hr class="hrclass">
            </div>
            <div class="reco-container">
                <div class="recommended">
                    <div class="divh2">
                        <h2>Recommended</h2>
                    </div>
                    <div class="container1">
                        <div class="row2 flexpro">
                            <?php
                                recommended();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            footer("../","",$page);
        ?>
    </body>
</html>