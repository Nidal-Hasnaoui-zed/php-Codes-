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
        $fill = $_POST['fil']; 
        if(!empty($email) && !empty($nom) && !empty($prenom) && !empty($phone) && !empty($fill)){
            if($fil != '0'){
            if(isset($_FILES['pic']['tmp_name'])){
                $pic_name = $_FILES['pic']['name']; 
                $pic_tmp = $_FILES['pic']['tmp_name']; 
                $extention = pathinfo($pic_name, PATHINFO_EXTENSION); 
                if($extention == 'png' || $extention == 'jpg' || $extention == 'jpeg'){
                    include('../conx.php');
                    $req = 'INSERT INTO Etudiant(mail,nom,prenom,tel,photo) VALUES(?,?,?,?,?)'; 
                    $stmt = $conn->prepare($req); 
                    $stmt->execute([$email,$nom,$prenom,$phone,$pic_name]); 
                    move_uploaded_file($pic_name,'images/'.$pic_name);
                }else{
                    // plz gives us a pic !
                    header('location:inscreption.php?p=4');
                }
            }else{
                // plz chose a pic : 
                header('location:inscreption.php?p=3');
            }
        }else{
            // chose a fill !
            header('location:inscreption.php?p=2');
        }
        }else{
            // you leave empty filed !
        }

    }else{
        // cree un compte !
        header('location:inscreption.php?p=1');
    }
?>