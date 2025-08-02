<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])){
        function test_input($data){
            $data = htmlentities($data); 
            $data = trim($data); 
            $data = stripslashes($data); 
            return $data; 
        }
        # getting data !
        $email = test_input($_POST['email']);
        $nom = test_input($_POST['nom']);
        $prenom= test_input($_POST['prenom']);
        $phone = test_input($_POST['phone']);

    }else{
        // cree un compte !
        header('location:inscreption.php?p=1');
    }
?>