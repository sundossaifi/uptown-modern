<?PHP
    try
    { 
        session_start();
        $_SESSION["state_type"]="add-article-state";
        $_SESSION["state"] = "failed";
        $path=uploadImage();
        $path=str_replace("C:/xampp/htdocs","http://localhost",$path);
        
        $database = new mysqli('localhost','root','','uptownmodern');
        $query="INSERT INTO `article`(`TITLE`,`POST_DATE`,`CATEGORY`,`PIC`,`CONTENT`,`AUTHOR_ID`) 
        VALUES ('".$_POST["title"]."','".date("Y-m-d")."','".$_POST["category"]."','".$path."','".$_POST["article-content"]."','".$_SESSION["aID"]."');";
        $result=$database->query($query);
        
        $database->commit();
        $database->close();
        $_SESSION["state"] = "succeeded";
        header("Location: adminarticleScreen.php");
    }
    catch (Exception $exception)
    {
        echo $exception;
    }

    function uploadImage()
    {
        $uploadDirectory = "C:/xampp/htdocs/Web-Project/Article-IMGS/";
        $fileName = $_FILES['article-picture']['name'];
        $fileTmpName  = $_FILES['article-picture']['tmp_name'];
        $uploadPath = $uploadDirectory . basename($fileName); 
        move_uploaded_file($fileTmpName, $uploadPath);
        return $uploadPath;
    }
?>