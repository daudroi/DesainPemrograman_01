<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: buku.php");
    exit;
}

$id = (int) $_GET['id'];
$message = '';

$query = pg_query($conn, "SELECT * FROM buku WHERE id = $id");
$buku = pg_fetch_assoc($query);

if (!$buku) {
    die("Buku tidak ditemukan!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = pg_escape_string($conn, $_POST['judul']);
    $kategori = pg_escape_string($conn, $_POST['kategori']);
    $url_gambar = pg_escape_string($conn, $_POST['url_gambar']);
    $link_baca = pg_escape_string($conn, $_POST['link_baca']);

    $update = pg_query($conn, "UPDATE buku SET 
        judul = '$judul',
        kategori = '$kategori',
        url_gambar = '$url_gambar',
        link_baca = '$link_baca'
        WHERE id = $id
    ");

    if ($update) {
        header("Location: buku.php");
        exit;
    } else {
        $message = "Gagal mengupdate buku: " . pg_last_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Buku | UTS</title>
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
      color: #12f7ff !important;
      font-weight: 600;
    }
    .card {
      background: rgba(255, 255, 255, 0.1);
      border: none;
      border-radius: 15px;
      backdrop-filter: blur(10px);
      color: white;
    }
    .btn-primary {
      background: #12f7ff;
      border: none;
      color: #1a0030;
      font-weight: 600;
    }
    .btn-primary:hover {
      background: #0ddbe5;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php"><?= htmlspecialchars($_SESSION['username']) ?> Dashboard</a>
    <div class="d-flex">
      <a href="buku.php" class="btn btn-outline-light me-2">Kembali</a>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-5" style="max-width:600px;">
  <div class="card p-4 shadow">
    <h3 class="mb-4 text-center">✏️ Edit Buku</h3>
    <?php if ($message): ?>
      <div class="alert alert-danger"><?= $message ?></div>
    <?php endif; ?>

    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Judul Buku</label>
        <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($buku['judul']) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori" class="form-select" required>
          <?php
          $opsi = ['Sains', 'Teknologi', 'Sastra', 'Sejarah'];
          foreach ($opsi as $o) {
              $selected = ($buku['kategori'] === $o) ? 'selected' : '';
              echo "<option value='$o' $selected>$o</option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">URL Gambar</label>
        <input type="text" name="url_gambar" class="form-control" value="<?= htmlspecialchars($buku['url_gambar']) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Link Baca</label>
        <input type="text" name="link_baca" class="form-control" value="<?= htmlspecialchars($buku['link_baca']) ?>" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Update Buku</button>
    </form>
  </div>
</div>

</body>
</html>