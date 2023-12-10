<?php
    function footer($src,$pageSrc,$page)
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
            <footer class="footer-container">
                <video autoplay muted loop class="video-background">
                    <source src="'.$src.'Videos/02.mp4">
                </video>
                <div class="footer-content-container">
                    <div>
                        <div>
                            <a href="'.$src.'index.php" class="footer-logo">
                                <img src="'.$src.'Images/logo.svg" alt="logo">
                            </a>
                            <a href="'.$src.'index.php" class="footer-title">
                                Uptown-Modern
                            </a>
                        </div>
                        <div class="address-contaner">
                            <p>
                                Rafidia Tower, 3<sup>rd</sup> Floor
                                <br>
                                Rafidia Street
                                <br>
                                Nablus, West-Bank
                                <br>
                                Palestine
                            </p>
                            <p>
                                +970 595-251-236
                                <br>
                                Uptown.Modern.ps@gmail.com
                            </p>
                        </div>
                    </div>
                    <div class="footer-categories">
                        <div>Categories</div>
                        <a href="'.$pageSrc.'Store.php?cat=Living-Room">Living Room</a>
                        <a href="'.$pageSrc.'Store.php?cat=Future-Collection">Future Collection</a>
                        <a href="'.$pageSrc.'Store.php?cat=Dining-Room">Dining Room</a>
                        <a href="'.$pageSrc.'Store.php?cat=Bedroom">BedRoom</a>
                        <a href="'.$pageSrc.'Store.php?cat=Accessories">Accessories</a>
                    </div>
                    <div class="our-team">
                        <div>Our-Team</div>
                        <a href="https://www.instagram.com/abdullah.m.refai/" target="_blank">@Abdullah.M.Refai</a>
                        <a href="https://www.instagram.com/sundos.saifi/" target="_blank">@Sundos.Saifi</a>
                        <a href="https://www.instagram.com/yaqeen_m_yaseen/" target="_blank">@Yaqeen.M.Yaseen</a>
                    </div>
                    <div class="Newsletter">
                        <div>Newsletter</div>
                        <form action="'.$src.'PHP/newsletter.php?page='.$page.''.$dataToSave.'" method="post" class="email-form">
                            <input name="email" type="email" placeholder="enter your email..." required class="email-field">
                            <input name="ne-submit" type="Submit" class="sumbit-button">
                        </form>
                        <div class="icons-container">
                            <a href="https://www.facebook.com/Uptown-Modern-PS-105738218785040" target="_blank">
                                <i class="fa-brands fa-facebook-f social-icon"></i>
                            </a>
                            <a href="https://twitter.com/ps_uptown" target="_blank">
                                <i class="fa-brands fa-twitter social-icon"></i>
                            </a>
                            <a href="https://www.instagram.com/uptown.modern/" target="_blank">
                                <i class="fa-brands fa-instagram social-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="lower-footer-section">
                    <div>© Uptown-Modern Inc. All rights reserved.</div>
                    <div>Website created by Lightning Team. | Website Version: 1.0</div>
                </div>
            </footer>
        ';
    }
?>