<?php 
    $servername = 'localhost'; 
    $dbname = 'db_stagiaire'; 
    $username = 'root'; 
    $password = ''; 
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    } catch(PDOException $e){
        die('Err de conx aved db : ' . $e->getMessage());
    }
?>