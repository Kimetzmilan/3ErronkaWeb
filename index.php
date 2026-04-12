<?php include 'header.php'; ?>
<link rel="stylesheet" href="index.css">

<?php
require 'konexioa.php';

$config = simplexml_load_file("daymode.xml");
$idioma = (string)$config->hizkuntza;

include 'lang.php';
$text = $lang[$idioma];

$query = $conn->query("SELECT izena, irudia FROM bideojokoak WHERE garaia = 1");
?>

<div class="contenedor">
  <h2><?= $text['titulo'] ?></h2>

  <script>
  $(document).ready(function(){
    $('.single-item').slick({
      autoplay: true,
      autoplaySpeed: 5000,
      speed: 600,
      arrows: false,
      dots: false
    });
  });
  </script>

  <div class="single-item">
    <?php while ($row = $query->fetch_assoc()): ?>
      <a href="jokuespezifikoa.php?juego=<?= urlencode($row['izena']) ?>">
        <div>
          <img src="irudiak/<?= htmlspecialchars($row['irudia']) ?>" alt="<?= htmlspecialchars($row['izena']) ?>">
        </div>
      </a>
    <?php endwhile; ?>
  </div>

  <div class="tarjetas">
    <h2><?= $text['que_hacer'] ?></h2>
    <div>
      <div class="karta">
        <h3><?= $text['descubrir_t'] ?></h3>
        <p><?= $text['descubrir_p'] ?></p>
      </div>

      <div class="karta">
        <h3><?= $text['iruzkin_t'] ?></h3>
        <p><?= $text['iruzkin_p'] ?></p>
      </div>

      <div class="karta">
        <h3><?= $text['baloratu_t'] ?></h3>
        <p><?= $text['baloratu_p'] ?></p>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>