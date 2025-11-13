<?php
include 'koneksi.php';

$kategori = isset($_GET['cat']) ? pg_escape_string($conn, $_GET['cat']) : 'semua';
$kategori_nama = ($kategori === 'semua') ? 'Semua' : ucwords($kategori);

if ($kategori === 'semua') {
    $sql = "SELECT id, judul, kategori, url_gambar, link_baca FROM buku ORDER BY judul";
} else {
    $sql = "SELECT id, judul, kategori, url_gambar, link_baca FROM buku WHERE kategori = '$kategori' ORDER BY judul";
}

$result = pg_query($conn, $sql);
if (!$result) {
    die('Query gagal: ' . pg_last_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kategori Buku | Xenoverse Digital Library</title>
    <link rel="icon" href="image/ovallogo.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <style>

        body {
            font-family: "Poppins", sans-serif;
            margin: 0;
            color: white;
            background: linear-gradient(to bottom, #190036, #3c0072);
            overflow-x: hidden;
        }

        header {
            text-align: center;
            padding: 40px 20px 20px;
        }

        header h1 {
            font-size: 2.5rem;
            color: #12f7ff;
        }

        .book-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 40px 20px 80px;
        }

        .book-card {
            width: 220px;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 12px;
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .book-card:hover {
            transform: translateY(-5px);
            background: rgba(255,255,255,0.2);
        }

        .book-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .book-info {
            padding: 15px;
        }

        .book-info h3 {
            margin: 10px 0 5px;
            font-size: 1.1rem;
        }

        .book-info a {
            display: inline-block;
            margin-top: 8px;
            padding: 6px 14px;
            border-radius: 8px;
            background: #12f7ff;
            color: #1a002b;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s;
        }

        .book-info a:hover {
            background: #00cce0;
        }

        .back-btn, .add-btn {
            display: inline-block;
            margin: 10px 5px 20px;
            padding: 8px 18px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .back-btn {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        .back-btn:hover {
            background: #12f7ff;
            color: #1a002b;
        }

        .crud-btn {
            display: inline-block;
            margin: 6px 3px;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 0.8rem;
            text-decoration: none;
            font-weight: 600;
            background: #fff;
            color: black;
            transition: .3s;
        }

        .crud-btn:hover {
            background: #00cce0;
        }

        .danger {
            background: red;
            color: white;
        }

        .danger:hover {
            opacity: .7;
        }

    </style>

</head>
<body>

<header>
    <h1>Kategori Buku: <span id="kategori-nama"><?php echo $kategori_nama; ?></span></h1>
    <a href="index.html#nextSection" class="back-btn">← Kembali</a>
</header>

<section class="book-container" id="bookContainer">

    <?php
    while ($buku = pg_fetch_assoc($result)) {
        $id     = $buku['id'];
        $judul  = htmlspecialchars($buku['judul']);
        $gambar = htmlspecialchars($buku['url_gambar']);
        $link   = htmlspecialchars($buku['link_baca']);

        echo '<div class="book-card">';
        echo '  <img src="'.$gambar.'" alt="'.$judul.'">';
        echo '  <div class="book-info">';
        echo '    <h3>'.$judul.'</h3>';
        echo '    <a href="'.$link.'" target="_blank">Baca</a><br>';
        echo '  </div>';
        echo '</div>';
    }

    if (pg_num_rows($result) === 0) {
        echo '<p style="color:white;">Tidak ada buku dalam kategori ini.</p>';
    }
    ?>

</section>

</body>
</html>

<?php pg_close($conn); ?>
