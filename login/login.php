<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Surveillant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card p-4 shadow rounded" style="width: 22rem;">
        <h4 class="text-center mb-3">Login Surveillant</h4>
        <form method="POST" action="actionLogin.php">
            <div class="mb-3">
                <label for="matricule" class="form-label">Nom</label>
                <input type="text" class="form-control" id="matricule" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="psw" class="form-label">Password</label>
                <input type="password" class="form-control" id="psw" name="pwd" required>
            </div>
            <button type="submit" name="send" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

</body>
</html>
