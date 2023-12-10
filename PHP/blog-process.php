<?php
    include "Class/Article.php";

    function articles($startingIndex)
    {
        try
        {
            $articlesArray = array();
            $database = new mysqli('localhost','root','','uptownmodern');
            $query=getArticleQuery();
            $result=$database->query($query);

            if(mysqli_num_rows($result)!=0)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $article =new Article
                    (
                        $row["ARTICLE_ID"],$row["TITLE"],$row["POST_DATE"],$row["CATEGORY"],
                        $row["PIC"],$row["CONTENT"],$row["AUTHOR_ID"]
                    );

                    array_push($articlesArray,$article);
                }
            }
            
            $pageContentArray=array();
            $counter=0;

            for($i=$startingIndex;$i<count($articlesArray);$i++)
            {
                if($counter==6)
                {
                    break;
                }

                if(isset($articlesArray[$i]))
                {
                    array_push($pageContentArray,$articlesArray[$i]);
                }

                $counter++;
            }

            for($i=0;$i<count($pageContentArray);$i+=2)
            {
                $firstColumn=getArticleColoumn($pageContentArray[$i],$database);

                $secondColumn=
                '
                    <div class="col" style="width: 402px">
                    </div>
                ';

                if($i+1<count($pageContentArray))
                {
                    $secondColumn=getArticleColoumn($pageContentArray[$i+1],$database);
                }
                
                echo 
                '
                    <div class="row">
                        '.$firstColumn.'
                        '.$secondColumn.'
                    </div>
                ';
            }

            if(count($articlesArray)>6)
            {
                $numberOfPages=ceil(count($articlesArray)/6);
                $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if(str_contains($url,"?pageIndex="))
                {
                    $url = substr($url, 0, strpos($url, "?pageIndex="));
                }
                
                if(str_contains($url,"&pageIndex="))
                {
                    $url = substr($url, 0, strpos($url, "&pageIndex="));
                }
                
                $parts = parse_url($url);
                $appendedChar="";

                if(isset($parts['query']))
                {
                    $appendedChar="&";
                }
                else
                {
                    $appendedChar="?";
                }

                echo '<div class="pages-container pages-button-attr">';
                for($i=1;$i<=$numberOfPages;$i++)
                {
                    echo '<a id="'.$i.'" href="'.$url."".$appendedChar."pageIndex=".$i.'" class="page-button">'.$i.'</a>';
                }
                echo '</div>';
            }

            $database->commit();
            $database->close();          
        }
        catch(Exception $exception)
        {
            echo $exception;
        }
    }

    function getArticleQuery()
    {
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($url);
        $query="";

        if(isset($parts['query']))
        {
            $key=explode("=",explode("&",$parts['query'])[0])[0];
            $value=explode("=",explode("&",$parts['query'])[0])[1];
            
            if($key=="cat")
            {
                $query="SELECT *FROM `article` WHERE CATEGORY='".$value."';";
            }
            elseif($key=="authID")
            {
                $query="SELECT *FROM `article` WHERE AUTHOR_ID='".$value."';";
            }
            elseif($key=="pageIndex")
            {
                $query="SELECT *FROM `article`;";
            }
        }
        else
        {
            $query="SELECT *FROM `article`;";
        }

        return $query;
    }

    function getArticleColoumn($article,$database)
    {
        $autherName="";
        $query="SELECT *FROM `admin` where ADMIN_ID=".$article->getAuthorID().";";
        $result=$database->query($query);

        if(mysqli_num_rows($result)!=0)
        {
            $row = mysqli_fetch_assoc($result);
            $autherName=$row["FIRST_NAME"]." ".$row["LAST_NAME"];
        }

        return
        '
            <div class="col attr">
                <div class="coloumn">
                    <div class="parent">
                        <div class="advice">'.$article->getCategory().'</div>
                        <img src="'.$article->getImg().'" class="imgs">
                    </div>
                    <div class="descriptioncontainer">
                        <p class="description">'.$article->getPostDate().'<span id="by"> by </span><a href="blog.php?authID='.$article->getAuthorID().'">'.$autherName.'</a></p>
                        <h3 class="question">'.$article->getTitle().'</h3>
                        <hr>
                        <a class="readarticle" href="article.php?articleID='.$article->getId().'">Read Article</a>
                    </div>
                </div>
            </div>
        ';
    }

    function authors()
    {
        $database = new mysqli('localhost','root','','uptownmodern');
        $query="SELECT *FROM `admin`;";
        $result=$database->query($query);

        if(mysqli_num_rows($result)!=0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo 
                '
                    <div class="eachauthor">
                        <div class="auth-container">
                            <img src="'.$row["PIC"].'" class="authorsimg">
                            <a class="authorsname" href="blog.php?authID='.$row["ADMIN_ID"].'">'.$row["FIRST_NAME"]." ".$row["LAST_NAME"].'</a>
                        </div>
                    </div>
                ';
            }
        }
    }
?>