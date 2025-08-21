<?php
    // magic Getter's and Setter's : 
    class Person{
        private $name; 
        private $age; 
        private $job; 
        
        // constructor :
        public function __construct($name , $age , $job)
        {
            $this->name = $name; 
            $this->age = $age ; 
            $this->job = $job ; 
        }

        // magic setter's : 
        public function __set($prop, $value)
        {
            $this->$prop = $value ;  
        }

        // magic setter's : 
        public function __get($prop)
        {   
            return $this->$prop ; 
        }

        // a function show infos !
        public function show_infos(){
            return "hey , my name is $this->name and my age is $this->age years old , and my job is $this->job"; 
        }

        // Destructor !
        public function __destruct()
        {
            echo '<br>good by !'; 
        }

    }

    // new instence : 
    $p1 = new Person('hamza', 22 , 'Front-end'); 
    $p1->name = 'nidal'; 
    $p1->age = 19 ; 
    $p1->job = 'Back-end';
    echo $p1->show_infos();

?>