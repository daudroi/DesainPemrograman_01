<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

$query = pg_query($conn, "SELECT * FROM buku ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Buku | UTS</title>
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
    .table {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      overflow: hidden;
      color: white;
    }
    .table thead {
      background-color: rgba(18, 247, 255, 0.2);
      color: #12f7ff;
    }
    .table img {
      border-radius: 6px;
      object-fit: cover;
    }
    a {
      text-decoration: none;
    }
    footer {
      margin-top: 40px;
      color: #ccc;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php">
      <?= htmlspecialchars($_SESSION['username']) ?> Dashboard
    </a>
    <div class="d-flex">
      <a href="tambah.php" class="btn btn-outline-light me-2">+ Tambah Buku</a>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h3 class="mb-4 text-center" style="color:#12f7ff;">📚 Daftar Buku</h3>

  <div class="table-responsive">
    <table class="table table-hover align-middle text-white">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          <th scope="col">Gambar</th>
          <th scope="col">Link Baca</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = pg_fetch_assoc($query)): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['judul']) ?></td>
          <td><?= htmlspecialchars($row['kategori']) ?></td>
          <td><img src="<?= htmlspecialchars($row['url_gambar']) ?>" width="70" height="90"></td>
          <td><a href="<?= htmlspecialchars($row['link_baca']) ?>" target="_blank" class="btn btn-info btn-sm">Baca</a></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus buku ini?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>

        <?php if (pg_num_rows($query) === 0): ?>
        <tr>
          <td colspan="6" class="text-center text-secondary">Belum ada data buku.</td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>



</body>
</html>
