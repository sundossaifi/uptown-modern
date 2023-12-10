<?php
    include_once "../PHP/nabvar.php";
    include_once "../PHP/footer.php";
    include_once "../PHP/pop-up-message.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Uptown-Modern | Contact Us</title>
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
        <link rel="stylesheet" href="../CSS/Common/footer.css">
        <link rel="stylesheet" href="../CSS/Contact/contact.css">
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
                $page="../Pages/contact.php";

                if(isset($parts['query']))
                {
                    $page="../Pages/contact.php?";
                }

                headerNav("../");
                searchContainer("../");
                usepPanelContainer("../",$page);
                shoppingCartContainer("","../",$page);
                scrollToTopButton();
            ?>
            <div class="header">
                <div class="titlecontainer">
                    <h1 class="title">Contact Us</h1>
                </div>
            </div>
        </div>
        <div class="navcontainer">
            <div class="navigation">
                <a class="home" href="../index.php">Home</a>
                <a class="blog" href="contact.php">\ Contact Us</a>
            </div>
        </div>
        <div class="contact-container">
            <div class="contact-info">
                <div class="address-container">
                    <h4 class="Address">Address</h4>
                    <div class="address-details">
                        Rafidia Tower, 3rd Floor
                        <br>
                        Rafidia street
                        <br>
                        Nablus
                        <br>
                        Palestine
                    </div>
                </div>
                <div class="email-container">
                    <h4 class="Email">Email Us</h4>
                    <a href="mailto:Uptown.Modern.ps@gmail.com" class="emailadd">Uptown.Modern.PS@gmail.com</a>
                </div>
                <div class="phone-container">
                    <h4 class="call-us">Give Us A Call</h4>
                    <a href="tel:+970 595-251-236" class="phone-num">+970 595-251-236</a>
                </div>
            </div>
            <form action="../PHP/contact.php" method="post">
                <div class="user-info">
                    <div class="name-email-container">
                        <div class="user-name-email">
                            <label class="field-label">Name</label>
                            <input type="text" class="text-field" maxlength="256" name="name"
                                placeholder="Enter Your Full Name" id="name" required>
                        </div>
                        <div class="name-email-spacer"></div>
                        <div class="user-name-email">
                            <label class="field-label">Email</label>
                            <input type="email" class="text-field" maxlength="256" name="email-3" data-name="Email 3"
                                placeholder="Enter Your Email" required>
                        </div>
                    </div>
                    <label class="field-label">Message</label>
                    <textarea placeholder="How Can We Help You" maxlength="5000" id="Message" name="Message"
                            class="text-field" required></textarea>
                    <input name="co-submit" type="submit" value="submit" data-wait="Sending your Message" class="filled-btn">
                </div>
            </form>
        </div>
        <div class="location-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d210.953292233113!2d35.24398652497286!3d32.22436234993938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc9238754f5767851!2zMzLCsDEzJzI3LjgiTiAzNcKwMTQnMzguOSJF!5e0!3m2!1sen!2s!4v1651706550327!5m2!1sen!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <?php
            footer("../","",$page);
        ?>
    </body>
</html>