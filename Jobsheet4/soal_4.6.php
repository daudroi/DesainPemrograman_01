<?php
$nilai = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

sort($nilai);

$total = 0;
for ($i = 2; $i < count($nilai) - 2; $i++) {
    $total += $nilai[$i];
}

echo "Total nilai setelah mengabaikan 2 tertinggi dan 2 terendah: $total<br>";
?>
