<?php
    class Article
    {
        private $id;
        private $title;
        private $postDate;
        private $category;
        private $img;
        private $content;
        private $authorID;

        function __construct($id,$title,$postDate,$category,$img,$content,$authorID) 
        {
            $this->id=$id;
            $this->title=$title;
            $this->postDate=$postDate;
            $this->category=$category;
            $this->img=$img;
            $this->content=$content;
            $this->authorID=$authorID;
        }

        function __destruct() 
        {
            
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function setTitle($title)
        {
            $this->title = $title;
        }

        public function getPostDate()
        {
            return $this->postDate;
        }

        public function setPostDate($postDate)
        {
            $this->postDate = $postDate;
        }

        public function getCategory()
        {
            return $this->category;
        }

        public function setCategory($category)
        {
            $this->category = $category;
        }

        public function getImg()
        {
            return $this->img;
        }

        public function setImg($img)
        {
            $this->img = $img;
        }

        public function getContent()
        {
            return $this->content;
        }

        public function setContent($content)
        {
            $this->content = $content;
        }

        public function getAuthorID()
        {
            return $this->authorID;
        }

        public function setAuthorID($authorID)
        {
            $this->authorID = $authorID;
        }
    }
?>