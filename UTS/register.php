<?php
// ... (Kode PHP di sini sama, tidak berubah) ...
session_start();
include 'koneksi.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = pg_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Gunakan parameterized query untuk keamanan yang lebih baik
    $check_result = pg_query_params($conn, "SELECT 1 FROM users WHERE username = $1", array($username));
    
    if ($check_result && pg_num_rows($check_result) > 0) {
        $message = "Username sudah digunakan!";
    } else {
        $query_result = pg_query_params($conn, "INSERT INTO users (username, password) VALUES ($1, $2)", array($username, $password));
        
        if ($query_result) {
            header("Location: login.php?success=1");
            exit;
        } else {
            $message = "Gagal registrasi: " . pg_last_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register | Xenoverse</title>
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
          <h4 class="text-center mb-4 text-xenoverse">Register Akun</h4>
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
            <button type="submit" class="btn btn-xenoverse w-100">Daftar</button>
          </form>
          <div class="text-center mt-3">
            <small>Sudah punya akun? <a href="login.php" class="text-xenoverse">Login</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>