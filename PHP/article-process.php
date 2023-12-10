<?php
    function articleLink()
    {
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($url);

        if(isset($parts['query']))
        {
            echo
            '
                <a href="article.php?articleID='.explode("=",explode("&",$parts['query'])[0])[1].'" class="Article">Article</a>
            ';
        }
    }

    function articleHeader()
    {
        try
        {
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $parts = parse_url($url);
            $articleID=-1;

            if(isset($parts['query']))
            {
                $articleID=explode("=",explode("&",$parts['query'])[0])[1];
            }

            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `article` WHERE ARTICLE_ID=".$articleID.";";
            $result=$database->query($query);
            
            if(mysqli_num_rows($result)==1)
            {
                $row=mysqli_fetch_assoc($result);
                $pic=$row["PIC"];
                $title=$row["TITLE"];
                $authorID=$row["AUTHOR_ID"];

                $query="SELECT *FROM `admin` WHERE ADMIN_ID=".$authorID.";";
                $result=$database->query($query);
                $authorName="";

                if(mysqli_num_rows($result)==1)
                {
                    $row=mysqli_fetch_assoc($result);
                    $authorName=$row["FIRST_NAME"]." ".$row["LAST_NAME"];
                }

                echo
                '
                    <img src="'.$pic.'" alt="article img" class="article-image">
                    <div class="article-title">
                        <h1 class="question">'.$title.'</h1>
                        <p class="author-name">Posted <span id="by">by </span><a href="blog.php?authID='.$authorID.'"> '.$authorName.'</a></p>
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

    function getArticle()
    {
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($url);
        $articleID=-1;

        if(isset($parts['query']))
        {
            $articleID=explode("=",explode("&",$parts['query'])[0])[1];
        }

        try
        {
            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `article` WHERE ARTICLE_ID=".$articleID.";";
            $result=$database->query($query);
            
            if(mysqli_num_rows($result)==1)
            {
                $row=mysqli_fetch_assoc($result);

                echo
                '
                    <p class="para1">
                        '.$row["CONTENT"].'
                    </p>
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

    function articleAuthor()
    {
        try
        {
            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $parts = parse_url($url);
            $articleID=-1;

            if(isset($parts['query']))
            {
                $articleID=explode("=",explode("&",$parts['query'])[0])[1];
            }

            $database = new mysqli('localhost','root','','uptownmodern');
            $query="SELECT *FROM `article` WHERE ARTICLE_ID=".$articleID.";";
            $result=$database->query($query);
            
            if(mysqli_num_rows($result)==1)
            {
                $row=mysqli_fetch_assoc($result);
                $authorID=$row["AUTHOR_ID"];

                $query="SELECT *FROM `admin` WHERE ADMIN_ID=".$authorID.";";
                $result=$database->query($query);

                if(mysqli_num_rows($result)==1)
                {
                    $row=mysqli_fetch_assoc($result);
                    
                    echo
                    '
                        <div class="authorpost">
                            <img src="'.$row["PIC"].'" class="author-img">
                            <div class="author-identification">
                                <p class="authName">'.$row["FIRST_NAME"]." ".$row["LAST_NAME"].'</p>
                                <p class="favorite">
                                    '.$row["BIO"].'
                                </p>
                                <a href="blog.php?authID='.$row["ADMIN_ID"].'" class="allposts">All Posts By This Author</a>
                            </div>
                        </div>
                    ';
                }
            }

            $database->commit();
            $database->close();
        }
        catch (Exception $exception)
        {
            echo $exception;
        }
    }

    function shareButtons()
    {
        $url=str_replace("localhost","127.0.0.1","http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        
        echo
        '
            <div class="share-buttons-container">
                <h3>Share This Post</h3>
                <div id="fb-root"></div>
                <div class="fb-share-button" data-href="'.$url.'" data-layout="button_count" data-size="large">
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2FWeb-Project%2FPages%2Farticle.php%3FarticleID%3D1&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                        share
                    </a>
                </div>
                <div class="twitter-button-container">
                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-lang="en" data-show-count="false">
                        Tweet
                    </a>
                </div>
            </div>
        ';
    }
?>