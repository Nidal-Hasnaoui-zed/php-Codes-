<?php 

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])){

        function test_input($data){
            $data = htmlentities($data); 
            $data = trim($data); 
            $data = stripslashes($data); 
            return $data;
        }

        $email = test_input($_POST['email']);
        $pwd= test_input($_POST['pwd']);

        if(!empty($email) && !empty($pwd)){
            
            include('../cnx.php'); 
            $req = 'select * from users where email=? and password=?'; 
            $stmt = $conn->prepare($req); 
            $excute = $stmt->execute([$email, md5($pwd)]); 
            if($excute){
                if($stmt->rowCount() == 1){
                    session_start(); 
                    $_SESSION['user_email'] = $email; 
                    header('location:accu.php'); 
                    exit(); 
                }else{
                    header('location:login.php?p=1'); 
                    exit(); 
                }
            }else{
                header('location:login.php?p=1'); 
                exit(); 
            }
        }else{
            header('location:login.php?p=1'); 
            exit(); 
        }

    }else{
        header('location:login.php?p=1'); 
        exit(); 
    }

?>