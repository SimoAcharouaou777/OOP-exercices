<?php
class User{
    private $username;
    private $password;
    private $role;
    private $status;

    public function __construct($username,$password){
        $this->username = $username;
        $this->password = $password;
        $this->role = 'user';
        $this->status = 'new';
    }

    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }
    public function setRole($role){
        $this->role = $role;
    }	
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }

}
class Admin extends User{
    public function __construct($username,$password){
        parent::__construct($username,$password);
        $this->setRole('admin');
    }
    
}

class Article{
    private $title;
    private $content;
    private $author;

    public function __construct($title,$content,$author){
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
    }
    
    public function getTitle(){
        return $this->title;
    }
    public function getContent(){
        return $this->content;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
    public function setContent($content){
        $this->content = $content;
    }
}

class System{
    private array $users;
    private array $articles;

    public function __construct(){
        $this->users = [];
        $this->articles = [];
    }
    public function addUsers(User $user){
        $this->users[] = $user;
    }
    public function addArticles(Article $article){
        $this->articles[] = $article;
    }

    public function login($username,$password){
        foreach($this->users as $user){
            if($user->getUsername() ==  $username && $user->getPassword() == $password){
                $user->setStatus('connected');
                echo"Welcome ".$user->getUsername()." you are connected \n";
                return $user;
            }else{
                echo"\nthe username or password are incorrect\n";
                return false;
            }
        }
    }
    
    public function logout($username){
        foreach($this->users as $user){
            if($user->getUsername() == $username){
                echo"you are now loged out \n ";
                $user->setStatus('disconnected');
            }
        }
    }
    public function displayAllUsers(){
        foreach($this->users as $user){
            echo"User name : ".$user->getUsername()."\nRole : ".$user->getRole()."\nStatut : ".$user->getStatus()."\n";
        }
    }
    public function displayAllArticles(){
        foreach($this->articles as $article){
            echo"\nTitle : ".$article->getTitle()."\nContent : ".$article->getContent()."\nAuthor : ".$article->getAuthor()."\n";
        }
    }
    
    public function changeRole($username,$role){
        foreach($this->users as $user){
            if($user->getUsername() == $username){
                $user->setRole($role);
                echo"\nThe role changed successfully\n";
            }
        }
    }
    
    public function createArticle($username ,$title,$content,$author){
        foreach($this->users as $user){
            if($user->getStatus() == 'connected'){
                if($user->getRole() == 'editor'){
                    $this->addArticles(new Article($title,$content,$author));
                    echo"the article is added \n";
                }
            }
        }
    }
}

$user1 = new User('mohamed','password');
$user2 = new User('omar','password');
$user3 = new User('alhyan','password');
$user4 = new User('bo3za','password');
$users = [$user1,$user2,$user3,$user4];
$system = new System();
foreach($users as $user){
    $system->addUsers($user);
}
$system->login('mohamed','password');
$system->displayAllUsers();
$system->changeRole('mohamed','editor');
$system->createArticle('mohamed','title','this is the content of the article ','mohamed');
$system->displayAllArticles();


?>

