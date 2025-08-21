<?php 
    session_start(); 
    if(isset($_GET['ids'])){
        $id = $_GET['ids']; 
        include('../connextion.php'); 
        $req = 'DELETE FROM Etudiant WHERE idEtudiant=?'; 
        $stmt = $conn->prepare($req); 
        $excute = $stmt->execute([$id]); 
        if($excute){
            header('location:accu.php?p=1');
            exit(); 
        }else{
            header('location:accu.php?p=2'); 
            exit();
        }
        
    }else{
        header('location:accu.php?p=3'); 
        exit();
    }
?>