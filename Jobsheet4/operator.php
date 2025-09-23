<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

//soal no 3.1
echo "Hasil Tambah: {$hasilTambah} <br>";
echo "Hasil Kurang: {$hasilKurang} <br>";
echo "Hasil Kali: {$hasilKali} <br>";
echo "Hasil Bagi: {$hasilBagi} <br>";
echo "Sisa Bagi: {$sisaBagi} <br>";
echo "Pangkat: {$pangkat} <br>";

//soal no 3.2
$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "<br>";
echo "Hasil Sama: " . ($hasilSama ? 'true' : 'false') . "<br>";
echo "Hasil Tidak Sama: " . ($hasilTidakSama ? 'true' : 'false') . "<br>";
echo "Hasil Lebih Kecil: " . ($hasilLebihKecil ? 'true' : 'false') . "<br>";
echo "Hasil Lebih Besar: " . ($hasilLebihBesar ? 'true' : 'false') . "<br>";
echo "Hasil Lebih Kecil Sama: " . ($hasilLebihKecilSama ? 'true' : 'false') . "<br>";
echo "Hasil Lebih Besar Sama: " . ($hasilLebihBesarSama ? 'true' : 'false') . "<br>";

//soal no 3.3
$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "<br>";
echo "Hasil And: " . ($hasilAnd ? 'true' : 'false') . "<br>";
echo "Hasil Or: " . ($hasilOr ? 'true' : 'false') . "<br>";
echo "Hasil Not A: " . ($hasilNotA ? 'true' : 'false') . "<br>";
echo "Hasil Not B: " . ($hasilNotB ? 'true' : 'false') . "<br>";

//soal no 3.4
$penugasanHasilTambah = $a += $b;
$penugasanHasilKurang = $a -= $b;
$penugasanHasilKali = $a *= $b;
$penugasanHasilBagi = $a /= $b;
$penugasanSisaBagi = $a %= $b;

echo "<br>";
echo "Penugasan Hasil Tambah: {$penugasanHasilTambah} <br>";
echo "Penugasan Hasil Kurang: {$penugasanHasilKurang} <br>";
echo "Penugasan Hasil Kali: {$penugasanHasilKali} <br>";
echo "Penugasan Hasil Bagi: {$penugasanHasilBagi} <br>";
echo "Penugasan Sisa Bagi: {$penugasanSisaBagi} <br>";

//soal no 3.5
$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;

echo "<br>";
echo "Hasil Identik: " . ($hasilIdentik ? 'true' : 'false') . "<br>";
echo "Hasil Tidak Identik: " . ($hasilTidakIdentik ? 'true' : 'false') . "<br>";
?>