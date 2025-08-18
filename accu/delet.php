<?php 
    session_start();
    if(isset($_SESSION['matricule']) && isset($_GET['idEtudiant'])){

        $id = $_GET['idEtudiant']; 
        include('../cnx.php'); 
        $req = 'DELETE FROM Etudiant
            WHERE idEtudiant= ?;';
        $stmt = $conn->prepare($req); 
        $exuction = $stmt->execute([$id]); 

        if($exuction){
            header('location:accu.php?p=3'); 
            exit();
        }else{
            header('location:accu.php?p=2'); 
            exit();
        }

    }else{
        header('location:accu.php?p=1'); 
        exit();
    }

?>