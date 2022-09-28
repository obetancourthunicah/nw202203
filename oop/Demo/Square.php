<?php
    require_once 'Demo/Rectangle.php';
    class Square extends Rectangle {
        public function __construct($width)
        {
            parent::__construct($width, $width);
        }
    }
?>
