<?php 
    class Bicycle{
        public $brand; 
        public $model; 
        public $year; 
        public $description = 'Used bicycle'; 
        public $weight; 

        public function __construct($brand, $model, $year, $description,$weight)
        {
            $this->brand = $brand ; 
            $this->model = $model; 
            $this->year = $year ; 
            $this->description = $description ; 
            $this->weight = $weight ; 
        }

        public function getInfo(){
            return "$this->brand $this->model ($this->year)"; 
        }
        // i don't understand this !
        public function getWeight($inKG = false) {
        if($inKG){
            $weight_in_kg = $this->weight / 1000;
            return "$weight_in_kg kg";
        } else {
            return "$this->weight g";
        }
         }
        public function set_weight($value){
            $this->weight = $value ;
        }   
    }
    $bic1 = new Bicycle('somthing', 10, 2020, 'nothing', 12);
    echo $bic1->getInfo();
    echo '<br>'; 
    echo 'whight on kg is '. $bic1->getWeight();
    echo '<br>';
    echo 'whight on g is '. $bic1->getWeight(true);
    echo '<br>';
    $bic2 = new Bicycle('somthing2', 10, 2020, 'nothing', 15); 
    echo $bic1->getInfo();
    echo '<br>'; 
    echo 'whight on kg is '. $bic2->getWeight();
    echo '<br>';
    echo 'whight on g is '. $bic2->getWeight(true);
    echo '<br>';

?>