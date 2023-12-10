<?php
    include_once "../PHP/nabvar.php";
    include_once "../PHP/footer.php";
    include_once "../PHP/pop-up-message.php";
    include_once "../PHP/article-process.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Uptown-Modern | Article</title>
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
            <link rel="stylesheet" href="../CSS/Blog/articlestyle.css">
            <link rel="icon" href="../Images/logo.svg">
            <!-- scripts -->
            <script src="../JS/Bootstrape_Fontawsome/all.min.js"></script>
            <script src="../JS/Bootstrape_Fontawsome/bootstrap.bundle.min.js"></script>
            <script src="../JS/article.js"></script>
            <script src="../JS/nav.js"></script>
            <script src="../JS/scrollTop.js"></script>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0&appId=1078733622991163&autoLogAppEvents=1" nonce="plka9hYT"></script>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </head>
    <body onscroll="progressEvent()">
        <div id="progress"></div>
        <?php
            popUpMessage();
            sideNav("../","../Pages/");
        ?>
        <div class="header-background">
            <?php
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $parts = parse_url($url);
                $page="../Pages/article.php";

                if(isset($parts['query']))
                {
                    $page="../Pages/article.php?";
                }

                headerNav("../");
                searchContainer("../");
                usepPanelContainer("../",$page);
                shoppingCartContainer("","../",$page);
                scrollToTopButton();
            ?>
            <div class="header">
                <h1 class="headerh1">Article</h1>
            </div>
        </div>
        <div class="BlogArticleParent">
            <div class="BlogArticle">
                <a class="Home" href="../index.php">Home</a>
                <div class="dash">\</div>
                <a href="blog.php" class="Blog">Blog</a>
                <div class="dash">\</div>
                <?php
                    articleLink();
                ?>
            </div>
        </div>
        <div class="article-image-Container">
            <?php
                articleHeader();
            ?>
        </div>
        <div class="article-container">
            <div class="paragrapghs">
                <?php
                    getArticle();
                ?>
                <hr>
            </div>
            <div class="authorposts-container">
                <?php
                    articleAuthor();
                    shareButtons();
                ?>
            </div>
        </div>
        <?php
            footer("../","",$page);
        ?>
    </body>
</html>