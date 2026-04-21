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
    <?php
    if(!isset($_SESSION["loginErrorea"])){
        $_SESSION["loginErrorea"]=null;
    }
    $popup="pop-up_close";
    $mezua="";
    if($_SESSION["loginErrorea"]==1){
        $popup="pop-up_open";
        $mezua=$text['login_erabiltzaile_blokeatuta'];
    }else if($_SESSION["loginErrorea"]==2){
        $popup="pop-up_open";
        $mezua=$text['login_pasahitz_oker'];
    }else if($_SESSION["loginErrorea"]==3){
        $popup="pop-up_open";
        $mezua=$text['login_erabiltzaile_oker'];
    }
    $_SESSION["loginErrorea"]=0;
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