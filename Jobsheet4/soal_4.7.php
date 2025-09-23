<?php
$harga = 120000;
$diskon = 0.20;
$hargaAkhir = $harga;

for ($i = 1; $i <= 1; $i++) { 
    if ($harga > 100000) {
        $hargaAkhir = $harga - ($harga * $diskon);
    }
}

echo "Harga setelah diskon: Rp $hargaAkhir<br>";
?>