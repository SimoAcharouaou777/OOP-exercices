<?php

class Book{
    private $title;
    private $author;
    private $isReturned;
    private $isAvailable;

    public function __construct($title,$author){
         $this->title = $title;
         $this->author = $author;
         $this->isReturned = 'true';
         $this->isAvailable = 'true';
    }
    public function getTitle(){
        return $this->title;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function isReturned(){
        return $this->isReturned;
    }
    public function isAvailable(){
        return $this->isAvailable;
    }
    public function setAvailable($true){
        $this->isAvailable = $true;
    }
    public function setReturned($true){
        $this->isReturned = $true;
    }

}

class Biblio{
    private array $books;
    public function __construct($books){
        $this->books = $books;
    }

    public function showAllbooks(){
        foreach($this->books as $book){
            echo"book title is : ".$book->getTitle()."\nbook autor is : ".$book->getAuthor()."\nbook is returned : ".$book->isReturned()."\nbook is available : ".$book->isAvailable().".\n";
            
        }
    }

    public function BorrowAbook($title){
        foreach($this->books as $book){
            if($book->getTitle() == $title){
                if($book->isAvailable() == 'true'){
                    $book->setAvailable('false') ;
                    $book->setReturned('false');
                    echo"the book is successfully borrowed \n";
                    return ;
                }
            }
        }
    }

    public function ReturnBook($title){
        foreach($this->books as $book){
            if($book->getTitle() == $title){
                if($book->isReturned() == 'false'){
                    $book->setAvailable('true') ;
                    $book->setReturned('true') ;
                    echo"the book is successfully returned \n";
                    return;
                }
            }
        }
    }
}
$book1 = new Book('title1','author1');
$book2 = new Book('title2','author2');
$book3 = new Book('title3','author3');
$book4 = new Book('title4','author4');
$books = [$book1,$book2,$book3,$book4];
$biblio = new Biblio($books);
$biblio->BorrowAbook('title1');
$biblio->ReturnBook('title1');
$biblio->showAllbooks();

?>