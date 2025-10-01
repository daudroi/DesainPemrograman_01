<?php
function perkenalan($nama, $salam="Assalamualaikum"){
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

perkenalan("Hamdan", "Hallo");

echo "<hr>";

$saya = "Daud";
$ucapanSalam = "Selamat pagi";

//memanggil lagi
perkenalan($saya);
?>