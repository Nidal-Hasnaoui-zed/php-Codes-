<?php 
    if(isset($_POST['send']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

        function test_input($data){
            $data = trim($data); 
            $data = htmlspecialchars($data); 
            $data = stripcslashes($data); 
            return $data ; 
        }

        $matricule  = test_input($_POST['matricule']); 
        $psw = $_POST['pwd']; 

        if(!empty($matricule) && !empty($psw)){
            include('../connextion.php');
            $req = 'select * from Surveillant where matricule=? and psw=?'; 
            $stmt = $conn->prepare($req); 
            $execution = $stmt->execute([$matricule, md5($psw)]); 
            if($execution){
                if($stmt->rowCount() == 1){
                    session_start(); 
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