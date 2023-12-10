<?PHP
    try
    { 
        session_start();
        $_SESSION["state_type"]="add-ipost-state";
        $_SESSION["state"] = "failed";
        
        $database = new mysqli('localhost','root','','uptownmodern');
        $query="SELECT *FROM `instagram_posts` WHERE URL='".$_POST["url"]."';";
        $result=$database->query($query);

        if(mysqli_num_rows($result)!=0)
        {
            $_SESSION["state"] = "failed";
        }
        else
        {
            $query="INSERT INTO `instagram_posts`(`URL`) VALUES ('".$_POST["url"]."');";
            $result=$database->query($query);
            $_SESSION["state"] = "succeeded";
        }
        
        $database->commit();
        $database->close();

        header("Location: instagramScreen.php");
    }
    catch (Exception $exception)
    {
        echo $exception;
    }
?>