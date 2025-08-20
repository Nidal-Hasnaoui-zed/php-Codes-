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
            $req = 'SELECT e.*, f.nomFiliere 
                    FROM Etudiant e
                    INNER JOIN Filiere f ON f.idFiliere = e.idFiliere;'; 
            $stmt = $conn->query($req); 

            $students = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            foreach($students as $s){
                $tr = '<tr><td>'; 
                $tr .= $s['nom'] ; 
                $tr .= '</td><td>'; 
                $tr .= $s['prenom']; 
                $tr .= '</td><td>'; 
                $tr .= $s['mail']; 
                $tr .= '</td><td>';
                $tr .= $s['tel'];
                $tr .= '</td><td><img style="width=40px;height:40px;" src="../inscreption/images/';
                $tr .= $s['photo'];
                $tr .= '"></td><td>';
                $tr .= $s['nomFiliere']; 
                $tr .= '</td><td>';
                $tr .= '<a class="btn btn-danger" href="delete.php?ids=>';
                $tr .= $s['idEtudiant']; 
                $tr .= '">DELET</a>';
                $tr .= '</td><td>';
                $tr .= '<a class="btn btn-info" href="update.php?ids=>';
                $tr .= $s['idEtudiant'];
                $tr .= '">UPADATE</a>';
                $tr .= '</td></tr>'; 
                echo $tr;

            }

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