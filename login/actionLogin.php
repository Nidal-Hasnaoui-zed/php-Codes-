<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])){
        function test_input($data){
            $data = htmlspecialchars($data); 
            $data = trim($data); 
            $data = stripslashes($data); 
            return $data ; 
        }
        // getting the data from user ! 
        $nom = test_input($_POST['nom']); 
        $pwd = $_POST['pwd'];
        // lets check if this is empty bro !
        if(!empty($nom) && !empty($pwd)){
            // we will inculde cnx file here !
            include('../conx.php'); 
            $req = 'select * from Surveillant where nom = ?'; 
        }else{
            // you live an enmty form !
        }
    }else{
        // plz logged !
    }
?>