<?php

// ----------------- Class Vector -----------------
class Vector {
    public $x;
    public $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function getMagnitude() {
        return sqrt($this->x ** 2 + $this->y ** 2);
    }

    public function add(Vector $v) {
        return new Vector($this->x + $v->x, $this->y + $v->y);
    }

    public function subtract(Vector $v) {
        return new Vector($this->x - $v->x, $this->y - $v->y);
    }

    public function dot(Vector $v) {
        return $this->x * $v->x + $this->y * $v->y;
    }

    public function printVector() {
        return "({$this->x}, {$this->y})";
    }
}

// ----------------- Class MathUser -----------------
class MathUser {
    protected $name;
    protected $surname;
    protected $username;
    protected $is_admin = false;

    public function __construct($name, $surname, $username) {
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
    }

    public function checkIsAdmin() {
        return $this->is_admin;
    }

    public function printName() {
        if ($this->is_admin) {
            return "{$this->name} {$this->surname} (admin)";
        }
        return "{$this->name} {$this->surname}";
    }

    public function calculateVectorMagnitude(Vector $v) {
        return $v->getMagnitude();
    }
}

// ----------------- Class AdminUser -----------------
class AdminUser extends MathUser {

    public function __construct($name, $surname, $username) {
        parent::__construct($name, $surname, $username);
        $this->is_admin = true;
    }

    public function addVectors(Vector $v1, Vector $v2) {
        return $v1->add($v2);
    }
}

// ----------------- Example Usage -----------------
$user1 = new MathUser("Ali", "Khalid", "ali123");
$v1 = new Vector(3, 4);

echo $user1->printName() . "<br>";               // Ali Khalid
echo "Magnitude of v1: " . $user1->calculateVectorMagnitude($v1) . "<br>"; // 5

$admin = new AdminUser("Sara", "Ahmed", "sara_admin");
$v2 = new Vector(1, 2);

echo $admin->printName() . "<br>";              // Sara Ahmed (admin)
$newVector = $admin->addVectors($v1, $v2);
echo "v1 + v2 = " . $newVector->printVector() . "<br>"; // (4, 6)

echo "Dot product v1·v2 = " . $v1->dot($v2) . "<br>";   // 3*1 + 4*2 = 11
?>
