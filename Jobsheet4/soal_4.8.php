<?php
$poin = 550; 
$total = 0;

for ($i = 0; $i < $poin; $i += 50) {
    $total += 50;
}

echo "Total skor pemain adalah: $total<br>";

for ($i = 1; $i <= 1; $i++) { 
    if ($total > 500) {
        echo "Apakah pemain mendapatkan hadiah tambahan? YA";
    } else {
        echo "Apakah pemain mendapatkan hadiah tambahan? TIDAK";
    }
}
?>