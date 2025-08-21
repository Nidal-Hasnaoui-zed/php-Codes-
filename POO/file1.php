<?php 
    // creatign a class Persone and put 3 properties name , age and job and 3 metheod's (getters and setters !)
    class Persone{
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

    // lets create an instence from this class !
    $p1 = new Persone(); 
    // put values : 
    $p1->name = 'nidal'; 
    $p1->age = 19 ; 
    $p1->job = 'ALGO-Treader !'; 
    echo "hey my name is $p1->name , and i have $p1->age years old and my job is <h4 style='display:inline;'>$p1->job</h4>";

    echo '<br><br>'; // break line !

    $p2 = new Persone(); 
    // put values : 
    $p1->name = 'hamza'; 
    $p1->age = 22 ; 
    $p1->job = 'Full-Stack'; 
    echo "hey my name is $p1->name , and i have $p1->age years old and my job is <h4 style='display:inline;'>$p1->job</h4>";
?>