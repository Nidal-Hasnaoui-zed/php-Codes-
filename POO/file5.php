<?php 
    // inhertance : 

    class Person{
        public $name ; 
        public $age ; 
        
        public function __construct($name, $age)
        {
            $this->name = $name ; 
            $this->age = $age ; 
        }
        public function __set($name, $value)
        {
            $this->$name = $value ; 
        }
        public function __get($name)
        {
            return $this->$name ; 
        }
        public function print_infos(){
            return "name : $this->name and age : $this->age"; 
        }
    }
    class stuend extends Person {
        public $branch ; 

        public function __construct($name, $age , $branch)
        {
            parent::__construct($name,$age); 
            $this->branch = $branch ;
        }
        public function print_infos()
        {
            $print_ifos_parent = parent::print_infos(); 
            return "$print_ifos_parent and branche : $this->branch"; 
        }
    }
    $student1 = new stuend('nidal', 19, 'DD option Full Stack'); 
    $student1->name = 'nourdine';
    $student1->age = 19 ; 
    $student1->branch = 'Devlopment Degital'; 
    echo  $student1->print_infos();


?>