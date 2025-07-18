<?php
$nama_pria = "Jauharul Fu'ad";
$nama_wanita = "Putri Ayu";
$tanggal_acara = "2025-12-31 10:00:00";
$alamat = "Jl. Mawar No. 123, Surabaya";
$rekening_img = "barcode.png";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Undangan Pernikahan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url('background.jpg');">
<audio autoplay loop hidden>
  <source src="musik.mp3" type="audio/mpeg">
</audio>

<div class="container">
  <h1>Undangan Pernikahan</h1>
  <h2><?php echo $nama_pria . ' & ' . $nama_wanita; ?></h2>
  <p><strong>Tanggal:</strong> <?php echo date("l, d F Y H:i", strtotime($tanggal_acara)); ?></p>
  <p><strong>Alamat:</strong> <?php echo $alamat; ?></p>

  <div id="countdown"></div>

  <div class="barcode">
    <p>Scan barcode untuk hadiah:</p>
    <img src="<?php echo $rekening_img; ?>" alt="Barcode Rekening">
  </div>

  <h3>Galeri Foto</h3>
  <div class="galeri">
    <img src="galeri/foto1.jpg" alt="Foto 1">
    <img src="galeri/foto2.jpg" alt="Foto 2">
  </div>

  <h3>Form Ucapan</h3>
  <form action="simpan_ucapan.php" method="POST">
    Nama: <input type="text" name="nama" required><br>
    Ucapan: <textarea name="ucapan" required></textarea><br>
    <button type="submit">Kirim Ucapan</button>
  </form>

  <a href="ucapan.php" style="color:white;">Lihat semua ucapan</a>
</div>

<script>
const targetDate = new Date("<?php echo $tanggal_acara; ?>").getTime();
const countdown = document.getElementById("countdown");
function updateCountdown() {
  const now = new Date().getTime();
  const distance = targetDate - now;
  if (distance < 0) {
    countdown.innerHTML = "Acara telah berlangsung.";
    return;
  }
  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000 * 60)) / 1000);
  countdown.innerHTML = days + " hari, " + hours + " jam, " + minutes + " menit, " + seconds + " detik";
}
setInterval(updateCountdown, 1000);
</script>
</body>
</html>
