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
        <h2 class="text-center mb-4">Nouvel Etudiant</h2>
        <form>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Adresse mail" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nom" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Prénom" required>
          </div>
          <div class="mb-3">
            <input type="tel" class="form-control" placeholder="Numéro tel" required>
          </div>
          <div class="mb-3">
            <select class="form-select" required>
              <option selected disabled>Filière</option>
              <option value="info">Informatique</option>
              <option value="eco">Économie</option>
              <option value="gestion">Gestion</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Photo</label>
            <input type="file" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary w-100">S'inscrire</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
