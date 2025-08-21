
<?php 
    session_start(); 
    include('../connextion.php');
    if(isset($_GET['ids'])){
        $id = $_GET['ids']; 
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])){
            // here if user send request of changing his data !
            function test_input($data){
                $data = htmlspecialchars($data); 
                $data = stripslashes($data); 
                $data = trim($data); 
                return $data ;
            }
            $name = test_input($_POST['name']); 
            $last_name = test_input($_POST['lname']); 
            $email = test_input($_POST['email']); 
            $phone = test_input($_POST['phone']);
            
            $req = 'UPDATE Etudiant SET nom=?, prenom=?, mail=?, tel=? WHERE idEtudiant=?;'; 
            $stmt = $conn->prepare($req); 
            $stmt->execute([$last_name, $name , $email, $phone, $id]); 

            header('location:accu.php?p=100'); 
            exit();
        }else{
            // here if user just see his data before update !
            $req = 'select * from Etudiant where idEtudiant=?'; 
            $stmt = $conn->prepare($req); 
            $stmt->execute([$id]); 
            $student = $stmt->fetch(PDO::FETCH_ASSOC); 
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form  method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $student['nom']?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $student['prenom']?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="<?php echo $student['mail']?>" required>
                            </div>

                             <div class="mb-3">
                                <label for="name" class="form-label">phone number</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $student['tel']?>" required>
                            </div>

                            <button type="submit" name="send" class="btn btn-primary w-100">Upadte</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
