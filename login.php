<?php include 'header.php'; ?>
<link rel="stylesheet" href="login.css">

<div class="login-wrapper">
    <div class="login-box">
        <form action="loginEgin.php" method="POST">
            <label><?= $text['login_titulo'] ?></label>

            <input type="text" name="izena" placeholder="<?= $text['login_usuario'] ?>" required>
            <input type="password" name="pasahitza" placeholder="<?= $text['login_pass'] ?>" required>

            <button type="submit"><?= $text['login_boton'] ?></button>
        </form>
    </div>

    <div class="login-box">
        <form action="kontuaSortu.php">
            <label><?= $text['login_crear_titulo'] ?></label>
            <button type="submit" class="btn"><?= $text['login_crear_boton'] ?></button>
        </form>
    </div>

</div>

<?php include 'footer.php'; ?>