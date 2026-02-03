

<?php

// class Animal
// {
//     public function eat()
//     {
//         echo "Eating.....";
//     }
// }

// class Dog extends Animal
// {
//     public function bark()
//     {
//         echo "Barking.....";
//     }
// }

// $dog = new Dog(); // object create
// $dog->eat();
// $dog->bark();


// interface Notification
// {
//     public function send();
// }

// Class Email implements Notification
// {
//     public function send(){
//         echo "Email send";
//     }
// }

// $email = new Email();
// $email->send();


trait Logger
{
    public function log($msg)
    {
        echo $msg;
    }
}

trait Profile
{
    public function name($name){
        echo $name;
    }
}

class User
{
    use Logger;
    use Profile;
}

$user = new User();
$user->log("Hello ");
$user->name("Sabbih");


?>