<?php
    session_start();
    if(isset($_POST["lOut-submit"])||isset($_POST["alogout"]))
    {
        $_SESSION["state_type"]="logout";
        $_SESSION["state"]="succeeded";
        header("Location: ../index.php");
    }
?>