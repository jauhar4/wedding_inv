<?php
$data = "Nama: " . $_POST['nama'] . "\nUcapan: " . $_POST['ucapan'] . "\n---\n";
file_put_contents("data_ucapan.txt", $data, FILE_APPEND);
header("Location: index.php");
?>