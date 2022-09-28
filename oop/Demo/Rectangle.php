<?php
    require_once 'Demo/IFormas.php';
    class Rectangle implements IFormas {
        private $width = 0;
        private $height = 0;
        public function __construct($width, $height)
        {
            $this->width = $width;
            $this->height = $height;
        }
        public function getArea(){
            return $this->width * $this->height;
        }
        public function getPerimetro()
        {
            return (2 * $this->width) + (2 * $this->height);
        }
    }
?>
