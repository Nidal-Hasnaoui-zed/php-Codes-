<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])){
        function test_input($data) {
            $data = trim($data); 
            $data = stripslashes($data); 
            $data = htmlspecialchars($data); 
            return $data; 
        }

        $email = test_input($_POST['email']);
        $nom = test_input($_POST['nom']);
        $prenom = test_input($_POST['prenom']);
        $phone = test_input($_POST['phone']);
        $fill = $_POST['fill'];

        if(!empty($email) && !empty($nom) && !empty($prenom) && !empty($phone) && !empty($fill) && $fill != '0'){
            if(isset($_FILES['pic']['tmp_name'])){
                $pic_name = basename($_FILES['pic']['name']);
                $pic_tmp = $_FILES['pic']['tmp_name'];
                $extention = strtolower(pathinfo($pic_name, PATHINFO_EXTENSION));

                if(in_array($extention,['png','jpg','jpeg'])){
                    include('../conx.php'); 
                    $req = 'INSERT INTO Etudiant (mail,nom,prenom,tel,photo,idFiliere) VALUES (?,?,?,?,?,?)';
                    $stmt = $conn->prepare($req);
                    $stmt->execute([$email,$nom,$prenom,$phone,$pic_name,$fill]); 
                    move_uploaded_file($pic_tmp,'images/'.$pic_name);
                    header('Location: inscreption.php?p=5');
                     exit;
                }else{
                    header('Location: inscreption.php?p=4'); // Enter a pic !
                    exit;
                }
            }else{
                header('Location: inscreption.php?p=3'); // Messing pic !
                exit;
            }
        }else{
            header('Location: inscreption.php?p=2'); // Missing fields or invalid fill
            exit;
        }
    }else{
        header('Location: inscreption.php?p=1'); // Unauthorized access
        exit;
    }
?>