<?php

class Rectangle{
    private $width;
    private $height;

    public function __construct($width, $height){
        $this->width = $width;
        $this->height = $height;
    }

    public function getArea(){
        return $this->width * $this->height;
    }

    public function getPerimeter(){
        return 2 * ($this->width + $this->height);
    }


}

$rectangle = new Rectangle(5, 10);
echo "Area: " . $rectangle->getArea() . "\n";
echo "Perimeter: " . $rectangle->getPerimeter() . "\n";
// output:
// Area: 50
// Perimeter: 30




?>