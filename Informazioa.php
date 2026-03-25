 <?php include 'header.php'; ?>
 <link rel="stylesheet" href="Informazioa.css">
    <section class="info-web">
 <h2><?= $text['info_kontaktua'] ?></h2>
<p><?= $text['info_kontaktua_p'] ?></p>

<div class="info-bloques">
    <div class="info-karta">
        <h3><?= $text['info_emaila'] ?></h3>
        <p>SteelWave@gmail.com</p>
    </div>

    <div class="info-karta">
        <h3><?= $text['info_telefonoa'] ?></h3>
        <p>+34 123 456 789</p>
    </div>

    <div class="info-karta">
        <h3><?= $text['info_sareak'] ?></h3>
        <img class="iconos" src="irudiak/Icono.png" alt="">
        <img class="iconos" src="irudiak/Icono2.png" alt="">
    </div>

    <div class="separador"></div>

    <div class="info-karta">
        <h2><?= $text['info_kokapena'] ?></h2>
        <div class="mapa-contenedor">

        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11662.861201028205!2d-2.1790719999999997!3d43.047421299999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1773221997608!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
    </div>
</div>

<div class="separador"></div>

<h2><?= $text['info_gehiago'] ?></h2>
<p><?= $text['info_gehiago_p'] ?></p>

<ul class="lista-info">
    <li><?= $text['info_li1'] ?></li>
    <li><?= $text['info_li2'] ?></li>
</ul>

</section>

 <?php include 'footer.php'; ?>

</body>
</html>
