<?php


class Counter{
    static $count = 0;
    
    public static function Increment(){
        self::$count +=1;
        
    }
    public static function showCount(){
        echo "the count value is : ".self::$count.".\n";
    }
}

Counter::Increment();
Counter::Increment();
Counter::showCount();



?>