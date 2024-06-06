<?php

class Person{
    private $name;
    private $age;
    
    public function __construct($name,$age){
        $this->name = $name;
        $this->age = $age;
    }
    public function __destruct(){
        echo"the persone is destroyed";
    }
}
$persone1 = New Person('mohamed', 21);
var_dump($persone1);


?>