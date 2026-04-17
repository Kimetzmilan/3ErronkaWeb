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

        if ($row['blokeoa'] == 1){
            //Blokeatuta dagoenean
            $_SESSION["loginErrorea"]=1;
            header("Location: login.php");
            exit;
        }

        if ($pasahitza === $row['pasahitza']){

            $_SESSION['id'] = $row['id'];
            $_SESSION['izena'] = $row['izena'];

            header("Location: index.php");
            exit;

        } else {
            //Pasahitza oker sartzerakoan
            $_SESSION["loginErrorea"]=2;
            header("Location: login.php");
            exit;
        }
    } else {
        //Erabiltzailea oker sartzerakoan
        $_SESSION["loginErrorea"]=3;
        header("Location: login.php");
        exit;
    }
}
?>