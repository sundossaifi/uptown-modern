<?php
    include "../PHP/nabvar.php";
    include "../PHP/footer.php";
    include "../PHP/pop-up-message.php";
    include "../PHP/profile-data.php";
    include "../PHP/profile-process.php";
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Uptown-Modern | Profile</title>
        <!-- meta data -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- style sheets -->
        <link rel="stylesheet" href="../CSS/Bootstrape_Fontawsome/all.min.css">
        <link rel="stylesheet" href="../CSS/Bootstrape_Fontawsome/bootstrap.min.css">
        <link rel="stylesheet" href="../CSS/Common/navbar.css">
        <link rel="stylesheet" href="../CSS/Common/pop-up-message.css">
        <link rel="stylesheet" href="../CSS/Common/scrollbar.css">
        <link rel="stylesheet" href="../CSS/Common/search.css">
        <link rel="stylesheet" href="../CSS/Common/user.css">
        <link rel="stylesheet" href="../CSS/Common/shopping-cart.css">
        <link rel="stylesheet" href="../CSS/Common/scroll-to-top.css">
        <link rel="stylesheet" href="../CSS/Common/footer.css">
        <link rel="stylesheet" href="../CSS/Profile/Profile_Style.CSS">
        <link rel="icon" href="../Images/logo.svg">
        <!-- scripts -->
        <script src="../JS/Bootstrape_Fontawsome/all.min.js"></script>
        <script src="../JS/Bootstrape_Fontawsome/bootstrap.bundle.min.js"></script>
        <script src="../JS/nav.js"></script>
        <script src="../JS/scrollTop.js"></script>
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
                $page="../Pages/profile.php";

                if(isset($parts['query']))
                {
                    $page="../Pages/profile.php?";
                }

                headerNav("../");
                searchContainer("../");
                usepPanelContainer("../",$page);
                shoppingCartContainer("","../",$page);
                scrollToTopButton();
            ?>
            <div class="header">
                <h1 class="headerh1">Profile</h1>
            </div>
        </div>
        <div class="profile-container">
            <h1 class="personal_header">Your personal information</h1>
            <?php
                data();
            ?>
        </div>
        <?php
            footer("../","",$page);
        ?>
    </body>
</html>