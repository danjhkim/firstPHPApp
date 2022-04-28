<?php 

//classes

class User {
    // makes these variables unchangale outside of class
    private $mail;
    private $name;

    public function __construct($name, $mail) {
        $this->name = $name;
        $this->mail = $mail;
        
    }

    public function login() {
        echo $this->name. 'the user logged in';
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        if(is_string($name) && strlen($name) > 1) {
            $this->name = $name;
            return "name has been updated to $name";
        } else {
            return "$name is not  valid name";
        }
    }
}

class B extends User {
    public function __construct() {
        parent::__construct("name", "mail");
        // Do stuff specific for Bar
      }
}


$dan = new User('jimmmy', 'dan@dan.com');

echo $dan->getName();
echo $dan->setName("bilbo");
echo $dan->getName();




?>