<?php
//soal no 4.1
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai huruf: A";
} else if ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo "Nilai huruf: B";
} else if ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
    echo "Nilai huruf: C";
} else if ($nilaiNumerik < 70) {
    echo "Nilai huruf: D";
}

//soal no 4.2
$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
}

echo "<br><br>";
echo "Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.";

//soal no 4.3
$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan ; $i++) {
    $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}

echo "<br><br>";
echo "Jumlah buah yang akan dipanen adalah: $jumlahBuah";

//soal no 4.4
$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    $totalSkor += $skor;
}

echo "<br><br>";
echo "Total skor ujian adalah: $totalSkor";

//soal no 4.5
$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

echo "<br>";
foreach ($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
        echo "Nilai: $nilai (Tidak lulus) <br>";
        continue;
    }
    echo "Nilai: $nilai (Lulus) <br>";
}
?>