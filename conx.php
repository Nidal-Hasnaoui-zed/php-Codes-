<?php 
    $server_name = 'localhost'; 
    $dbname = 'preparation';
    $user_name = 'root'; 
    $password = ''; 
    try{
        $conn = new PDO("mysql:host=$server_name;dbname=$dbname",$user_name,$password); 
        $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); 
    } catch(PDOException $e){
        die('Err de connextion Avec PDO : '. $e->getMessage()); 
    }
?>