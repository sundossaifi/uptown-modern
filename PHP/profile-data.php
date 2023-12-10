<?php
    function  data()
    {
        if(isset($_SESSION["active"]))
        {
            if($_SESSION["active"]=="true")
            {
                echo
                '
                    <form action="../PHP/profile-process.php" method="post" class="information">
                        <div class="flex">
                            <label class="lab" >First Name :</label>
                            <input value="'.$_SESSION["fname"].'" name="fname" class="textf" type="text" placeholder="First Name" required>
                        </div>
                        <div class="flex">
                            <label class="lab" >Last Name :</label>
                            <input value="'.$_SESSION["lname"].'" name="lname" class="textf" type="text" placeholder="Last Name" required>
                        </div>
                        <div class="flex">
                            <label class="lab" >Phone Number :</label>
                            <input value="'.$_SESSION["pnumber"].'" name="pnumber" class="textf" type="text" pattern="[0-9]+" placeholder="Phone Number" required>
                        </div>
                        <div class="flex">
                            <label class="lab" >City :</label>
                            <input value="'.$_SESSION["city"].'" name="city" class="textf" type="text" placeholder="City" required>
                        </div>
                        <div class="flex">
                            <label class="lab" >Address :</label>
                            <input value="'.$_SESSION["address"].'" name="address" class="textf" type="text" placeholder="Address" required>
                        </div>
                        <div class="flex">
                            <label class="lab" >Email :</label>
                            <input value="'.$_SESSION["email"].'" name="email" class="textf" type="email" placeholder="Email Address" required>
                        </div>
                        <div class="flex">
                            <label class="lab" >Password :</label>
                            <input type="password" name="password" class="textf" required placeholder="Password">
                        </div>
                        <div class="flex">
                            <label class="lab" >New Password :</label>
                            <input type="password" name="newpassword" class="textf" placeholder="New Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                        </div>
                        <div class="submitButton">
                            <input name="pr-submit" class="btn" type="Submit" value="Save">
                        </div>
                    </form>
                    <div class="myCard">
                        <a class="cta" href="my-orders.php?uID='.$_SESSION["uid"].'">
                            <span>My Orders</span>
                            <svg viewBox="0 0 13 10" height="10px" width="15px">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </a>
                    </div>
                ';
            }
        }
    }
?>