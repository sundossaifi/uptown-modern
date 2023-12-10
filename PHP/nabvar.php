<?php
    session_start();
    
    function sideNav($src,$pageSrc)
    {
        $logoutButton='';

        if(isset($_SESSION["active"]))
        {
            if($_SESSION["active"] == "true")
            {
                $logoutButton=
                '
                    <form action="'.$src.'PHP/logout-process.php" method="post">
                        <input name="lOut-submit" class="logout-button" type="Submit" value="Log Out">
                        <div class="line"></div>
                    </form>
                ';
            }
            else
            {
                $logoutButton='';
            }
        }

        echo 
        '
            <div id="mySidenav" class="sidenav">
                <img src="'.$src.'Images/arrow_left.svg" alt="arrow left" onclick="closeNav()" class="closebtn">
                <div class="links-container">
                    <div>
                        <a href="'.$src.'index.php">Home</a>
                        <div class="line"></div>
                    </div>
                    <div>
                        <a href="'.$pageSrc.'About.php">Our Story</a>
                        <div class="line"></div>
                    </div>
                    <div>
                        <a href="'.$pageSrc.'Store.php">Store</a>
                        <div class="line"></div>
                    </div>
                    <div>
                        <a href="'.$pageSrc.'blog.php" target="_self">Blog</a>
                        <div class="line"></div>
                    </div>
                    <div>
                        <a href="'.$pageSrc.'contact.php">Contact</a>
                        <div class="line"></div>
                    </div>
                    '.$logoutButton.'
                </div>
                <img src="'.$src.'Images/logo.svg" alt="logo" class="logo">
            </div>
        ';
    }

    function headerNav($src)
    {
        $userButton='';
        $itemsCount=0;

        if(isset($_SESSION["active"]))
        {
            if($_SESSION["active"] == "true")
            {
                $userButton=
                '
                    <a href="http://localhost/Web-Project/Pages/profile.php">
                        <img src="'.$src.'Images/user.png" alt="user" class="user-icon">
                    </a>
                ';

                try
                {
                    $database = new mysqli('localhost','root','','uptownmodern');
                    $query="SELECT COUNT(ITEM_ID) AS TOTAL FROM `shopping_cart` WHERE U_ID='".$_SESSION["uid"]."';";
                    $result=$database->query($query);

                    $row=mysqli_fetch_assoc($result);
                    $itemsCount=$row["TOTAL"];

                    $database->commit();
                    $database->close();
                }
                catch (Exception $exception) 
                {
                    echo $exception;
                }
            }
            elseif($_SESSION["active"] == "false")
            {
                $userButton='<img src="'.$src.'Images/user.png" alt="user" class="user-icon" onclick="openAndCloseUserPanel(false)">';
            }
        }

        echo
        '
            <div class="header-nav">
                <div class="nav-menu-container">
                    <img src="'.$src.'Images/hamburger.svg" alt="hamburger menu icon" onclick="openNav()" class="burger-menu">
                </div>
                <div class="logo-container">
                    <a href="'.$src.'index.php">
                        <img src="'.$src.'Images/logo.svg" alt="logo" class="logo">
                    </a>
                </div>
                <div class="right-side-icons-container">
                    <img src="'.$src.'Images/search_icon.svg" alt="search icon" class="search-icon" onclick="showAndHideSearchScene()">
                    '.$userButton.'
                    <div class="shopping-cart-icons-container" onclick="openAndCloseShoppingCart()">
                        <img src="'.$src.'Images/icons8-shopping-trolley-64.png" alt="shopping bag" class="shopping-bag">
                        <div class="shopping-cart-icon">'.$itemsCount.'</div>
                    </div>
                </div>
            </div>
        ';
    }

    function searchContainer($src)
    {
        echo
        '
            <div id="search-container" class="search-container">
                <form action="'.$src.'PHP/search.php" method="post" id="search-form-container" class="search-form-container">
                    <input name="search-field" type="text" placeholder="Search..." required class="search-field">
                    <input name="se-submit" type="Submit" class="search-button" value="Search">
                </form>
            </div>
        ';
    }

    function usepPanelContainer($src,$page)
    {
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($url);
        $dataToSave="";

        if(isset($parts['query']))
        {
            $dataToSave="&".$parts['query'];
        }
        
        echo
        '
            <div id="user-panel-container" class="user-panel-container">
                <div id="animated-container" class="animated-container">
                    <div id="user" class="user">
                        <div class="user-panel-header">
                            <div>
                                <svg width="16px" height="16px" viewBox="0 0 16 16" onclick="openAndCloseUserPanel(false)">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g fill-rule="nonzero" fill="#333333">
                                            <polygon points="6.23223305 8 0.616116524 13.6161165 2.38388348 15.3838835 8
                                            9.76776695 13.6161165 15.3838835 15.3838835 13.6161165 9.76776695 8 15.3838835
                                            2.38388348 13.6161165 0.616116524 8 6.23223305 2.38388348 0.616116524 0.616116524
                                            2.38388348 6.23223305 8">
                                            </polygon>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="user-panel-content-container">
                            <div id="sign-in-panel" class="sign-in-panel">
                                <form action="'.$src.'PHP/signin.php?page='.$page.''.$dataToSave.'" method="post" class="login-form">
                                    <label class="login-label">LOGIN TO YOUR ACCOUNT</label>
                                    <input name="email" class="login-email" type="email" placeholder="Email Address" required>
                                    <input name="password" class="login-password" type="password" placeholder="Password" required>
                                    <a class="forgot-label-button" onclick="showAndHideResetPassword()">Forgot Password?</a>
                                    <input name="si-submit" class="login-button" type="Submit" value="LOGIN">
                                    <a class="no-account-label-button" onclick="switchLoginSignup(false)">No account? Create one here ?</a>
                                </form>
                                <form action="'.$src.'PHP/reset-password.php?page='.$page.''.$dataToSave.'" method="post" id="forgot-password-form" class="forgot-password-form">
                                    <label class="reset-label">RESET PASSWORD</label>
                                    <input name="email" class="reset-email" type="email" placeholder="Email Address" required>
                                    <input name="re-submit" class="reset-button" type="Submit" value="RESET PASSWORD">
                                </form>
                            </div>
                            <div id="sign-up-panel" class="sign-up-panel">
                                <form action="'.$src.'PHP/signup.php?page='.$page.''.$dataToSave.'" method="post" class="sign-up-form">
                                    <label class="sign-up-label">NEW ACCOUNT REGISTER</label>
                                    <input name="fname" class="sign-up-first-name" type="text" placeholder="First Name" required>
                                    <input name="lname" class="sign-up-last-name" type="text" placeholder="Last Name" required>
                                    <input name="pnumber" class="sign-up-pnumber" type="text" pattern="[0-9]+" placeholder="Phone Number" required>
                                    <input name="city" class="sign-up-city" type="text" placeholder="City" required>
                                    <input name="address" class="sign-up-address" type="text" placeholder="Address" required>
                                    <input name="email" class="sign-up-email" type="email" placeholder="Email Address" required>
                                    <input name="password" class="sign-up-password" type="password" placeholder="Password"
                                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    <div class="check-container">
                                        <input id="su-checkbox" class="sign-up-checkbox" type="checkbox" required>
                                        <label for="su-checkbox" class="sign-up-checkbox-label">I agree to the terms.</label>
                                    </div>
                                    <input name="su-submit" class="sign-up-button" type="Submit" value="CREATE AN ACCOUNT">
                                    <a class="have-account">Already have an account?</a>
                                    <div>
                                        <a class="login-label-button" onclick="switchLoginSignup(false)">Log in instead</a>
                                        <span>Or</span>
                                        <a class="reset-label-button" onclick="switchLoginSignup(true)">Reset password</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }

    function shoppingCartContainer($src,$src2,$page)
    {
        $shoppingCartContent='';

        if(isset($_SESSION["active"]))
        {
            if($_SESSION["active"] == "true")
            {
                try
                {
                    $database = new mysqli('localhost','root','','uptownmodern');
                    $query="SELECT *FROM `shopping_cart` WHERE U_ID=".$_SESSION["uid"].";";
                    $result1=$database->query($query);
                    
                    $shoppingCartContent=$shoppingCartContent.'<div class="items-container">';
                    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    $parts = parse_url($url);
                    $dataToSave="";

                    if(isset($parts['query']))
                    {
                        $dataToSave="&".$parts['query'];
                    }

                    if(mysqli_num_rows($result1)!=0)
                    {
                        $total=0;

                        while($item = mysqli_fetch_assoc($result1))
                        {
                            $query="SELECT *FROM `product` WHERE PRODUCT_ID=".$item["P_ID"]." AND AVAILABLE='y';";
                            $result2=$database->query($query);

                            $product = mysqli_fetch_assoc($result2);

                            $query="SELECT *FROM `products_imgs` WHERE PRO_ID=".$product["PRODUCT_ID"].";";
                            $result3=$database->query($query);

                            $img = mysqli_fetch_assoc($result3);

                            $total+=$item["TOTAL_PRICE"];

                            $shoppingCartContent=$shoppingCartContent.
                            '
                                <div class="item">
                                    <div class="item-image-name-container">
                                        <div class="item-image-container">
                                            <img src="'.$img["PATH"].'" alt="img pic" class="item-img">
                                        </div>
                                        <div class="item-name">'.$product["NAME"].'</div>
                                    </div>
                                    <div class="item-details">
                                        <div class="details-container">
                                            <div>
                                                Amount: '.$item["AMOUNT"].'
                                            </div>
                                            <div>
                                                Price: '.$item["TOTAL_PRICE"].'.00 $
                                            </div>
                                        </div>
                                        <form action="'.$src2.'PHP/remove-item.php?page='.$page.''.$dataToSave.'" method="post" class="remove-form">
                                            <button name="remove-button" type="submit" value="'.$item["ITEM_ID"].'" class="remove-button">
                                                <img src="'.$src2.'Images/remove.png" alt="remove" class="delete-img">
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            ';
                        }

                        $shoppingCartContent=$shoppingCartContent.
                        '
                            </div>
                            <div class="total-price">
                                <div class="total-price-label">Total:</div>
                                <div id="value" class="price-value-label">'.$total.'.00 $</div>
                            </div>
                            <div class="paypal-button-container">
                                <div id="paypal"></div>
                            </div>
                            <script src="'.$src2.'JS/payment.js" defer></script>
                            <script src="https://www.paypal.com/sdk/js?client-id=AWz_dayO4ukyMoxuwKTH-446GbKu7Gy5Tef4ErXDLHHMWo8QaWW3t9qjYMWOuKoBs9XD8n1Ke0iV4fnL&disable-funding=credit,card" data-namespace="paypal_sdk"></script>
                        ';
                    }
                    else
                    {
                        $shoppingCartContent=
                        '
                            <div class="empty-shopping-cart">
                                <div class="empty-shopping-cart-text">There are no items in your cart yet</div>
                                <a href="'.$src.'Store.php" class="start-shopping-button">
                                    <div class="start-shopping-button-text-container">
                                        <div class="start-shopping-button-text">Start-Shopping</div>
                                    </div>
                                </a>
                            </div>
                        ';
                    }

                    $database->commit();
                    $database->close();
                }
                catch (Exception $exception) 
                {
                    echo $exception;
                }
            }
            elseif($_SESSION["active"] == "false")
            {
                $shoppingCartContent=
                '
                    <div class="empty-shopping-cart">
                        <div class="empty-shopping-cart-text">There are no items in your cart yet</div>
                        <a href="'.$src.'Store.php" class="start-shopping-button">
                            <div class="start-shopping-button-text-container">
                                <div class="start-shopping-button-text">Start-Shopping</div>
                            </div>
                        </a>
                    </div>
                ';
            }
        }

        echo
        '
            <div id="shopping-cart-container" class="shopping-cart-container">
                <div id="shopping-cart" class="shopping-cart">
                    <div class="shopping-cart-header">
                        <h4>Your Cart</h4>
                        <div>
                            <svg width="16px" height="16px" viewBox="0 0 16 16" onclick="openAndCloseShoppingCart()">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g fill-rule="nonzero" fill="#333333">
                                        <polygon points="6.23223305 8 0.616116524 13.6161165 2.38388348 15.3838835 8
                                        9.76776695 13.6161165 15.3838835 15.3838835 13.6161165 9.76776695 8 15.3838835
                                        2.38388348 13.6161165 0.616116524 8 6.23223305 2.38388348 0.616116524 0.616116524
                                        2.38388348 6.23223305 8">
                                        </polygon>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                    '.$shoppingCartContent.'
                </div>
            </div>
        ';
    }

    function scrollToTopButton()
    {
        echo
        '
            <div id="scroll-to-top-button" class="scroll-to-top-button">
                <a href="#">
                    <i class="fa-solid fa-chevron-up fa-1x icon-color"></i>
                </a>
            </div>
        ';
    }
?>