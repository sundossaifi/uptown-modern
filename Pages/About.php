<?php
    include_once "../PHP/nabvar.php";
    include_once "../PHP/footer.php";
    include_once "../PHP/pop-up-message.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Uptown-Modern | Our Story</title>
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
        <link rel="stylesheet" href="../CSS/About/About.css">
        <link rel="icon" href="../Images/logo.svg">
        <!-- scripts -->
        <script src="../JS/Bootstrape_Fontawsome/all.min.js"></script>
        <script src="../JS/Bootstrape_Fontawsome/bootstrap.bundle.min.js"></script>
        <script src="../JS/about.js"></script>
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
                $page="../Pages/About.php";

                if(isset($parts['query']))
                {
                    $page="../Pages/About.php?";
                }

                headerNav("../");
                searchContainer("../");
                usepPanelContainer("../",$page);
                shoppingCartContainer("","../",$page);
                scrollToTopButton();
            ?>
            <div class="header">
                <h1 class="headerh1">Our Story</h1>
            </div>
        </div>
        <div class="main-container">
            <div class="HomeOurStoryParent">
                <div class="HomeStory">
                    <a href="../index.php" class="Home">Home</a>
                    <div class="dash">\</div>
                    <a href="About.php" class="Story">Our Story</a>
                </div>
            </div>
            <div class="bigDiv flex">
                <div class="leftDiv">
                    <img src="../Images/About_1.jpg" class="image">
                </div>
                <div class="rightDiv">
                    <h2 class="rightDivH2">How It All Started</h2>
                    <p class="rightDivP">
                        We are the lightning team and we started UpTown modern Company. 
                        <br>
                        The idea of the project started from our desire to provide modern furniture. Modern
                        <br>
                        furniture is predominant in homes these days, but the Palestinian market lacks 
                        <br>
                        the presence of this type of furniture, so we decided to open the first furniture 
                        <br>
                        store specialized in selling this type of furniture specifically. From the beginning, 
                        <br>
                        we tried to provide everything necessary to fulfill the client’s dream of decorating  
                        <br>
                        his dream house. Our store is not limited to furniture in particular, but also 
                        <br>
                        includes wall clocks and modern seating .UpTown modern is a lifestyle industrial 
                        <br>
                        design brand, which creates classically inspired leather, wood, and metal 
                        <br>
                        products. As an additional step for the success of our project, the project is no 
                        <br>
                        longer limited to new furniture, but there is a section dedicated to used and 
                        <br>
                        refurbished furniture, which is characterized by its high quality and cheaper price 
                        <br>
                        compared to the rest of the products.
                    </p>
                </div>
            </div>
            <div class="catalog" >
                <img id="topImg" class="top" src="../Images/,,.svg">
                <div class="text">Our Carefully Selected Catalog Will Make Sure Your House Will Become a Home</div>
                <img id="bottomImg" class="buttom" src="../Images/,,.svg">
            </div>
            <div class="bigDiv flex">
                <div class="leftDiv2">
                    <h2 class="rightDivH2">Hand-Crafted Masterpieces</h2>
                    <p class="rightDivP">
                        The beginnings were not easy, and the sales were not as we wanted, and perhaps 
                        <br>
                        the loss was more than the profit in the beginning, but we did not give up and 
                        <br>
                        continued to fight for the success of our project and today, we can say that our 
                        <br>
                        brand has spread all over Palestine, and we are close to achieving our dream of 
                        <br>
                        introducing our products to every home in Palestine and  Company sales grew  
                        <br>
                        and the brand has been realized. Now, in addition to these products.  
                        <br>
                        the company is focusing on design, build and custom furniture.
                    </p>
                </div>
                <div class="rightDiv2">
                    <img src="../Images/about_2.jpeg" class="image">
                </div>
            </div>
            <div class="team">
                <h2 class="teamH2">Meet Our Lovely Team</h2>
                <div class="teamPics flex">
                    <div class="imageDiv">
                        <div class="animated-circles"></div>
                        <div class="member-image-container">
                            <img src="../Images/sundos.jpg" class="Memberimage">
                        </div>
                        <div class="MemberName">Sundos Saifi</div>
                    </div>
                    <div class="imageDiv">
                        <div class="animated-circles"></div>
                        <div class="member-image-container">
                            <img src="../Images/abdulla.jpg" class="Memberimage">
                        </div>
                        <div class="MemberName">Abdullah Refai</div>
                    </div>
                    <div class="imageDiv">
                        <div class="member-image-container">
                            <div class="animated-circles"></div>
                            <img src="../Images/yaqeen.jpg" class="Memberimage">
                        </div>
                        <div class="MemberName">Yaqeen Yaseen</div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            footer("../","",$page);
        ?>
    </body>
</html>