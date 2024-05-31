<?php

class Number{
    private $number;

    public function __construct($number){
        $this->number = $number;
    }

    public function getNumber(){
        return $this->number;
    }
}

class Table{
    private array $numbers;

    public function __construct($numbers){
        $this->numbers = $numbers;
    }
    
    public function removebyIndex($index){
        unset($this->numbers[$index]);
        $this->numbers = array_values($this->numbers);   
    }
    public function displayAllNumbers(){
        foreach($this->numbers as $number){
            echo"the number : ".$number->getNumber().".\n";
        }
    }

    public function addNumber(Number $number,$position){
        for($i = count($this->numbers); $i>= $position; $i--){
            $this->numbers[$i] = $this->numbers[$i-1];
        }
        $this->numbers[$position - 1] = $number;
    }
}


$number1 = new Number(1);
$number2 = new Number(2);
$number3 = new Number(3);
$number4 = new Number(4);
$numbers = [$number1,$number2,$number3,$number4];
$table = new Table($numbers);
$table->removebyIndex(1);
$newNumber = new Number(2);
$table->addNumber($newNumber,2);
$table->displayAllNumbers();


?>