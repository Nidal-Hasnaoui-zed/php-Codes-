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
            $req = 'select * from Surveillant where nom = ? and psw =?'; 
            $stmt = $conn->prepare($req); 
            $inserion = $stmt->execute([$nom, md5($pwd)]); 
            if($inserion){
                if($stmt->rowCount() == 1 ){
                    session_start(); 
                    $_SESSION['nom'] = $nom;
                    header('location:accu.php');
                }else{
                    // nom or password was incorrect bro !
                    header('location:login.php');
                }
            }else{
                // pr d'exucution : 
                header('locatiom:login.php');
            }
        }else{
            // you live an enmty form !
            header('location:login.php');

        }
    }else{
        // plz logged !
        header('location:login.php');

    }
?>