<?php
    function popUpMessage()
    {
        if(isset($_SESSION["state_type"]))
        {
            if($_SESSION["state_type"]!="")
            {
                if($_SESSION["state_type"]=="admin-mode")
                {
                    echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Welcome ".$_SESSION["fname"]."</div>";
                }
                elseif($_SESSION["state_type"]=="block-user-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>User Blocked Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Something Went Wrong Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="send-letter-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>NewsLetter Has Been Sent Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Something Went Wrong Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="add-article-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Article Posted Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Something Went Wrong Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="delete-ipost-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Instagram Post Deleted Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Something Went Wrong Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="add-ipost-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Instagram Post Added Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>This Link Already Exist</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="delete-article-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Article Deleted Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Something Went Wrong Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="edit-bio-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Bio Updated Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Something Went Wrong Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="set-on-sale-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Product Updated Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Something Went Wrong Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="remove-from-sale-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Product Updated Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Something Went Wrong Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="add-color-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Color Added Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Color Already Exist</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="add-brand-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Brand Added Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Brand Already Exist</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="add-material-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Material Added Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Material Already Exist</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="unavailable-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Product Updated Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Something Went Wrong Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="add-product-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Product Added Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Something Went Wrong Try Later</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="delievered-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Order State Updated Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed1")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>This Order is Refunded!</div>";
                    }
                    elseif($_SESSION["state"] == "failed2")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>This Order Has Been Already Delievered!</div>";
                    }
                }
                elseif($_SESSION["state_type"]=="refund-state")
                {
                    if($_SESSION["state"] == "succeeded")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>Order State Updated Successfully</div>";
                    }
                    elseif($_SESSION["state"] == "failed")
                    {
                        echo "<div class='pop-up-message' style='top: 4%; margin-left: 8%; background-color: #d1e8e2;'>This Order Has Been Already Refunded</div>";
                    }
                }
            }

            $_SESSION["state_type"]="";
        }
    }
?>