<?php

class Book{
    private $title ;
    private $author;
    private $year;
    // matindirch getters o setters hitach ghi mamhtajhomch lol
    public function __construct($title,$author,$year){
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        if(empty($this->title)){
            $this->title = "unknown";
        }
        if(empty($this->year)){
            $this->year = date("Y");
        }
    }
}
$book1 = new Book("title", "mohamed", "2020");
$book2 = new Book('', 'Acharouaou', '');
var_dump($book1);
var_dump($book2);

?>