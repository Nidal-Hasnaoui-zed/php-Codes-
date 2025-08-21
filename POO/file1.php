<?php 
    // creatign a class Persone and put 3 properties name , age and job and 3 metheod's (getters and setters !)
    class Person{
        public $name; 
        public $age ; 
        public $job ; 

        // setter's : 
        public function set_name($name){
            return $this->name = $name; 
        }
        public function set_age($age){
            return $this->age = $age; 
        }
        public function set_job($job){
            return $this->job = $job ; 
        }
        // getter's : 
        public function get_name(){
            return $this->name; 
        }
        public function get_age(){
            return $this->age; 
        }
        public function get_job(){
            return $this->job; 
        }
    }
?>