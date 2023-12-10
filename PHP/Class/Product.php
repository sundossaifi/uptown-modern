<?php
    class Product
    {
        private $id;
        private $name;

        private $price;
        private $sale;
        private $amount;
        private $numberOfSales;

        private $category;
        private $available;

        private $img;
        private $shortDes;
        private $longDes;

        private $manufacturer;
        private $dimensions;
        private $weight;
        private $requireAssembly;
        
        private $colorID;
        private $brandID;
        private $materialID;

        function __construct($id,$name,$price,$sale,$amount,$numberOfSales,$category,$available,$img,$shortDes,
        $longDes,$manufacturer,$dimensions,$weight,$requireAssembly,$colorID,$brandID,$materialID) 
        {
            $this->id=$id;
            $this->name=$name;

            $this->price=$price;
            $this->sale=$sale;
            $this->amount=$amount;
            $this->numberOfSales=$numberOfSales;

            $this->category=$category;
            $this->available=$available;

            $this->img=$img;
            $this->shortDes=$shortDes;
            $this->longDes=$longDes;

            $this->manufacturer=$manufacturer;
            $this->dimensions=$dimensions;
            $this->weight=$weight;
            $this->requireAssembly=$requireAssembly;

            $this->colorID=$colorID;
            $this->brandID=$brandID;
            $this->materialID=$materialID;
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

        public function getPrice()
        {
            return $this->price;
        }

        public function setPrice($price)
        {
            $this->price = $price;
        }

        public function getSale()
        {
            return $this->sale;
        }

        public function setSale($sale)
        {
            $this->sale = $sale;
        }

        public function getAmount()
        {
            return $this->amount;
        }

        public function setAmount($amount)
        {
            $this->amount = $amount;
        }

        public function getNumberOfSales()
        {
            return $this->numberOfSales;
        }

        public function setNumberOfSales($numberOfSales)
        {
            $this->numberOfSales = $numberOfSales;
        }

        public function getCategory()
        {
            return $this->category;
        }

        public function setCategory($category)
        {
            $this->category = $category;
        }

        public function getAvailable()
        {
            return $this->available;
        }

        public function setAvailable($available)
        {
            $this->available = $available;
        }

        public function getImg()
        {
            return $this->img;
        }

        public function setImg($img)
        {
            $this->img = $img;
        }

        public function getShortDes()
        {
            return $this->shortDes;
        }

        public function setShortDes($shortDes)
        {
            $this->shortDes = $shortDes;
        }

        public function getLongDes()
        {
            return $this->longDes;
        }

        public function setLongDes($longDes)
        {
            $this->longDes = $longDes;
        }

        public function getManufacturer()
        {
            return $this->manufacturer;
        }

        public function setManufacturer($manufacturer)
        {
            $this->manufacturer = $manufacturer;
        }

        public function getDimensions()
        {
            return $this->dimensions;
        }

        public function setDimensions($dimensions)
        {
            $this->dimensions = $dimensions;
        }

        public function getWeight()
        {
            return $this->weight;
        }

        public function setWeight($weight)
        {
            $this->weight = $weight;
        }

        public function getRequireAssembly()
        {
            return $this->requireAssembly;
        }

        public function setRequireAssembly($requireAssembly)
        {
            $this->requireAssembly = $requireAssembly;
        }

        public function getColorID()
        {
            return $this->colorID;
        }

        public function setColorID($colorID)
        {
            $this->colorID = $colorID;
        }

        public function getBrandID()
        {
            return $this->brandID;
        }

        public function setBrandID($brandID)
        {
            $this->brandID = $brandID;
        }

        public function getMaterialID()
        {
            return $this->materialID;
        }

        public function setMaterialID($materialID)
        {
            $this->materialID = $materialID;
        }
    }
?>