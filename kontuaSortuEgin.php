<?php
session_start();
require 'konexioa.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $izena = $_POST['izena'];
    $email = $_POST['email'];
    $pasahitza = $_POST['pasahitza'];

    $stmt = $conn->prepare("SELECT id FROM erabiltzaileak WHERE izena = ? OR email = ?");
    $stmt->bind_param("ss", $izena, $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $_SESSION["sortzekoErrorea"]=1;
        header("Location: kontuaSortu.php");
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO erabiltzaileak (izena, email, pasahitza, blokeoa) VALUES (?, ?, ?, 0)");
    $stmt->bind_param("sss", $izena, $email, $pasahitza);
    $stmt->execute();

    header("Location: login.php");
    exit;
}
?>