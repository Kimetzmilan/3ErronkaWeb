<?php include 'header.php'; ?>
<link rel="stylesheet" href="kontuaSortu.css">

<div class="login-wrapper">

    <div>
        <form class="login-box" action="kontuaSortuEgin.php" method="POST">
            <h2><?= $text['crear_cuenta_titulo'] ?></h2>
            <p><?= $text['crear_cuenta_p'] ?></p>

            <input type="text" name="izena" placeholder="<?= $text['crear_usuario'] ?>" required>
            <input type="email" name="email" placeholder="<?= $text['crear_email'] ?>" required>
            <input type="password" name="pasahitza" placeholder="<?= $text['crear_pass'] ?>" required>

            <button type="submit"><?= $text['crear_boton'] ?></button>
        </form>
    </div>
    <?php
    $popup="pop-up_close";
    $mezua="";
    $_SESSION["sortzekoErrorea"];
    if($_SESSION["sortzekoErrorea"]==1){
        $popup="pop-up_open";
        $mezua=$text['kontua_sortzeko_errorea'];
    }
    $_SESSION["sortzekoErrorea"]=0;
    ?>
    <div id="pop-up" class="<?= $popup ?>">
        <a href="#" class="itxi">X</a>
        <p><?= $mezua ?></p>
    </div>

    <script>
        $(".itxi").click(function(){
            $("#pop-up").removeClass("pop-up_open");
            $("#pop-up").addClass("pop-up_close");
        });
    </script>

</div>

<?php include 'footer.php'; ?>