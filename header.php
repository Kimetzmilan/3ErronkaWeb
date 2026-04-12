<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="header.css">
    <title>index</title>
</head>

<?php
session_start();

$config = simplexml_load_file("daymode.xml");
$idioma = (string)$config->hizkuntza;
$daymode = (string)$config->daymode;

include 'lang.php';
$text = $lang[$idioma];
?>

<body class="<?= $daymode ?>">

<header>
    <div>
        <img class="logo" src="irudiak/SteelWave.png">
    </div>

    <nav>
        <?php
        if (isset($_POST["toggle_lang"])) {
            if ($config->hizkuntza == "es") {
                $config->hizkuntza = "eu";
            } else {
                $config->hizkuntza = "es";
            }
            $config->asXML("daymode.xml");
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit;
        }

        $iconLang = ($idioma === "es") ? "🇪🇸" : "🇪🇺";

        if (isset($_POST["toggle"])) {
            $config->daymode = ($daymode === "gaua") ? "eguna" : "gaua";
            $config->asXML("daymode.xml");
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit;
        }

        $icon = ($daymode === "gaua") ? "🌙" : "☀️";
        ?>
        <form method="post">
            <button type="submit" name="toggle_lang" class="icon-btn">
                <span class="icon"><?= $iconLang ?></span>
            </button>
        </form>

        <form method="post">
            <button type="submit" name="toggle" class="icon-btn">
                <span class="icon"><?= $icon ?></span>
            </button>
        </form>
        <div class="sidebar" id="sidebar" onclick="closeNav()">
            <a href="#" class="sidebarAtera" onclick="closeNav()">X</a>
            <a href="jokuak.php"><?= $text['menu_jokuak'] ?></a>

        <?php if (isset($_SESSION['izena'])): ?>
            <a href="perfil.php">
                <?= $_SESSION['izena'] ?>
            </a>
        <?php else: ?>
            <a href="login.php"><?= $text['menu_kontua'] ?></a>
        <?php endif; ?>

        <a href="informazioa.php"><?= $text['menu_info'] ?></a>
        <a href="index.php"><?= $text['menu_index'] ?></a>
        </div>
        <div class="openNav" onclick="openNav()">
            <button class="openbtn">☰</button>
        </div>
        <script>
            function openNav(){
                document.getElementById("sidebar").style.width="75%";
            }
            function closeNav(){
                document.getElementById("sidebar").style.width="0";
            }
        </script>
    </nav>
</header>