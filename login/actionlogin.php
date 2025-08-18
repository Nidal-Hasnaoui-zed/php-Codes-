<?php 

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])){

        function test_input($data){
            $data = htmlentities($data); 
            $data = trim($data); 
            $data = stripslashes($data); 
            return $data;
        }

        $lname = test_input($_POST['lname']);
        $matricule = test_input($_POST['matricule']);
        $pwd= test_input($_POST['pwd']);

        if(!empty($lname) && !empty($matricule) && !empty($pwd)){
            
            include('../cnx.php'); 
            $req = 'select * from Surveillant where matricule=? and nom=? and psw=?'; 
            $stmt = $conn->prepare($req); 
            $excute = $stmt->execute([$matricule,$lname ,md5($pwd)]); 
            if($excute){
                if($stmt->rowCount() == 1){
                    session_start(); 
                    // $user = $stmt->fetch(PDO::FETCH_ASSOC); 
                    $_SESSION['matricule'] = $matricule;
                    header('location:../accu/accu.php'); 
                    exit(); 
                }else{
                    header('location:login.php?p=4'); 
                    exit(); 
                }
            }else{
                header('location:login.php?p=3'); 
                exit(); 
            }
        }else{
            header('location:login.php?p=2'); 
            exit(); 
        }

    }else{
        header('location:login.php?p=1'); 
        exit(); 
    }

?>