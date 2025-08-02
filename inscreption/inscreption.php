<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Nouvel Etudiant</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Nouvel Étudiant</h2>
        <form action="inscreptionAction.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Adresse mail" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="nom" placeholder="Nom" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
          </div>
          <div class="mb-3">
            <input type="tel" class="form-control" name="phone" placeholder="Numéro de téléphone" required>
          </div>
          <div class="mb-3">
            <select class="form-select" name="fill" required>
              <option value="0" selected disabled>Filière</option>
              <?php 
                include('../conx.php'); 
                $req = 'SELECT * FROM Filiere'; 
                $stmt = $conn->query($req); 
                $fils = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                foreach($fils as $f){
                  echo '<option value="' . $f['idFiliere'] . '">' . htmlspecialchars($f['nomFiliere']) . '</option>';
                }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" class="form-control" name="pic" accept="image/*" required>
          </div>
          <button type="submit" name="send" class="btn btn-primary w-100">S'inscrire</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
