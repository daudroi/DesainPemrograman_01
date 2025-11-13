<?php
$host = 'localhost';
$port = '5432';
$dbname = 'phpdatabase';
$user = 'postgres';
$pass = 'daud5758';    

// String koneksi
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$pass";

// Membuat koneksi
$conn = pg_connect($conn_string);

if (!$conn) {
    die('Koneksi Gagal: ' . pg_last_error());
}

// Set encoding
pg_set_client_encoding($conn, 'UTF8');
?>