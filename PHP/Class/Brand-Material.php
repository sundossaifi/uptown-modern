<?php
    class Brand_Material
    {
        private $id;
        private $name;

        function __construct($id,$name) 
        {
            $this->id=$id;
            $this->name=$name;
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

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }
    }
?>