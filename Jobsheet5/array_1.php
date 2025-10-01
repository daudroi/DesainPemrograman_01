<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h2>Array Terindeks</h2>
<?php
    $Listdosen = ["Elok Nur Hamdana", "Unggul Pamenang", "Bagas Nugraha"];

    for ($i = count($Listdosen) - 1; $i >= 0; $i--) {
        echo $Listdosen[$i] . "<br>";
    }
?>
</body>
</html>