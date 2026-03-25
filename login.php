<?php include 'header.php'; ?>
<link rel="stylesheet" href="login.css">

<div class="login-wrapper">

    <form class="login-box">
        <h2><?= $text['login_titulo'] ?></h2>

        <input type="text" placeholder="<?= $text['login_usuario'] ?>" required>
        <input type="password" placeholder="<?= $text['login_pass'] ?>" required>

        <button type="submit"><?= $text['login_boton'] ?></button>
    </form>

    <form class="login-box">
        <h3><?= $text['login_crear_titulo'] ?></h3><br>
        <a href="kontuaSortu.php" class="btn"><?= $text['login_crear_boton'] ?></a>
    </form>

</div>

<?php include 'footer.php'; ?>
</body>
</html>