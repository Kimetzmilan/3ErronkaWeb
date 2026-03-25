<?php include 'header.php'; ?>
<link rel="stylesheet" href="jokuespezifikoa.css">
<br>

<main>
    <div><img class="img2" src="irudiak/Minecraft.jpg"></div>
    <br>

    <section class="game-info">
        <h2><?= $text['juego_info'] ?></h2>
        <p><strong><?= $text['juego_genero'] ?>:</strong> Sandbox</p>
        <p>
  <strong><?= $text['juego_plataformas'] ?>:</strong>
  <?= $text['plataforma_pc'] ?>,
  <?= $text['plataforma_consolas'] ?>,
  <?= $text['plataforma_movil'] ?>
</p>
    </section>

    <section class="extra">
        <h2><?= $text['juego_extra'] ?></h2>
        <p><strong><?= $text['juego_requisitos'] ?>:</strong> CPU, RAM, GPU, etc.</p>
        <p><strong><?= $text['juego_fecha'] ?>:</strong> 2008</p>
    </section>
</main>

<?php include 'footer.php'; ?>
</body>
</html>