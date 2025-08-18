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
                        <form action="action.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="your name" required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control" placeholder="your last name" required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="your email" required>
                            </div>

                             <div class="mb-3">
                                <label for="name" class="form-label">phone number</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="your email" required>
                            </div>

                             <div class="mb-3">
                                <label for="password" class="form-label">Your Picture</label>
                                <input type="file" name="pic" id="password" class="form-control"  required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="pwd" id="password" class="form-control" placeholder="your password" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input type="password" name="cpwd" id="password" class="form-control" placeholder="confirm your password" required>
                            </div>


                            <button type="submit" name="send" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
