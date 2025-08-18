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
    if (isset($_SESSION['matricule'])) {
      include('../cnx.php');
      $req = 'SELECT e.*, f.nomFiliere 
              FROM Etudiant e
              INNER JOIN Filiere f ON f.idFiliere = e.idFiliere';
      $stmt = $conn->query($req);
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($rows as $s) {
        // اضبط مسار الصور حسب مكان مجلد الصور لديك
        $imgPath = '../inscreption/images/' . $s['photo']; // أو '/images/'.$s['photo']
        echo '<tr>';
        echo '<td>' . htmlspecialchars($s['nom']) . '</td>';
        echo '<td>' . htmlspecialchars($s['prenom']) . '</td>';
        echo '<td>' . htmlspecialchars($s['mail']) . '</td>';
        echo '<td>' . htmlspecialchars($s['tel']) . '</td>';
        echo '<td><img src="' . htmlspecialchars($imgPath) . '" alt="" width="60" height="60" style="object-fit:cover;"></td>';
        echo '<td>' . htmlspecialchars($s['nomFiliere']) . '</td>';
        echo '<td><a class="btn btn-danger" href="delet.php">Delete</a>';
        echo '<td><a class="btn btn-info" href="#">Update</a>';
        echo '</tr>';
      }
    }
  ?>
  </tbody>
</table>
</body>
</html>
