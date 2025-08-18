<?php 

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])){

        function test_input($data){
            $data  = htmlspecialchars($data); 
            $data = trim($data); 
            $data = stripslashes($data); 
            return $data; 
        }

        $name = test_input($_POST['name']);
        $last_name = test_input($_POST['lname']);
        $email = test_input($_POST['email']);
        $pwd = test_input($_POST['pwd']);
        $cpwd = test_input($_POST['cpwd']);

        if(!empty($name) && !empty($last_name) && !empty($email) && !empty($pwd) && !empty($cpwd) ){

            if($pwd === $cpwd){

                if(isset($_FILES['pic']['tmp_name']) && !empty($_FILES['pic']['tmp_name'])){

                    $pic_name = $_FILES['pic']['name'];
                    $pic_tmp_name = $_FILES['pic']['tmp_name']; 
                    $pic_size = $_FILES['pic']['size']; 
                    $pic_extention = pathinfo($pic_name , PATHINFO_EXTENSION); 

                    if($pic_extention == 'png' || $pic_extention == 'jpg' || $pic_extention == 'jpeg'){

                        if($pic_size > 2 * 1024 * 1024){
                            header('location:inscreption.php?p=5'); 
                            exit(); 
                        }

                        include('../cnx.php'); 
                        $req = 'select * from users where email=?'; 
                        $stmt = $conn->prepare($req); 
                        $stmt->execute([$email]); 

                        if($stmt->rowCount() > 0){
                            header('location:inscreption.php?p=6'); 
                            exit(); 
                        }

                        $req2 = 'insert into users(name,lname,email,password,pic) values(?,?,?,?,?)'; 
                        $stmt2 = $conn->prepare($req2); 
                        $stmt2->execute([$name,$last_name,$email,md5($password),$pic_name]);

                        move_uploaded_file($pic_tmp_name, "images/".$pic_name); 
                        
                        header('location:inscreption.php?p=7'); 
                        exit(); 

                    }else{
                        header('location:inscreption.php?p=4'); 
                        exit(); 
                    }
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