<?php 
    if(isset($_POST['send']) && $_SERVER['REQUEST_METHOD'] === 'POST' ){

        function test_input($data){
            $data = htmlspecialchars($data); 
            $data = stripcslashes($data); 
            $data = trim($data); 
            return $data ; 
        }

        $name = test_input($_POST['name']);
        $last_name = test_input($_POST['lname']);
        $email = test_input($_POST['email']);
        $phone = test_input($_POST['phone']);
        $branche = test_input($_POST['branche']);

        if(!empty($name) && !empty($last_name) && !empty($email) && !empty($phone)){

            if($branche != '0'){

                if(isset($_FILES['pic']['tmp_name'])){

                    $pic_name = $_FILES['pic']['name']; 
                    $pic_tmp_name = $_FILES['pic']['tmp_name']; 
                    $size = $_FILES['pic']['size']; 
                    $extention = strtolower(pathinfo($pic_name, PATHINFO_EXTENSION));

                    if($extention === 'png' || $extention === 'jpg' || $extention === 'jpeg'){

                        if($size > 2 * 1024 * 1024){
                            header('location:inscreption.php?p=6'); 
                            exit();
                        }

                        include('../connextion.php'); 
                        $req = 'select * from Etudiant where mail=? '; 
                        $stmt = $conn->prepare($req); 
                        $stmt->execute([$email]); 
                        if($stmt->rowCount() > 0){
                            header('location:inscreption.php?p=7'); 
                            exit();
                        }

                        $req2 = 'insert into Etudiant(mail, nom, prenom, tel, photo, idFiliere) values(?,?,?,?,?,?)'; 
                        $stmt2 = $conn->prepare($req2);
                        $stmt2->execute([$email, $name, $last_name, $phone, $pic_name, $branche]); 
                        move_uploaded_file($pic_tmp_name, 'images/'.$pic_name);
                        header('location:inscreption.php?p=8'); 
                        exit();

                    }else{
                        header('location:inscreption.php?p=5'); 
                        exit();
                    }
                }else{
                    header('location:inscreption.php?p=4'); 
                    exit();
                }
            }else{
                header('location:inscreption.php?p=3'); 
                exit();
            }
        }else{
            header('location:inscreption.php?p=2'); 
            exit();
        }
    }else{
        header('location:inscreption.php?p=1'); 
        exit();
    }
?>