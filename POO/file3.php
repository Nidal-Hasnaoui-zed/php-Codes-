<?php 
    // here i will explain Destructor : 
    class Person{
        public $name; 
        public $age; 
        public $job; 

        public function __construct($name, $age , $job)
        {  
           $this->name = $name; 
           $this->age = $age;  
           $this->job = $job; 
        }

        public function __destruct()
        {
            echo "my name is $this->name and my age is $this->age years old , and my job is $this->job"; 
        }
    }
    // creating an instence : 
    $p1 = new Person('nidal', 19 , 'Back-end');
?>