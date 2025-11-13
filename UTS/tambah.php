<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
// Pastikan sesi 'username' tersedia di sini, jika tidak, tampilkan 'User' atau 'Dashboard' saja.
// Dalam konteks file ini, diasumsikan 'username' ada setelah login.
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User';

include 'koneksi.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pastikan menggunakan fungsi koneksi yang benar, di sini menggunakan pg_escape_string
    $judul = pg_escape_string($conn, $_POST['judul']);
    $kategori = pg_escape_string($conn, $_POST['kategori']);
    $url_gambar = pg_escape_string($conn, $_POST['url_gambar']);
    $link_baca = pg_escape_string($conn, $_POST['link_baca']);

    $insert = pg_query($conn, "INSERT INTO buku (judul, kategori, url_gambar, link_baca)
                               VALUES ('$judul', '$kategori', '$url_gambar', '$link_baca')");
    if ($insert) {
        header("Location: buku.php");
        exit;
    } else {
        $message = "Gagal menambah buku: " . pg_last_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Buku | UTS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Styling disamakan dengan edit_buku.php */
    body {
      font-family: "Inter", sans-serif;
      background: linear-gradient(135deg, #1a0030, #3c0099);
      color: white;
      min-height: 100vh;
    }
    .navbar {
      background: rgba(20, 0, 40, 0.8) !important;
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(18, 247, 255, 0.2);
    }
    .navbar-brand {
      color: #12f7ff !important;
      font-weight: 600;
      letter-spacing: 1px;
    }
    .card {
      background: rgba(255, 255, 255, 0.1);
      border: none;
      border-radius: 15px;
      backdrop-filter: blur(10px);
      box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
      color: white;
    }
    .form-control, .form-select {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: white; /* Teks dalam kotak input/select itu sendiri berwarna putih */
    }
    .form-control:focus, .form-select:focus {
      background: rgba(255, 255, 255, 0.2);
      border-color: #12f7ff;
      box-shadow: 0 0 0 0.25rem rgba(18, 247, 255, 0.25);
      color: white;
    }
    /* PERUBAHAN: Memastikan teks opsi dropdown (di dalam list yang terbuka) berwarna hitam */
    .form-select option {
      color: black;
      background: white; /* Memastikan background opsinya putih untuk kontras yang baik */
    }
    /* END: PERUBAHAN */
    .form-label {
      font-weight: 500;
      color: #12f7ff;
    }
    /* Mengubah btn-success menjadi btn-primary yang sesuai tema */
    .btn-primary {
      background: #12f7ff;
      border: none;
      color: #1a0030;
      font-weight: 600;
      transition: all 0.3s;
    }
    .btn-primary:hover {
      background: #0ddbe5;
      transform: translateY(-2px);
    }
    .btn-danger {
      background: #ff4d4d;
      border: none;
    }
    .btn-outline-light {
      color: white;
      border-color: white;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <!-- DISESUAIKAN: Menggunakan username dari sesi, sama seperti edit_buku.php -->
    <a class="navbar-brand" href="dashboard.php">📚 <?= htmlspecialchars($_SESSION['username'] ?? 'User') ?> Dashboard</a>
    <div class="d-flex">
      <a href="buku.php" class="btn btn-outline-light me-2">Kembali</a>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-5" style="max-width:600px;">
  <div class="card p-4 shadow">
    <h3 class="mb-4 text-center">➕ Tambah Buku Baru</h3>
    <?php if ($message): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Judul Buku</label>
        <input type="text" name="judul" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori" class="form-select" required>
          <option value="">Pilih...</option>
          <option value="Sains">Sains</option>
          <option value="Teknologi">Teknologi</option>
          <option value="Sastra">Sastra</option>
          <option value="Sejarah">Sejarah</option>
          <option value="Fiksi">Fiksi</option>
          <option value="Non-Fiksi">Non-Fiksi</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">URL Gambar Sampul</label>
        <input type="text" name="url_gambar" class="form-control" placeholder="Contoh: https://link-gambar-sampul.jpg" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Link Baca / Akses</label>
        <input type="text" name="link_baca" class="form-control" placeholder="Contoh: https://link-baca-buku.pdf" required>
      </div>
      <button type="submit" class="btn btn-primary w-100 mt-3">Simpan Buku</button>
    </form>
  </div>
</div>

</body>
</html>