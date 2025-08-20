<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stagiaires</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<table class="table table-striped align-middle">
  <thead>
    <tr>
      <th>name</th>
      <th>last name</th>
      <th>email</th>
      <th>phone number</th>
      <th>Picture</th>
      <th>Branch</th>
      <th>Delete</th>
      <th>Update</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        session_start(); 
        if(isset($_SESSION['matricule'])){

            include('../connextion.php'); 
            $req = 'select * from Etudiant'; 
            $stmt = $conn->query($req); 
            

        }else{
            // please login first !
            header('location:../login/login.php?p=1'); 
            exit(); 
        }
    ?>
  </tbody>
</table>
</body>
</html>