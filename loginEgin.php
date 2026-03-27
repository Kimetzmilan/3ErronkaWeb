<?php
session_start();
require 'konexioa.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $izena = $_POST['izena'];
    $pasahitza = $_POST['pasahitza'];

    $stmt = $conn->prepare("SELECT id, izena, pasahitza, blokeoa FROM erabiltzaileak WHERE izena = ?");
    $stmt->bind_param("s", $izena);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $row = $resultado->fetch_assoc();

        if ($row['blokeoa'] == 1) {
            echo "Kontua blokeatuta dago.";
            exit;
        }

        if ($pasahitza === $row['pasahitza']) {

            $_SESSION['id'] = $row['id'];
            $_SESSION['izena'] = $row['izena'];

            header("Location: index.php");
            exit;

        } else {
            echo "Pasahitza okerra da.";
        }

    } else {
        echo "Erabiltzailea ez da existitzen.";
    }
}
?>