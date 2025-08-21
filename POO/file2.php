<?php 
    // here we will study constrictor !
    class Person{
        public $name ; 
        public $age ; 
        public $job ; 

        public function __construct($name, $age , $job)
        {
            $this->name = $name;
            $this->age =$age;
            $this->job =$job; 
        }

        // getter's : 

        public function get_name(){
            return $this->name; 
        }
        public function  get_age(){
            return $this->age; 
        }
        public function get_job(){
            return $this->job;
        }
    }

    // creating instrence :
    
    $p1 = new Person('nidal', 19, 'ALGO Treader'); 
    echo 'my name is : '. $p1->get_name();
    echo '<br>' ; 
    echo 'my age is : '. $p1->get_age() .' years old'; 
    echo '<br>' ; 
    echo 'my job is :' . $p1->get_job();


?>