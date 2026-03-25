<?php include 'header.php'; ?>
<link rel="stylesheet" href="index.css">

<?php
$config = simplexml_load_file("daymode.xml");
$idioma = (string)$config->hizkuntza;

include 'lang.php';
$text = $lang[$idioma];
?>

<div class="contenedor">
  <h2><?= $text['titulo'] ?></h2>

  <script>
  $(document).ready(function(){
    $('.single-item').slick({
      autoplay: true,
      autoplaySpeed:5000,
      speed: 600,
      arrows: false,
      dots: true
    });
  });
  </script>

  <div class="single-item">
    <a href="jokuespezifikoa.php">
      <div><img src="irudiak/Minecraft.jpg"></div>
    </a>
    <a href="jokuespezifikoa.php">
      <div><img src="irudiak/Hollow.jpg"></div>
    </a>
    <a href="jokuespezifikoa.php">
      <div><img src="irudiak/Island.jpg"></div>
    </a>
  </div>

  <div class="tarjetas">
    <h2><?= $text['que_hacer'] ?></h2>

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

<?php include 'footer.php'; ?>