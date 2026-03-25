<?php include 'header.php'; ?>
<link rel="stylesheet" href="kontuaSortu.css">

<div class="login-wrapper">
    <form class="login-box">
        <h2><?= $text['crear_cuenta_titulo'] ?></h2>
        <p><?= $text['crear_cuenta_p'] ?></p>

        <input type="text" placeholder="<?= $text['crear_usuario'] ?>" required>
        <input type="email" placeholder="<?= $text['crear_email'] ?>" required>
        <input type="password" placeholder="<?= $text['crear_pass'] ?>" required>

        <button type="submit"><?= $text['crear_boton'] ?></button>
    </form>
</div>

<?php include 'footer.php'; ?>
</body>
</html>