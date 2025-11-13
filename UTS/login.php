<?php
// ... (Kode PHP di sini sama, tidak berubah) ...
session_start();
include 'koneksi.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = pg_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Gunakan parameterized query untuk keamanan yang lebih baik
    $query_result = pg_query_params($conn, "SELECT id, username, password FROM users WHERE username = $1", array($username));
    
    if ($query_result && pg_num_rows($query_result) > 0) {
        $user = pg_fetch_assoc($query_result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            $message = "Password salah!";
        }
    } else {
        $message = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | Xenoverse</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom Style untuk skema warna ungu kebiruan */
    .bg-xenoverse {
        background-color: #6A5ACD; /* Ungu kebiruan */
    }
    .text-xenoverse {
        color: #6A5ACD;
    }
    .btn-xenoverse {
        background-color: #6A5ACD;
        border-color: #6A5ACD;
        color: white;
    }
    .btn-xenoverse:hover {
        background-color: #584AA3; /* Lebih gelap saat hover */
        border-color: #584AA3;
    }
    .form-control:focus {
        border-color: #6A5ACD;
        box-shadow: 0 0 0 0.25rem rgba(106, 90, 205, 0.25); /* Shadow ungu kebiruan */
    }
  </style>
</head>
<body class="bg-xenoverse"> 
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <h1 class="text-center mb-4 text-white">Xenoverse</h1>
      <div class="card shadow">
        <div class="card-body">
          <h4 class="text-center mb-4 text-xenoverse">Login Akun</h4>
          <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success">Registrasi berhasil! Silakan login.</div>
          <?php endif; ?>
          <?php if ($message): ?>
            <div class="alert alert-danger"><?= $message ?></div>
          <?php endif; ?>
          <form method="POST">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-xenoverse w-100">Login</button>
          </form>
          <div class="text-center mt-3">
            <small>Belum punya akun? <a href="register.php" class="text-xenoverse">Daftar</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>