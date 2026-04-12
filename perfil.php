<?php
session_start();
require 'konexioa.php';

if (!isset($_SESSION['izena'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

$config = simplexml_load_file("daymode.xml");
$daymode = (string)$config->daymode;
$idioma = (string)$config->hizkuntza;

include 'lang.php';
$text = $lang[$idioma];

$izena = $_SESSION['izena'];

$stmt = $conn->prepare("SELECT id, izena, email, blokeoa FROM erabiltzaileak WHERE izena = ?");
$stmt->bind_param("s", $izena);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
?>

<!doctype html>
<html lang="<?= $idioma ?>">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="perfil.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $text['perfil_titulo'] ?></title>
</head>

<body class="<?= $daymode ?>">

<div class="perfil-wrapper">

    <div class="perfil-header">
        <h1><?= $text['perfil_titulo'] ?></h1>
    </div>

    <div class="perfil-card">
        <div class="perfil-item">
            <span class="label"><?= $text['perfil_nombre'] ?></span>
            <span class="value"><?= $usuario['izena'] ?></span>
        </div>

        <div class="perfil-item">
            <span class="label"><?= $text['perfil_email'] ?></span>
            <span class="value"><?= $usuario['email'] ?></span>
        </div>

        <div class="perfil-item">
            <span class="label"><?= $text['perfil_estado'] ?></span>
            <span class="value estado <?= ($usuario['blokeoa'] == 1) ? "bloqueado" : "activo" ?>">
                <?= ($usuario['blokeoa'] == 1) ? $text['perfil_bloqueado'] : $text['perfil_activo'] ?>
            </span>
        </div>
    </div>

    <a href="index.php" class="btn-volver"><?= $text['perfil_volver'] ?></a>

    <form method="POST">
        <button type="submit" name="logout" class="btn-logout"><?= $text['perfil_logout'] ?></button>
    </form>

</div>