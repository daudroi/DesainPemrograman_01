<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | UTS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #1a0030, #3c0099);
      color: white;
      min-height: 100vh;
    }
    .navbar {
      background: rgba(20, 0, 40, 0.8) !important;
      backdrop-filter: blur(10px);
    }
    .navbar-brand {
      font-weight: 600;
      color: #12f7ff !important;
    }
    .btn-outline-light:hover {
      background: #12f7ff;
      color: #1a0030;
    }
    .container h2 {
      font-size: 2.2rem;
      color: #12f7ff;
    }
    .container p {
      color: #d1d1ff;
    }
    footer {
      margin-top: 50px;
      color: #ccc;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">
      <?= htmlspecialchars($_SESSION['username']) ?> Dashboard
    </a>
    <div class="d-flex">
      <a href="buku.php" class="btn btn-outline-light me-2">Kelola Buku</a>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-5 text-center">
  <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['username']) ?> 👋</h2>
  <p class="lead"></p>
</div>


</body>
</html>
