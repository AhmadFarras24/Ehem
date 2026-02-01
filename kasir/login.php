<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){

    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi,
        "SELECT * FROM logadmin
         WHERE username='$username'
         AND password='$password'"
    );

    if(mysqli_num_rows($query) > 0){

        $data = mysqli_fetch_assoc($query);

        $_SESSION['admin'] = $data['username'];
        $_SESSION['id']    = $data['id'];

        header("Location: admin/index.php");
        exit;

    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <body class="bg-light d-flex justify-content-center align-items-center" style="min-height:100vh;">

        <div class="card shadow" style="width:400px;">

            <div class="card-header bg-dark text-white text-center">
                <h4>Login Admin</h4>
            </div>

            <div class="card-body">

                <?php if(isset($error)){ ?>
                    <div class="alert alert-danger">
                        <?= $error ?>
                    </div>
                <?php } ?>

                <form method="POST">
                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                        <button type="submit" name="login" class="btn btn-dark w-100">Login</button>
                </form>

            </div>
        </div>

    </body>
</html>
