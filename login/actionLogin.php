<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])){
        function test_input($data){
            $data = htmlspecialchars($data); 
            $data = trim($data); 
            $data = stripslashes($data); 
            return $data ; 
        }
        $nom = test_input($_POST['nom']); 
        $pwd = $_POST['pwd'];

        if(!empty($nom) && !empty($pwd)){
            include('../conx.php'); 
            $req = 'SELECT * FROM Surveillant WHERE nom=? AND psw=?'; 
            $stmt = $conn->prepare($req);
            $insertion = $stmt->execute([$nom,md5($pwd)]); 
            if($insertion){
                if($stmt->rowCount() == 1){
                    session_start();
                    $_SESSION['nom']=$name; 
                    header('location:accu.php?'); 
                }else{
                    header('location:login.php?p=4'); 
                }
            }else{
                header('location:login.php?p=3'); 
            }
        }else{
            header('location:login.php?p=2'); 
        }
    }else{
        header('location:login.php?p=1'); 
    }
?>