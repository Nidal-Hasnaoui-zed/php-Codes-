<?php 
session_start(); 
include('../connextion.php'); 

if (isset($_GET['ids'])) {
    $id = $_GET['ids'];

    // إذا تبع الفورم
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $tel = $_POST['tel'];

        $req = "UPDATE Etudiant SET nom=?, prenom=?, mail=?, tel=? WHERE idEtudiant=?";
        $stmt = $conn->prepare($req);
        $stmt->execute([$nom, $prenom, $mail, $tel, $id]);

        header("location:accu.php?p=4"); // تحديث ناجح
        exit();
    } else {
        // نجيب بيانات الطالب باش نعرضها فالفورم
        $req = "SELECT * FROM Etudiant WHERE idEtudiant=?";
        $stmt = $conn->prepare($req);
        $stmt->execute([$id]);
        $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
    }
} else {
    header("location:accu.php?p=5"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0">Update Student</h4>
        </div>
        <div class="card-body">
          <form method="post">
            
            <div class="mb-3">
              <label class="form-label">Nom</label>
              <input type="text" class="form-control" name="nom" value="<?php echo $etudiant['nom']; ?>" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Prénom</label>
              <input type="text" class="form-control" name="prenom" value="<?php echo $etudiant['prenom']; ?>" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="mail" value="<?php echo $etudiant['mail']; ?>" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Téléphone</label>
              <input type="text" class="form-control" name="tel" value="<?php echo $etudiant['tel']; ?>" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
