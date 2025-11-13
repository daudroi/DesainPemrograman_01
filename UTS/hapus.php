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
$hapus = pg_query($conn, "DELETE FROM buku WHERE id = $id");

if ($hapus) {
    header("Location: buku.php");
    exit;
} else {
    die("Gagal menghapus buku: " . pg_last_error($conn));
}
?>
